<?php

App::uses('AppController', 'Controller');

/**
 * Diplomas Controller
 *
 * @property Diploma $Diploma
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DiplomasController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $conditions = array();
        $contain = array();
        $order = array('Diploma.name' => 'ASC');
        if (!empty($this->request->data['Diploma']['name'])) {
            $conditions = Hash::merge($conditions, array('Diploma.name like' => '%' . trim($this->request->data['Diploma']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('diplomas', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }
    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array('Diploma.name' => 'ASC');
        if (!empty($this->request->data['Diploma']['name'])) {
            $conditions = Hash::merge($conditions, array('Diploma.name like' => '%' . trim($this->request->data['Diploma']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('diplomas', $this->paginate());
        if (!$this->request->is('ajax')) {
            
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
        if (!$this->Diploma->exists($id)) {
            throw new NotFoundException(__('Văn bằng tốt nghiệp không hợp lệ'));
        }
        $options = array('conditions' => array('Diploma.' . $this->Diploma->primaryKey => $id));
        $this->set('diploma', $this->Diploma->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Diploma->create();
            if ($this->Diploma->save($this->request->data)) {
                $this->Flash->success(__('Văn bằng tốt nghiệp đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Văn bằng tốt nghiệp lưu không thành công, vui lòng thử lại.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Diploma->id = $id;
        if (!$this->Diploma->exists($id)) {
            throw new NotFoundException(__('Văn bằng tốt nghiệp không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Diploma->save($this->request->data)) {
                $this->Flash->success(__('Văn bằng tốt nghiệp đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Văn bằng tốt nghiệp lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Diploma.' . $this->Diploma->primaryKey => $id));
            $this->request->data = $this->Diploma->find('first', $options);
        }
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
                if ($this->Diploma->deleteAll(array('Diploma.id' => $requestDeleteId))) {
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
        $this->Diploma->id = $id;
        if (!$this->Diploma->exists()) {
            throw new NotFoundException(__('Văn bằng tốt nghiệp không hợp lệ'));
        }
        if ($this->Diploma->delete()) {
            $this->Flash->success(__('Đã xóa văn bằng tốt nghiệp thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa văn bằng tốt nghiệp không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
<<<<<<< HEAD
    
     public function pkt_diploma_index() {
=======

    public function pdt_index() {
>>>>>>> e03f9b92fc827138169fc9a8b61d1883f5b83663
        $conditions = array();
        $contain = array();
        $order = array('Diploma.name' => 'ASC');
        if (!empty($this->request->data['Diploma']['name'])) {
            $conditions = Hash::merge($conditions, array('Diploma.name like' => '%' . trim($this->request->data['Diploma']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('diplomas', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }
<<<<<<< HEAD
=======

    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('Diploma.name' => 'ASC');
        if (!empty($this->request->data['Diploma']['name'])) {
            $conditions = Hash::merge($conditions, array('Diploma.name like' => '%' . trim($this->request->data['Diploma']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('diplomas', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_view($id = null) {
        if (!$this->Diploma->exists($id)) {
            throw new NotFoundException(__('Văn bằng tốt nghiệp không hợp lệ'));
        }
        $options = array('conditions' => array('Diploma.' . $this->Diploma->primaryKey => $id));
        $this->set('diploma', $this->Diploma->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->Diploma->create();
            if ($this->Diploma->save($this->request->data)) {
                $this->Flash->success(__('Văn bằng tốt nghiệp đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Văn bằng tốt nghiệp lưu không thành công, vui lòng thử lại.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_edit($id = null) {
        $this->Diploma->id = $id;
        if (!$this->Diploma->exists($id)) {
            throw new NotFoundException(__('Văn bằng tốt nghiệp không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Diploma->save($this->request->data)) {
                $this->Flash->success(__('Văn bằng tốt nghiệp đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Văn bằng tốt nghiệp lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Diploma.' . $this->Diploma->primaryKey => $id));
            $this->request->data = $this->Diploma->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function dvcm_delete($id = null) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->Diploma->deleteAll(array('Diploma.id' => $requestDeleteId))) {
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
        $this->Diploma->id = $id;
        if (!$this->Diploma->exists()) {
            throw new NotFoundException(__('Văn bằng tốt nghiệp không hợp lệ'));
        }
        if ($this->Diploma->delete()) {
            $this->Flash->success(__('Đã xóa văn bằng tốt nghiệp thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa văn bằng tốt nghiệp không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
>>>>>>> e03f9b92fc827138169fc9a8b61d1883f5b83663
}
