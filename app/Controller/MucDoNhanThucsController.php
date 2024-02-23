<?php

App::uses('AppController', 'Controller');

/**
 * MucDoNhanThucs Controller
 *
 * @property MucDoNhanThuc $MucDoNhanThuc
 * @property PaginatorComponent $Paginator
 */
class MucDoNhanThucsController extends AppController {

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
//$conditions = Set::merge($conditions, array('MucDoNhanThuc.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('mucDoNhanThucs', $this->paginate());
        if (!$this->request->is('ajax')) {
            $linhVucNhanThucs = $this->MucDoNhanThuc->LinhVucNhanThuc->find('list');
            $this->set(compact('linhVucNhanThucs'));
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
        if (!$this->MucDoNhanThuc->exists($id)) {
            throw new NotFoundException(__('Invalid muc do nhan thuc'));
        }
        $options = array('conditions' => array('MucDoNhanThuc.' . $this->MucDoNhanThuc->primaryKey => $id));
        $this->set('mucDoNhanThuc', $this->MucDoNhanThuc->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->MucDoNhanThuc->create();
            if ($this->MucDoNhanThuc->save($this->request->data)) {
                $this->Flash->success(__('The muc do nhan thuc has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The muc do nhan thuc could not be saved. Please, try again.'));
            }
        }
        $linhVucNhanThucs = $this->MucDoNhanThuc->LinhVucNhanThuc->find('list');
        $this->set(compact('linhVucNhanThucs'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->MucDoNhanThuc->id = $id;
        if (!$this->MucDoNhanThuc->exists($id)) {
            throw new NotFoundException(__('Invalid muc do nhan thuc'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            //debug($this->request->data);die;
            if ($this->MucDoNhanThuc->save($this->request->data)) {
                $this->Flash->success(__('muc do nhan thuc đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('muc do nhan thuc lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('MucDoNhanThuc.' . $this->MucDoNhanThuc->primaryKey => $id));
            $this->request->data = $this->MucDoNhanThuc->find('first', $options);
        }
        $linhVucNhanThucs = $this->MucDoNhanThuc->LinhVucNhanThuc->find('list');
        $this->set(compact('linhVucNhanThucs'));
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
                if ($this->MucDoNhanThuc->deleteAll(array('MucDoNhanThuc.id' => $requestDeleteId))) {
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
        $this->MucDoNhanThuc->id = $id;
        if (!$this->MucDoNhanThuc->exists()) {
            throw new NotFoundException(__('Invalid muc do nhan thuc'));
        }
        if ($this->MucDoNhanThuc->delete()) {
            $this->Flash->success(__('Muc do nhan thuc đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Muc do nhan thuc xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
