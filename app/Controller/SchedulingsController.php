<?php

App::uses('AppController', 'Controller');

/**
 * Schedulings Controller
 *
 * @property Scheduling $Scheduling
 * @property PaginatorComponent $Paginator
 */
class SchedulingsController extends AppController {

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
//$conditions = Set::merge($conditions, array('Scheduling.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('schedulings', $this->paginate());
        if (!$this->request->is('ajax')) {
            $workshops = $this->Scheduling->Workshop->find('list');
            $this->set(compact('workshops'));
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
        if (!$this->Scheduling->exists($id)) {
            throw new NotFoundException(__('Invalid scheduling'));
        }
        $options = array('conditions' => array('Scheduling.' . $this->Scheduling->primaryKey => $id));
        $this->set('scheduling', $this->Scheduling->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Scheduling->create();
            if ($this->Scheduling->save($this->request->data)) {
                $this->Flash->success(__('The scheduling has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The scheduling could not be saved. Please, try again.'));
            }
        }
        $workshops = $this->Scheduling->Workshop->find('list');
        $this->set(compact('workshops'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Scheduling->id = $id;
        if (!$this->Scheduling->exists($id)) {
            throw new NotFoundException(__('Invalid scheduling'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Scheduling->save($this->request->data)) {
                $this->Flash->success(__('scheduling đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('scheduling lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Scheduling.' . $this->Scheduling->primaryKey => $id));
            $this->request->data = $this->Scheduling->find('first', $options);
        }
        $workshops = $this->Scheduling->Workshop->find('list');
        $this->set(compact('workshops'));
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
                if ($this->Scheduling->deleteAll(array('Scheduling.id' => $requestDeleteId))) {
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
        $this->Scheduling->id = $id;
        $workshop_id=$this->Scheduling->field('workshop_id');
        if (!$this->Scheduling->exists()) {
            throw new NotFoundException(__('Invalid scheduling'));
        }
        if ($this->Scheduling->delete()) {
            $this->Flash->success('Đã xóa thành công');
            $this->redirect(array('controller'=>'workshops','action' => 'view','admin'=>true,$workshop_id));
        } else {
            
            $this->Flash->error('Xóa không thành công');
            $this->redirect(array('controller'=>'workshops','action' => 'view','admin'=>true,$workshop_id));
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
//$conditions = Set::merge($conditions, array('Scheduling.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('schedulings', $this->paginate());
        if (!$this->request->is('ajax')) {
            $workshops = $this->Scheduling->Workshop->find('list');
            $this->set(compact('workshops'));
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
        if (!$this->Scheduling->exists($id)) {
            throw new NotFoundException(__('Invalid scheduling'));
        }
        $options = array('conditions' => array('Scheduling.' . $this->Scheduling->primaryKey => $id));
        $this->set('scheduling', $this->Scheduling->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add($workshop_id=null) {
        if ($this->request->is('post')) {
            $this->Scheduling->create();
            if ($this->Scheduling->save($this->request->data)) {
                $this->Flash->success('Đã thêm buổi tập huấn của workshop thành công!');
                $this->redirect(array('controller'=>'workshops','action' => 'view',$workshop_id));
            } else {

                $this->Flash->error('Có vấn đề xảy ra khi thêm.');
            }
        }
        $workshops = $this->Scheduling->Workshop->find('list',array('conditions'=>array('Workshop.id'=>$workshop_id)));
        $this->set(compact('workshops','workshop_id'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Scheduling->id = $id;
        if (!$this->Scheduling->exists($id)) {
            throw new NotFoundException(__('Invalid scheduling'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Scheduling->save($this->request->data)) {
                $this->Flash->success(__('scheduling đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('scheduling lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Scheduling.' . $this->Scheduling->primaryKey => $id));
            $this->request->data = $this->Scheduling->find('first', $options);
        }
        $workshops = $this->Scheduling->Workshop->find('list');
        $this->set(compact('workshops'));
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
                if ($this->Scheduling->deleteAll(array('Scheduling.id' => $requestDeleteId))) {
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
        $this->Scheduling->id = $id;
        if (!$this->Scheduling->exists()) {
            throw new NotFoundException(__('Invalid scheduling'));
        }
        if ($this->Scheduling->delete()) {
            $this->Flash->success(__('Scheduling đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Scheduling xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
