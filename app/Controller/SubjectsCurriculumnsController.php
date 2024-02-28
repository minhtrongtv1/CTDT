<?php

App::uses('AppController', 'Controller');

/**
 * SubjectsCurriculumns Controller
 *
 * @property SubjectsCurriculumn $SubjectsCurriculumn
 * @property PaginatorComponent $Paginator
 */
class SubjectsCurriculumnsController extends AppController {

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
        $order = array('SubjectsCurriculumn.curriculumn_id' => 'ASC');
        if (!empty($this->request->data['SubjectsCurriculumn']['curriculumn_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsCurriculumn.curriculumn_id like' => '%' . trim($this->request->data['SubjectsCurriculumn']['curriculumn_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsCurriculumn']['subject_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsCurriculumn.subject_id like' => '%' . trim($this->request->data['SubjectsCurriculumn']['subject_id']) . '%'));
        }
        if (!empty($this->request->data['SubjectsCurriculumn']['knowledge_id'])) {
            $conditions = Hash::merge($conditions, array('SubjectsCurriculumn.knowledge_id like' => '%' . trim($this->request->data['SubjectsCurriculumn']['knowledge_id']) . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('subjectsCurriculumns', $this->paginate());
        if (!$this->request->is('ajax')) {
            $curriculumns = $this->SubjectsCurriculumn->Curriculumn->find('list');
            $subjects = $this->SubjectsCurriculumn->Subject->find('list');
            $knowledges = $this->SubjectsCurriculumn->Knowledge->find('list');
            $this->set(compact('curriculumns', 'subjects', 'knowledges'));
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
        if (!$this->SubjectsCurriculumn->exists($id)) {
            throw new NotFoundException(__('Học phần chương trình đào tạo không hợp lệ'));
        }
        $options = array('conditions' => array('SubjectsCurriculumn.' . $this->SubjectsCurriculumn->primaryKey => $id));
        $this->set('subjectsCurriculumn', $this->SubjectsCurriculumn->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->SubjectsCurriculumn->create();
            if ($this->SubjectsCurriculumn->save($this->request->data)) {
                $this->Flash->success(__('Học phần chương trình đào tạo được lưu thành công'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('Học phần chương trình đào tạo lưu không thành công, vui lòng thử lại.'));
            }
        }
        $curriculumns = $this->SubjectsCurriculumn->Curriculumn->find('list');
        $subjects = $this->SubjectsCurriculumn->Subject->find('list');
        $knowledges = $this->SubjectsCurriculumn->Knowledge->find('list');
        $this->set(compact('curriculumns', 'subjects', 'knowledges'));
    }
    

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->SubjectsCurriculumn->id = $id;
        if (!$this->SubjectsCurriculumn->exists($id)) {
            throw new NotFoundException(__('Học phần chương trình đào tạo không hợp lệ'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SubjectsCurriculumn->save($this->request->data)) {
                $this->Flash->success(__('Học phần chương trình đào tạo đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Học phần chương trình đào tạo lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('SubjectsCurriculumn.' . $this->SubjectsCurriculumn->primaryKey => $id));
            $this->request->data = $this->SubjectsCurriculumn->find('first', $options);
        }
        $curriculumns = $this->SubjectsCurriculumn->Curriculumn->find('list');
        $subjects = $this->SubjectsCurriculumn->Subject->find('list');
        $knowledges = $this->SubjectsCurriculumn->Knowledge->find('list');
        $this->set(compact('curriculumns', 'subjects', 'knowledges'));
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
                if ($this->SubjectsCurriculumn->deleteAll(array('SubjectsCurriculumn.id' => $requestDeleteId))) {
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
        $this->SubjectsCurriculumn->id = $id;
        if (!$this->SubjectsCurriculumn->exists()) {
            throw new NotFoundException(__('Học phần chương trình đào tạo không hợp lệ'));
        }
        if ($this->SubjectsCurriculumn->delete()) {
            $this->Flash->success(__('Đã xóa học phần chương trình đào tạo thành công'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Xóa học phần chương trình đào tạo không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
