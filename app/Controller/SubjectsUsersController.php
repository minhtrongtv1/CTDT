<?php

App::uses('AppController', 'Controller');

/**
 * SubjectsUsers Controller
 *
 * @property SubjectsUser $SubjectsUser
 * @property PaginatorComponent $Paginator
 */
class SubjectsUsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $conditions = array();
        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('SubjectsUser.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjectsUsers', $this->paginate());
        if (!$this->request->is('ajax')) {
            $users = $this->SubjectsUser->User->find('list');
            $subjects = $this->SubjectsUser->Subject->find('list');
            $rooms = $this->SubjectsUser->Room->find('list');
            $this->set(compact('users', 'subjects', 'rooms'));
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
        if (!$this->SubjectsUser->exists($id)) {
            throw new NotFoundException(__('Invalid subjects user'));
        }
        $options = array('conditions' => array('SubjectsUser.' . $this->SubjectsUser->primaryKey => $id));
        $this->set('subjectsUser', $this->SubjectsUser->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->SubjectsUser->create();
            if ($this->SubjectsUser->save($this->request->data)) {
                $this->Flash->success(__('The subjects user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The subjects user could not be saved. Please, try again.'));
            }
        }
        $users = $this->SubjectsUser->User->find('list');
        $subjects = $this->SubjectsUser->Subject->find('list');
        $rooms = $this->SubjectsUser->Room->find('list');
        $this->set(compact('users', 'subjects', 'rooms'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->SubjectsUser->id = $id;
        if (!$this->SubjectsUser->exists($id)) {
            throw new NotFoundException(__('Invalid subjects user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SubjectsUser->save($this->request->data)) {
                $this->Flash->success(__('subjects user đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('subjects user lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('SubjectsUser.' . $this->SubjectsUser->primaryKey => $id));
            $this->request->data = $this->SubjectsUser->find('first', $options);
        }
        $users = $this->SubjectsUser->User->find('list');
        $subjects = $this->SubjectsUser->Subject->find('list');
        $rooms = $this->SubjectsUser->Room->find('list');
        $this->set(compact('users', 'subjects', 'rooms'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->SubjectsUser->deleteAll(array('SubjectsUser.id' => $requestDeleteId))) {
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
        $this->SubjectsUser->id = $id;
        if (!$this->SubjectsUser->exists()) {
            throw new NotFoundException(__('Invalid subjects user'));
        }
        if ($this->SubjectsUser->delete()) {
            $this->Flash->success(__('Subjects user đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Subjects user xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
