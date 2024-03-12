<?php

App::uses('AppController', 'Controller');

/**
 * FormOfTrainnings Controller
 *
 * @property FormOfTrainning $FormOfTrainning
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class FormOfTrainningsController extends AppController {

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
        $order = array('FormOfTrainning.name' => 'ASC');
        
        if (!empty($this->request->data['FormOfTrainning']['name'])) {
            $conditions = Hash::merge($conditions, array('FormOfTrainning.name like' => '%' . trim($this->request->data['FormOfTrainning']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('formOfTrainnings', $this->paginate());
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
        if (!$this->FormOfTrainning->exists($id)) {
            throw new NotFoundException(__('Hình thức đào tạo không hợp lệ'));
        }
        $options = array('conditions' => array('FormOfTrainning.' . $this->FormOfTrainning->primaryKey => $id));
        $this->set('formOfTrainning', $this->FormOfTrainning->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->FormOfTrainning->create();
            if ($this->FormOfTrainning->save($this->request->data)) {
                $this->Flash->success(__('Hình thức đào tạo đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Không thể lưu hình thức đào tạo. Vui lòng thử lại.'));
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
        $this->FormOfTrainning->id = $id;
        if (!$this->FormOfTrainning->exists($id)) {
            throw new NotFoundException(__('Hình thức đào tạo không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->FormOfTrainning->save($this->request->data)) {
                $this->Flash->success(__('Hình thức đào tạo đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Hình thức đào tạo lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('FormOfTrainning.' . $this->FormOfTrainning->primaryKey => $id));
            $this->request->data = $this->FormOfTrainning->find('first', $options);
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
                if ($this->FormOfTrainning->deleteAll(array('FormOfTrainning.id' => $requestDeleteId))) {
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
        $this->FormOfTrainning->id = $id;
        if (!$this->FormOfTrainning->exists()) {
            throw new NotFoundException(__('Hình thức đào tạo không hợp lệ'));
        }
        if ($this->FormOfTrainning->delete()) {
            $this->Flash->success(__('Đã xóa hình thức đào tạo thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa hình thức đào tạo không thành công'));
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
//$conditions = Set::merge($conditions, array('FormOfTrainning.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('formOfTrainnings', $this->paginate());
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
        if (!$this->FormOfTrainning->exists($id)) {
            throw new NotFoundException(__('Hình thức đào tạo không hợp lệ'));
        }
        $options = array('conditions' => array('FormOfTrainning.' . $this->FormOfTrainning->primaryKey => $id));
        $this->set('formOfTrainning', $this->FormOfTrainning->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->FormOfTrainning->create();
            if ($this->FormOfTrainning->save($this->request->data)) {
                $this->Flash->success(__('Hình thức đào tạo được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Hình thức đào tạo lưu không thành công, vui lòng thử lại.'));
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
        $this->FormOfTrainning->id = $id;
        if (!$this->FormOfTrainning->exists($id)) {
            throw new NotFoundException(__('Hình thức đào tạo không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->FormOfTrainning->save($this->request->data)) {
                $this->Flash->success(__('Hình thức đào tạo đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Hình thức đào tạo lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('FormOfTrainning.' . $this->FormOfTrainning->primaryKey => $id));
            $this->request->data = $this->FormOfTrainning->find('first', $options);
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
                if ($this->FormOfTrainning->deleteAll(array('FormOfTrainning.id' => $requestDeleteId))) {
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
        $this->FormOfTrainning->id = $id;
        if (!$this->FormOfTrainning->exists()) {
            throw new NotFoundException(__('Hình thức đào tạo không hợp lệ'));
        }
        if ($this->FormOfTrainning->delete()) {
            $this->Flash->success(__('Đã xóa hình thức đào tạo thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa hình thức đào tạo không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
    
     public function pkt_training_index() {
        $conditions = array();
        $contain = array();
        $order = array('FormOfTrainning.name' => 'ASC');
        
        if (!empty($this->request->data['FormOfTrainning']['name'])) {
            $conditions = Hash::merge($conditions, array('FormOfTrainning.name like' => '%' . trim($this->request->data['FormOfTrainning']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('formOfTrainnings', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }
}
