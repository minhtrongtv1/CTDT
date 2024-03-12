<?php

App::uses('AppController', 'Controller');

/**
 * SubjectsBooks Controller
 *
 * @property SubjectsBook $SubjectsBook
 * @property PaginatorComponent $Paginator
 */
class SubjectsBooksController extends AppController {

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
        $order = array('SubjectsBook.book_id' => 'ASC');
        if (!empty($this->request->data['SubjectsBook']['subject_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.subject_id like' => '%' . trim($this->request->data['SubjectsBook']['subject_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsBook']['book_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.book_id like' => '%' . trim($this->request->data['SubjectsBook']['book_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjectsBooks', $this->paginate());
        if (!$this->request->is('ajax')) {
            $subjects = $this->SubjectsBook->Subject->find('list');
            $books = $this->SubjectsBook->Book->find('list');
            $this->set(compact('subjects', 'books'));
        }
    }

    public function ptc_index() {
        $conditions = array();
        $contain = array();
        $order = array('SubjectsBook.book_id' => 'ASC');
        if (!empty($this->request->data['SubjectsBook']['subject_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.subject_id like' => '%' . trim($this->request->data['SubjectsBook']['subject_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsBook']['book_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.book_id like' => '%' . trim($this->request->data['SubjectsBook']['book_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjectsBooks', $this->paginate());
        if (!$this->request->is('ajax')) {
            $subjects = $this->SubjectsBook->Subject->find('list');
            $books = $this->SubjectsBook->Book->find('list');
            $this->set(compact('subjects', 'books'));
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
        if (!$this->SubjectsBook->exists($id)) {
            throw new NotFoundException(__('Tài liệu học phần không hợp lệ'));
        }
        $options = array('conditions' => array('SubjectsBook.' . $this->SubjectsBook->primaryKey => $id));
        $this->set('subjectsBook', $this->SubjectsBook->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->SubjectsBook->create();
            if ($this->SubjectsBook->save($this->request->data)) {
                $this->Flash->success(__('Tài liệu học phần được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Tài liệu học phần lưu không thành công, vui lòng thử lại.'));
            }
        }
        $subjects = $this->SubjectsBook->Subject->find('list');
        $books = $this->SubjectsBook->Book->find('list');
        $this->set(compact('subjects', 'books'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->SubjectsBook->id = $id;
        if (!$this->SubjectsBook->exists($id)) {
            throw new NotFoundException(__('Tài liệu học phần không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SubjectsBook->save($this->request->data)) {
                $this->Flash->success(__('Tài liệu học phần đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Tài liệu học phần lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('SubjectsBook.' . $this->SubjectsBook->primaryKey => $id));
            $this->request->data = $this->SubjectsBook->find('first', $options);
        }
        $subjects = $this->SubjectsBook->Subject->find('list');
        $books = $this->SubjectsBook->Book->find('list');
        $this->set(compact('subjects', 'books'));
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
                if ($this->SubjectsBook->deleteAll(array('SubjectsBook.id' => $requestDeleteId))) {
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
        $this->SubjectsBook->id = $id;
        if (!$this->SubjectsBook->exists()) {
            throw new NotFoundException(__('Tài liệu học phần không hợp lệ'));
        }
        if ($this->SubjectsBook->delete()) {
            $this->Flash->success(__('Đã xóa tài liệu học phần thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa tài liệu học phần không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function pkt_index() {
        $conditions = array();
        $contain = array();
        $order = array('SubjectsBook.book_id' => 'ASC');
        if (!empty($this->request->data['SubjectsBook']['subject_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.subject_id like' => '%' . trim($this->request->data['SubjectsBook']['subject_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsBook']['book_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.book_id like' => '%' . trim($this->request->data['SubjectsBook']['book_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjectsBooks', $this->paginate());
        if (!$this->request->is('ajax')) {
            $subjects = $this->SubjectsBook->Subject->find('list');
            $books = $this->SubjectsBook->Book->find('list');
            $this->set(compact('subjects', 'books'));
        }
    }

    public function pdt_index() {

        $conditions = array();
        $contain = array();
        $order = array('SubjectsBook.book_id' => 'ASC');
        if (!empty($this->request->data['SubjectsBook']['subject_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.subject_id like' => '%' . trim($this->request->data['SubjectsBook']['subject_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsBook']['book_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.book_id like' => '%' . trim($this->request->data['SubjectsBook']['book_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjectsBooks', $this->paginate());
        if (!$this->request->is('ajax')) {
            $subjects = $this->SubjectsBook->Subject->find('list');
            $books = $this->SubjectsBook->Book->find('list');
            $this->set(compact('subjects', 'books'));
        }
    }

    public function dvcm_index() {
        $conditions = array();
        $contain = array();
        $order = array('SubjectsBook.book_id' => 'ASC');
        if (!empty($this->request->data['SubjectsBook']['subject_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.subject_id like' => '%' . trim($this->request->data['SubjectsBook']['subject_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsBook']['book_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsBook.book_id like' => '%' . trim($this->request->data['SubjectsBook']['book_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjectsBooks', $this->paginate());
        if (!$this->request->is('ajax')) {
            $subjects = $this->SubjectsBook->Subject->find('list');
            $books = $this->SubjectsBook->Book->find('list');
            $this->set(compact('subjects', 'books'));
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_view($id = null) {
        if (!$this->SubjectsBook->exists($id)) {
            throw new NotFoundException(__('Tài liệu học phần không hợp lệ'));
        }
        $options = array('conditions' => array('SubjectsBook.' . $this->SubjectsBook->primaryKey => $id));
        $this->set('subjectsBook', $this->SubjectsBook->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function dvcm_add() {
        if ($this->request->is('post')) {
            $this->SubjectsBook->create();
            if ($this->SubjectsBook->save($this->request->data)) {
                $this->Flash->success(__('Tài liệu học phần được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Tài liệu học phần lưu không thành công, vui lòng thử lại.'));
            }
        }
        $subjects = $this->SubjectsBook->Subject->find('list');
        $books = $this->SubjectsBook->Book->find('list');
        $this->set(compact('subjects', 'books'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function dvcm_edit($id = null) {
        $this->SubjectsBook->id = $id;
        if (!$this->SubjectsBook->exists($id)) {
            throw new NotFoundException(__('Tài liệu học phần không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SubjectsBook->save($this->request->data)) {
                $this->Flash->success(__('Tài liệu học phần đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Tài liệu học phần lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('SubjectsBook.' . $this->SubjectsBook->primaryKey => $id));
            $this->request->data = $this->SubjectsBook->find('first', $options);
        }
        $subjects = $this->SubjectsBook->Subject->find('list');
        $books = $this->SubjectsBook->Book->find('list');
        $this->set(compact('subjects', 'books'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function dvcm_delete($id = null) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->SubjectsBook->deleteAll(array('SubjectsBook.id' => $requestDeleteId))) {
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
        $this->SubjectsBook->id = $id;
        if (!$this->SubjectsBook->exists()) {
            throw new NotFoundException(__('Tài liệu học phần không hợp lệ'));
        }
        if ($this->SubjectsBook->delete()) {
            $this->Flash->success(__('Đã xóa tài liệu học phần thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa tài liệu học phần không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
