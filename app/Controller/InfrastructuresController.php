<?php

App::uses('AppController', 'Controller');

/**
 * Infrastructures Controller
 *
 * @property Infrastructure $Infrastructure
 * @property PaginatorComponent $Paginator
 */
class InfrastructuresController extends AppController {

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
        $order = array('Infrastructure.name' => 'ASC');
        if (!empty($this->request->data['Infrastructure']['code'])) {
            $conditions = Hash::merge($conditions, array('Infrastructure.code like' => '%' . trim($this->request->data['Infrastructure']['code']) . '%'));
        }
        if (!empty($this->request->data['Infrastructure']['device_id'])) {
            $conditions = Hash::merge($conditions, array('Infrastructure.device_id like' => '%' . trim($this->request->data['Infrastructure']['device_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('infrastructures', $this->paginate());
        if (!$this->request->is('ajax')) {
            $devices = $this->Infrastructure->Device->find('list');
            $rooms = $this->Infrastructure->Room->find('list');
            $curriculumns = $this->Infrastructure->Curriculumn->find('list');
            $this->set(compact('devices', 'rooms', 'curriculumns'));
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
        if (!$this->Infrastructure->exists($id)) {
            throw new NotFoundException(__('Cơ sở vật chất không hợp lệ'));
        }
        $options = array('conditions' => array('Infrastructure.' . $this->Infrastructure->primaryKey => $id));
        $this->set('infrastructure', $this->Infrastructure->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Infrastructure->create();
            if ($this->Infrastructure->save($this->request->data)) {
                $this->Flash->success(__('Cơ sở vật chất được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Cơ sở vật chất lưu không thành công, vui lòng thử lại.'));
            }
        }
        $devices = $this->Infrastructure->Device->find('list');
        $rooms = $this->Infrastructure->Room->find('list');
        $curriculumns = $this->Infrastructure->Curriculumn->find('list');
        $this->set(compact('devices', 'rooms', 'curriculumns'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Infrastructure->id = $id;
        if (!$this->Infrastructure->exists($id)) {
            throw new NotFoundException(__('Cơ sở vật chất không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Infrastructure->save($this->request->data)) {
                $this->Flash->success(__('Cơ sở vật chất đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Cơ sở vật chất lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Infrastructure.' . $this->Infrastructure->primaryKey => $id));
            $this->request->data = $this->Infrastructure->find('first', $options);
        }
        $devices = $this->Infrastructure->Device->find('list');
        $rooms = $this->Infrastructure->Room->find('list');
        $curriculumns = $this->Infrastructure->Curriculumn->find('list');
        $this->set(compact('devices', 'rooms', 'curriculumns'));
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
                if ($this->Infrastructure->deleteAll(array('Infrastructure.id' => $requestDeleteId))) {
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
        $this->Infrastructure->id = $id;
        if (!$this->Infrastructure->exists()) {
            throw new NotFoundException(__('Cơ sở vật chất không hợp lệ'));
        }
        if ($this->Infrastructure->delete()) {
            $this->Flash->success(__('Đã xóa cơ sở vật chất thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa cơ sở vật chất không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
