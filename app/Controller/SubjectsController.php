<?php

App::uses('AppController', 'Controller');

/**
 * Subjects Controller
 *
 * @property Subject $Subject
 * @property PaginatorComponent $Paginator
 */
class SubjectsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function index() {
        $conditions = array();
        $contain = array();
        $order = array('Subject.name' => 'ASC');
        if (!empty($this->request->data['Subject']['name'])) {
            $conditions = Hash::merge($conditions, array('Subject.name like' => '%' . trim($this->request->data['Subject']['name']) . '%'));
        }
        if (!empty($this->request->data['Subject']['code'])) {
            $conditions = Hash::merge($conditions, array('Subject.code like' => '%' . trim($this->request->data['Subject']['code']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjects', $this->paginate());
        if (!$this->request->is('ajax')) {
      
            $books = $this->Subject->Book->find('list');
            $curriculumns = $this->Subject->Curriculumn->find('list');
            $users = $this->Subject->User->find('list');
            $this->set(compact( 'books', 'curriculumns', 'users'));
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function teacher_index() {
        $conditions = array();
        $contain = array();
        $order = array('Subject.name' => 'ASC');

        if (!empty($this->request->data['Subject']['name'])) {
            $conditions = Hash::merge($conditions, array('Subject.name like' => '%' . trim($this->request->data['Subject']['name']) . '%'));
        }

        if (!empty($this->request->data['Subject']['code'])) {
            $conditions = Hash::merge($conditions, array('Subject.code like' => '%' . trim($this->request->data['Subject']['code']) . '%'));
        }

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjects', $this->paginate());
        if (!$this->request->is('ajax')) {

            $books = $this->Subject->Book->find('list');
            $curriculumns = $this->Subject->Curriculumn->find('list');
            $users = $this->Subject->User->find('list');
            $this->set(compact( 'books', 'curriculumns', 'users'));
        }
    }

    public function liet_ke() {
        $conditions = array();
        $contain = array();
        $order = array('Subject.name' => 'ASC');

        if (!empty($this->request->data['Subject']['name'])) {
            $conditions = Hash::merge($conditions, array('Subject.name like' => '%' . trim($this->request->data['Subject']['name']) . '%'));
        }

        if (!empty($this->request->data['Subject']['code'])) {
            $conditions = Hash::merge($conditions, array('Subject.code like' => '%' . trim($this->request->data['Subject']['code']) . '%'));
        }

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjects', $this->paginate());
        if (!$this->request->is('ajax')) {
           
            $books = $this->Subject->Book->find('list');
            $curriculumns = $this->Subject->Curriculumn->find('list');
            $users = $this->Subject->User->find('list');
            $this->set(compact( 'books', 'curriculumns', 'users'));
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
        if (!$this->Subject->exists($id)) {
            throw new NotFoundException(__('Học phần không hợp lệ'));
        }
        $options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
        $this->set('subject', $this->Subject->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Subject->create();
            if ($this->Subject->save($this->request->data)) {
                $this->Flash->success(__('Học phần được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Học phần lưu không thành công, vui lòng thử lại.'));
            }
        }

        $books = $this->Subject->Book->find('list');
        $curriculumns = $this->Subject->Curriculumn->find('list');
        $users = $this->Subject->User->find('list');
        $this->set(compact( 'books', 'curriculumns', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Subject->id = $id;
        if (!$this->Subject->exists($id)) {
            throw new NotFoundException(__('Học phần không hợp lệ'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->Subject->save($this->request->data)) {
                $this->Flash->success(__('Học phần đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Học phần lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
            $this->request->data = $this->Subject->find('first', $options);
        }

        $books = $this->Subject->Book->find('list');
        $curriculumns = $this->Subject->Curriculumn->find('list');
        $users = $this->Subject->User->find('list');
        $this->set(compact( 'books', 'curriculumns', 'users'));
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
                if ($this->Subject->deleteAll(array('Subject.id' => $requestDeleteId))) {
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
        $this->Subject->id = $id;
        if (!$this->Subject->exists()) {
            throw new NotFoundException(__('Học phần không hợp lệ'));
        }
        if ($this->Subject->delete()) {
            $this->Flash->success(__('Đã xóa học phần thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa học phần không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
