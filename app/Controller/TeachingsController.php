<?php

App::uses('AppController', 'Controller');

/**
 * Teachings Controller
 *
 * @property Teaching $Teaching
 * @property PaginatorComponent $Paginator
 */
class TeachingsController extends AppController {

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
//$conditions = Set::merge($conditions, array('Teaching.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('teachings', $this->paginate());
        if (!$this->request->is('ajax')) {
            $courses = $this->Teaching->Course->find('list');
            $users = $this->Teaching->User->find('list');
            $this->set(compact('courses', 'users'));
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
        if (!$this->Teaching->exists($id)) {
            throw new NotFoundException(__('Invalid teaching'));
        }
        $options = array('conditions' => array('Teaching.' . $this->Teaching->primaryKey => $id));
        $this->set('teaching', $this->Teaching->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Teaching->create();
            if ($this->Teaching->save($this->request->data)) {
                $this->Flash->success(__('The teaching has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The teaching could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Teaching->Course->find('list');
        $users = $this->Teaching->User->find('list');
        $this->set(compact('courses', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Teaching->id = $id;
        if (!$this->Teaching->exists($id)) {
            throw new NotFoundException(__('Invalid teaching'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Teaching->save($this->request->data)) {
                $this->Flash->success(__('teaching đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('teaching lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Teaching.' . $this->Teaching->primaryKey => $id));
            $this->request->data = $this->Teaching->find('first', $options);
        }
        $courses = $this->Teaching->Course->find('list');
        $users = $this->Teaching->User->find('list');
        $this->set(compact('courses', 'users'));
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
                if ($this->Teaching->deleteAll(array('Teaching.id' => $requestDeleteId))) {
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
        $this->Teaching->id = $id;
        if (!$this->Teaching->exists()) {
            throw new NotFoundException(__('Invalid teaching'));
        }
        if ($this->Teaching->delete()) {
            $this->Flash->success(__('Teaching đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Teaching xóa không thành công'));
            $this->redirect(array('action' => 'index'));
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
    public function admin_delete($id = null) {  
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->Teaching->deleteAll(array('Teaching.id' => $requestDeleteId))) {
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
        $this->Teaching->id = $id;
        if (!$this->Teaching->exists()) {
            throw new NotFoundException(__('Invalid teaching'));
        }
        if ($this->Teaching->delete()) {
            $this->Flash->success(__('Teaching đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Teaching xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
