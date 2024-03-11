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
        $order = array('ProgramOutcome.name' => 'ASC');
        if (!empty($this->request->data['ProgramOutcome']['name'])) {
            $conditions = Hash::merge($conditions, array('ProgramOutcome.name like' => '%' . trim($this->request->data['ProgramOutcome']['name']) . '%'));
        }
        if (!empty($this->request->data['ProgramOutcome']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramOutcome.curriculumn_id like' => '%' . trim($this->request->data['ProgramOutcome']['curriculumn_id']) . '%'));
        }
        if (!empty($this->request->data['ProgramOutcome']['typeoutcome_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramOutcome.typeoutcome_id like' => '%' . trim($this->request->data['ProgramOutcome']['typeoutcome_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programOutcomes', $this->paginate());
        if (!$this->request->is('ajax')) {
            $typeoutcomes = $this->ProgramOutcome->Typeoutcome->find('list');
            $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
            $this->set(compact('typeoutcomes', 'curriculumns'));
        }
    }
    public function ptc_index() {
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
            $typeoutcomes = $this->ProgramOutcome->Typeoutcome->find('list');
            $this->set(compact('curriculumns', 'typeoutcomes'));
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
            throw new NotFoundException(__('Invalid program outcome'));
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
                $this->Flash->success(__('The program outcome has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The program outcome could not be saved. Please, try again.'));
            }
        }
        $typeoutcomes = $this->ProgramOutcome->Typeoutcome->find('list');
        $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
        $this->set(compact('typeoutcomes', 'curriculumns'));
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
            throw new NotFoundException(__('Invalid program outcome'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ProgramOutcome->save($this->request->data)) {
                $this->Flash->success(__('program outcome đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('program outcome lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('ProgramOutcome.' . $this->ProgramOutcome->primaryKey => $id));
            $this->request->data = $this->ProgramOutcome->find('first', $options);
        }
        $typeoutcomes = $this->ProgramOutcome->Typeoutcome->find('list');
        $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
        $this->set(compact('typeoutcomes', 'curriculumns'));
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
            throw new NotFoundException(__('Invalid program outcome'));
        }
        if ($this->ProgramOutcome->delete()) {
            $this->Flash->success(__('Program outcome đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Program outcome xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
    public function pdt_index() {
        $conditions = array();
        $contain = array();
        $order = array('ProgramOutcome.name' => 'ASC');
        if (!empty($this->request->data['ProgramOutcome']['name'])) {
            $conditions = Hash::merge($conditions, array('ProgramOutcome.name like' => '%' . trim($this->request->data['ProgramOutcome']['name']) . '%'));
        }
        if (!empty($this->request->data['ProgramOutcome']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramOutcome.curriculumn_id like' => '%' . trim($this->request->data['ProgramOutcome']['curriculumn_id']) . '%'));
        }
        if (!empty($this->request->data['ProgramOutcome']['typeoutcome_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramOutcome.typeoutcome_id like' => '%' . trim($this->request->data['ProgramOutcome']['typeoutcome_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programOutcomes', $this->paginate());
        if (!$this->request->is('ajax')) {
            $typeoutcomes = $this->ProgramOutcome->Typeoutcome->find('list');
            $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
            $this->set(compact('typeoutcomes', 'curriculumns'));
        }
    }
    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('ProgramOutcome.name' => 'ASC');
        if (!empty($this->request->data['ProgramOutcome']['name'])) {
            $conditions = Hash::merge($conditions, array('ProgramOutcome.name like' => '%' . trim($this->request->data['ProgramOutcome']['name']) . '%'));
        }
        if (!empty($this->request->data['ProgramOutcome']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramOutcome.curriculumn_id like' => '%' . trim($this->request->data['ProgramOutcome']['curriculumn_id']) . '%'));
        }
        if (!empty($this->request->data['ProgramOutcome']['typeoutcome_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramOutcome.typeoutcome_id like' => '%' . trim($this->request->data['ProgramOutcome']['typeoutcome_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programOutcomes', $this->paginate());
        if (!$this->request->is('ajax')) {
            $typeoutcomes = $this->ProgramOutcome->Typeoutcome->find('list');
            $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
            $this->set(compact('typeoutcomes', 'curriculumns'));
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_view($id = null) {
        if (!$this->ProgramOutcome->exists($id)) {
            throw new NotFoundException(__('Invalid program outcome'));
        }
        $options = array('conditions' => array('ProgramOutcome.' . $this->ProgramOutcome->primaryKey => $id));
        $this->set('programOutcome', $this->ProgramOutcome->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->ProgramOutcome->create();
            if ($this->ProgramOutcome->save($this->request->data)) {
                $this->Flash->success(__('The program outcome has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The program outcome could not be saved. Please, try again.'));
            }
        }
        $typeoutcomes = $this->ProgramOutcome->Typeoutcome->find('list');
        $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
        $this->set(compact('typeoutcomes', 'curriculumns'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_edit($id = null) {
        $this->ProgramOutcome->id = $id;
        if (!$this->ProgramOutcome->exists($id)) {
            throw new NotFoundException(__('Invalid program outcome'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ProgramOutcome->save($this->request->data)) {
                $this->Flash->success(__('program outcome đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('program outcome lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('ProgramOutcome.' . $this->ProgramOutcome->primaryKey => $id));
            $this->request->data = $this->ProgramOutcome->find('first', $options);
        }
        $typeoutcomes = $this->ProgramOutcome->Typeoutcome->find('list');
        $curriculumns = $this->ProgramOutcome->Curriculumn->find('list');
        $this->set(compact('typeoutcomes', 'curriculumns'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function dvcm_delete($id = null) {
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
            throw new NotFoundException(__('Invalid program outcome'));
        }
        if ($this->ProgramOutcome->delete()) {
            $this->Flash->success(__('Program outcome đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Program outcome xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
