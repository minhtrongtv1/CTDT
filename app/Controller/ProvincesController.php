<?php

App::uses('AppController', 'Controller');

/**
 * Provinces Controller
 *
 * @property Province $Province
 * @property PaginatorComponent $Paginator
 */
class ProvincesController extends AppController {

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
        $order = array('Province.name' => 'ASC');
        //debug($this->request->data);die;
        if (!empty($this->request->data)) {

            $conditions = Set::merge($conditions, array('Province.name like' => $this->request->data['Province']['name'] . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('provinces', $this->paginate());
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
        if (!$this->Province->exists($id)) {
            throw new NotFoundException(__('Invalid province'));
        }
        $options = array('conditions' => array('Province.' . $this->Province->primaryKey => $id));
        $this->set('province', $this->Province->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Province->create();
            if ($this->Province->save($this->request->data)) {
                $this->Flash->success(__('The province has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The province could not be saved. Please, try again.'));
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
        $this->Province->id = $id;
        if (!$this->Province->exists($id)) {
            throw new NotFoundException(__('Invalid province'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Province->save($this->request->data)) {
                $this->Flash->success(__('province đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('province lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Province.' . $this->Province->primaryKey => $id));
            $this->request->data = $this->Province->find('first', $options);
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
                if ($this->Province->deleteAll(array('Province.id' => $requestDeleteId))) {
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
        $this->Province->id = $id;
        if (!$this->Province->exists()) {
            throw new NotFoundException(__('Invalid province'));
        }
        if ($this->Province->delete()) {
            $this->Flash->success(__('Province đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Province xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
