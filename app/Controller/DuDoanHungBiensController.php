<?php

App::uses('AppController', 'Controller');

/**
 * DuDoanHungBiens Controller
 *
 * @property DuDoanHungBien $DuDoanHungBien
 * @property PaginatorComponent $Paginator
 */
class DuDoanHungBiensController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

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
//$conditions = Set::merge($conditions, array('DuDoanHungBien.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('duDoanHungBiens', $this->paginate());
        if (!$this->request->is('ajax')) {
            $thiSinhs = $this->DuDoanHungBien->ThiSinh->find('list');
            $this->set(compact('thiSinhs'));
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
        if (!$this->DuDoanHungBien->exists($id)) {
            throw new NotFoundException(__('Invalid du doan hung bien'));
        }
        $options = array('conditions' => array('DuDoanHungBien.' . $this->DuDoanHungBien->primaryKey => $id));
        $this->set('duDoanHungBien', $this->DuDoanHungBien->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add_1() {
        $this->theme = 'Frontend';

        if (!empty($this->request->data)) {
            //$this->autoRender = false;
            try {
                if ($this->DuDoanHungBien->hasAny(array('so_dien_thoai' => $this->request->data['DuDoanHungBien']['so_dien_thoai']))) {
                    $this->Flash->error('Số điện thoại này đã tham gia dự đoán rồi.');
                    //die;
                }
                $this->DuDoanHungBien->create();
                if ($this->DuDoanHungBien->save($this->request->data)) {
                    $this->Flash->success('Cảm ơn bạn đã dự đoán.');
                    //die;
                }
            } catch (Exception $exc) {
                $this->Flash->error('Lỗi máy chủ');
            }
        }
        $thiSinhs = $this->DuDoanHungBien->ThiSinh->find('all', array('conditions'=>array('vao_chung_ket'=>1),'order'=>array('so_bao_danh'=>'ASC')));
        $this->set(compact('thiSinhs'));
    

}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function edit($id = null) {
    $this->DuDoanHungBien->id = $id;
    if (!$this->DuDoanHungBien->exists($id)) {
        throw new NotFoundException(__('Invalid du doan hung bien'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
        if ($this->DuDoanHungBien->save($this->request->data)) {
            $this->Flash->success(__('du doan hung bien đã được lưu'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('du doan hung bien lưu không thành công, vui lòng thử lại.'));
        }
    } else {
        $options = array('conditions' => array('DuDoanHungBien.' . $this->DuDoanHungBien->primaryKey => $id));
        $this->request->data = $this->DuDoanHungBien->find('first', $options);
    }
    $thiSinhs = $this->DuDoanHungBien->ThiSinh->find('list');
    $this->set(compact('thiSinhs'));
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
                if ($this->DuDoanHungBien->deleteAll(array('DuDoanHungBien.id' => $requestDeleteId))) {
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
        $this->DuDoanHungBien->id = $id;
        if (!$this->DuDoanHungBien->exists()) {
            throw new NotFoundException(__('Invalid du doan hung bien'));
        }
        if ($this->DuDoanHungBien->delete()) {
            $this->Flash->success(__('Du doan hung bien đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Du doan hung bien xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
