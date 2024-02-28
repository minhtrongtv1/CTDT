<?php

App::uses('AppController', 'Controller');

/**
 * Fields Controller
 *
 * @property Field $Field
 * @property PaginatorComponent $Paginator
 */
class FieldsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

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
//$conditions = Set::merge($conditions, array('Field.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('fields', $this->paginate());
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
        if (!$this->Field->exists($id)) {
            throw new NotFoundException(__('Invalid field'));
        }
        $options = array('conditions' => array('Field.' . $this->Field->primaryKey => $id));
        $this->set('field', $this->Field->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Field->create();
            if ($this->Field->save($this->request->data)) {
                $this->Flash->success(__('The field has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The field could not be saved. Please, try again.'));
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
        $this->Field->id = $id;
        if (!$this->Field->exists($id)) {
            throw new NotFoundException(__('Invalid field'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Field->save($this->request->data)) {
                $this->Flash->success(__('field đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('field lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Field.' . $this->Field->primaryKey => $id));
            $this->request->data = $this->Field->find('first', $options);
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
                if ($this->Field->deleteAll(array('Field.id' => $requestDeleteId))) {
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
        $this->Field->id = $id;
        if (!$this->Field->exists()) {
            throw new NotFoundException(__('Invalid field'));
        }
        if ($this->Field->delete()) {
            $this->Flash->success(__('Field đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Field xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
