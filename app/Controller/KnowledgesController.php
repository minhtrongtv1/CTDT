<?php

App::uses('AppController', 'Controller');

/**
 * Knowledges Controller
 *
 * @property Knowledge $Knowledge
 * @property PaginatorComponent $Paginator
 */
class KnowledgesController extends AppController {

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
        $order = array('Knowledge.name' => 'ASC');
        if (!empty($this->request->data['Knowledge']['code'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.code like' => '%' . trim($this->request->data['Knowledge']['code']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['name'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.name like' => '%' . trim($this->request->data['Knowledge']['name']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['program_objective_id'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.program_objective_id like' => '%' . trim($this->request->data['Knowledge']['program_objective_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('knowledges', $this->paginate());
//        if (!$this->request->is('ajax')) {
//            $programObjectives = $this->Knowledge->ProgramObjective->find('list');
//            $this->set(compact('programObjectives'));
//        }
    }

    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array('Knowledge.name' => 'ASC');
        if (!empty($this->request->data['Knowledge']['code'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.code like' => '%' . trim($this->request->data['Knowledge']['code']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['name'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.name like' => '%' . trim($this->request->data['Knowledge']['name']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['program_objective_id'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.program_objective_id like' => '%' . trim($this->request->data['Knowledge']['program_objective_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('knowledges', $this->paginate());
//        if (!$this->request->is('ajax')) {
//            $programObjectives = $this->Knowledge->ProgramObjective->find('list');
//            $this->set(compact('programObjectives'));
//        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Knowledge->exists($id)) {
            throw new NotFoundException(__('Invalid knowledge'));
        }
        $options = array('conditions' => array('Knowledge.' . $this->Knowledge->primaryKey => $id));
        $this->set('knowledge', $this->Knowledge->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Knowledge->create();
            if ($this->Knowledge->save($this->request->data)) {
                $this->Flash->success(__('The knowledge has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The knowledge could not be saved. Please, try again.'));
            }
        }
//        $programObjectives = $this->Knowledge->ProgramObjective->find('list');
//        $this->set(compact('programObjectives'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Knowledge->id = $id;
        if (!$this->Knowledge->exists($id)) {
            throw new NotFoundException(__('Invalid knowledge'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Knowledge->save($this->request->data)) {
                $this->Flash->success(__('knowledge đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('knowledge lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Knowledge.' . $this->Knowledge->primaryKey => $id));
            $this->request->data = $this->Knowledge->find('first', $options);
        }
//        $programObjectives = $this->Knowledge->ProgramObjective->find('list');
//        $this->set(compact('programObjectives'));
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
                if ($this->Knowledge->deleteAll(array('Knowledge.id' => $requestDeleteId))) {
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
        $this->Knowledge->id = $id;
        if (!$this->Knowledge->exists()) {
            throw new NotFoundException(__('Invalid knowledge'));
        }
        if ($this->Knowledge->delete()) {
            $this->Flash->success(__('Knowledge đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Knowledge xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function pkt_index() {
        $conditions = array();
        $contain = array();
        $order = array('Knowledge.name' => 'ASC');
        if (!empty($this->request->data['Knowledge']['code'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.code like' => '%' . trim($this->request->data['Knowledge']['code']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['name'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.name like' => '%' . trim($this->request->data['Knowledge']['name']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['program_objective_id'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.program_objective_id like' => '%' . trim($this->request->data['Knowledge']['program_objective_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('knowledges', $this->paginate());
//        if (!$this->request->is('ajax')) {
//            $programObjectives = $this->Knowledge->ProgramObjective->find('list');
//            $this->set(compact('programObjectives'));
//        }
    }

    /**
     * pdt_index method
     *
     * @return void
     */
    public function pdt_index() {

        $conditions = array();
        $contain = array();
        $order = array('Knowledge.name' => 'ASC');
        if (!empty($this->request->data['Knowledge']['code'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.code like' => '%' . trim($this->request->data['Knowledge']['code']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['name'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.name like' => '%' . trim($this->request->data['Knowledge']['name']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['program_objective_id'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.program_objective_id like' => '%' . trim($this->request->data['Knowledge']['program_objective_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('knowledges', $this->paginate());
//        if (!$this->request->is('ajax')) {
//            $programObjectives = $this->Knowledge->ProgramObjective->find('list');
//            $this->set(compact('programObjectives'));
//        }
    }

    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('Knowledge.name' => 'ASC');
        if (!empty($this->request->data['Knowledge']['code'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.code like' => '%' . trim($this->request->data['Knowledge']['code']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['name'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.name like' => '%' . trim($this->request->data['Knowledge']['name']) . '%'));
        }
        if (!empty($this->request->data['Knowledge']['program_objective_id'])) {
            $conditions = Hash::merge($conditions, array('Knowledge.program_objective_id like' => '%' . trim($this->request->data['Knowledge']['program_objective_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('knowledges', $this->paginate());
//        if (!$this->request->is('ajax')) {
//            $programObjectives = $this->Knowledge->ProgramObjective->find('list');
//            $this->set(compact('programObjectives'));
//        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_view($id = null) {
        if (!$this->Knowledge->exists($id)) {
            throw new NotFoundException(__('Invalid knowledge'));
        }
        $options = array('conditions' => array('Knowledge.' . $this->Knowledge->primaryKey => $id));
        $this->set('knowledge', $this->Knowledge->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->Knowledge->create();
            if ($this->Knowledge->save($this->request->data)) {
                $this->Flash->success(__('The knowledge has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The knowledge could not be saved. Please, try again.'));
            }
        }
//        $programObjectives = $this->Knowledge->ProgramObjective->find('list');
//        $this->set(compact('programObjectives'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_edit($id = null) {
        $this->Knowledge->id = $id;
        if (!$this->Knowledge->exists($id)) {
            throw new NotFoundException(__('Invalid knowledge'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Knowledge->save($this->request->data)) {
                $this->Flash->success(__('knowledge đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('knowledge lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Knowledge.' . $this->Knowledge->primaryKey => $id));
            $this->request->data = $this->Knowledge->find('first', $options);
        }
//        $programObjectives = $this->Knowledge->ProgramObjective->find('list');
//        $this->set(compact('programObjectives'));
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
                if ($this->Knowledge->deleteAll(array('Knowledge.id' => $requestDeleteId))) {
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
        $this->Knowledge->id = $id;
        if (!$this->Knowledge->exists()) {
            throw new NotFoundException(__('Invalid knowledge'));
        }
        if ($this->Knowledge->delete()) {
            $this->Flash->success(__('Knowledge đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Knowledge xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
