<?php

App::uses('AppController', 'Controller');

/**
 * Semesters Controller
 *
 * @property Semester $Semester
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SemestersController extends AppController {

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
        $order = array('Semester.name' => 'ASC');
        if (!empty($this->request->data['Semester']['code'])) {
            $conditions = Hash::merge($conditions, array('Semester.code like' => '%' . trim($this->request->data['Semester']['code']) . '%'));
        }
        if (!empty($this->request->data['Semester']['name'])) {
            $conditions = Hash::merge($conditions, array('Semester.name like' => '%' . trim($this->request->data['Semester']['name']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('semesters', $this->paginate());
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
        if (!$this->Semester->exists($id)) {
            throw new NotFoundException(__('Học kỳ không hợp lệ'));
        }
        $options = array('conditions' => array('Semester.' . $this->Semester->primaryKey => $id));
        $this->set('semester', $this->Semester->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Semester->create();
            if ($this->Semester->save($this->request->data)) {
                $this->Flash->success(__('Học kỳ được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Học kỳ lưu không thành công, vui lòng thử lại.'));
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
        $this->Semester->id = $id;
        if (!$this->Semester->exists($id)) {
            throw new NotFoundException(__('Học kỳ không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Semester->save($this->request->data)) {
                $this->Flash->success(__('Học kỳ đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Học kỳ lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Semester.' . $this->Semester->primaryKey => $id));
            $this->request->data = $this->Semester->find('first', $options);
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
                if ($this->Semester->deleteAll(array('Semester.id' => $requestDeleteId))) {
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
        $this->Semester->id = $id;
        if (!$this->Semester->exists()) {
            throw new NotFoundException(__('Học kỳ không hợp lệ'));
        }
        if ($this->Semester->delete()) {
            $this->Flash->success(__('Đã xóa học kỳ thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa học kỳ không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
