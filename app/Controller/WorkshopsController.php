<?php

App::uses('AppController', 'Controller');

/**
 * Workshops Controller
 *
 * @property Workshop $Workshop
 * @property PaginatorComponent $Paginator
 */
class WorkshopsController extends AppController {

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
    public function teacher_index() {


        $intrustors = $this->Workshop->Intrustor->find('all', array('conditions' => array(
                'Intrustor.user_id' => $this->Auth->user('id')
            ), 'recursive' => -1));

        $conditions = array('Workshop.status' => WORKSHOP_DANG_DANG_KY, 'NOT' => array('Workshop.id' => Hash::extract($intrustors, '{n}.Intrustor.workshop_id')));
        $contain = array('Scheduling', 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));
        $order = array('Workshop.start_date' => 'ASC');
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Workshop.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('workshops', $this->paginate());
        if (!$this->request->is('ajax')) {
            $chapters = $this->Workshop->Chapter->find('list');
            $this->set(compact('chapters'));
        }
        $enrolments = $this->Workshop->Enrolment->find('all', array('recursive' => -1, 'conditions' => array('teacher_id' => $this->Auth->user('id'))));
        $this->set('enrolments', Hash::extract($enrolments, '{n}.Enrolment.workshop_id'));
    }

    public function dang_ky($workshop_id) {
        $this->Workshop->id = $workshop_id;

        if (!$this->Workshop->exists()) {
            throw new Exception('Không tồn tại khóa tập huấn');
        }
        //debug(Hash::extract($periods,'{n}.Room.si_so'));die;
        $siso = $this->Workshop->field('so_luong_dang_ky_toi_da');
        $da_dk = $this->Workshop->field('enrolledno');
        $course_name = $this->Workshop->field('name');
        $studentid = $this->Auth->user('id');

        if ($siso < $da_dk + 1) {
            $this->Flash->error('Lớp đã hết chỗ trống');
            $this->redirect(array('teacher' => true, 'action' => 'index'));
        }

        //Ki&#7875;m tra &#273;� &#273;&#259;ng k� ch&#432;a
        $da_dang_ky = $this->Workshop->Enrolment->find('count', array('conditions' => array(
                'Enrolment.teacher_id' => $studentid,
                'Enrolment.workshop_id' => $workshop_id,
                'Enrolment.result is null',
                'Enrolment.vang_co_phep is null',
                'Enrolment.vang_khong_phep is null'
            )
        ));
        if ($da_dang_ky) {
            $this->Flash->error('Bạn đã đăng ký kỹ năng này rồi');
            $this->redirect(array('action' => 'index'));
        }

        //L&#432;u d&#7919; li&#7879;u &#273;&#259;ng k�
        $data = array('workshop_id' => $workshop_id, 'teacher_id' => $studentid, 'result' => NULL);

        $this->Workshop->Enrolment->create();
        if ($this->Workshop->Enrolment->save($data)) {

            $this->Flash->success('Đăng ký thành công');
            $this->redirect(array('controller' => 'workshops', 'action' => 'my', 'teacher' => false));
        } else {
            $this->Flash->error('Đăng ký KHÔNG thành công');
            $this->redirect(array('action' => 'index', 'student' => true));
        }
    }

    public function huy_dang_ky($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Workshop->id = $id;
        if (!$this->Workshop->exists()) {
            throw new Exception('Không tồn tại khóa tập huấn');
        }

        if ($this->Workshop->field('status') != WORKSHOP_DANG_DANG_KY) {
            $this->Flash->error('Khóa này không thể hủy đăng ký. Do đã được mở hoặc hủy. Hãy liên hệ TLC để được trợ giúp');
            $this->redirect(array('controller' => 'workshops', 'action' => 'my', 'teacher' => false));
        }
        if ($this->Workshop->Enrolment->hasAny(array('workshop_id' => $id, 'teacher_id' => $this->Auth->user('id')))) {
            $enrolment = $this->Workshop->Enrolment->find('first', array('recursive' => -1, 'conditions' => array('workshop_id' => $id, 'teacher_id' => $this->Auth->user('id'))));
            $this->Workshop->Enrolment->id = $enrolment['Enrolment']['id'];
            if ($this->Workshop->Enrolment->delete()) {
                $this->Flash->success('Đã hủy thành công');
                $this->redirect(array('controller' => 'workshops', 'action' => 'my', 'teacher' => false));
            } else {
                $this->Flash->error('Hủy không thành công');
                $this->redirect(array('controller' => 'workshops', 'action' => 'my', 'teacher' => false));
            }
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function i_train() {



        $intrustors = $this->Workshop->Intrustor->find('all', array('conditions' => array(
                'Intrustor.user_id' => $this->Auth->user('id')
            ), 'recursive' => -1));

        $conditions = array('Workshop.id' => Hash::extract($intrustors, '{n}.Intrustor.workshop_id'));
        $contain = array('Scheduling', 'Enrolment' => array('conditions' => array('teacher_id' => $this->Auth->user('id'))), 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));
        $order = array('Workshop.start_date' => 'DESC');

        if (!empty($this->request->data['Workshop']['name'])) {
            $conditions = Hash::merge($conditions, array('Workshop.name like' => "%" . $this->request->data['Workshop']['name'] . "%"));
        }

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('workshops', $this->paginate());

        if (!$this->request->is('ajax')) {
            $chapters = $this->Workshop->Chapter->find('list');
            $this->set(compact('chapters'));
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function my() {

        $enrolments = $this->Workshop->Enrolment->find('all', array('conditions' => array(
                'Enrolment.teacher_id' => $this->Auth->user('id')
            ), 'recursive' => -1));

        $conditions = array('Workshop.id' => Hash::extract($enrolments, '{n}.Enrolment.workshop_id'));
        $contain = array('Scheduling', 'Enrolment' => array('conditions' => array('teacher_id' => $this->Auth->user('id'))), 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Workshop.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('workshops', $this->paginate());

        if (!$this->request->is('ajax')) {
            $chapters = $this->Workshop->Chapter->find('list');
            $this->set(compact('chapters'));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Workshop->create();
            if ($this->Workshop->save($this->request->data)) {
                $this->Flash->success(__('The workshop has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The workshop could not be saved. Please, try again.'));
            }
        }
        $chapters = $this->Workshop->Chapter->find('list');
        $this->set(compact('chapters'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Workshop->id = $id;
        if (!$this->Workshop->exists($id)) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Workshop->save($this->request->data)) {
                $this->Flash->success(__('workshop đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('workshop lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id));
            $this->request->data = $this->Workshop->find('first', $options);
        }
        $chapters = $this->Workshop->Chapter->find('list');
        $this->set(compact('chapters'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function copy($id = null) {
        $this->Workshop->id = $id;
        if (!$this->Workshop->exists($id)) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Workshop->id = false;
            $this->Workshop->create();
            if ($this->Workshop->save($this->request->data)) {
                $this->Flash->success(__('workshop đã sao chép thành công'));
                $this->redirect(array('admin' => true, 'action' => 'view', $this->Workshop->id));
            } else {
                $this->Flash->error(__('workshop đã sao chép không thành công'));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id));
            $this->request->data = $this->Workshop->find('first', $options);
        }
        $chapters = $this->Workshop->Chapter->find('list');
        $this->set(compact('chapters'));
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
                if ($this->Workshop->deleteAll(array('Workshop.id' => $requestDeleteId))) {
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
        $this->Workshop->id = $id;
        if (!$this->Workshop->exists()) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        if ($this->Workshop->delete()) {
            $this->Flash->success(__('Workshop đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Workshop xóa không thành công'));
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
        $contain = array('Scheduling', 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));

        $order = array('created' => 'DESC');
        if (!empty($this->request->data['Workshop']['chapter_id'])) {
            $conditions = Hash::merge($conditions, array('Workshop.chapter_id' => $this->request->data['Workshop']['chapter_id']));
        }

        if (!empty($this->request->data['Workshop']['status'])) {
            $conditions = Hash::merge($conditions, array('Workshop.status' => $this->request->data['Workshop']['status']));
        }

        if (!empty($this->request->data['Workshop']['name'])) {
            $conditions = Hash::merge($conditions, array('Workshop.name like' => "%" . $this->request->data['Workshop']['name'] . "%"));
        }

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);

        $ws_sum = $this->Workshop->find('all', array('recursive' => -1, 'fields' => array('Workshop.id', 'Workshop.enrolledno'), 'conditions' => $conditions));
        $values = Hash::extract($ws_sum, '{n}.Workshop.enrolledno');
        $sum = array_sum($values);

        $this->Paginator->settings = $settings;
        $this->set('so_luong_hoc_vien', $sum);
        $this->set('workshops', $this->paginate());
        if (!$this->request->is('ajax')) {
            $chapters = $this->Workshop->Chapter->find('list', array('order' => array('name' => 'ASC')));
            $this->set(compact('chapters'));
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function celri_index() {
        $conditions = array('Workshop.status'=>2);
        $contain = array('Scheduling', 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));

        $order = array('Workshop.start_date' => 'DESC');

        if (!empty($this->request->data['Workshop']['name'])) {
            $conditions = Hash::merge($conditions, array('Workshop.name like' => '%' . $this->request->data['Workshop']['name'] . '%'));
        }

        if (!empty($this->request->data['Workshop']['field_id'])) {

            $chapters = $this->Workshop->Chapter->find('all', array('recursive' => -1, 'fields' => array('id'), 'conditions' => array('field_id' => $this->request->data['Workshop']['field_id'])));
            $conditions = Hash::merge($conditions, array('Workshop.chapter_id' => Hash::extract($chapters, '{n}.Chapter.id')));
        }


        if (!empty($this->request->data['Workshop']['chapter_id'])) {
            $conditions = Hash::merge($conditions, array('Workshop.chapter_id' => $this->request->data['Workshop']['chapter_id']));
        }

        if (!empty($this->request->data['Workshop']['from'])) {
            $conditions = Hash::merge($conditions, array('Workshop.start_date >=' => $this->request->data['Workshop']['from']));
        }


        if (!empty($this->request->data['Workshop']['to'])) {
            $conditions = Hash::merge($conditions, array('Workshop.start_date <=' => $this->request->data['Workshop']['to']));
        }

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $tong_so_luot = 0;
        $all_workshops = $this->Workshop->find('all', array('conditions' => $conditions, 'fields' => array('enrolledno'), 'recursive' => -1));
        foreach ($all_workshops as $ws) {
            $tong_so_luot += $ws['Workshop']['enrolledno'];
        }
        $this->set('tong_so_luot', $tong_so_luot);
        $this->Paginator->settings = $settings;

        $this->set('workshops', $this->paginate());
        if (!$this->request->is('ajax')) {
            $chapters = $this->Workshop->Chapter->find('list', array('order' => array('Chapter.name' => 'ASC')));
            $fields = $this->Workshop->Chapter->Field->find('list');
            $this->set(compact('chapters', 'fields'));
        }
    }

    public function khcn_index() {
        $conditions = array();
        $contain = array('Scheduling', 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));

        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Workshop.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('workshops', $this->paginate());
        if (!$this->request->is('ajax')) {
            $chapters = $this->Workshop->Chapter->find('list');
            $this->set(compact('chapters'));
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

        $contain = array('Enrolment' => array('Teacher' => array('NoiSinh', 'fields' => array('name', 'id', 'ngay_sinh', 'email'))), 'Scheduling', 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));

        if (!$this->Workshop->exists($id)) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        $options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id), 'contain' => $contain);
        $this->set('workshop', $this->Workshop->find('first', $options));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function celri_view($id = null) {

        $contain = array('Enrolment' => array(
                'Teacher' => array(
                    'NoiSinh',
                    'fields' => array('name', 'id', 'ngay_sinh', 'first_name', 'email'),
                )
            ), 'Scheduling', 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));

        if (!$this->Workshop->exists($id)) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        $options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id), 'contain' => $contain);
        $this->set('workshop', $this->Workshop->find('first', $options));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function teacher_view($id = null) {

        $contain = array('Enrolment' => array(
                'Teacher' => array(
                    'NoiSinh',
                    'fields' => array('name', 'id', 'ngay_sinh', 'first_name', 'email'),
                )
            ), 'Scheduling', 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));

        if (!$this->Workshop->exists($id)) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        $options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id), 'contain' => $contain);
        $enrolments = $this->Workshop->Enrolment->find('all', array('recursive' => -1, 'conditions' => array('teacher_id' => $this->Auth->user('id'))));
        $this->set('enrolments', Hash::extract($enrolments, '{n}.Enrolment.workshop_id'));

        $this->set('workshop', $this->Workshop->find('first', $options));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

        $contain = array('Enrolment' => array(
                'Teacher' => array(
                    'NoiSinh',
                    'fields' => array('name', 'id', 'ngay_sinh', 'first_name', 'email'),
                )
            ), 'Scheduling', 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));

        if (!$this->Workshop->exists($id)) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        $options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id), 'contain' => $contain);
        $this->set('workshop', $this->Workshop->find('first', $options));
    }

    public function xuat_danh_sach($id = null) {

        $contain = array('Enrolment' => array('Teacher' => array('Department', 'NoiSinh', 'fields' => array('name', 'id', 'ngay_sinh'))), 'Scheduling', 'Chapter' => array('Field'), 'Intrustor' => array('User' => array('fields' => array('name'))));

        if (!$this->Workshop->exists($id)) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        $options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id), 'contain' => $contain);
        $this->set('workshop', $this->Workshop->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Workshop->create();
            if ($this->Workshop->save($this->request->data)) {
                $this->Flash->success(__('The workshop has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The workshop could not be saved. Please, try again.'));
            }
        }
        $chapters = $this->Workshop->Chapter->find('list', array('order' => array('Chapter.name' => 'ASC')));
        $this->set(compact('chapters'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Workshop->id = $id;
        if (!$this->Workshop->exists($id)) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Workshop->save($this->request->data)) {
                $this->Flash->success(__('workshop đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('workshop lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Workshop.' . $this->Workshop->primaryKey => $id));
            $this->request->data = $this->Workshop->find('first', $options);
        }
        $chapters = $this->Workshop->Chapter->find('list');
        $this->set(compact('chapters'));
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
                if ($this->Workshop->deleteAll(array('Workshop.id' => $requestDeleteId))) {
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
        $this->Workshop->id = $id;
        if (!$this->Workshop->exists()) {
            throw new NotFoundException(__('Invalid workshop'));
        }
        if ($this->Workshop->delete()) {
            $this->Flash->success(__('Workshop đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Workshop xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

}
