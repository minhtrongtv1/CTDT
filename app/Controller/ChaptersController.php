<?php

App::uses('AppController', 'Controller');

/**
 * Chapters Controller
 *
 * @property Chapter $Chapter
 * @property PaginatorComponent $Paginator
 */
class ChaptersController extends AppController {

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
//$conditions = Set::merge($conditions, array('Chapter.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('chapters', $this->paginate());
        if (!$this->request->is('ajax')) {
            $fields = $this->Chapter->Field->find('list');
            $this->set(compact('fields'));
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
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
        $this->set('chapter', $this->Chapter->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Chapter->create();
            if ($this->Chapter->save($this->request->data)) {
                $this->Flash->success(__('The chapter has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
            }
        }
        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Chapter->id = $id;
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Chapter->save($this->request->data)) {
                $this->Flash->success(__('chapter đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('chapter lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
            $this->request->data = $this->Chapter->find('first', $options);
        }
        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
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
                if ($this->Chapter->deleteAll(array('Chapter.id' => $requestDeleteId))) {
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
        $this->Chapter->id = $id;
        if (!$this->Chapter->exists()) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        if ($this->Chapter->delete()) {
            $this->Flash->success(__('Chapter đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Chapter xóa không thành công'));
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
        $order = array('Chapter.name'=>'ASC');
        if (!empty($this->request->data['Chapter']['name'])) {
            $conditions = Set::merge($conditions, array('Chapter.name like' => '%'.$this->request->data['Chapter']['name'].'%'));
        }
        if (!empty($this->request->data['Chapter']['field_id'])) {
            $conditions = Set::merge($conditions, array('Chapter.field_id' => $this->request->data['Chapter']['field_id']));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('chapters', $this->paginate());
        if (!$this->request->is('ajax')) {
            $fields = $this->Chapter->Field->find('list');
            $this->set(compact('fields'));
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
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
        $this->set('chapter', $this->Chapter->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Chapter->create();
            if ($this->Chapter->save($this->request->data)) {
                $this->Flash->success(__('The chapter has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
            }
        }
        $fields = $this->Chapter->Field->find('list',array('order'=>array('Field.name'=>'ASC')));
        $this->set(compact('fields'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Chapter->id = $id;
        if (!$this->Chapter->exists($id)) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Chapter->save($this->request->data)) {
                $this->Flash->success(__('chapter đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('chapter lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Chapter.' . $this->Chapter->primaryKey => $id));
            $this->request->data = $this->Chapter->find('first', $options);
        }
        $fields = $this->Chapter->Field->find('list');
        $this->set(compact('fields'));
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
                if ($this->Chapter->deleteAll(array('Chapter.id' => $requestDeleteId))) {
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
        $this->Chapter->id = $id;
        if (!$this->Chapter->exists()) {
            throw new NotFoundException(__('Invalid chapter'));
        }
        if ($this->Chapter->delete()) {
            $this->Flash->success(__('Chapter đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Chapter xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
