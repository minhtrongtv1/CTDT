<?php

App::uses('AppController', 'Controller');

/**
 * Intrustors Controller
 *
 * @property Intrustor $Intrustor
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class IntrustorsController extends AppController {

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
    public function index($workshop_id = NULL) {
        if ($workshop_id)
            $conditions = array('Intrustor.workshop_id' => $workshop_id);
        else
            $conditions=array();
        $contain = array('Workshop','User');
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Intrustor.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('intrustors', $this->paginate());
        if (!$this->request->is('ajax')) {
            $workshops = $this->Intrustor->Workshop->find('list');
            $users = $this->Intrustor->User->find('list');
            $this->set(compact('workshops', 'users'));
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
        if (!$this->Intrustor->exists($id)) {
            throw new NotFoundException(__('Invalid intrustor'));
        }
        $options = array('conditions' => array('Intrustor.' . $this->Intrustor->primaryKey => $id));
        $this->set('intrustor', $this->Intrustor->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($workshop_id=null) {
        if ($this->request->is('post')) {
            $this->Intrustor->create();
            if ($this->Intrustor->save($this->request->data)) {
                $this->Flash->success(__('The intrustor has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The intrustor could not be saved. Please, try again.'));
            }
        }
        $workshops = $this->Intrustor->Workshop->find('list',array('conditions'=>array('id'=>$workshop_id)));
        $users = $this->Intrustor->User->find('list',array('valueField'=>'name_username'));
        $this->set(compact('workshops', 'users'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add($workshop_id=null) {
        if ($this->request->is('post')) {
            $this->Intrustor->create();
            if ($this->Intrustor->save($this->request->data)) {
                $this->Flash->success('Đã thêm tập huấn viên vào khóa học thành công!');
                $this->redirect(array('controller'=>'workshops','action' => 'view',$workshop_id));
            } else {

                $this->Flash->error('Có vấn đề xảy ra khi thêm.');
            }
        }
        $Intrustors=$this->Intrustor->find('all',array('conditions'=>array('Intrustor.workshop_id'=>$workshop_id),'recursive'=>-1,'fields'=>array('Intrustor.user_id')));
        $workshops = $this->Intrustor->Workshop->find('list',array('conditions'=>array('id'=>$workshop_id)));
        $users = $this->Intrustor->User->find('list',array('fields'=>array('name_username'),'conditions'=>array('NOT'=>array('User.id'=>Hash::extract($Intrustors, '{n}.Intrustor.user_id')))));
        $this->set(compact('workshops', 'users','workshop_id'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Intrustor->id = $id;
        if (!$this->Intrustor->exists($id)) {
            throw new NotFoundException(__('Invalid intrustor'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Intrustor->save($this->request->data)) {
                $this->Flash->success(__('intrustor đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('intrustor lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Intrustor.' . $this->Intrustor->primaryKey => $id));
            $this->request->data = $this->Intrustor->find('first', $options);
        }
        $workshops = $this->Intrustor->Workshop->find('list');
        $users = $this->Intrustor->User->find('list');
        $this->set(compact('workshops', 'users'));
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
                $requestDeleteId = Hash::extract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->Intrustor->deleteAll(array('Intrustor.id' => $requestDeleteId))) {
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
        $this->Intrustor->id = $id;
        $workshop_id=$this->Intrustor->field('workshop_id');
        
        if (!$this->Intrustor->exists()) {
            throw new NotFoundException(__('Invalid intrustor'));
        }
        if ($this->Intrustor->delete()) {
            $this->Flash->success('Đã xóa thành công');
            $this->redirect(array('controller'=>'workshops','action' => 'view','admin'=>true,$workshop_id));
        } else {
            $this->Flash->error('Xóa không thành công');
            $this->redirect(array('controller'=>'workshops','action' => 'view','admin'=>true,$workshop_id));
        }
    }

}
