<?php

App::uses('AppController', 'Controller');

/**
 * Industryleaders Controller
 *
 * @property Industryleader $Industryleader
 * @property PaginatorComponent $Paginator
 */
class IndustryleadersController extends AppController {

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
//$conditions = Set::merge($conditions, array('Industryleader.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('industryleaders', $this->paginate());
        if (!$this->request->is('ajax')) {
            $users = $this->Industryleader->User->find('list');
            $curriculumns = $this->Industryleader->Curriculumn->find('list');
            $roles = $this->Industryleader->Role->find('list');
            $levels = $this->Industryleader->Level->find('list');
            $majors = $this->Industryleader->Major->find('list');
            $this->set(compact('users', 'curriculumns', 'roles', 'levels', 'majors'));
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
        if (!$this->Industryleader->exists($id)) {
            throw new NotFoundException(__('Invalid industryleader'));
        }
        $options = array('conditions' => array('Industryleader.' . $this->Industryleader->primaryKey => $id));
        $this->set('industryleader', $this->Industryleader->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Industryleader->create();
            if ($this->Industryleader->save($this->request->data)) {
                $this->Flash->success(__('The industryleader has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The industryleader could not be saved. Please, try again.'));
            }
        }
        $users = $this->Industryleader->User->find('list');
        $curriculumns = $this->Industryleader->Curriculumn->find('list');
        $roles = $this->Industryleader->Role->find('list');
        $levels = $this->Industryleader->Level->find('list');
        $majors = $this->Industryleader->Major->find('list');
        $this->set(compact('users', 'curriculumns', 'roles', 'levels', 'majors'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Industryleader->id = $id;
        if (!$this->Industryleader->exists($id)) {
            throw new NotFoundException(__('Invalid industryleader'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Industryleader->save($this->request->data)) {
                $this->Flash->success(__('industryleader đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('industryleader lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Industryleader.' . $this->Industryleader->primaryKey => $id));
            $this->request->data = $this->Industryleader->find('first', $options);
        }
        $users = $this->Industryleader->User->find('list');
        $curriculumns = $this->Industryleader->Curriculumn->find('list');
        $roles = $this->Industryleader->Role->find('list');
        $levels = $this->Industryleader->Level->find('list');
        $majors = $this->Industryleader->Major->find('list');
        $this->set(compact('users', 'curriculumns', 'roles', 'levels', 'majors'));
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
                if ($this->Industryleader->deleteAll(array('Industryleader.id' => $requestDeleteId))) {
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
        $this->Industryleader->id = $id;
        if (!$this->Industryleader->exists()) {
            throw new NotFoundException(__('Invalid industryleader'));
        }
        if ($this->Industryleader->delete()) {
            $this->Flash->success(__('Industryleader đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Industryleader xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
