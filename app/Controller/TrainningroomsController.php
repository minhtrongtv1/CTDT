<?php

App::uses('AppController', 'Controller');

/**
 * Trainningrooms Controller
 *
 * @property Trainningroom $Trainningroom
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TrainningroomsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

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
//$conditions = Set::merge($conditions, array('Trainningroom.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('trainningrooms', $this->paginate());
        if (!$this->request->is('ajax')) {
            $levels = $this->Trainningroom->Level->find('list');
            $departments = $this->Trainningroom->Department->find('list');
            $majors = $this->Trainningroom->Major->find('list');
            $formOfTrainnings = $this->Trainningroom->FormOfTrainning->find('list');
            $diplomas = $this->Trainningroom->Diploma->find('list');
            $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas'));
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
        if (!$this->Trainningroom->exists($id)) {
            throw new NotFoundException(__('Invalid trainningroom'));
        }
        $options = array('conditions' => array('Trainningroom.' . $this->Trainningroom->primaryKey => $id));
        $this->set('trainningroom', $this->Trainningroom->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Trainningroom->create();
            if ($this->Trainningroom->save($this->request->data)) {
                $this->Flash->success(__('The trainningroom has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The trainningroom could not be saved. Please, try again.'));
            }
        }
        $levels = $this->Trainningroom->Level->find('list');
        $departments = $this->Trainningroom->Department->find('list');
        $majors = $this->Trainningroom->Major->find('list');
        $formOfTrainnings = $this->Trainningroom->FormOfTrainning->find('list');
        $diplomas = $this->Trainningroom->Diploma->find('list');
        $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Trainningroom->id = $id;
        if (!$this->Trainningroom->exists($id)) {
            throw new NotFoundException(__('Invalid trainningroom'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Trainningroom->save($this->request->data)) {
                $this->Flash->success(__('trainningroom đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('trainningroom lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Trainningroom.' . $this->Trainningroom->primaryKey => $id));
            $this->request->data = $this->Trainningroom->find('first', $options);
        }
        $levels = $this->Trainningroom->Level->find('list');
        $departments = $this->Trainningroom->Department->find('list');
        $majors = $this->Trainningroom->Major->find('list');
        $formOfTrainnings = $this->Trainningroom->FormOfTrainning->find('list');
        $diplomas = $this->Trainningroom->Diploma->find('list');
        $this->set(compact('levels', 'departments', 'majors', 'formOfTrainnings', 'diplomas'));
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
                if ($this->Trainningroom->deleteAll(array('Trainningroom.id' => $requestDeleteId))) {
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
        $this->Trainningroom->id = $id;
        if (!$this->Trainningroom->exists()) {
            throw new NotFoundException(__('Invalid trainningroom'));
        }
        if ($this->Trainningroom->delete()) {
            $this->Flash->success(__('Trainningroom đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Trainningroom xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
