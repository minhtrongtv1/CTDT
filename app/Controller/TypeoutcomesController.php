<?php

App::uses('AppController', 'Controller');

/**
 * Typeoutcomes Controller
 *
 * @property Typeoutcome $Typeoutcome
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TypeoutcomesController extends AppController {

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
        $order = array('Typeoutcome.name' => 'ASC');
        if (!empty($this->request->data['Typeoutcome']['name'])) {
            $conditions = Hash::merge($conditions, array('Typeoutcome.name like' => '%' . trim($this->request->data['Typeoutcome']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('typeoutcomes', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }
    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array('Typeoutcome.name' => 'ASC');
        if (!empty($this->request->data['Typeoutcome']['name'])) {
            $conditions = Hash::merge($conditions, array('Typeoutcome.name like' => '%' . trim($this->request->data['Typeoutcome']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('typeoutcomes', $this->paginate());
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
        if (!$this->Typeoutcome->exists($id)) {
            throw new NotFoundException(__('Loại mục tiêu không hợp lệ'));
        }
        $options = array('conditions' => array('Typeoutcome.' . $this->Typeoutcome->primaryKey => $id));
        $this->set('typeoutcome', $this->Typeoutcome->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Typeoutcome->create();
            if ($this->Typeoutcome->save($this->request->data)) {
                $this->Flash->success(__('Loại mục tiêu đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Loại mục tiêu lưu không thành công, vui lòng thử lại.'));
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
        $this->Typeoutcome->id = $id;
        if (!$this->Typeoutcome->exists($id)) {
            throw new NotFoundException(__('Loại mục tiêu không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Typeoutcome->save($this->request->data)) {
                $this->Flash->success(__('Loại mục tiêu đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Loại mục tiêu lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Typeoutcome.' . $this->Typeoutcome->primaryKey => $id));
            $this->request->data = $this->Typeoutcome->find('first', $options);
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
                if ($this->Typeoutcome->deleteAll(array('Typeoutcome.id' => $requestDeleteId))) {
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
        $this->Typeoutcome->id = $id;
        if (!$this->Typeoutcome->exists()) {
            throw new NotFoundException(__('Loại mục tiêu không hợp lệ'));
        }
        if ($this->Typeoutcome->delete()) {
            $this->Flash->success(__('Đã xóa loại mục tiêu thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa loại mục tiêu không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
     public function pdt_index() {
        $conditions = array();
        $contain = array();
        $order = array('Typeoutcome.name' => 'ASC');
        if (!empty($this->request->data['Typeoutcome']['name'])) {
            $conditions = Hash::merge($conditions, array('Typeoutcome.name like' => '%' . trim($this->request->data['Typeoutcome']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('typeoutcomes', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }
    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('Typeoutcome.name' => 'ASC');
        if (!empty($this->request->data['Typeoutcome']['name'])) {
            $conditions = Hash::merge($conditions, array('Typeoutcome.name like' => '%' . trim($this->request->data['Typeoutcome']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('typeoutcomes', $this->paginate());
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
        if (!$this->Typeoutcome->exists($id)) {
            throw new NotFoundException(__('Loại mục tiêu không hợp lệ'));
        }
        $options = array('conditions' => array('Typeoutcome.' . $this->Typeoutcome->primaryKey => $id));
        $this->set('typeoutcome', $this->Typeoutcome->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->Typeoutcome->create();
            if ($this->Typeoutcome->save($this->request->data)) {
                $this->Flash->success(__('Loại mục tiêu đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Loại mục tiêu lưu không thành công, vui lòng thử lại.'));
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
        $this->Typeoutcome->id = $id;
        if (!$this->Typeoutcome->exists($id)) {
            throw new NotFoundException(__('Loại mục tiêu không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Typeoutcome->save($this->request->data)) {
                $this->Flash->success(__('Loại mục tiêu đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Loại mục tiêu lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Typeoutcome.' . $this->Typeoutcome->primaryKey => $id));
            $this->request->data = $this->Typeoutcome->find('first', $options);
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
                if ($this->Typeoutcome->deleteAll(array('Typeoutcome.id' => $requestDeleteId))) {
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
        $this->Typeoutcome->id = $id;
        if (!$this->Typeoutcome->exists()) {
            throw new NotFoundException(__('Loại mục tiêu không hợp lệ'));
        }
        if ($this->Typeoutcome->delete()) {
            $this->Flash->success(__('Đã xóa loại mục tiêu thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa loại mục tiêu không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
