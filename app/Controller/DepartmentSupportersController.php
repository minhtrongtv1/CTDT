<?php

App::uses('AppController', 'Controller');

/**
 * DepartmentSupporters Controller
 *
 * @property DepartmentSupporter $DepartmentSupporter
 * @property PaginatorComponent $Paginator
 */
class DepartmentSupportersController extends AppController {

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
//$conditions = Set::merge($conditions, array('DepartmentSupporter.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('departmentSupporters', $this->paginate());
        if (!$this->request->is('ajax')) {
            $supporters = $this->DepartmentSupporter->Supporter->find('list');
            $departments = $this->DepartmentSupporter->Department->find('list');
            $this->set(compact('supporters', 'departments'));
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
        if (!$this->DepartmentSupporter->exists($id)) {
            throw new NotFoundException(__('Invalid department supporter'));
        }
        $options = array('conditions' => array('DepartmentSupporter.' . $this->DepartmentSupporter->primaryKey => $id));
        $this->set('departmentSupporter', $this->DepartmentSupporter->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->DepartmentSupporter->create();
            if ($this->DepartmentSupporter->save($this->request->data)) {
                $this->Flash->success(__('The department supporter has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The department supporter could not be saved. Please, try again.'));
            }
        }
        $supporters = $this->DepartmentSupporter->Supporter->find('list');
        $departments = $this->DepartmentSupporter->Department->find('list');
        $this->set(compact('supporters', 'departments'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->DepartmentSupporter->id = $id;
        if (!$this->DepartmentSupporter->exists($id)) {
            throw new NotFoundException(__('Invalid department supporter'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->DepartmentSupporter->save($this->request->data)) {
                $this->Flash->success(__('department supporter đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('department supporter lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('DepartmentSupporter.' . $this->DepartmentSupporter->primaryKey => $id));
            $this->request->data = $this->DepartmentSupporter->find('first', $options);
        }
        $supporters = $this->DepartmentSupporter->Supporter->find('list');
        $departments = $this->DepartmentSupporter->Department->find('list');
        $this->set(compact('supporters', 'departments'));
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
                if ($this->DepartmentSupporter->deleteAll(array('DepartmentSupporter.id' => $requestDeleteId))) {
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
        $this->DepartmentSupporter->id = $id;
        if (!$this->DepartmentSupporter->exists()) {
            throw new NotFoundException(__('Invalid department supporter'));
        }
        if ($this->DepartmentSupporter->delete()) {
            $this->Flash->success(__('Department supporter đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Department supporter xóa không thành công'));
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
//$conditions = Set::merge($conditions, array('DepartmentSupporter.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('departmentSupporters', $this->paginate());
        if (!$this->request->is('ajax')) {


            $ban_chuyen_trachs = $this->User->getUserIdByGroupId(24);
            $supporters = $this->DepartmentSupporter->Supporter->find('list', array('order' => array('Supporter.first_name' => 'asc'), 'conditions' => array('Supporter.id' => $ban_chuyen_trachs)));
            $departments = $this->DepartmentSupporter->Department->find('list');
            $this->set(compact('supporters', 'departments'));
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
        if (!$this->DepartmentSupporter->exists($id)) {
            throw new NotFoundException(__('Invalid department supporter'));
        }
        $options = array('conditions' => array('DepartmentSupporter.' . $this->DepartmentSupporter->primaryKey => $id));
        $this->set('departmentSupporter', $this->DepartmentSupporter->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->DepartmentSupporter->create();
            if ($this->DepartmentSupporter->save($this->request->data)) {
                $this->Flash->success(__('The department supporter has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The department supporter could not be saved. Please, try again.'));
            }
        }
        $ban_chuyen_trachs = $this->User->getUserIdByGroupId(24);
        $supporters = $this->DepartmentSupporter->Supporter->find('list', array('order' => array('Supporter.first_name' => 'asc'), 'conditions' => array('Supporter.id' => $ban_chuyen_trachs)));
        $departments = $this->DepartmentSupporter->Department->find('list');
        $this->set(compact('supporters', 'departments'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->DepartmentSupporter->id = $id;
        if (!$this->DepartmentSupporter->exists($id)) {
            throw new NotFoundException(__('Invalid department supporter'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->DepartmentSupporter->save($this->request->data)) {
                $this->Flash->success(__('department supporter đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('department supporter lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('DepartmentSupporter.' . $this->DepartmentSupporter->primaryKey => $id));
            $this->request->data = $this->DepartmentSupporter->find('first', $options);
        }
        $supporters = $this->DepartmentSupporter->Supporter->find('list');
        $departments = $this->DepartmentSupporter->Department->find('list');
        $this->set(compact('supporters', 'departments'));
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
                if ($this->DepartmentSupporter->deleteAll(array('DepartmentSupporter.id' => $requestDeleteId))) {
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
        $this->DepartmentSupporter->id = $id;
        if (!$this->DepartmentSupporter->exists()) {
            throw new NotFoundException(__('Invalid department supporter'));
        }
        if ($this->DepartmentSupporter->delete()) {
            $this->Flash->success(__('Department supporter đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Department supporter xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
