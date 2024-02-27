<?php

App::uses('AppController', 'Controller');

/**
 * ProgramOutcomes Controller
 *
 * @property ProgramOutcome $ProgramOutcome
 * @property PaginatorComponent $Paginator
 */
class ProgramOutcomesController extends AppController {

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
//$conditions = Set::merge($conditions, array('ProgramOutcome.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programOutcomes', $this->paginate());
        if (!$this->request->is('ajax')) {
            $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
            $this->set(compact('curriculumns'));
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
        if (!$this->ProgramOutcome->exists($id)) {
            throw new NotFoundException(__('Mục tiêu đào tạo không hợp lệ'));
        }
        $options = array('conditions' => array('ProgramOutcome.' . $this->ProgramOutcome->primaryKey => $id));
        $this->set('programOutcome', $this->ProgramOutcome->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ProgramOutcome->create();
            if ($this->ProgramOutcome->save($this->request->data)) {
                $this->Flash->success(__('Mục tiêu đào tạo được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Mục tiêu đào tạo lưu không thành công, vui lòng thử lại.'));
            }
        }
        $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
        $this->set(compact('curriculumns'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->ProgramOutcome->id = $id;
        if (!$this->ProgramOutcome->exists($id)) {
            throw new NotFoundException(__('Mục tiêu đào tạo không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ProgramOutcome->save($this->request->data)) {
                $this->Flash->success(__('Mục tiêu đào tạo đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Mục tiêu đào tạo lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('ProgramOutcome.' . $this->ProgramOutcome->primaryKey => $id));
            $this->request->data = $this->ProgramOutcome->find('first', $options);
        }
        $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
        $this->set(compact('curriculumns'));
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
                if ($this->ProgramOutcome->deleteAll(array('ProgramOutcome.id' => $requestDeleteId))) {
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
        $this->ProgramOutcome->id = $id;
        if (!$this->ProgramOutcome->exists()) {
            throw new NotFoundException(__('Mục tiêu đào tạo không hợp lệ'));
        }
        if ($this->ProgramOutcome->delete()) {
            $this->Flash->success(__('Đã xóa mục tiêu đào tạo thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa mục tiêu đào tạo không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
