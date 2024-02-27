<?php

App::uses('AppController', 'Controller');

/**
 * ProgramObjectives Controller
 *
 * @property ProgramObjective $ProgramObjective
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ProgramObjectivesController extends AppController {

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
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('ProgramObjective.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('programObjectives', $this->paginate());
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
                $this->Flash->success(__('Chuẩn đầu ra được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Chuẩn đầu ra lưu không thành công, vui lòng thử lại.'));
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
