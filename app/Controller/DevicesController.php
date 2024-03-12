<?php

App::uses('AppController', 'Controller');

/**
 * Devices Controller
 *
 * @property Device $Device
 * @property PaginatorComponent $Paginator
 */
class DevicesController extends AppController {

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
        $order = array('Device.name' => 'ASC');
        if (!empty($this->request->data['Device']['code'])) {
            $conditions = Hash::merge($conditions, array('Device.code like' => '%' . trim($this->request->data['Device']['code']) . '%'));
        }
        if (!empty($this->request->data['Device']['name'])) {
            $conditions = Hash::merge($conditions, array('Device.name like' => '%' . trim($this->request->data['Device']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('devices', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }

    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array('Device.name' => 'ASC');
        if (!empty($this->request->data['Device']['code'])) {
            $conditions = Hash::merge($conditions, array('Device.code like' => '%' . trim($this->request->data['Device']['code']) . '%'));
        }
        if (!empty($this->request->data['Device']['name'])) {
            $conditions = Hash::merge($conditions, array('Device.name like' => '%' . trim($this->request->data['Device']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('devices', $this->paginate());
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
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Thiết bị không hợp lệ'));
        }
        $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
        $this->set('device', $this->Device->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Device->create();
            if ($this->Device->save($this->request->data)) {
                $this->Flash->success(__('Thiết bị đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Thiết bị không thể được lưu. Vui lòng thử lại.'));
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
        $this->Device->id = $id;
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Thiết bị không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Device->save($this->request->data)) {
                $this->Flash->success(__('Thiết bị đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Thiết bị lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
            $this->request->data = $this->Device->find('first', $options);
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
                if ($this->Device->deleteAll(array('Device.id' => $requestDeleteId))) {
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
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            throw new NotFoundException(__('Thiết bị không hợp lê'));
        }
        if ($this->Device->delete()) {
            $this->Flash->success(__('Đã xóa thiết bị thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa thiết bị không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function pkt_index() {
        $conditions = array();
        $contain = array();
        $order = array('Device.name' => 'ASC');
        if (!empty($this->request->data['Device']['code'])) {
            $conditions = Hash::merge($conditions, array('Device.code like' => '%' . trim($this->request->data['Device']['code']) . '%'));
        }
        if (!empty($this->request->data['Device']['name'])) {
            $conditions = Hash::merge($conditions, array('Device.name like' => '%' . trim($this->request->data['Device']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('devices', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }

    public function pdt_index() {

        $conditions = array();
        $contain = array();
        $order = array('Device.name' => 'ASC');
        if (!empty($this->request->data['Device']['code'])) {
            $conditions = Hash::merge($conditions, array('Device.code like' => '%' . trim($this->request->data['Device']['code']) . '%'));
        }
        if (!empty($this->request->data['Device']['name'])) {
            $conditions = Hash::merge($conditions, array('Device.name like' => '%' . trim($this->request->data['Device']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('devices', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }

    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('Device.name' => 'ASC');
        if (!empty($this->request->data['Device']['code'])) {
            $conditions = Hash::merge($conditions, array('Device.code like' => '%' . trim($this->request->data['Device']['code']) . '%'));
        }
        if (!empty($this->request->data['Device']['name'])) {
            $conditions = Hash::merge($conditions, array('Device.name like' => '%' . trim($this->request->data['Device']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('devices', $this->paginate());
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
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Thiết bị không hợp lệ'));
        }
        $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
        $this->set('device', $this->Device->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->Device->create();
            if ($this->Device->save($this->request->data)) {
                $this->Flash->success(__('Thiết bị đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Thiết bị không thể được lưu. Vui lòng thử lại.'));
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
        $this->Device->id = $id;
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Thiết bị không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Device->save($this->request->data)) {
                $this->Flash->success(__('Thiết bị đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Thiết bị lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
            $this->request->data = $this->Device->find('first', $options);
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
                if ($this->Device->deleteAll(array('Device.id' => $requestDeleteId))) {
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
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            throw new NotFoundException(__('Thiết bị không hợp lê'));
        }
        if ($this->Device->delete()) {
            $this->Flash->success(__('Đã xóa thiết bị thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa thiết bị không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
