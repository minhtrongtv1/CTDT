<?php

App::uses('AppController', 'Controller');

/**
 * SubjectsUsers Controller
 *
 * @property SubjectsUser $SubjectsUser
 * @property PaginatorComponent $Paginator
 */
class SubjectsUsersController extends AppController {

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
        $order = array('SubjectsUser.user_id' => 'ASC');
        if (!empty($this->request->data['SubjectsUser']['user_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsUser.user_id like' => '%' . trim($this->request->data['SubjectsUser']['user_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsUser']['subject_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsUser.subject_id like' => '%' . trim($this->request->data['SubjectsUser']['subject_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsUser']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsUser.curriculumn_id like' => '%' . trim($this->request->data['SubjectsUser']['curriculumn_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjectsUsers', $this->paginate());
        if (!$this->request->is('ajax')) {
            $users = $this->SubjectsUser->User->find('list');
            $subjects = $this->SubjectsUser->Subject->find('list');
            $curriculumns = $this->SubjectsUser->Curriculumn->find('list');
            $this->set(compact('users', 'subjects', 'curriculumns'));
        }
    }
    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array('SubjectsUser.user_id' => 'ASC');
        if (!empty($this->request->data['SubjectsUser']['user_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsUser.user_id like' => '%' . trim($this->request->data['SubjectsUser']['user_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsUser']['subject_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsUser.subject_id like' => '%' . trim($this->request->data['SubjectsUser']['subject_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsUser']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsUser.curriculumn_id like' => '%' . trim($this->request->data['SubjectsUser']['curriculumn_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjectsUsers', $this->paginate());
        if (!$this->request->is('ajax')) {
            $users = $this->SubjectsUser->User->find('list');
            $subjects = $this->SubjectsUser->Subject->find('list');
            $curriculumns = $this->SubjectsUser->Curriculumn->find('list');
            $this->set(compact('users', 'subjects', 'curriculumns'));
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
        if (!$this->SubjectsUser->exists($id)) {
            throw new NotFoundException(__('Giảng dạy không hợp lệ'));
        }
        $options = array('conditions' => array('SubjectsUser.' . $this->SubjectsUser->primaryKey => $id));
        $this->set('subjectsUser', $this->SubjectsUser->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->SubjectsUser->create();
            if ($this->SubjectsUser->save($this->request->data)) {
                $this->Flash->success(__('Giảng dạy được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Giảng dạy lưu không thành công, vui lòng thử lại.'));
            }
        }
        $users = $this->SubjectsUser->User->find('list');
        $subjects = $this->SubjectsUser->Subject->find('list');
        $curriculumns = $this->SubjectsUser->Curriculumn->find('list');
        $this->set(compact('users', 'subjects', 'curriculumns'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->SubjectsUser->id = $id;
        if (!$this->SubjectsUser->exists($id)) {
            throw new NotFoundException(__('Giảng dạy không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SubjectsUser->save($this->request->data)) {
                $this->Flash->success(__('Giảng dạy đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Giảng dạy lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('SubjectsUser.' . $this->SubjectsUser->primaryKey => $id));
            $this->request->data = $this->SubjectsUser->find('first', $options);
        }
        $users = $this->SubjectsUser->User->find('list');
        $subjects = $this->SubjectsUser->Subject->find('list');
        $curriculumns = $this->SubjectsUser->Curriculumn->find('list');
        $this->set(compact('users', 'subjects', 'curriculumns'));
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
                if ($this->SubjectsUser->deleteAll(array('SubjectsUser.id' => $requestDeleteId))) {
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
        $this->SubjectsUser->id = $id;
        if (!$this->SubjectsUser->exists()) {
            throw new NotFoundException(__('Giảng dạy không hợp lệ'));
        }
        if ($this->SubjectsUser->delete()) {
            $this->Flash->success(__('Đã xóa giảng dạy thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa giảng dạy không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
