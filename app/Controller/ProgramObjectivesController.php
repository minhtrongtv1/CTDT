<?php

App::uses('AppController', 'Controller');

/**
 * ProgramObjectives Controller
 *
 * @property ProgramObjective $ProgramObjective
 * @property PaginatorComponent $Paginator
 */
class ProgramObjectivesController extends AppController {

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
        $order = array('ProgramObjective.name' => 'ASC');
        if (!empty($this->request->data['ProgramObjective']['name'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.name like' => '%' . trim($this->request->data['ProgramObjective']['name']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['group_type'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.group_type like' => '%' . trim($this->request->data['ProgramObjective']['group_type']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['program_outcome_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.program_outcome_id like' => '%' . trim($this->request->data['ProgramObjective']['program_outcome_id']) . '%'));
        }
        
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programObjectives', $this->paginate());
        if (!$this->request->is('ajax')) {
            $programOutcomes = $this->ProgramObjective->ProgramOutcome->find('list');
            $this->set(compact('programOutcomes'));
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
        if (!$this->ProgramObjective->exists($id)) {
            throw new NotFoundException(__('Chuẩn đầu ra không hợp lệ'));
        }
        $options = array('conditions' => array('ProgramObjective.' . $this->ProgramObjective->primaryKey => $id));
        $this->set('programObjective', $this->ProgramObjective->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ProgramObjective->create();
            if ($this->ProgramObjective->save($this->request->data)) {
                $this->Flash->success(__('Chuẩn đầu ra đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Chuẩn đầu ra lưu không thành công, vui lòng thử lại.'));
            }
        }
        $programOutcomes = $this->ProgramObjective->ProgramOutcome->find('list');
        $this->set(compact('programOutcomes'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->ProgramObjective->id = $id;
        if (!$this->ProgramObjective->exists($id)) {
            throw new NotFoundException(__('Chuẩn đầu ra không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ProgramObjective->save($this->request->data)) {
                $this->Flash->success(__('Chuẩn đầu ra đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Chuẩn đầu ra lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('ProgramObjective.' . $this->ProgramObjective->primaryKey => $id));
            $this->request->data = $this->ProgramObjective->find('first', $options);
        }
        $programOutcomes = $this->ProgramObjective->ProgramOutcome->find('list');
        $this->set(compact('programOutcomes'));
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
                if ($this->ProgramObjective->deleteAll(array('ProgramObjective.id' => $requestDeleteId))) {
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
        $this->ProgramObjective->id = $id;
        if (!$this->ProgramObjective->exists()) {
            throw new NotFoundException(__('Chuẩn đầu ra không hợp lệ'));
        }
        if ($this->ProgramObjective->delete()) {
            $this->Flash->success(__('Đã xóa chuẩn đầu ra thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa chuẩn đầu ra không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
