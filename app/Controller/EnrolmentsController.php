<?php

App::uses('AppController', 'Controller');

/**
 * Enrolments Controller
 *
 * @property Enrolment $Enrolment
 * @property PaginatorComponent $Paginator
 */
class EnrolmentsController extends AppController {

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
//$conditions = Set::merge($conditions, array('Enrolment.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('enrolments', $this->paginate());
        if (!$this->request->is('ajax')) {
            $workshops = $this->Enrolment->Workshop->find('list');
            $teachers = $this->Enrolment->Teacher->find('list');
            $this->set(compact('workshops', 'teachers'));
        }
    }

    public function khcn_index() {
        $conditions = array('Enrolment.result' => 1);
        $contain = array('Workshop', 'Teacher' => array('Department'));
        $order = array();
        if (!empty($this->request->data['Enrolment']['workshop_id'])) {
            $conditions = Hash::merge($conditions, array('Enrolment.workshop_id' => $this->request->data['Enrolment']['workshop_id']));
        }

        if (!empty($this->request->data['Enrolment']['teacher_id'])) {
            $conditions = Hash::merge($conditions, array('Enrolment.teacher_id' => $this->request->data['Enrolment']['teacher_id']));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order, 'limit' => 100000);
        #$this->Paginator->settings = $settings;
        //$this->set('enrolments', $this->paginate());


        $this->set('enrolments', $this->Enrolment->find('all', $settings));

        if (!$this->request->is('ajax')) {
            $workshops = $this->Enrolment->Workshop->find('list');
            $teachers = $this->Enrolment->Teacher->find('list');
            $this->set(compact('workshops', 'teachers'));
        }
    }

    public function khcn_all() {
        $conditions = array('Enrolment.result' => 1);
        $contain = array();
        $order = array();
        if (!empty($this->request->data['Enrolment']['workshop_id'])) {
            $conditions = Hash::merge($conditions, array('Enrolment.workshop_id' => $this->request->data['Enrolment']['workshop_id']));
        }

        if (!empty($this->request->data['Enrolment']['teacher_id'])) {
            $conditions = Hash::merge($conditions, array('Enrolment.teacher_id' => $this->request->data['Enrolment']['teacher_id']));
        }

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order, 'limit' => 1000);
        $this->Paginator->settings = $settings;

        $this->set('enrolments', $this->Enrolment->find('all', $settings));
        if (!$this->request->is('ajax')) {
            $workshops = $this->Enrolment->Workshop->find('list');
            $teachers = $this->Enrolment->Teacher->find('list');
            $this->set(compact('workshops', 'teachers'));
        }
    }

    public function celri_index() {
        $conditions = array('Enrolment.result' => 1);
        $contain = array();
        $order = array();
        if (!empty($this->request->data['Enrolment']['workshop_id'])) {
            $conditions = Hash::merge($conditions, array('Enrolment.workshop_id' => $this->request->data['Enrolment']['workshop_id']));
        }

        if (!empty($this->request->data['Enrolment']['teacher_id'])) {
            $conditions = Hash::merge($conditions, array('Enrolment.teacher_id' => $this->request->data['Enrolment']['teacher_id']));
        }

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('enrolments', $this->paginate());
        if (!$this->request->is('ajax')) {
            $workshops = $this->Enrolment->Workshop->find('list');
            $teachers = $this->Enrolment->Teacher->find('list');
            $this->set(compact('workshops', 'teachers'));
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
        if (!$this->Enrolment->exists($id)) {
            throw new NotFoundException(__('Invalid enrolment'));
        }
        $options = array('conditions' => array('Enrolment.' . $this->Enrolment->primaryKey => $id));
        $this->set('enrolment', $this->Enrolment->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($workshop_id = null) {

        if ($this->request->is('post')) {
            debug($this->request->data);
            die;
            $this->Enrolment->create();
            if ($this->Enrolment->save($this->request->data, false)) {
                $this->Flash->success('Đã thêm học viên.');
                if ($workshop_id) {
                    $this->redirect(array('teacher' => true, 'action' => 'ket_qua'));
                } else {
                    $this->redirect(array('teacher' => true, 'action' => 'i_train'));
                }
            } else {

                $this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
            }
        }
        $enrolments = array();
        if ($workshop_id) {

            $workshops = $this->Enrolment->Workshop->find('list', array('conditions' => array('id' => $workshop_id)));
            $enrolments = $this->Enrolment->find('all', array('recursive' => -1, 'conditions' => array('workshop_id' => $workshop_id), 'fields' => array('id', 'teacher_id')));
        } else {
            $workshops = $this->Enrolment->Workshop->find('list');
        }

        $teachers = $this->Enrolment->Teacher->find('list', array('conditions' => array('NOT' => array('id' => Hash::extract($enrolments, '{n}.Enrolment.teacher_id')))));
        $this->set(compact('workshops', 'teachers'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function teacher_add($workshop_id = null) {

        if ($this->request->is('post')) {

            $this->Enrolment->create();
            if ($this->Enrolment->save($this->request->data, false)) {
                $this->Flash->success('Đã thêm học viên.');
                if ($workshop_id) {
                    $this->redirect(array('teacher' => true, 'action' => 'ket_qua', $workshop_id));
                } else {
                    $this->redirect(array('teacher' => true, 'action' => 'i_train'));
                }
            } else {

                $this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
            }
        }
        $enrolments = array();
        if ($workshop_id) {

            $workshops = $this->Enrolment->Workshop->find('list', array('conditions' => array('id' => $workshop_id)));
            $enrolments = $this->Enrolment->find('all', array('recursive' => -1, 'conditions' => array('workshop_id' => $workshop_id), 'fields' => array('id', 'teacher_id')));
        } else {
            $workshops = $this->Enrolment->Workshop->find('list');
        }

        //$teachers = $this->Enrolment->Teacher->find('list',array('conditions'=>array('NOT'=>array('id'=>Hash::extract($enrolments,'{n}.Enrolment.teacher_id')))));
        $teachers = $this->Enrolment->Teacher->find('list');
        $this->set(compact('workshops', 'teachers'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Enrolment->create();
            if ($this->Enrolment->save($this->request->data)) {
                $this->Flash->success(__('The enrolment has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
            }
        }
        $workshops = $this->Enrolment->Workshop->find('list');
        $teachers = $this->Enrolment->Teacher->find('list');
        $this->set(compact('workshops', 'teachers'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Enrolment->id = $id;
        if (!$this->Enrolment->exists($id)) {
            throw new NotFoundException(__('Invalid enrolment'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Enrolment->save($this->request->data)) {
                $this->Flash->success(__('enrolment đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('enrolment lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Enrolment.' . $this->Enrolment->primaryKey => $id));
            $this->request->data = $this->Enrolment->find('first', $options);
        }
        $workshops = $this->Enrolment->Workshop->find('list');
        $teachers = $this->Enrolment->Teacher->find('list');
        $this->set(compact('workshops', 'teachers'));
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
                if ($this->Enrolment->deleteAll(array('Enrolment.id' => $requestDeleteId))) {
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
        $this->Enrolment->id = $id;
        if (!$this->Enrolment->exists()) {
            throw new NotFoundException(__('Invalid enrolment'));
        }
        if ($this->Enrolment->delete()) {
            $this->Flash->success(__('Enrolment đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Enrolment xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function cap_nhat_ket_qua($ket_qua) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Hash::extract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->Enrolment->updateAll(array('result' => $ket_qua), array('Enrolment.id' => $requestDeleteId))) {
                    echo json_encode($requestDeleteId);
                } else {
                    echo json_encode(array());
                }
            }
        }
    }

    public function admin_index() {
        $conditions = array();
        $contain = array();
        $order = array();
        if (!empty($this->request->data['Enrolment']['workshop_id'])) {
            $conditions = Hash::merge($conditions, array('Enrolment.workshop_id' => $this->request->data['Enrolment']['workshop_id']));
        }

        if (!empty($this->request->data['Enrolment']['teacher_id'])) {
            $conditions = Hash::merge($conditions, array('Enrolment.teacher_id' => $this->request->data['Enrolment']['teacher_id']));
        }

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('enrolments', $this->paginate());
        if (!$this->request->is('ajax')) {
            $workshops = $this->Enrolment->Workshop->find('list');
            $teachers = $this->Enrolment->Teacher->find('list');
            $this->set(compact('workshops', 'teachers'));
        }
    }

    /* HÃ m hiá»‡n thá»‹ trang cáº­p nháº­t káº¿t quáº£ */

    public function teacher_ket_qua($ws_id) {
        $workshop_id = $ws_id;
        //Configure::write('debug',2);
        $this->Enrolment->Workshop->id = $ws_id;
        if (!$this->Enrolment->Workshop->exists()) {
            throw new Exception('Không tìm thấy khóa học');
        } else {
            if (!$this->Enrolment->Workshop->Intrustor->hasAny(array('workshop_id' => $ws_id, 'user_id' => $this->Auth->user('id')))) {
                throw new Exception('Bạn không được đánh giá khóa học do người khác tập huấn.');
            }
        }
        $workshop = $this->Enrolment->Workshop->find('first', array(
            'conditions' => array('Workshop.id' => $ws_id),
            'contain' => array('Enrolment' => array('Teacher' => array('fields' => array('Teacher.name', 'Teacher.email')))))
        );
        $this->set('workshop', $workshop);
        $workshop_name = $this->Enrolment->Workshop->field('name');

        $contain = array('Teacher');

        $conditions = array('Enrolment.workshop_id' => $ws_id);

        //debug($conditions);
        //Configure::write('debug', 2);
        $enrollments = $this->Enrolment->find('all', array(
            'contain' => $contain,
            'conditions' => $conditions
        ));

        $this->set(compact('enrollments', 'workshop_id', 'workshop_name'));
    }

    public function teacher_danh_dau_dat() {

        $this->autoRender = false;

        if (!empty($this->request->data['id'])) {
            $data = $this->request->data['id'];
        }


        try {
            /* Thuc hien update */

            //lap qua tung id
            foreach ($data as $key => $enrollment_id) {

                $this->Enrolment->id = $enrollment_id['value'];
                if ($this->Enrolment->save(array(
                            'id' => $enrollment_id['value'],
                            'result' => 1,
                            'vang_khong_phep' => NULL,
                            'vang_co_phep' => NULL,
                            'ly_do_vang' => NULL
                                ), false)) {
                    echo "Đã lưu";
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function teacher_danh_dau_khong_dat() {
        $this->autoRender = false;

        if (!empty($this->request->data['id'])) {
            $data = $this->request->data['id'];
        }
        try {
            /* Thuc hien update */

            //lap qua tung id
            foreach ($data as $key => $enrollment_id) {

                $this->Enrolment->id = $enrollment_id['value'];
                if ($this->Enrolment->save(array(
                            'id' => $enrollment_id['value'],
                            'result' => 0,
                            'so_qd' => NULL,
                            'ngay_qd' => NULL
                                ), false)) {
                    echo "Đã lưu";
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function teacher_khoi_phuc_ket_qua() {


        $this->autoRender = false;

        if (!empty($this->request->data['id'])) {
            $data = $this->request->data['id'];
        }
        try {
            /* Thuc hien update */

            //lap qua tung id
            foreach ($data as $key => $enrollment_id) {

                $this->Enrolment->id = $enrollment_id['value'];

                if ($this->Enrolment->save(array(
                            'id' => $enrollment_id['value'],
                            'result' => NULL,
                            'vang_khong_phep' => NULL,
                            'vang_co_phep' => NULL,
                            'ly_do_vang' => NULL,
                            'so_qd' => NULL,
                            'ngay_qd' => NULL
                                ), false)) {
                    echo "Đã lưu";
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function teacher_danh_dau_vang_co_phep() {
        $this->autoRender = false;

        if (!empty($this->request->data['id'])) {
            $id = $this->request->data['id'];
        }

        if (!empty($this->request->data['ly_do_vang'])) {
            $ly_do_vang = $this->request->data['ly_do_vang'];
        } else {
            throw Exception('Bạn phải nhập lý do vắng');
        }
        //Update cÃ¡c dÃ²ng cÃ³ tráº¡ng thÃ¡i Ä‘Ã£ há»§y
        try {
            /* Thuc hien update */
            //Configure::write('debug',2);
            $data = array('id' => $id, 'vang_co_phep' => 1, 'ly_do_vang' => $ly_do_vang, 'result' => 0);

            $this->Enrolment->save($data, false);
            ///$this->Enrollment->updateAll(array('Enrollment.absence' => 0), array('NOT' => array('Enrollment.id' => $id), 'Enrollment.course_id' => $course_id));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function teacher_danh_dau_vang_khong_phep() {
        $this->autoRender = false;

        if (!empty($this->request->data['id'])) {
            $data = $this->request->data['id'];
        }
        try {
            /* Thuc hien update */

            //lap qua tung id
            foreach ($data as $key => $enrollment_id) {

                $this->Enrolment->id = $enrollment_id['value'];
                if ($this->Enrolment->save(array(
                            'id' => $enrollment_id['value'],
                            'result' => 0,
                            'vang_khong_phep' => 1,
                            'vang_co_phep' => NULL,
                            'ly_do_vang' => NULL
                                ), false)) {
                    echo "Đã lưu";
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function teacher_cap_nhat_qd() {
        $this->autoRender = false;
        $so_qd = NULL;
        $ngay_qd = NULL;
        $link_file_qd = NULL;
        $error = false;

        $update_data = array();
        if (!empty(trim($this->request->data['so_qd']))) {
            $so_qd = $this->request->data['so_qd'];
            $update_data['so_qd'] = "'" . $so_qd."'" ;
        }

        if (!empty(trim($this->request->data['link_file_qd']))) {
            $link_file_qd = ($this->request->data['link_file_qd']);
            $update_data['link_file_qd'] = "'" . $link_file_qd . "'";
        }

        if (!empty(trim($this->request->data['ngay_qd']))) {
            $ngay_qd = \DateTime::createFromFormat('d/m/Y', $this->request->data['ngay_qd']);

            if (!$ngay_qd) {
                $error = true;
                $msg = 'Vui lòng nhập ngày dạng dd/mm/yyyy';
                echo json_encode(array('error' => $error, 'msg' => $msg));
                return false;
            }
            $update_data['ngay_qd'] = "'" . $ngay_qd->format('Y-m-d'). "'";
        }


        if (!empty($this->request->data['id'])) {
            $data = $this->request->data['id'];
        }

        if ($error) {
            echo json_encode(array('error' => $error, 'msg' => $msg));
            return false;
        }

        try {
            $ids = Hash::extract($data, '{n}.value');

            $this->Enrolment->updateAll($update_data, array('Enrolment.id' => $ids, 'result' => 1));
        } catch (Exception $exc) {
            echo json_encode(array('error' => true, 'msg' => $exc->getMessage()));
        }
    }

}
