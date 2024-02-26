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
//$conditions = Set::merge($conditions, array('Subject.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjects', $this->paginate());
        if (!$this->request->is('ajax')) {
            $semesters = $this->Subject->Semester->find('list');
            $books = $this->Subject->Book->find('list');
            $curriculumns = $this->Subject->Curriculumn->find('list');
            $users = $this->Subject->User->find('list');
            $this->set(compact('semesters', 'books', 'curriculumns', 'users'));
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
            throw new NotFoundException(__('Invalid subject'));
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
                $this->Flash->success(__('The subject has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The subject could not be saved. Please, try again.'));
            }
        }
        $semesters = $this->Subject->Semester->find('list');
        $books = $this->Subject->Book->find('list');
        $curriculumns = $this->Subject->Curriculumn->find('list');
        $users = $this->Subject->User->find('list');
        $this->set(compact('semesters', 'books', 'curriculumns', 'users'));
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
            throw new NotFoundException(__('Invalid subject'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Subject->save($this->request->data)) {
                $this->Flash->success(__('subject đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('subject lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
            $this->request->data = $this->Subject->find('first', $options);
        }
        $semesters = $this->Subject->Semester->find('list');
        $books = $this->Subject->Book->find('list');
        $curriculumns = $this->Subject->Curriculumn->find('list');
        $users = $this->Subject->User->find('list');
        $this->set(compact('semesters', 'books', 'curriculumns', 'users'));
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
            throw new NotFoundException(__('Invalid subject'));
        }
        if ($this->Subject->delete()) {
            $this->Flash->success(__('Subject đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Subject xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
