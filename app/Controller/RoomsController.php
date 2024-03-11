<?php

App::uses('AppController', 'Controller');

/**
 * Rooms Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 */
class RoomsController extends AppController {

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
        $order = array('Room.name' => 'ASC');
        if (!empty($this->request->data['Room']['code'])) {
            $conditions = Hash::merge($conditions, array('Room.code like' => '%' . trim($this->request->data['Room']['code']) . '%'));
        }
        if (!empty($this->request->data['Room']['name'])) {
            $conditions = Hash::merge($conditions, array('Room.name like' => '%' . trim($this->request->data['Room']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('rooms', $this->paginate());
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
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Phòng không hợp lệ'));
        }
        $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
        $this->set('room', $this->Room->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Room->create();
            if ($this->Room->save($this->request->data)) {
                $this->Flash->success(__('Phòng được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Phòng lưu không thành công, vui lòng thử lại.'));
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
        $this->Room->id = $id;
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Phòng không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Room->save($this->request->data)) {
                $this->Flash->success(__('Phòng đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Phòng lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
            $this->request->data = $this->Room->find('first', $options);
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
                if ($this->Room->deleteAll(array('Room.id' => $requestDeleteId))) {
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
        $this->Room->id = $id;
        if (!$this->Room->exists()) {
            throw new NotFoundException(__('Phòng không hợp lệ'));
        }
        if ($this->Room->delete()) {
            $this->Flash->success(__('Đã xóa phòng thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa phòng không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
    public function pdt_index() {
        $conditions = array();
        $contain = array();
        $order = array('Room.name' => 'ASC');
        if (!empty($this->request->data['Room']['code'])) {
            $conditions = Hash::merge($conditions, array('Room.code like' => '%' . trim($this->request->data['Room']['code']) . '%'));
        }
        if (!empty($this->request->data['Room']['name'])) {
            $conditions = Hash::merge($conditions, array('Room.name like' => '%' . trim($this->request->data['Room']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('rooms', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }
    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('Room.name' => 'ASC');
        if (!empty($this->request->data['Room']['code'])) {
            $conditions = Hash::merge($conditions, array('Room.code like' => '%' . trim($this->request->data['Room']['code']) . '%'));
        }
        if (!empty($this->request->data['Room']['name'])) {
            $conditions = Hash::merge($conditions, array('Room.name like' => '%' . trim($this->request->data['Room']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('rooms', $this->paginate());
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
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Phòng không hợp lệ'));
        }
        $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
        $this->set('room', $this->Room->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->Room->create();
            if ($this->Room->save($this->request->data)) {
                $this->Flash->success(__('Phòng được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Phòng lưu không thành công, vui lòng thử lại.'));
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
        $this->Room->id = $id;
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Phòng không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Room->save($this->request->data)) {
                $this->Flash->success(__('Phòng đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Phòng lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Room.' . $this->Room->primaryKey => $id));
            $this->request->data = $this->Room->find('first', $options);
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
                if ($this->Room->deleteAll(array('Room.id' => $requestDeleteId))) {
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
        $this->Room->id = $id;
        if (!$this->Room->exists()) {
            throw new NotFoundException(__('Phòng không hợp lệ'));
        }
        if ($this->Room->delete()) {
            $this->Flash->success(__('Đã xóa phòng thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa phòng không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
