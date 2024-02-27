<?php

App::uses('AppController', 'Controller');

/**
 * CurriculumnsReferences Controller
 *
 * @property CurriculumnsReference $CurriculumnsReference
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CurriculumnsReferencesController extends AppController {

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
//$conditions = Set::merge($conditions, array('CurriculumnsReference.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('curriculumnsReferences', $this->paginate());
        if (!$this->request->is('ajax')) {
            $curriculumns = $this->CurriculumnsReference->Curriculumn->find('list');
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
        if (!$this->CurriculumnsReference->exists($id)) {
            throw new NotFoundException(__('Chương trình đào tạo tham khảo không hợp lệ'));
        }
        $options = array('conditions' => array('CurriculumnsReference.' . $this->CurriculumnsReference->primaryKey => $id));
        $this->set('curriculumnsReference', $this->CurriculumnsReference->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->CurriculumnsReference->create();
            if ($this->CurriculumnsReference->save($this->request->data)) {
                $this->Flash->success(__('Chương trình đào tạo tham khảo được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Chương trình đào tạo tham khảo lưu không thành công, vui lòng thử lại.'));
            }
        }
        $curriculumns = $this->CurriculumnsReference->Curriculumn->find('list');
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
        $this->CurriculumnsReference->id = $id;
        if (!$this->CurriculumnsReference->exists($id)) {
            throw new NotFoundException(__('Chương trình đào tạo tham khảo không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CurriculumnsReference->save($this->request->data)) {
                $this->Flash->success(__('Chương trình đào tạo tham khảo được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Chương trình đào tạo tham khảo lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('CurriculumnsReference.' . $this->CurriculumnsReference->primaryKey => $id));
            $this->request->data = $this->CurriculumnsReference->find('first', $options);
        }
        $curriculumns = $this->CurriculumnsReference->Curriculumn->find('list');
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
                if ($this->CurriculumnsReference->deleteAll(array('CurriculumnsReference.id' => $requestDeleteId))) {
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
        $this->CurriculumnsReference->id = $id;
        if (!$this->CurriculumnsReference->exists()) {
            throw new NotFoundException(__('Chương trình đào tạo tham khảo không hợp lệ'));
        }
        if ($this->CurriculumnsReference->delete()) {
            $this->Flash->success(__('Đã xóa chương trình đào tạo tham khảo thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa chương trình đào tạo tham khảo không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
