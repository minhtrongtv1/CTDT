<?php

App::uses('AppController', 'Controller');

/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 */
class GroupsController extends AppController {

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
            $conditions = Set::merge($conditions, array('Group.name' => $this->request->data['Group']['name']));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('groups', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Group->exists($id)) {
            throw new NotFoundException(__('Invalid group'));
        }
        $options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
        $this->set('group', $this->Group->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Group->create();
            if ($this->Group->save($this->request->data)) {
                $this->Flash->success(__('The group has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The group could not be saved. Please, try again.'));
            }
        }
        $users = $this->Group->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Group->id = $id;
        if (!$this->Group->exists($id)) {
            throw new NotFoundException(__('Invalid group'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Group->save($this->request->data)) {
                $this->Flash->success(__('group đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('group lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
            $this->request->data = $this->Group->find('first', $options);
        }
        $users = $this->Group->User->find('list');
        $this->set(compact('users'));
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
                if ($this->Group->deleteAll(array('Group.id' => $requestDeleteId))) {
                    echo json_encode($this->request->data['selectedRecord']);
                } else {
                    echo json_encode(array());
                }
            }
        } else {
            if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            $this->Group->id = $id;
            if (!$this->Group->exists()) {
                throw new NotFoundException(__('Invalid group'));
            }
            if ($this->Group->delete()) {
                $this->Flash->success(__('Group đã xóa'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Group xóa không thành công'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    public function fillSelectbox() {
        $groups = $this->Group->find('list');
        if (!empty($this->request->params['requested'])) {
            return $groups;
        }
        $this->set('groups', $groups);
    }

}
