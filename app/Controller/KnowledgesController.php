<?php

App::uses('AppController', 'Controller');

/**
 * Knowledges Controller
 *
 * @property Knowledge $Knowledge
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class KnowledgesController extends AppController {

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
//$conditions = Set::merge($conditions, array('Knowledge.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('knowledges', $this->paginate());
        if (!$this->request->is('ajax')) {
            $programObjectives = $this->Knowledge->ProgramObjective->find('list');
            $this->set(compact('programObjectives'));
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
        if (!$this->Knowledge->exists($id)) {
            throw new NotFoundException(__('Khối kiến thức không hợp lệ'));
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
                $this->Flash->success(__('Tài liệu được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Khối kiến thức lưu không thành công, vui lòng thử lại.'));
            }
        }
        $programObjectives = $this->Knowledge->ProgramObjective->find('list');
        $this->set(compact('programObjectives'));
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
            throw new NotFoundException(__('Khối kiến thức không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Knowledge->save($this->request->data)) {
                $this->Flash->success(__('Khối kiến thức đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Khối kiến thức lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Knowledge.' . $this->Knowledge->primaryKey => $id));
            $this->request->data = $this->Knowledge->find('first', $options);
        }
        $programObjectives = $this->Knowledge->ProgramObjective->find('list');
        $this->set(compact('programObjectives'));
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
            throw new NotFoundException(__('Khối kiến thức không hợp lệ'));
        }
        if ($this->Knowledge->delete()) {
            $this->Flash->success(__('Đã xóa khối kiến thức thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa khối kiến thức không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
