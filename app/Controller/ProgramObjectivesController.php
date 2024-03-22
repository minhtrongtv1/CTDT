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
        if (!empty($this->request->data['ProgramObjective']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.curriculumn_id like' => '%' . trim($this->request->data['ProgramObjective']['curriculumn_id']) . '%'));
        }
//        if (!empty($this->request->data['ProgramObjective']['typeoutcome_id'])) {
//            $conditions = Hash::merge($conditions, array('ProgramObjective.typeoutcome_id like' => '%' . trim($this->request->data['ProgramObjective']['typeoutcome_id']) . '%'));
//        }
        if (!empty($this->request->data['ProgramObjective']['code'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.code like' => '%' . trim($this->request->data['ProgramObjective']['code']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['typeobjective_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.typeobjective_id like' => '%' . trim($this->request->data['ProgramObjective']['typeobjective_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programObjectives', $this->paginate());
        if (!$this->request->is('ajax')) {
            $curriculumns = $this->ProgramObjective->Curriculumn->find('list');
//            $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
            //$this->set(compact('curriculumns', 'typeoutcomes'));
            $programoutcomes = $this->ProgramObjective->Programoutcome->find('list');
            $typeobjectives = $this->ProgramObjective->Typeobjective->find('list');
            $this->set(compact('curriculumns', 'programoutcomes', 'typeobjectives'));
        }
    }

    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array('ProgramObjective.code' => 'ASC');
        if (!empty($this->request->data['ProgramObjective']['code'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.code like' => '%' . trim($this->request->data['ProgramObjective']['code']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.curriculumn_id like' => '%' . trim($this->request->data['ProgramObjective']['curriculumn_id']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['typeobjective_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.typeobjective_id like' => '%' . trim($this->request->data['ProgramObjective']['typeobjective_id']) . '%'));
        }

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programObjectives', $this->paginate());
        if (!$this->request->is('ajax')) {
            // $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
            $curriculumns = $this->ProgramObjective->Curriculumn->find('list');
            // $this->set(compact('typeoutcomes', 'curriculumns'));
            // $this->set(compact('programOutcomes'));
//            $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
            //$this->set(compact('curriculumns', 'typeoutcomes'));
            $programoutcomes = $this->ProgramObjective->Programoutcome->find('list');
            $typeobjectives = $this->ProgramObjective->Typeobjective->find('list');
            $this->set(compact('curriculumns', 'programoutcomes', 'typeobjectives'));
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
            throw new NotFoundException(__('Invalid program objective'));
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
                $this->Flash->success(__('The program objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The program objective could not be saved. Please, try again.'));
            }
        }
        $curriculumns = $this->ProgramObjective->Curriculumn->find('list');
        // $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
        // $this->set(compact('curriculumns', 'typeoutcomes'));
        $programoutcomes = $this->ProgramObjective->Programoutcome->find('list');
        $typeobjectives = $this->ProgramObjective->Typeobjective->find('list');
        $this->set(compact('curriculumns', 'programoutcomes', 'typeobjectives'));
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
            throw new NotFoundException(__('Invalid program objective'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ProgramObjective->save($this->request->data)) {
                $this->Flash->success(__('program objective đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('program objective lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('ProgramObjective.' . $this->ProgramObjective->primaryKey => $id));
            $this->request->data = $this->ProgramObjective->find('first', $options);
        }
        $curriculumns = $this->ProgramObjective->Curriculumn->find('list');
        //  $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
        //$this->set(compact('curriculumns', 'typeoutcomes'));

        $programoutcomes = $this->ProgramObjective->Programoutcome->find('list');
        $typeobjectives = $this->ProgramObjective->Typeobjective->find('list');
        $this->set(compact('curriculumns', 'programoutcomes', 'typeobjectives'));
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
            throw new NotFoundException(__('Invalid program objective'));
        }
        if ($this->ProgramObjective->delete()) {
            $this->Flash->success(__('Program objective đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Program objective xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function pdt_index() {
        $conditions = array();
        $contain = array();
        $order = array('ProgramObjective.name' => 'ASC');
         if (!empty($this->request->data['ProgramObjective']['code'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.code like' => '%' . trim($this->request->data['ProgramObjective']['code']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.curriculumn_id like' => '%' . trim($this->request->data['ProgramObjective']['curriculumn_id']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['typeobjective_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.typeobjective_id like' => '%' . trim($this->request->data['ProgramObjective']['typeobjective_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programObjectives', $this->paginate());
        if (!$this->request->is('ajax')) {
            $curriculumns = $this->ProgramObjective->Curriculumn->find('list');
            //  $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
            //$this->set(compact('curriculumns', 'typeoutcomes'));
            $programoutcomes = $this->ProgramObjective->Programoutcome->find('list');
            $typeobjectives = $this->ProgramObjective->Typeobjective->find('list');
            $this->set(compact('curriculumns', 'programoutcomes', 'typeobjectives'));
        }
    }

    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('ProgramObjective.name' => 'ASC');
       if (!empty($this->request->data['ProgramObjective']['code'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.code like' => '%' . trim($this->request->data['ProgramObjective']['code']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.curriculumn_id like' => '%' . trim($this->request->data['ProgramObjective']['curriculumn_id']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['typeobjective_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.typeobjective_id like' => '%' . trim($this->request->data['ProgramObjective']['typeobjective_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programObjectives', $this->paginate());
        if (!$this->request->is('ajax')) {
            $curriculumns = $this->ProgramObjective->Curriculumn->find('list');
            // $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
            //$this->set(compact('curriculumns', 'typeoutcomes'));
            $programoutcomes = $this->ProgramObjective->Programoutcome->find('list');
            $typeobjectives = $this->ProgramObjective->Typeobjective->find('list');
            $this->set(compact('curriculumns', 'programoutcomes', 'typeobjectives'));
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
        if (!$this->ProgramObjective->exists($id)) {
            throw new NotFoundException(__('Invalid program objective'));
        }
        $options = array('conditions' => array('ProgramObjective.' . $this->ProgramObjective->primaryKey => $id));
        $this->set('programObjective', $this->ProgramObjective->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->ProgramObjective->create();
            if ($this->ProgramObjective->save($this->request->data)) {
                $this->Flash->success(__('The program objective has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The program objective could not be saved. Please, try again.'));
            }
        }
        $curriculumns = $this->ProgramObjective->Curriculumn->find('list');
        //   $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
        // $this->set(compact('curriculumns', 'typeoutcomes'));
        $programoutcomes = $this->ProgramObjective->Programoutcome->find('list');
        $typeobjectives = $this->ProgramObjective->Typeobjective->find('list');
        $this->set(compact('curriculumns', 'programoutcomes', 'typeobjectives'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_edit($id = null) {
        $this->ProgramObjective->id = $id;
        if (!$this->ProgramObjective->exists($id)) {
            throw new NotFoundException(__('Invalid program objective'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ProgramObjective->save($this->request->data)) {
                $this->Flash->success(__('program objective đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('program objective lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('ProgramObjective.' . $this->ProgramObjective->primaryKey => $id));
            $this->request->data = $this->ProgramObjective->find('first', $options);
        }
        $curriculumns = $this->ProgramObjective->Curriculumn->find('list');
        // $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
        //$this->set(compact('curriculumns', 'typeoutcomes'));
        $programoutcomes = $this->ProgramObjective->Programoutcome->find('list');
        $typeobjectives = $this->ProgramObjective->Typeobjective->find('list');
        $this->set(compact('curriculumns', 'programoutcomes', 'typeobjectives'));
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
            throw new NotFoundException(__('Invalid program objective'));
        }
        if ($this->ProgramObjective->delete()) {
            $this->Flash->success(__('Program objective đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Program objective xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function pkt_index() {
        $conditions = array();
        $contain = array();
        $order = array('ProgramObjective.name' => 'ASC');
        if (!empty($this->request->data['ProgramObjective']['code'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.code like' => '%' . trim($this->request->data['ProgramObjective']['code']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.curriculumn_id like' => '%' . trim($this->request->data['ProgramObjective']['curriculumn_id']) . '%'));
        }
        if (!empty($this->request->data['ProgramObjective']['typeobjective_id'])) {
            $conditions = Hash::merge($conditions, array('ProgramObjective.typeobjective_id like' => '%' . trim($this->request->data['ProgramObjective']['typeobjective_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programObjectives', $this->paginate());
        if (!$this->request->is('ajax')) {
            $curriculumns = $this->ProgramObjective->Curriculumn->find('list');
            //   $typeoutcomes = $this->ProgramObjective->Typeoutcome->find('list');
            //  $this->set(compact('curriculumns', 'typeoutcomes'));
            $programoutcomes = $this->ProgramObjective->Programoutcome->find('list');
            $typeobjectives = $this->ProgramObjective->Typeobjective->find('list');
            $this->set(compact('curriculumns', 'programoutcomes', 'typeobjectives'));
        }
    }
}
