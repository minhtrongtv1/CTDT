<?php

App::uses('AppController', 'Controller');

/**
 * Curriculumns Controller
 *
 * @property Curriculumn $Curriculumn
 * @property PaginatorComponent $Paginator
 */
class CurriculumnsController extends AppController {

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
        $order = array('Curriculumn.name' => 'ASC');
        if (!empty($this->request->data['Curriculumn']['code'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.code like' => '%' . trim($this->request->data['Curriculumn']['code']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['name_vn'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.name_vn like' => '%' . trim($this->request->data['Curriculumn']['name_vn']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['major_id'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.major_id like' => '%' . trim($this->request->data['Curriculumn']['major_id']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['level_id'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.level_id like' => '%' . trim($this->request->data['Curriculumn']['level_id']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['form_of_trainning_id'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.form_of_trainning_id like' => '%' . trim($this->request->data['Curriculumn']['form_of_trainning_id']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['state_id'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.state_id like' => '%' . trim($this->request->data['Curriculumn']['state_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('curriculumns', $this->paginate());
        if (!$this->request->is('ajax')) {
            $levels = $this->Curriculumn->Level->find('list');
            $departments = $this->Curriculumn->Department->find('list');
            $majors = $this->Curriculumn->Major->find('list');
            $formOfTrainnings = $this->Curriculumn->FormOfTrainning->find('list');
            $diplomas = $this->Curriculumn->Diploma->find('list');
            $states = $this->Curriculumn->State->find('list');
            $subjects = $this->Curriculumn->Subject->find('list');
            $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas', 'states', 'subjects'));
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
        if (!$this->Curriculumn->exists($id)) {
            throw new NotFoundException(__('Invalid curriculumn'));
        }
        $options = array('conditions' => array('Curriculumn.' . $this->Curriculumn->primaryKey => $id));
        $this->set('curriculumn', $this->Curriculumn->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Curriculumn->create();
            if ($this->Curriculumn->save($this->request->data)) {
                $this->Flash->success(__('The curriculumn has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The curriculumn could not be saved. Please, try again.'));
            }
        }
        $levels = $this->Curriculumn->Level->find('list');
        $departments = $this->Curriculumn->Department->find('list');
        $majors = $this->Curriculumn->Major->find('list');
        $formOfTrainnings = $this->Curriculumn->FormOfTrainning->find('list');
        $diplomas = $this->Curriculumn->Diploma->find('list');
        $states = $this->Curriculumn->State->find('list');
        $subjects = $this->Curriculumn->Subject->find('list');
        $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas', 'states', 'subjects'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Curriculumn->id = $id;
        if (!$this->Curriculumn->exists($id)) {
            throw new NotFoundException(__('Invalid curriculumn'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Curriculumn->save($this->request->data)) {
                $this->Flash->success(__('curriculumn đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('curriculumn lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Curriculumn.' . $this->Curriculumn->primaryKey => $id));
            $this->request->data = $this->Curriculumn->find('first', $options);
        }
        $levels = $this->Curriculumn->Level->find('list');
        $departments = $this->Curriculumn->Department->find('list');
        $majors = $this->Curriculumn->Major->find('list');
        $formOfTrainnings = $this->Curriculumn->FormOfTrainning->find('list');
        $diplomas = $this->Curriculumn->Diploma->find('list');
        $states = $this->Curriculumn->State->find('list');
        $subjects = $this->Curriculumn->Subject->find('list');
        $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas', 'states', 'subjects'));
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
                if ($this->Curriculumn->deleteAll(array('Curriculumn.id' => $requestDeleteId))) {
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
        $this->Curriculumn->id = $id;
        if (!$this->Curriculumn->exists()) {
            throw new NotFoundException(__('Invalid curriculumn'));
        }
        if ($this->Curriculumn->delete()) {
            $this->Flash->success(__('Curriculumn đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Curriculumn xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function pdt_index() {
        $conditions = array();
        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Curriculumn.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('curriculumns', $this->paginate());
        if (!$this->request->is('ajax')) {
            $levels = $this->Curriculumn->Level->find('list');
            $departments = $this->Curriculumn->Department->find('list');
            $majors = $this->Curriculumn->Major->find('list');
            $formOfTrainnings = $this->Curriculumn->FormOfTrainning->find('list');
            $diplomas = $this->Curriculumn->Diploma->find('list');
            $states = $this->Curriculumn->State->find('list');
            $subjects = $this->Curriculumn->Subject->find('list');
            $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas', 'states', 'subjects'));
        }
    }

    public function pdt_view($id = null) {
        if (!$this->Curriculumn->exists($id)) {
            throw new NotFoundException(__('Invalid curriculumn'));
        }
        $options = array('conditions' => array('Curriculumn.' . $this->Curriculumn->primaryKey => $id));
        $this->set('curriculumn', $this->Curriculumn->find('first', $options));
    }

    public function pkt_index() {
        $conditions = array();
        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Curriculumn.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('curriculumns', $this->paginate());
        if (!$this->request->is('ajax')) {
            $levels = $this->Curriculumn->Level->find('list');
            $departments = $this->Curriculumn->Department->find('list');
            $majors = $this->Curriculumn->Major->find('list');
            $formOfTrainnings = $this->Curriculumn->FormOfTrainning->find('list');
            $diplomas = $this->Curriculumn->Diploma->find('list');
            $states = $this->Curriculumn->State->find('list');
            $subjects = $this->Curriculumn->Subject->find('list');
            $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas', 'states', 'subjects'));
        }
    }

    public function pkt_view($id = null) {
        if (!$this->Curriculumn->exists($id)) {
            throw new NotFoundException(__('Invalid curriculumn'));
        }
        $options = array('conditions' => array('Curriculumn.' . $this->Curriculumn->primaryKey => $id));
        $this->set('curriculumn', $this->Curriculumn->find('first', $options));
    }

    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Curriculumn.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('curriculumns', $this->paginate());
        if (!$this->request->is('ajax')) {
            $levels = $this->Curriculumn->Level->find('list');
            $departments = $this->Curriculumn->Department->find('list');
            $majors = $this->Curriculumn->Major->find('list');
            $formOfTrainnings = $this->Curriculumn->FormOfTrainning->find('list');
            $diplomas = $this->Curriculumn->Diploma->find('list');
            $states = $this->Curriculumn->State->find('list');
            $subjects = $this->Curriculumn->Subject->find('list');
            $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas', 'states', 'subjects'));
        }
    }

    public function ptc_view($id = null) {
        if (!$this->Curriculumn->exists($id)) {
            throw new NotFoundException(__('Invalid curriculumn'));
        }
        $options = array('conditions' => array('Curriculumn.' . $this->Curriculumn->primaryKey => $id));
        $this->set('curriculumn', $this->Curriculumn->find('first', $options));
    }

    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('Curriculumn.name' => 'ASC');
        if (!empty($this->request->data['Curriculumn']['code'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.code like' => '%' . trim($this->request->data['Curriculumn']['code']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['name_vn'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.name_vn like' => '%' . trim($this->request->data['Curriculumn']['name_vn']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['major_id'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.major_id like' => '%' . trim($this->request->data['Curriculumn']['major_id']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['level_id'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.level_id like' => '%' . trim($this->request->data['Curriculumn']['level_id']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['form_of_trainning_id'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.form_of_trainning_id like' => '%' . trim($this->request->data['Curriculumn']['form_of_trainning_id']) . '%'));
        }
        if (!empty($this->request->data['Curriculumn']['state_id'])) {
            $conditions = Hash::merge($conditions, array('Curriculumn.state_id like' => '%' . trim($this->request->data['Curriculumn']['state_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('curriculumns', $this->paginate());
        if (!$this->request->is('ajax')) {
            $levels = $this->Curriculumn->Level->find('list');
            $departments = $this->Curriculumn->Department->find('list');
            $majors = $this->Curriculumn->Major->find('list');
            $formOfTrainnings = $this->Curriculumn->FormOfTrainning->find('list');
            $diplomas = $this->Curriculumn->Diploma->find('list');
            $states = $this->Curriculumn->State->find('list');
            $subjects = $this->Curriculumn->Subject->find('list');
            $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas', 'states', 'subjects'));
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
        if (!$this->Curriculumn->exists($id)) {
            throw new NotFoundException(__('Invalid curriculumn'));
        }
        $options = array('conditions' => array('Curriculumn.' . $this->Curriculumn->primaryKey => $id));
        $this->set('curriculumn', $this->Curriculumn->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->Curriculumn->create();
            if ($this->Curriculumn->save($this->request->data)) {
                $this->Flash->success(__('The curriculumn has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The curriculumn could not be saved. Please, try again.'));
            }
        }
        $levels = $this->Curriculumn->Level->find('list');
        $departments = $this->Curriculumn->Department->find('list');
        $majors = $this->Curriculumn->Major->find('list');
        $formOfTrainnings = $this->Curriculumn->FormOfTrainning->find('list');
        $diplomas = $this->Curriculumn->Diploma->find('list');
        $states = $this->Curriculumn->State->find('list');
        $subjects = $this->Curriculumn->Subject->find('list');
        $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas', 'states', 'subjects'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_edit($id = null) {
        $this->Curriculumn->id = $id;
        if (!$this->Curriculumn->exists($id)) {
            throw new NotFoundException(__('Invalid curriculumn'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Curriculumn->save($this->request->data)) {
                $this->Flash->success(__('curriculumn đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('curriculumn lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Curriculumn.' . $this->Curriculumn->primaryKey => $id));
            $this->request->data = $this->Curriculumn->find('first', $options);
        }
        $levels = $this->Curriculumn->Level->find('list');
        $departments = $this->Curriculumn->Department->find('list');
        $majors = $this->Curriculumn->Major->find('list');
        $formOfTrainnings = $this->Curriculumn->FormOfTrainning->find('list');
        $diplomas = $this->Curriculumn->Diploma->find('list');
        $states = $this->Curriculumn->State->find('list');
        $subjects = $this->Curriculumn->Subject->find('list');
        $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas', 'states', 'subjects'));
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
                if ($this->Curriculumn->deleteAll(array('Curriculumn.id' => $requestDeleteId))) {
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
        $this->Curriculumn->id = $id;
        if (!$this->Curriculumn->exists()) {
            throw new NotFoundException(__('Invalid curriculumn'));
        }
        if ($this->Curriculumn->delete()) {
            $this->Flash->success(__('Curriculumn đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Curriculumn xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function xuat_danh_sach_ctdt($id = null) {

        $contain = array('Curriculumn' => array('Department' => array('fields'=> array('title'))), 'Level', 'Major' => array('name', 'code'), 'FormOfTrainning' => array('name'));
        //debug($contain);
        if (!$this->Curriculumn->exists($id)) {
            throw new NotFoundException(__('Invalid Curriculumn'));
        }
        $options = array('conditions' => array('Curriculumn.' . $this->Curriculumn->primaryKey => $id), 'contain' => $contain);
        //debug($this->Curriculumn->find('first', $options));die;
        $this->set('curriculumn', $this->Curriculumn->find('first', $options));
    }
}
