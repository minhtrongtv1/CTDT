<?php

App::uses('AppController', 'Controller');

/**
 * Majors Controller
 *
 * @property Major $Major
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class MajorsController extends AppController {

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
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Major.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('majors', $this->paginate());
        if (!$this->request->is('ajax')) {
            $departments = $this->Major->Department->find('list');
            $this->set(compact('departments'));
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
        if (!$this->Major->exists($id)) {
            throw new NotFoundException(__('Invalid major'));
        }
        $options = array('conditions' => array('Major.' . $this->Major->primaryKey => $id));
        $this->set('major', $this->Major->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Major->create();
            if ($this->Major->save($this->request->data)) {
                $this->Flash->success(__('The major has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The major could not be saved. Please, try again.'));
            }
        }
        $departments = $this->Major->Department->find('list');
        $this->set(compact('departments'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Major->id = $id;
        if (!$this->Major->exists($id)) {
            throw new NotFoundException(__('Invalid major'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Major->save($this->request->data)) {
                $this->Flash->success(__('major đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('major lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Major.' . $this->Major->primaryKey => $id));
            $this->request->data = $this->Major->find('first', $options);
        }
        $departments = $this->Major->Department->find('list');
        $this->set(compact('departments'));
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
                if ($this->Major->deleteAll(array('Major.id' => $requestDeleteId))) {
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
        $this->Major->id = $id;
        if (!$this->Major->exists()) {
            throw new NotFoundException(__('Invalid major'));
        }
        if ($this->Major->delete()) {
            $this->Flash->success(__('Major đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Major xóa không thành công'));
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
//$conditions = Set::merge($conditions, array('Major.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('majors', $this->paginate());
        if (!$this->request->is('ajax')) {
            $departments = $this->Major->Department->find('list');
            $this->set(compact('departments'));
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
        if (!$this->Major->exists($id)) {
            throw new NotFoundException(__('Invalid major'));
        }
        $options = array('conditions' => array('Major.' . $this->Major->primaryKey => $id));
        $this->set('major', $this->Major->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Major->create();
            if ($this->Major->save($this->request->data)) {
                $this->Flash->success(__('The major has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The major could not be saved. Please, try again.'));
            }
        }
        $departments = $this->Major->Department->find('list');
        $this->set(compact('departments'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Major->id = $id;
        if (!$this->Major->exists($id)) {
            throw new NotFoundException(__('Invalid major'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Major->save($this->request->data)) {
                $this->Flash->success(__('major đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('major lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Major.' . $this->Major->primaryKey => $id));
            $this->request->data = $this->Major->find('first', $options);
        }
        $departments = $this->Major->Department->find('list');
        $this->set(compact('departments'));
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
                if ($this->Major->deleteAll(array('Major.id' => $requestDeleteId))) {
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
        $this->Major->id = $id;
        if (!$this->Major->exists()) {
            throw new NotFoundException(__('Invalid major'));
        }
        if ($this->Major->delete()) {
            $this->Flash->success(__('Major đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Major xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
