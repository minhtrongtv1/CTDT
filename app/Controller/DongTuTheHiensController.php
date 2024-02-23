<?php

App::uses('AppController', 'Controller');

/**
 * DongTuTheHiens Controller
 *
 * @property DongTuTheHien $DongTuTheHien
 * @property PaginatorComponent $Paginator
 */
class DongTuTheHiensController extends AppController {

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
//$conditions = Set::merge($conditions, array('DongTuTheHien.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('dongTuTheHiens', $this->paginate());
        if (!$this->request->is('ajax')) {
            $mucDoNhanThucs = $this->DongTuTheHien->MucDoNhanThuc->find('list');
            $this->set(compact('mucDoNhanThucs'));
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
        if (!$this->DongTuTheHien->exists($id)) {
            throw new NotFoundException(__('Invalid dong tu the hien'));
        }
        $options = array('conditions' => array('DongTuTheHien.' . $this->DongTuTheHien->primaryKey => $id));
        $this->set('dongTuTheHien', $this->DongTuTheHien->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->DongTuTheHien->create();
            if ($this->DongTuTheHien->save($this->request->data)) {
                $this->Flash->success(__('The dong tu the hien has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The dong tu the hien could not be saved. Please, try again.'));
            }
        }
        $mucDoNhanThucs = $this->DongTuTheHien->MucDoNhanThuc->find('list');
        $this->set(compact('mucDoNhanThucs'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->DongTuTheHien->id = $id;
        if (!$this->DongTuTheHien->exists($id)) {
            throw new NotFoundException(__('Invalid dong tu the hien'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->DongTuTheHien->save($this->request->data)) {
                $this->Flash->success(__('dong tu the hien đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('dong tu the hien lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('DongTuTheHien.' . $this->DongTuTheHien->primaryKey => $id));
            $this->request->data = $this->DongTuTheHien->find('first', $options);
        }
        $mucDoNhanThucs = $this->DongTuTheHien->MucDoNhanThuc->find('list');
        $this->set(compact('mucDoNhanThucs'));
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
                if ($this->DongTuTheHien->deleteAll(array('DongTuTheHien.id' => $requestDeleteId))) {
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
        $this->DongTuTheHien->id = $id;
        if (!$this->DongTuTheHien->exists()) {
            throw new NotFoundException(__('Invalid dong tu the hien'));
        }
        if ($this->DongTuTheHien->delete()) {
            $this->Flash->success(__('Dong tu the hien đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Dong tu the hien xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
