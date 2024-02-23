<?php

App::uses('AppController', 'Controller');

/**
 * TuVanCdrs Controller
 *
 * @property TuVanCdr $TuVanCdr
 * @property PaginatorComponent $Paginator
 */
class TuVanCdrsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function testOpenAI() {
        $prompt = "Nhận biết các chất hóa học nguy hiểm cho sức khỏe con người.";
        $msg = "Liệt kê các thành phần của CĐR \"" . $prompt . "\" và Liệt kê kết quả kiểm tra sự thoả mãn các nguyên tắc cần đảm bảo khi xây dựng CĐR hay của nó ? Nếu không thoả mãn hãy gợi ý điều chỉnh nhưng phải đảm nguyên tắc.";
        $this->TuVanCdr->queryAI($msg);
        die;
    }

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
//$conditions = Set::merge($conditions, array('TuVanCdr.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('tuVanCdrs', $this->paginate());
        if (!$this->request->is('ajax')) {
            $users = $this->TuVanCdr->User->find('list');
            $this->set(compact('users'));
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
        if (!$this->TuVanCdr->exists($id)) {
            throw new NotFoundException(__('Invalid tu van cdr'));
        }
        $options = array('conditions' => array('TuVanCdr.' . $this->TuVanCdr->primaryKey => $id));
        $this->set('tuVanCdr', $this->TuVanCdr->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            try {
                $prompt = $this->request->data['TuVanCdr']['prompt'];
                $msg = "Liệt kê các thành phần của CĐR \"" . $prompt . "\" và Liệt kê kết quả kiểm tra sự thoả mãn các nguyên tắc cần đảm bảo khi xây dựng CĐR hay của nó ? Nếu không thoả mãn hãy gợi ý điều chỉnh nhưng phải đảm nguyên tắc.";
                $completion = $this->TuVanCdr->queryAI($msg);

                $this->TuVanCdr->create();
                $this->request->data['TuVanCdr']['user_id']=$this->Auth->user('id');
                $this->request->data['TuVanCdr']['completion']=$completion;
                if ($this->TuVanCdr->save($this->request->data)) {
                    
                    $this->redirect(array('action' => 'view',$this->TuVanCdr->id));
                } else {

                    $this->Flash->error('Có lỗi phát sinh trong quá trình xử lý');
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        $users = $this->TuVanCdr->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->TuVanCdr->id = $id;
        if (!$this->TuVanCdr->exists($id)) {
            throw new NotFoundException(__('Invalid tu van cdr'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TuVanCdr->save($this->request->data)) {
                $this->Flash->success(__('tu van cdr đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('tu van cdr lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('TuVanCdr.' . $this->TuVanCdr->primaryKey => $id));
            $this->request->data = $this->TuVanCdr->find('first', $options);
        }
        $users = $this->TuVanCdr->User->find('list');
        $this->set(compact('users'));
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
                if ($this->TuVanCdr->deleteAll(array('TuVanCdr.id' => $requestDeleteId))) {
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
        $this->TuVanCdr->id = $id;
        if (!$this->TuVanCdr->exists()) {
            throw new NotFoundException(__('Invalid tu van cdr'));
        }
        if ($this->TuVanCdr->delete()) {
            $this->Flash->success(__('Tu van cdr đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Tu van cdr xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $conditions = array();
        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('TuVanCdr.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('tuVanCdrs', $this->paginate());
        if (!$this->request->is('ajax')) {
            $users = $this->TuVanCdr->User->find('list');
            $this->set(compact('users'));
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
        if (!$this->TuVanCdr->exists($id)) {
            throw new NotFoundException(__('Invalid tu van cdr'));
        }
        $options = array('conditions' => array('TuVanCdr.' . $this->TuVanCdr->primaryKey => $id));
        $this->set('tuVanCdr', $this->TuVanCdr->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->TuVanCdr->create();
            if ($this->TuVanCdr->save($this->request->data)) {
                $this->Flash->success(__('The tu van cdr has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The tu van cdr could not be saved. Please, try again.'));
            }
        }
        $users = $this->TuVanCdr->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->TuVanCdr->id = $id;
        if (!$this->TuVanCdr->exists($id)) {
            throw new NotFoundException(__('Invalid tu van cdr'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->TuVanCdr->save($this->request->data)) {
                $this->Flash->success(__('tu van cdr đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('tu van cdr lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('TuVanCdr.' . $this->TuVanCdr->primaryKey => $id));
            $this->request->data = $this->TuVanCdr->find('first', $options);
        }
        $users = $this->TuVanCdr->User->find('list');
        $this->set(compact('users'));
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
                if ($this->TuVanCdr->deleteAll(array('TuVanCdr.id' => $requestDeleteId))) {
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
        $this->TuVanCdr->id = $id;
        if (!$this->TuVanCdr->exists()) {
            throw new NotFoundException(__('Invalid tu van cdr'));
        }
        if ($this->TuVanCdr->delete()) {
            $this->Flash->success(__('Tu van cdr đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Tu van cdr xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
