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
        $order = array('Major.name' => 'ASC');
        if (!empty($this->request->data['Major']['code'])) {
            $conditions = Hash::merge($conditions, array('Major.code like' => '%' . trim($this->request->data['Major']['code']) . '%'));
        }
        if (!empty($this->request->data['Major']['name'])) {
            $conditions = Hash::merge($conditions, array('Major.name like' => '%' . trim($this->request->data['Major']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('majors', $this->paginate());

        /* if (!$this->request->is('ajax')) {
          $departments = $this->Major->Department->find('list');
          $this->set(compact('departments'));
          } */

//        if (!$this->request->is('ajax')) {
//            $departments = $this->Major->Department->find('list');
//            $this->set(compact('departments'));
//        }
    }

    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array('Major.name' => 'ASC');
        if (!empty($this->request->data['Major']['department_id'])) {
            $conditions = Hash::merge($conditions, array('Major.department_id like' => '%' . trim($this->request->data['Major']['department_id']) . '%'));
        }
        if (!empty($this->request->data['Major']['code'])) {
            $conditions = Hash::merge($conditions, array('Major.code like' => '%' . trim($this->request->data['Major']['code']) . '%'));
        }
        if (!empty($this->request->data['Major']['name'])) {
            $conditions = Hash::merge($conditions, array('Major.name like' => '%' . trim($this->request->data['Major']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('majors', $this->paginate());
//        if (!$this->request->is('ajax')) {
//            $departments = $this->Major->Department->find('list');
//            $this->set(compact('departments'));
//        }
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
            throw new NotFoundException(__('Ngành không hợp lệ'));
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
                $this->Flash->success(__('Ngành đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Không thể lưu ngành. Vui lòng thử lại.'));
            }
        }

        /* $departments = $this->Major->Department->find('list');
          $this->set(compact('departments')); */

//        $departments = $this->Major->Department->find('list');
//        $this->set(compact('departments'));
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
            throw new NotFoundException(__('Ngành không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Major->save($this->request->data)) {
                $this->Flash->success(__('Ngành đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Ngành lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Major.' . $this->Major->primaryKey => $id));
            $this->request->data = $this->Major->find('first', $options);
        }

        /* $departments = $this->Major->Department->find('list');
          $this->set(compact('departments')); */

//        $departments = $this->Major->Department->find('list');
//        $this->set(compact('departments'));
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
            throw new NotFoundException(__('Ngành không hợp lệ'));
        }
        if ($this->Major->delete()) {
            $this->Flash->success(__('Đã xóa ngành thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa ngành không thành công'));
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

        /* if (!$this->request->is('ajax')) {
          $departments = $this->Major->Department->find('list');
          $this->set(compact('departments'));
          } */

//        if (!$this->request->is('ajax')) {
//            $departments = $this->Major->Department->find('list');
//            $this->set(compact('departments'));
//        }
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
            throw new NotFoundException(__('Ngành không hợp lệ'));
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
                $this->Flash->success(__('Ngành đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Không thể lưu ngành. Vui lòng thử lại.'));
            }
        }
        /* $departments = $this->Major->Department->find('list');
          $this->set(compact('departments')); */
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
            throw new NotFoundException(__('Ngành không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Major->save($this->request->data)) {
                $this->Flash->success(__('Ngành đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Ngành lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Major.' . $this->Major->primaryKey => $id));
            $this->request->data = $this->Major->find('first', $options);
        }
        /* $departments = $this->Major->Department->find('list');
          $this->set(compact('departments')); */
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
            throw new NotFoundException(__('Ngành không hợp lệ'));
        }
        if ($this->Major->delete()) {
            $this->Flash->success(__('Đã xóa ngành thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa ngành không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function pkt_index() {
        $conditions = array();
        $contain = array();
        $order = array('Major.name' => 'ASC');
        if (!empty($this->request->data['Major']['department_id'])) {
            $conditions = Hash::merge($conditions, array('Major.department_id like' => '%' . trim($this->request->data['Major']['department_id']) . '%'));
        }
        if (!empty($this->request->data['Major']['code'])) {
            $conditions = Hash::merge($conditions, array('Major.code like' => '%' . trim($this->request->data['Major']['code']) . '%'));
        }
        if (!empty($this->request->data['Major']['name'])) {
            $conditions = Hash::merge($conditions, array('Major.name like' => '%' . trim($this->request->data['Major']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('majors', $this->paginate());

        /* if (!$this->request->is('ajax')) {
          $departments = $this->Major->Department->find('list');
          $this->set(compact('departments'));
          } */

//        if (!$this->request->is('ajax')) {
//            $departments = $this->Major->Department->find('list');
//            $this->set(compact('departments'));
//        }
    }

    public function pdt_index() {

        $conditions = array();
        $contain = array();
        $order = array('Major.name' => 'ASC');
        if (!empty($this->request->data['Major']['department_id'])) {
            $conditions = Hash::merge($conditions, array('Major.department_id like' => '%' . trim($this->request->data['Major']['department_id']) . '%'));
        }
        if (!empty($this->request->data['Major']['code'])) {
            $conditions = Hash::merge($conditions, array('Major.code like' => '%' . trim($this->request->data['Major']['code']) . '%'));
        }
        if (!empty($this->request->data['Major']['name'])) {
            $conditions = Hash::merge($conditions, array('Major.name like' => '%' . trim($this->request->data['Major']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('majors', $this->paginate());

        /* if (!$this->request->is('ajax')) {
          $departments = $this->Major->Department->find('list');
          $this->set(compact('departments'));
          } */


//        if (!$this->request->is('ajax')) {
//            $departments = $this->Major->Department->find('list');
//            $this->set(compact('departments'));
//        }
    }

    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('Major.name' => 'ASC');
        if (!empty($this->request->data['Major']['code'])) {
            $conditions = Hash::merge($conditions, array('Major.code like' => '%' . trim($this->request->data['Major']['code']) . '%'));
        }
        if (!empty($this->request->data['Major']['name'])) {
            $conditions = Hash::merge($conditions, array('Major.name like' => '%' . trim($this->request->data['Major']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('majors', $this->paginate());

        /* if (!$this->request->is('ajax')) {
          $departments = $this->Major->Department->find('list');
          $this->set(compact('departments'));
          } */

//        if (!$this->request->is('ajax')) {
//            $departments = $this->Major->Department->find('list');
//            $this->set(compact('departments'));
//        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_view($id = null) {
        if (!$this->Major->exists($id)) {
            throw new NotFoundException(__('Ngành không hợp lệ'));
        }
        $options = array('conditions' => array('Major.' . $this->Major->primaryKey => $id));
        $this->set('major', $this->Major->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->Major->create();
            if ($this->Major->save($this->request->data)) {
                $this->Flash->success(__('Ngành đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Không thể lưu ngành. Vui lòng thử lại.'));
            }
        }

        /* $departments = $this->Major->Department->find('list');
          $this->set(compact('departments')); */

//        $departments = $this->Major->Department->find('list');
//        $this->set(compact('departments'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_edit($id = null) {
        $this->Major->id = $id;
        if (!$this->Major->exists($id)) {
            throw new NotFoundException(__('Ngành không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Major->save($this->request->data)) {
                $this->Flash->success(__('Ngành đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Ngành lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Major.' . $this->Major->primaryKey => $id));
            $this->request->data = $this->Major->find('first', $options);
        }

        /* $departments = $this->Major->Department->find('list');
          $this->set(compact('departments')); */

//        $departments = $this->Major->Department->find('list');
//        $this->set(compact('departments'));
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
            throw new NotFoundException(__('Ngành không hợp lệ'));
        }
        if ($this->Major->delete()) {
            $this->Flash->success(__('Đã xóa ngành thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa ngành không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
