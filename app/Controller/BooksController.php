<?php

App::uses('AppController', 'Controller');

/**
 * Books Controller
 *
 * @property Book $Book
 * @property PaginatorComponent $Paginator
 */
class BooksController extends AppController {

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
        $order = array('Book.name' => 'ASC');
         if (!empty($this->request->data['Book']['code'])) {
            $conditions = Hash::merge($conditions, array('Book.code like' => '%' . trim($this->request->data['Book']['code']) . '%'));
        }
        if (!empty($this->request->data['Book']['name'])) {
            $conditions = Hash::merge($conditions, array('Book.name like' => '%' . trim($this->request->data['Book']['name']) . '%'));
        }
        if (!empty($this->request->data['Book']['pricing_code'])) {
            $conditions = Hash::merge($conditions, array('Book.pricing_code like' => '%' . trim($this->request->data['Book']['pricing_code']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('books', $this->paginate());
        if (!$this->request->is('ajax')) {
            $subjects = $this->Book->Subject->find('list');
            $this->set(compact('subjects'));
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
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Tài liệu không hợp lệ'));
        }
        $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
        $this->set('book', $this->Book->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Book->create();
            if ($this->Book->save($this->request->data)) {
                $this->Flash->success(__('Tài liệu đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Không thể lưu tài liệu. Vui lòng thử lại.'));
            }
        }
        $subjects = $this->Book->Subject->find('list');
        $this->set(compact('subjects'));
       
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Book->id = $id;
        if (!$this->Book->exists($id)) {
            throw new NotFoundException(__('Tài liệu không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Book->save($this->request->data)) {
                $this->Flash->success(__('Tài liệu đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Tài liệu lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
            $this->request->data = $this->Book->find('first', $options);
        }
        $subjects = $this->Book->Subject->find('list');
        $this->set(compact('subjects'));
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
                if ($this->Book->deleteAll(array('Book.id' => $requestDeleteId))) {
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
        $this->Book->id = $id;
        if (!$this->Book->exists()) {
            throw new NotFoundException(__('Tài liệu không hợp lệ'));
        }
        if ($this->Book->delete()) {
            $this->Flash->success(__('Đã xóa tài liệu thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa tài liệu không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function pkt_book_index() {
        $conditions = array();
        $contain = array();
        $order = array('Book.name' => 'ASC');
         if (!empty($this->request->data['Book']['code'])) {
            $conditions = Hash::merge($conditions, array('Book.code like' => '%' . trim($this->request->data['Book']['code']) . '%'));
        }
        if (!empty($this->request->data['Book']['name'])) {
            $conditions = Hash::merge($conditions, array('Book.name like' => '%' . trim($this->request->data['Book']['name']) . '%'));
        }
        if (!empty($this->request->data['Book']['pricing_code'])) {
            $conditions = Hash::merge($conditions, array('Book.pricing_code like' => '%' . trim($this->request->data['Book']['pricing_code']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('books', $this->paginate());
        if (!$this->request->is('ajax')) {
            $subjects = $this->Book->Subject->find('list');
            $this->set(compact('subjects'));
        }
    }

}
