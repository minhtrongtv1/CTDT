<?php

App::uses('AppController', 'Controller');

/**
 * Levels Controller
 *
 * @property Level $Level
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class LevelsController extends AppController {

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
        $order = array('Level.name' => 'ASC');
        if (!empty($this->request->data['Level']['code'])) {
            $conditions = Hash::merge($conditions, array('Level.code like' => '%' . trim($this->request->data['Level']['code']) . '%'));
        }
        if (!empty($this->request->data['Level']['name'])) {
            $conditions = Hash::merge($conditions, array('Level.name like' => '%' . trim($this->request->data['Level']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('levels', $this->paginate());
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
        if (!$this->Level->exists($id)) {
            throw new NotFoundException(__('Trình độ không hợp lệ'));
        }
        $options = array('conditions' => array('Level.' . $this->Level->primaryKey => $id));
        $this->set('level', $this->Level->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Level->create();
            if ($this->Level->save($this->request->data)) {
                $this->Flash->success(__('Trình độ được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Trình độ lưu không thành công, vui lòng thử lại.'));
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
        $this->Level->id = $id;
        if (!$this->Level->exists($id)) {
            throw new NotFoundException(__('Trình độ không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Level->save($this->request->data)) {
                $this->Flash->success(__('Trình độ đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Trình độ lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Level.' . $this->Level->primaryKey => $id));
            $this->request->data = $this->Level->find('first', $options);
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
                if ($this->Level->deleteAll(array('Level.id' => $requestDeleteId))) {
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
        $this->Level->id = $id;
        if (!$this->Level->exists()) {
            throw new NotFoundException(__('Trình độ không hợp lệ'));
        }
        if ($this->Level->delete()) {
            $this->Flash->success(__('Đã xóa trình độ thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa trình độ không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
     public function pkt_index() {
        $conditions = array();
        $contain = array();
        $order = array('Level.name' => 'ASC');
        if (!empty($this->request->data['Level']['code'])) {
            $conditions = Hash::merge($conditions, array('Level.code like' => '%' . trim($this->request->data['Level']['code']) . '%'));
        }
        if (!empty($this->request->data['Level']['name'])) {
            $conditions = Hash::merge($conditions, array('Level.name like' => '%' . trim($this->request->data['Level']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('levels', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }
    public function pdt_index() {
        $conditions = array();
        $contain = array();
        $order = array('Level.name' => 'ASC');
        if (!empty($this->request->data['Level']['code'])) {
            $conditions = Hash::merge($conditions, array('Level.code like' => '%' . trim($this->request->data['Level']['code']) . '%'));
        }
        if (!empty($this->request->data['Level']['name'])) {
            $conditions = Hash::merge($conditions, array('Level.name like' => '%' . trim($this->request->data['Level']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('levels', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }
    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('Level.name' => 'ASC');
        if (!empty($this->request->data['Level']['code'])) {
            $conditions = Hash::merge($conditions, array('Level.code like' => '%' . trim($this->request->data['Level']['code']) . '%'));
        }
        if (!empty($this->request->data['Level']['name'])) {
            $conditions = Hash::merge($conditions, array('Level.name like' => '%' . trim($this->request->data['Level']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('levels', $this->paginate());
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
        if (!$this->Level->exists($id)) {
            throw new NotFoundException(__('Trình độ không hợp lệ'));
        }
        $options = array('conditions' => array('Level.' . $this->Level->primaryKey => $id));
        $this->set('level', $this->Level->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->Level->create();
            if ($this->Level->save($this->request->data)) {
                $this->Flash->success(__('Trình độ được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Trình độ lưu không thành công, vui lòng thử lại.'));
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
        $this->Level->id = $id;
        if (!$this->Level->exists($id)) {
            throw new NotFoundException(__('Trình độ không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Level->save($this->request->data)) {
                $this->Flash->success(__('Trình độ đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Trình độ lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Level.' . $this->Level->primaryKey => $id));
            $this->request->data = $this->Level->find('first', $options);
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
                if ($this->Level->deleteAll(array('Level.id' => $requestDeleteId))) {
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
        $this->Level->id = $id;
        if (!$this->Level->exists()) {
            throw new NotFoundException(__('Trình độ không hợp lệ'));
        }
        if ($this->Level->delete()) {
            $this->Flash->success(__('Đã xóa trình độ thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa trình độ không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
