<?php

App::uses('AppController', 'Controller');

/**
 * Openais Controller
 *
 * @property Openai $Openai
 * @property PaginatorComponent $Paginator
 */
class OpenaisController extends AppController {

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
//$conditions = Set::merge($conditions, array('Openai.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('openais', $this->paginate());
        if (!$this->request->is('ajax')) {
            $users = $this->Openai->User->find('list');
            $this->set(compact('users'));
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
        if (!$this->Openai->exists($id)) {
            throw new NotFoundException(__('Invalid openai'));
        }
        $options = array('conditions' => array('Openai.' . $this->Openai->primaryKey => $id));
        $this->set('openai', $this->Openai->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Openai->create();
            if ($this->Openai->save($this->request->data)) {
                $this->Flash->success(__('The openai has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The openai could not be saved. Please, try again.'));
            }
        }
        $users = $this->Openai->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Openai->id = $id;
        if (!$this->Openai->exists($id)) {
            throw new NotFoundException(__('Invalid openai'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Openai->save($this->request->data)) {
                $this->Flash->success(__('openai đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('openai lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Openai.' . $this->Openai->primaryKey => $id));
            $this->request->data = $this->Openai->find('first', $options);
        }
        $users = $this->Openai->User->find('list');
        $this->set(compact('users'));
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
                if ($this->Openai->deleteAll(array('Openai.id' => $requestDeleteId))) {
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
        $this->Openai->id = $id;
        if (!$this->Openai->exists()) {
            throw new NotFoundException(__('Invalid openai'));
        }
        if ($this->Openai->delete()) {
            $this->Flash->success(__('Openai đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Openai xóa không thành công'));
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
//$conditions = Set::merge($conditions, array('Openai.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('openais', $this->paginate());
        if (!$this->request->is('ajax')) {
            $users = $this->Openai->User->find('list');
            $this->set(compact('users'));
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
        if (!$this->Openai->exists($id)) {
            throw new NotFoundException(__('Invalid openai'));
        }
        $options = array('conditions' => array('Openai.' . $this->Openai->primaryKey => $id));
        $this->set('openai', $this->Openai->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Openai->create();
            if ($this->Openai->save($this->request->data)) {
                $this->Flash->success(__('The openai has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The openai could not be saved. Please, try again.'));
            }
        }
        $users = $this->Openai->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Openai->id = $id;
        if (!$this->Openai->exists($id)) {
            throw new NotFoundException(__('Invalid openai'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Openai->save($this->request->data)) {
                $this->Flash->success(__('openai đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('openai lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Openai.' . $this->Openai->primaryKey => $id));
            $this->request->data = $this->Openai->find('first', $options);
        }
        $users = $this->Openai->User->find('list');
        $this->set(compact('users'));
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
                if ($this->Openai->deleteAll(array('Openai.id' => $requestDeleteId))) {
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
        $this->Openai->id = $id;
        if (!$this->Openai->exists()) {
            throw new NotFoundException(__('Invalid openai'));
        }
        if ($this->Openai->delete()) {
            $this->Flash->success(__('Openai đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Openai xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function test_openai(){
        $prompt='Hôm nay ngày mấy?';
        $completion=$this->Openai->queryOpenAI($prompt);
        debug($completion);die;
    }

}
