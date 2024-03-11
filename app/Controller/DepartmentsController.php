<?php

App::uses('AppController', 'Controller');

/**
 * Departments Controller
 *
 * @property Department $Department
 * @property PaginatorComponent $Paginator
 */
class DepartmentsController extends AppController {

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
        $order = array('Department.title' => 'ASC');
        if (!empty($this->request->data['Department']['title'])) {
            $conditions = Set::merge($conditions, array('Department.title like' => '%' . $this->request->data['Department']['title'] . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('departments', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }
    
    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array('Department.title' => 'ASC');
        if (!empty($this->request->data['Department']['title'])) {
            $conditions = Set::merge($conditions, array('Department.title like' => '%' . $this->request->data['Department']['title'] . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('departments', $this->paginate());
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
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Đơn vị không hợp lệ'));
        }
        $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
        $this->set('department', $this->Department->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Department->create();
            if ($this->Department->save($this->request->data)) {
                $this->Flash->success(__('Đơn vị đã được lưu'));
                $this->redirect(array('admin' => false, 'action' => 'index'));
            } else {

                $this->Flash->error(__('Đơn vị lưu không thành công, vui lòng thử lại.'));
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
        $this->Department->id = $id;
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Đơn vị không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Department->save($this->request->data)) {
                $this->Flash->success(__('Đơn vị đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Đơn vị lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
            $this->request->data = $this->Department->find('first', $options);
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
                if ($this->Department->deleteAll(array('Department.id' => $requestDeleteId))) {
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
        $this->Department->id = $id;
        if (!$this->Department->exists()) {
            throw new NotFoundException(__('Đơn vị không hợp lệ'));
        }
        if ($this->Department->delete()) {
            $this->Flash->success(__('Đã xóa đơn vị thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa đơn vị không thành công'));
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
//$conditions = Set::merge($conditions, array('Department.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('departments', $this->paginate());
        if (!$this->request->is('ajax')) {
            
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
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Đơn vị không hợp lệ'));
        }
        $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
        $this->set('department', $this->Department->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Department->create();
            if ($this->Department->save($this->request->data)) {
                $this->Flash->success(__('Đơn vị đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Không thể lưu đơn vị. Vui lòng thử lại.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Department->id = $id;
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Đơn vị không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Department->save($this->request->data)) {
                $this->Flash->success(__('Đơn vị đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Không thể lưu đơn vị. Vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
            $this->request->data = $this->Department->find('first', $options);
        }
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
                if ($this->Department->deleteAll(array('Department.id' => $requestDeleteId))) {
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
        $this->Department->id = $id;
        if (!$this->Department->exists()) {
            throw new NotFoundException(__('Đơn vị không hợp lệ'));
        }
        if ($this->Department->delete()) {
            $this->Flash->success(__('Đã xóa đơn vị thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa đơn vị không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function pdt_index() {
        $conditions = array();
        $contain = array();
        $order = array('Department.title' => 'ASC');
        if (!empty($this->request->data['Department']['title'])) {
            $conditions = Set::merge($conditions, array('Department.title like' => '%' . $this->request->data['Department']['title'] . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('departments', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }

    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('Department.title' => 'ASC');
        if (!empty($this->request->data['Department']['title'])) {
            $conditions = Set::merge($conditions, array('Department.title like' => '%' . $this->request->data['Department']['title'] . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('departments', $this->paginate());
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
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Đơn vị không hợp lệ'));
        }
        $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
        $this->set('department', $this->Department->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->Department->create();
            if ($this->Department->save($this->request->data)) {
                $this->Flash->success(__('Đơn vị đã được lưu'));
                $this->redirect(array('admin' => false, 'action' => 'index'));
            } else {

                $this->Flash->error(__('Đơn vị lưu không thành công, vui lòng thử lại.'));
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
        $this->Department->id = $id;
        if (!$this->Department->exists($id)) {
            throw new NotFoundException(__('Đơn vị không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Department->save($this->request->data)) {
                $this->Flash->success(__('Đơn vị đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Đơn vị lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Department.' . $this->Department->primaryKey => $id));
            $this->request->data = $this->Department->find('first', $options);
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
                if ($this->Department->deleteAll(array('Department.id' => $requestDeleteId))) {
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
        $this->Department->id = $id;
        if (!$this->Department->exists()) {
            throw new NotFoundException(__('Đơn vị không hợp lệ'));
        }
        if ($this->Department->delete()) {
            $this->Flash->success(__('Đã xóa đơn vị thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa đơn vị không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
