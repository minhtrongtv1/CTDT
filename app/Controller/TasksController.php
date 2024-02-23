<?php

App::uses('AppController', 'Controller');

/**
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends AppController {

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
//$conditions = Set::merge($conditions, array('Task.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('tasks', $this->paginate());
        if (!$this->request->is('ajax')) {
            $documents = $this->Task->Document->find('list');
            $users = $this->Task->User->find('list');
            $this->set(compact('documents', 'users'));
        }
    }

    public function my_tasks() {
        $conditions = array('Task.user_id' => $this->Auth->user('id'));
        $contain = array();
        $order = array('Task.da_hoan_thanh' => 'asc', 'Task.ngay_hoan_thanh' => 'ASC');
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Task.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('tasks', $this->paginate());
        if (!$this->request->is('ajax')) {
            $documents = $this->Task->Document->find('list');
            $nguoiPhanCongs = $this->Task->NguoiPhanCong->find('list');

            $this->set(compact('documents', 'nguoiPhanCongs'));
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
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
        $this->set('task', $this->Task->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add($document_id = null) {

        if (!empty($this->request->data)) {
            $success = 0;
            $msg = array();
            if ($document_id) {
                $this->request->data['Task']['document_id'] = $document_id;
            }
            $this->Task->create();

            if ($this->Task->save($this->request->data)) {
                if (!$this->request->is('ajax')) {
                    $this->Flash->success(__('The task has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else
                    $success = 1;
            } else {
                if (!$this->request->is('ajax')) {
                    $this->Flash->error(__('The task could not be saved. Please, try again.'));
                }
                $errors = $this->Task->invalidFields();
                foreach ($errors as $key => $error) {
                    $errors[$key] = array_unique($errors[$key]);
                }

                $msg = $errors;
            }
            if ($this->request->is('ajax')) {
                echo json_encode(array('success' => $success, 'msg' => $msg));
                exit;
            }
        }
        $this->Task->Document->id = $document_id;
        $so_vb = $this->Task->Document->field('so_vb');
        $ngay_vb = $this->Task->Document->field('ngay_vb');
        $users = $this->Task->User->find('list');
        $this->set(compact('so_vb', 'ngay_vb', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function check_da_hoan_thanh($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->Task->id = $id;
        $success = 0;
        $msg = "";
        if (!$this->Task->exists($id)) {
            $msg = "Không tìm thấy nhiệm vụ";
        }
        if ($this->Task->saveField('da_hoan_thanh', 1)) {
            $success = 1;
        }
        echo json_encode(array('success' => $success, 'msg' => $msg));
    }

    public function uncheck_da_hoan_thanh($id = null) {
        $this->autoLayout = false;
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->Task->id = $id;
        $success = 0;
        $msg = "";
        if (!$this->Task->exists($id)) {
            $msg = "Không tìm thấy nhiệm vụ";
        }
        if ($this->Task->saveField('da_hoan_thanh', 0)) {
            $success = 1;
        }
        echo json_encode(array('success' => $success, 'msg' => $msg));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Task->id = $id;
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Task->save($this->request->data)) {
                $this->Flash->success(__('task đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('task lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
            $this->request->data = $this->Task->find('first', $options);
        }
        $documents = $this->Task->Document->find('list');
        $users = $this->Task->User->find('list');
        $this->set(compact('documents', 'users'));
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
            $this->Task->id = $id;
            $success = 0;
            $msg = "";
            if (!$this->Task->exists()) {
                $msg = 'Không tồn tại nhiệm vụ cần xóa';
                echo json_encode(array('success' => $success, 'msg' => $msg));
                exit();
            }



            if ($this->Task->delete()) {
                $success = 1;
            } else {
                $msg = "Lỗi xóa không xác định";
            }
            echo json_encode(array('success' => 1, 'msg' => $msg));
            exit();
        } else {
            exit();
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $conditions = array();
        $order = array();
        $contain = array();
        if (!empty($this->request->data['Task']['document_id'])) {
            $conditions = Hash::merge($conditions, array('Task.document_id' => $this->request->data['Task']['document_id']));
        }
        
        
        if (!empty($this->request->data['Task']['da_hoan_thanh'])) {
            $conditions = Hash::merge($conditions, array('Task.da_hoan_thanh' => $this->request->data['Task']['da_hoan_thanh']));
        }
        
        if (!empty($this->request->data['Task']['user_id'])) {
            $conditions = Hash::merge($conditions, array('Task.user_id' => $this->request->data['Task']['user_id']));
        }
        
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('tasks', $this->paginate());
        if (!$this->request->is('ajax')) {
            $documents = $this->Task->Document->find('list');
            $users = $this->Task->User->find('list');
            $this->set(compact('documents', 'users'));
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
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
        $this->set('task', $this->Task->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void

      public function admin_add() {
      if ($this->request->is('post')) {
      $this->Task->create();
      if ($this->Task->save($this->request->data)) {
      $this->Flash->success(__('The task has been saved'));
      $this->redirect(array('action' => 'index'));
      } else {

      $this->Flash->error(__('The task could not be saved. Please, try again.'));
      }
      }
      $documents = $this->Task->Document->find('list');
      $users = $this->Task->User->find('list');
      $this->set(compact('documents', 'users'));
      }
     */

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Task->id = $id;
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid task'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Task->save($this->request->data)) {
                $this->Flash->success(__('task đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('task lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
            $this->request->data = $this->Task->find('first', $options);
        }
        $documents = $this->Task->Document->find('list');
        $users = $this->Task->User->find('list');
        $this->set(compact('documents', 'users'));
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
                if ($this->Task->deleteAll(array('Task.id' => $requestDeleteId))) {
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
        $this->Task->id = $id;
        if (!$this->Task->exists()) {
            throw new NotFoundException(__('Invalid task'));
        }
        if ($this->Task->delete()) {
            $this->Flash->success(__('Task đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Task xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
