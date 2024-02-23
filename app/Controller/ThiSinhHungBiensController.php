<?php

App::uses('AppController', 'Controller');

/**
 * ThiSinhHungBiens Controller
 *
 * @property ThiSinhHungBien $ThiSinhHungBien
 * @property PaginatorComponent $Paginator
 */
class ThiSinhHungBiensController extends AppController {

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
//$conditions = Set::merge($conditions, array('ThiSinhHungBien.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('thiSinhHungBiens', $this->paginate());
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
        if (!$this->ThiSinhHungBien->exists($id)) {
            throw new NotFoundException(__('Invalid thi sinh hung bien'));
        }
        $options = array('conditions' => array('ThiSinhHungBien.' . $this->ThiSinhHungBien->primaryKey => $id));
        $this->set('thiSinhHungBien', $this->ThiSinhHungBien->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ThiSinhHungBien->create();
            if ($this->ThiSinhHungBien->save($this->request->data)) {
                $this->Flash->success(__('The thi sinh hung bien has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The thi sinh hung bien could not be saved. Please, try again.'));
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
        $this->ThiSinhHungBien->id = $id;
        if (!$this->ThiSinhHungBien->exists($id)) {
            throw new NotFoundException(__('Invalid thi sinh hung bien'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ThiSinhHungBien->save($this->request->data)) {
                $this->Flash->success(__('thi sinh hung bien đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('thi sinh hung bien lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('ThiSinhHungBien.' . $this->ThiSinhHungBien->primaryKey => $id));
            $this->request->data = $this->ThiSinhHungBien->find('first', $options);
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
                if ($this->ThiSinhHungBien->deleteAll(array('ThiSinhHungBien.id' => $requestDeleteId))) {
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
        $this->ThiSinhHungBien->id = $id;
        if (!$this->ThiSinhHungBien->exists()) {
            throw new NotFoundException(__('Invalid thi sinh hung bien'));
        }
        if ($this->ThiSinhHungBien->delete()) {
            $this->Flash->success(__('Thi sinh hung bien đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Thi sinh hung bien xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

/**
     * admin_index method
     *
     * @return void
     */

    public function admin_index() {
        $conditions = array();
        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('ThiSinhHungBien.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('thiSinhHungBiens', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->ThiSinhHungBien->exists($id)) {
            throw new NotFoundException(__('Invalid thi sinh hung bien'));
        }
        $options = array('conditions' => array('ThiSinhHungBien.' . $this->ThiSinhHungBien->primaryKey => $id));
        $this->set('thiSinhHungBien', $this->ThiSinhHungBien->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->ThiSinhHungBien->create();
            if ($this->ThiSinhHungBien->save($this->request->data)) {
                $this->Flash->success(__('The thi sinh hung bien has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The thi sinh hung bien could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->ThiSinhHungBien->id = $id;
        if (!$this->ThiSinhHungBien->exists($id)) {
            throw new NotFoundException(__('Invalid thi sinh hung bien'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ThiSinhHungBien->save($this->request->data)) {
                $this->Flash->success(__('thi sinh hung bien đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('thi sinh hung bien lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('ThiSinhHungBien.' . $this->ThiSinhHungBien->primaryKey => $id));
            $this->request->data = $this->ThiSinhHungBien->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->ThiSinhHungBien->deleteAll(array('ThiSinhHungBien.id' => $requestDeleteId))) {
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
        $this->ThiSinhHungBien->id = $id;
        if (!$this->ThiSinhHungBien->exists()) {
            throw new NotFoundException(__('Invalid thi sinh hung bien'));
        }
        if ($this->ThiSinhHungBien->delete()) {
            $this->Flash->success(__('Thi sinh hung bien đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Thi sinh hung bien xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
