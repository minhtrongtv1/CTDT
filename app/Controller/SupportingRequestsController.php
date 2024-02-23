<?php

App::uses('AppController', 'Controller');

/**
 * SupportingRequests Controller
 *
 * @property SupportingRequest $SupportingRequest
 * @property PaginatorComponent $Paginator
 */
class SupportingRequestsController extends AppController {
    //public $uses = array('DepartmentSupporter','SupportingRequest');

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
        $conditions = array('requester_id' => $this->Auth->user('id'));
        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('SupportingRequest.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('supportingRequests', $this->paginate());
        if (!$this->request->is('ajax')) {
            $ban_chuyen_trachs = $this->User->getUserIdByGroupId(24);
            $requesters = $this->SupportingRequest->Requester->find('list', array('fields' => array('name_username'), 'order' => array('Requester.first_name' => 'asc')));
            $supporters = $this->SupportingRequest->Supporter->find('list', array('order' => array('Supporter.first_name' => 'asc'), 'conditions' => array('Supporter.id' => $ban_chuyen_trachs)));
            $this->set(compact('requesters', 'supporters'));
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
        if (!$this->SupportingRequest->exists($id)) {
            throw new NotFoundException(__('Invalid supporting request'));
        }
        $options = array('conditions' => array('SupportingRequest.' . $this->SupportingRequest->primaryKey => $id));
        $this->set('supportingRequest', $this->SupportingRequest->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->Flash->error('Đã hết hạn gửi yêu cầu hỗ trợ đánh giá khóa học');
        
        $this->redirect(array('controller'=>'dashboards','action'=>'home'));
        
        if ($this->request->is('post')) {

            $this->request->data['SupportingRequest']['requester_id'] = $this->Auth->user('id');
            $this->request->data['SupportingRequest']['status'] = YEU_CAU_HO_TRO_CHO_XU_LY;

            //Lấy khoa của người gửi yêu cầu
            $this->SupportingRequest->Requester->id = $this->request->data['SupportingRequest']['requester_id'];
            $department_id = $this->SupportingRequest->Requester->field('department_id');
            $this->loadModel('DepartmentSupporter');
            $departments_supporters = $this->DepartmentSupporter->find('all', array('conditions' => array('DepartmentSupporter.department_id' => $department_id), 'recursive' => -1));
            $data = [];
            $success = 0;
            //debug($departments_supporters);die;
            foreach ($departments_supporters as $supporter) {
                $this->SupportingRequest->create();
                $this->request->data['SupportingRequest']['supporter_id'] = $supporter['DepartmentSupporter']['supporter_id'];
                if ($this->SupportingRequest->save($this->request->data)) {
                    $success++;
                }
            }

            if ($success) {
                $this->Flash->success('Yêu cầu đã được gửi thành công. Bán chuyên trách sẽ kiểm tra và xử lý.');
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error('Không gửi được, vui lòng kiểm tra thông tin nhập vào.');
            }
        }
        //$requesters = $this->SupportingRequest->Requester->find('list');
        //$supporters = $this->SupportingRequest->Supporter->find('list');
        //$this->set(compact('requesters', 'supporters'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->SupportingRequest->id = $id;
        if (!$this->SupportingRequest->exists($id)) {
            throw new NotFoundException(__('Invalid supporting request'));
        }

        if ($this->SupportingRequest->field('status') == YEU_CAU_HO_TRO_DA_XU_LY) {
            $this->Flash->error('Yêu cầu đã được xử lý, không thể chỉnh sửa');
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SupportingRequest->save($this->request->data)) {
                $this->Flash->success('Đã cập nhật thành công.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Cập nhật không thành công. Vui lòng kiểm tra lại thông tin nhập vào.');
            }
        } else {
            $options = array('conditions' => array('SupportingRequest.' . $this->SupportingRequest->primaryKey => $id));
            $this->request->data = $this->SupportingRequest->find('first', $options);
        }
        //$requesters = $this->SupportingRequest->Requester->find('list');
        //$supporters = $this->SupportingRequest->Supporter->find('list');
        //$this->set(compact('requesters', 'supporters'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function bct_edit($id = null) {
        $this->SupportingRequest->id = $id;
        if (!$this->SupportingRequest->exists($id)) {
            throw new NotFoundException(__('Invalid supporting request'));
        }



        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->request->data['SupportingRequest']['status'] == YEU_CAU_HO_TRO_DA_XU_LY) {
                $this->request->data['SupportingRequest']['responded_time'] = date('Y-m-d H:i:s');
                $this->request->data['SupportingRequest']['supporter_id'] = $this->Auth->user('id');
            }
            if ($this->SupportingRequest->save($this->request->data)) {
                $this->Flash->success('Đã cập nhật thành công.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Cập nhật không thành công. Vui lòng kiểm tra lại thông tin nhập vào.');
            }
        } else {
            $options = array('conditions' => array('SupportingRequest.' . $this->SupportingRequest->primaryKey => $id));
            $this->request->data = $this->SupportingRequest->find('first', $options);
        }
        $requesters = $this->SupportingRequest->Requester->find('list', array('conditions' => array('Requester.id' => $this->request->data['SupportingRequest']['requester_id'])));
        //$supporters = $this->SupportingRequest->Supporter->find('list');
        $this->set(compact('requesters'));
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
                if ($this->SupportingRequest->deleteAll(array('SupportingRequest.id' => $requestDeleteId))) {
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
        $this->SupportingRequest->id = $id;
        if (!$this->SupportingRequest->exists()) {
            throw new NotFoundException(__('Invalid supporting request'));
        }
        if ($this->SupportingRequest->delete()) {
            $this->Flash->success(__('Supporting request đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Supporting request xóa không thành công'));
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
        if (!empty($this->request->data['SupportingRequest']['requester_id'])) {
            $conditions = Hash::merge($conditions, array('SupportingRequest.requester_id' => $this->request->data['SupportingRequest']['requester_id']));
        }
        if (!empty($this->request->data['SupportingRequest']['supporter_id'])) {
            $conditions = Hash::merge($conditions, array('SupportingRequest.supporter_id' => $this->request->data['SupportingRequest']['supporter_id']));
        }
        
        if (!empty($this->request->data['SupportingRequest']['status'])) {
            $conditions = Hash::merge($conditions, array('SupportingRequest.status' => $this->request->data['SupportingRequest']['status']));
        }
        
        if (!empty($this->request->data['SupportingRequest']['approved'])) {
             if ($this->request->data['SupportingRequest']['approved']=='K')
            $conditions = Hash::merge($conditions, array('SupportingRequest.approved' => 0));
        }
        
        if (!empty($this->request->data['SupportingRequest']['approved'])) {
             if ($this->request->data['SupportingRequest']['approved']=='Y')
            $conditions = Hash::merge($conditions, array('SupportingRequest.approved' => 1));
        }
        
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('supportingRequests', $this->paginate());
        if (!$this->request->is('ajax')) {

            $role_bct = $this->User->getUserIdByGroupId(24);
            $requesters = $this->SupportingRequest->Requester->find('list');
            $supporters = $this->SupportingRequest->Supporter->find('list', array('conditions' => array('Supporter.id' => $role_bct), 'order' => array('Supporter.first_name' => 'ASC')));
            $this->set(compact('requesters', 'supporters'));
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function bct_index() {

        $this->loadModel('DepartmentSupporter');

        $departments_supporters = $this->DepartmentSupporter->find('all', array('conditions' => array('DepartmentSupporter.supporter_id' => $this->Auth->user('id')), 'recursive' => -1));

        $requesters = $this->SupportingRequest->Requester->find('all', array('conditions' => array('Requester.department_id' => Hash::extract($departments_supporters, '{n}.DepartmentSupporter.department_id'))));
//print_r($requesters);
        $conditions = array('SupportingRequest.requester_id' => Hash::extract($requesters, '{n}.Requester.id'));
        $contain = array();
        $order = array();
        if (!empty($this->request->data['SupportingRequest']['requester_id'])) {
            $conditions = Hash::merge($conditions, array('SupportingRequest.requester_id' => ($this->request->data['SupportingRequest']['requester_id'])));
        }

        if (!empty($this->request->data['SupportingRequest']['status'])) {
            $conditions = Hash::merge($conditions, array('SupportingRequest.status' => $this->request->data['SupportingRequest']['status']));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('supportingRequests', $this->paginate());
        if (!$this->request->is('ajax')) {
            //$this->loadModel('DepartmentSupporter');
            //$departments_supporters = $this->DepartmentSupporter->find('all', array('conditions' => array('DepartmentSupporter.supporter_id' => $this->Auth->user('id')), 'recursive' => -1));

            $requesters = $this->SupportingRequest->Requester->find('list', array('conditions' => array('Requester.department_id' => Hash::extract($departments_supporters, '{n}.DepartmentSupporter.department_id'))));

            $this->set(compact('requesters'));
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
        if (!$this->SupportingRequest->exists($id)) {
            throw new NotFoundException(__('Invalid supporting request'));
        }
        $options = array('conditions' => array('SupportingRequest.' . $this->SupportingRequest->primaryKey => $id));
        $this->set('supportingRequest', $this->SupportingRequest->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->SupportingRequest->create();
            $this->request->data['SupportingRequest']['requester_id'] = $this->Auth->user('id');
            $this->request->data['SupportingRequest']['status'] = YEU_CAU_HO_TRO_CHO_XU_LY;
            if ($this->SupportingRequest->save($this->request->data)) {
                $this->Flash->success(__('The supporting request has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The supporting request could not be saved. Please, try again.'));
            }
        }
        $requesters = $this->SupportingRequest->Requester->find('list');
        $supporters = $this->SupportingRequest->Supporter->find('list');
        $this->set(compact('requesters', 'supporters'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->SupportingRequest->id = $id;
        if (!$this->SupportingRequest->exists($id)) {
            throw new NotFoundException(__('Invalid supporting request'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SupportingRequest->save($this->request->data)) {
                $this->Flash->success(__('supporting request đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('supporting request lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('SupportingRequest.' . $this->SupportingRequest->primaryKey => $id));
            $this->request->data = $this->SupportingRequest->find('first', $options);
        }
        $requesters = $this->SupportingRequest->Requester->find('list');
        $supporters = $this->SupportingRequest->Supporter->find('list');
        $this->set(compact('requesters', 'supporters'));
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
                if ($this->SupportingRequest->deleteAll(array('SupportingRequest.id' => $requestDeleteId))) {
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
        $this->SupportingRequest->id = $id;
        if (!$this->SupportingRequest->exists()) {
            throw new NotFoundException(__('Invalid supporting request'));
        }
        if ($this->SupportingRequest->delete()) {
            $this->Flash->success(__('Supporting request đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Supporting request xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
