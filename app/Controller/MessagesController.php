<?php

App::uses('AppController', 'Controller');

/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public $order = array('Message.created' => 'DESC');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $conditions = array('deleted' => false);
        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Message.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $this->order);
        $this->Paginator->settings = $settings;

        $this->set('messages', $this->paginate());
        if (!$this->request->is('ajax')) {
            $senders = $this->Message->Sender->find('list');
            $recipients = $this->Message->Recipient->find('list');
            $this->set(compact('senders', 'recipients'));
        }
    }
    
    /**
     * index method
     *
     * @return void
     */
    public function teacher_index() {
        $conditions = array('deleted' => false);
        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Message.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $this->order);
        $this->Paginator->settings = $settings;

        $this->set('messages', $this->paginate());
        if (!$this->request->is('ajax')) {
            $senders = $this->Message->Sender->find('list');
            $recipients = $this->Message->Recipient->find('list');
            $this->set(compact('senders', 'recipients'));
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        $userId = $this->Auth->user('id');
        $message = $this->Message->find('first', array('conditions' => array('Message.id' => $id), 'contain' => array(
                'Sender' => array('fields' => array('id', 'name')),
                'Recipient' => array('fields' => array('id', 'name', 'so_dien_thoai', 'avatar', 'email', 'department_id')))));

        if ($message['Message']['sender_id'] != $userId) {
            if (in_array($userId, Set::classicExtract($message['Recipient'], '{n}.id'))) {
                $messageUser = ClassRegistry::init('MessagesUser');
                $messageUser->updateAll(array('read' => 1), array('message_id' => $id, 'recipient_id' => $userId));
                $userClass = ClassRegistry::init('User');
                $userClass->Notification->markAsRead($userId, 'Message', $message['Message']['id']);
            } else {
                $this->Flash->error('Bạn không có quyền xem tin nhắn của người khác.');
                return $this->redirect($this->referer());
            }
        }


        $this->set('message', $message);
    }

    //Liệt kê danh sách hộp thư đến
    public function inbox() {

        $contain = array('Sender');
        $order = $this->order;

        $messageUser = ClassRegistry::init('MessagesUser');

        $messages = $messageUser->find('all', array('conditions' => array('recipient_id' => $this->Auth->user('id')), 'fields' => array('message_id')));
        $message_id = Set::classicExtract($messages, '{n}.MessagesUser.message_id');

        $conditions = array('Message.deleted' => false, 'Message.id' => $message_id);

        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Message.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('messages', $this->paginate());
        if (!$this->request->is('ajax')) {
            $senders = $this->Message->Sender->find('list');
            $recipients = $this->Message->Recipient->find('list');
            $this->set(compact('senders', 'recipients'));
        }
    }

    //Liệt kê danh sách hộp thư đi
    public function outbox() {
        $contain = array('Sender');
        $order = $this->order;

        $conditions = array('Message.deleted' => false, 'Message.sender_id' => AuthComponent::user('id'));

        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Message.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('messages', $this->paginate());
        if (!$this->request->is('ajax')) {

            $recipients = $this->Message->Recipient->find('list');
            $this->set(compact('recipients'));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data('Message.sender_id', $this->Auth->user('id'));
            $this->Message->create();
            if ($this->Message->save($this->request->data)) {
                $this->Flash->success(__('The message has been saved'));
                $this->redirect(array('action' => 'outbox'));
            } else {

                $this->Flash->error(__('The message could not be saved. Please, try again.'));
            }
        }
        $senders = $this->Message->Sender->find('list');
        $recipients = $this->Message->Recipient->find('list');
        $this->set(compact('senders', 'recipients'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Message->id = $id;
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Message->save($this->request->data)) {
                $this->Flash->success(__('message đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('message lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
            $this->request->data = $this->Message->find('first', $options);
        }
        $senders = $this->Message->Sender->find('list');
        $recipients = $this->Message->Recipient->find('list');
        $this->set(compact('senders', 'recipients'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    //Người gửi chỉ có thể xóa mềm tin nhắn
    public function delete() {

        if ($this->request->is('ajax')) {
            $deleted = array();

            $this->autoRender = false;
            if (!empty($this->request->data)) {

                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                foreach ($requestDeleteId as $id) {
                    //Xóa thư trong INBOX
                    if ($this->Message->isSender($id)) {
                        if ($this->Message->updateAll(array('Message.deleted' => true), array('Message.id' => $id))) {
                            $deleted[] = $id;
                        }
                    }
                    //Xóa trong OUTBOX
                    if ($this->Message->isRecipient($id)) {
                        $messageUser = ClassRegistry::init('MessagesUser');
                        $userClass = ClassRegistry::init('User');

                        if ($messageUser->updateAll(array('deleted' => 1), array('message_id' => $id, 'recipient_id' => $userId))) {
                            $deleted[] = $id;
                        }

                        $userClass->Notification->markAsDeleted($userId, 'Message', $id);
                    }
                }
            }
            echo json_encode($deleted);
        } else {
            return $this->redirect($this->referer());
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $conditions = array();
        $contain = array('Sender' => array('name', 'id'));
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Message.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('messages', $this->paginate());
        if (!$this->request->is('ajax')) {
            $senders = $this->Message->Sender->find('list');
            $recipients = $this->Message->Recipient->find('list');
            $this->set(compact('senders', 'recipients'));
        }
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        $userId = $this->Auth->user('id');
        $message = $this->Message->find('first', array('conditions' => array('Message.id' => $id), 'contain' => array(
                'Sender' => array('fields' => array('id', 'name')),
                'Recipient' => array('fields' => array('id', 'name', 'username', 'so_dien_thoai', 'avatar', 'email', 'department_id')))));


        if (in_array($userId, Set::classicExtract($message['Recipient'], '{n}.id'))) {
            $messageUser = ClassRegistry::init('MessagesUser');
            $messageUser->updateAll(array('read' => 1), array('message_id' => $id, 'recipient_id' => $userId));
            $userClass = ClassRegistry::init('User');
            $userClass->Notification->markAsRead($userId, 'Message', $message['Message']['id']);
        }

        $this->set('message', $message);
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Message->create();
            if ($this->Message->save($this->request->data)) {
                //debug($this->request->data);die;

                $this->Flash->success(__('The message has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The message could not be saved. Please, try again.'));
            }
        }
        $senders = $this->Message->Sender->find('list');
        $recipients = $this->Message->Recipient->find('list');
        $this->set(compact('senders', 'recipients'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Message->id = $id;
        if (!$this->Message->exists($id)) {
            throw new NotFoundException(__('Invalid message'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Message->save($this->request->data)) {
                $this->Flash->success(__('message đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('message lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
            $this->request->data = $this->Message->find('first', $options);
        }
        $senders = $this->Message->Sender->find('list');
        $recipients = $this->Message->Recipient->find('list');
        $this->set(compact('senders', 'recipients'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->Message->deleteAll(array('Message.id' => $requestDeleteId))) {
                    echo json_encode($requestDeleteId);
                } else {
                    echo json_encode(array());
                }
            }
            exit();
        }
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Message->id = $id;
        if (!$this->Message->exists()) {
            throw new NotFoundException(__('Invalid message'));
        }
        if ($this->Message->delete()) {
            $this->Flash->success(__('Message đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Message xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
