<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public $components = array('Flash');
    public $helpers = array('Paginator');

    public function login() {

        $this->theme = 'Ace2Cake';

        $this->layout = 'login';

        if ($this->request->is('post')) {
// Important: Use login() without arguments! See warning below.
            if ($this->Auth->login()) {
                $this->writeToSessionLoginGroups();
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Tài khoản đăng nhập không chính xác');
            }
        }
    }

    public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    private function writeToSessionLoginGroups() {
        $this->User->id = $this->Auth->user('id');
        $this->User->contain(array('Group' => array('fields' => array('name', 'alias', 'order', 'id', 'published'))));
        $loggedInUser = $this->User->read(array('id'));
        $LogginUserGroup = Set::remove($loggedInUser['Group'], '{n}.UsersGroup');
        $LogginUserGroup = Set::sort($LogginUserGroup, '{n}.order', 'ASC');

        $this->Session->write('LogginUserGroup', $LogginUserGroup);
    }

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $conditions = array();
        $contain = array('Group');
        $order = array('User.first_name' => 'ASC');
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['User']['name'])) {
                $conditions = Hash::merge($conditions, array('User.name like' => '%' . trim($this->request->data['User']['name']) . '%'));
            }
            if (!empty($this->request->data['User']['so_dien_thoai'])) {
                $conditions = Hash::merge($conditions, array('User.so_dien_thoai like' => '%' . trim($this->request->data['User']['so_dien_thoai']) . '%'));
            }

            if (!empty($this->request->data['User']['thang_sinh']['month']) && ($this->request->data['User']['thang_sinh']['month'] != '')) {


                $conditions = Hash::merge($conditions, array('MONTH(User.ngay_sinh)' => $this->request->data['User']['thang_sinh']['month']));
            }

            if (!empty($this->request->data['User']['username'])) {
                $conditions = Hash::merge($conditions, array('User.username like' => '%' . trim($this->request->data['User']['username']) . '%'));
            }

            if (!empty($this->request->data['User']['group_id'])) {
                $userId = $this->User->getUserIdByGroupId($this->request->data['User']['group_id']);
                $conditions = Hash::merge($conditions, array('User.id' => $userId));
            }
        }


        $this->Paginator->settings = array('order' => $order, 'conditions' => $conditions, 'contain' => $contain);
        $groups = $this->User->Group->find('list');
        $this->set('users', $this->Paginator->paginate());
        if (!$this->request->is('ajax'))
            $this->set('groups', $groups);
    }

    /**
     * hoc vien method: liệt kê danh sách các học viên
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $studentId = ($this->User->getUserIdByGroupId($this->User->Group->getGroupIdByAlias('pupil')));
        $conditions = array('User.id' => $studentId);
        $order = array('User.first_name' => 'ASC');
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['User']['name'])) {
                $conditions = Hash::merge($conditions, array('User.name like' => '%' . trim($this->request->data['User']['name']) . '%'));
            }
            if (!empty($this->request->data['User']['so_dien_thoai'])) {
                $conditions = Hash::merge($conditions, array('User.so_dien_thoai like' => '%' . trim($this->request->data['User']['so_dien_thoai']) . '%'));
            }

            if (!empty($this->request->data['User']['thang_sinh']['month']) && ($this->request->data['User']['thang_sinh']['month'] != '')) {


                $conditions = Hash::merge($conditions, array('MONTH(User.ngay_sinh)' => $this->request->data['User']['thang_sinh']['month']));
            }

            if (!empty($this->request->data['User']['username'])) {
                $conditions = Hash::merge($conditions, array('User.username like' => '%' . trim($this->request->data['User']['username']) . '%'));
            }
        }
        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'order' => $order,
            'contain' => array('School', 'NoiSinh')
        );
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * hoc vien method: liệt kê danh sách các học viên
     *
     * @return void
     */
    public function search() {
        $this->User->recursive = 0;
        $studentId = ($this->User->getUserIdByGroupId($this->User->Group->getGroupIdByAlias('pupil')));
        $conditions = array('User.id' => $studentId);

        if (!empty($this->request->data['name'])) {
            $this->Session->write('UserSearch.name', $this->request->data['name']);
            $conditions = Hash::merge($conditions, array('OR' => array(
                            'User.name like' => '%' . $this->request->data['name'] . '%',
                            'User.so_dien_thoai like' => '%' . $this->request->data['name'] . '%'
            )));
        }

        $settings = array(
            'conditions' => $conditions,
            'order' => array('User.name'),
            'contain' => array('School', 'NoiSinh'),
            'limit' => 5
        );
        $this->set('users', $this->User->find('all', $settings));
    }

    public function admin_profile($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id),
            'contain' => array('Group', 'Department'),);
        //debug($this->User->find('first', $options));die;
        $this->set('user', $this->User->find('first', $options));
    }

    public function update_my_profile() {
        $id = $this->Auth->user('id');
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('Đã cập nhật thành công');
                return $this->redirect('/myprofile');
            } else {
                $this->Flash->error('Lỗi cập nhật hồ sơ!');
            }
        } else {
            $noiSinhes = $this->User->NoiSinh->find('list');
            $hocVis = $this->User->HocVi->find('list');
            $departments = $this->User->Department->generateTreeList(
                    null, null, null, '&nbsp;&nbsp;&nbsp;'
            );
            $this->set(compact('groups', 'departments', 'noiSinhes', 'hocVis'));
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {

            if (empty($this->request->data['Group']['Group'])) {
                $this->request->data['Group']['Group'][0] = $this->User->Group->getGroupIdByAlias('pupil');
            }
            $this->request->data['User']['created_user_id'] = $this->Auth->user('id');
            $this->User->create();
            if ($this->User->save($this->request->data)) {

                $this->Flash->success('Thêm thành công');
                return $this->redirect(array('admin' => true, 'action' => 'index'));
            } else {
                $this->Flash->error('Có lỗi! Thêm không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        }

        $groups = $this->User->Group->find('list');
        $noiSinhes = $this->User->NoiSinh->find('list');
        $departments = $this->User->Department->generateTreeList(
                null, null, null, '&nbsp;&nbsp;&nbsp;'
        );
        $this->set(compact('groups', 'departments', 'noiSinhes'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Group']['Group'][0] = $this->User->Group->getGroupIdByAlias('pupil');
            $this->request->data['User']['created_user_id'] = $this->Auth->user('id');
            $this->User->create();
            if ($this->User->save($this->request->data)) {

                return $this->redirect(array('action' => 'edit', $this->User->id));
            } else {
                $this->Flash->error('Có lỗi! Thêm không thành công!');
            }
        }
        $schools = $this->User->School->find('list');
        $noiSinhes = $this->User->NoiSinh->find('list');
        $this->set(compact('noiSinhes', 'schools'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function them_phu_huynh() {
        if ($this->request->is('post')) {
            $this->request->data['User'] = $this->request->data['PhuHuynhMoi'];
            unset($this->request->data['PhuHuynhMoi']);
            $this->request->data['Group']['Group'][0] = $this->User->Group->getGroupIdByAlias('parent');
            $this->request->data['User']['created_user_id'] = $this->Auth->user('id');
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $record = $this->User->read();
                $this->set('record', $record);
            } else {
                throw new Exception('Not save ex');
            }
        }
    }

    /**
     * edit method
     *
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException('Không tồn tại người này');
        }
        $user_id = $id;

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->User->save($this->request->data)) {

                $this->Flash->success('Cập nhật thành công!');
                return $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error('Có lỗi! Thêm không thành công!');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $relatives = $this->User->PhuHuynh->Relative->find('list');
        $schools = $this->User->School->find('list');
        $this->set(compact('schools', 'relatives', 'user_id'));
    }

    public function view($id) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $contain = array(
            'NoiSinh', 'HocVi',
            'Group'
        );
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $id
            ),
            'contain' => $contain
        ));
        $this->set('user', $user);
    }

    public function xem_hoc_vien($id) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Không tồn tại học viên'));
        }
        $contain = array(
            'PhuHuynh', 'School', 'Enrollment' => array('fields' => array('id', 'fee', 'pass', 'hoc_thu'), 'Course' => array('fields' => array('id', 'name'), 'Chapter' => array('fields' => array('name')), 'Teacher' => array('fields' => array('id', 'name'))))
        );
        $fields = array('username', 'name', 'ngay_sinh', 'so_dien_thoai', 'address', 'avatar', 'avatar_path');
        $hoc_vien = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $id
            ),
            'contain' => $contain
        ));
        $this->set('hoc_vien', $hoc_vien);
    }

    public function admin_edit($id) {

        if (!$this->User->exists($id)) {
            throw new NotFoundException('Không tồn tại người này');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('Cập nhật thông tin người dùng thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Cập nhật thông tin người dùng không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $user = $this->User->find('first', $options);
            $this->request->data = null;
            if (!empty($user)) {
                if (empty($user ['User'] ['password'])) {
                    unset($user ['User'] ['password']);
                };
                $this->request->data = $user;
            }
        }

        $groups = $this->User->Group->find('list');
        $noiSinhes = $this->User->NoiSinh->find('list');
        $hocVis = $this->User->HocVi->find('list');
        $departments = $this->User->Department->generateTreeList(
                null, null, null, '&nbsp;&nbsp;&nbsp;'
        );
        $this->set(compact('groups', 'departments', 'noiSinhes', 'hocVis'));
    }

    public function admin_view($id) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id),
            'contain' => array('Group', 'HocVi'));
        $this->set('user', $this->User->find('first', $options));
    }

    public function delete($id = null) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->User->deleteAll(array('User.id' => $requestDeleteId))) {
                    echo true;
                } else {
                    echo false;
                }
            }
            exit();
        }
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid User'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User đã được xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('User xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Used to change the password by user
     *
     * @access public
     * @return void
     */
    public function changePassword() {
        $userId = $this->Auth->user('id');
        if ($this->request->isPost()) {
            $this->User->set($this->request->data);

            if (!$this->User->verifyOldPass()) {
                $this->Flash->error('Mật khẩu cũ chưa đúng!');
            } else {
                if (!$this->User->verifies()) {
                    $this->Flash->error('Mật khẩu không khớp!');
                } else
                if ($this->User->RegisterValidate()) {
                    $user = array();
                    $user['User']['id'] = $userId;
                    $this->User->save($user, false);

                    $this->Flash->success(__('Đổi password thành công.'));
                    $this->redirect('/myprofile');
                }
            }
        }
    }

    public function admin_changeUserPassword($userId) {

        if ($this->request->isPost()) {
            $this->User->set($this->request->data);

            if (!$this->User->verifies()) {
                $this->Flash->error('Mật khẩu không khớp!');
            } else
            if ($this->User->RegisterValidate()) {
                $user = array();
                $user['User']['id'] = $userId;
                $this->User->save($user, false);

                $this->Flash->success('Đổi password thành công.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * Used to display detail of user by user
     *
     * @access public
     * @return array
     */
    public function myprofile() {
        $userId = $this->Auth->user('id');
        $contain = array(
            'NoiSinh', 'HocVi',
            'Group'
        );
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userId
            ),
            'contain' => $contain
        ));
        $this->set('user', $user);
    }

    /* Hàm tìm trả về danh sách user dạng ajax để người dụng chọn 
      thuộc chức năng thêm/sửa thông tin biên soạn tài liệu giảng dạy */

    public function getUsers($group_alias = null, $divClass = null) {
        $limit = 20;
        $order = array();
        $this->layout = 'ajax';
        $conditions = array('User.activated' => 1);

        $scopeId = ($this->User->getUserIdByGroupId($this->User->Group->getGroupIdByAlias($group_alias)));

        if (!empty($this->request->data['user_selected'])) {
            $user_seleted = $this->request->data['user_selected'];
            $scopeId = array_diff($scopeId, $user_seleted);
        }

        $conditions = Set::merge($conditions, array('User.id' => $scopeId));

        if (!empty($this->request->data['search_term'])) {
            $search_term = $this->request->data['search_term'];
            $conditions = Set::merge($conditions, array('User.name like' => "%$search_term%"));
        }

        $this->Paginator->settings = array('conditions' => $conditions, 'order' => $order, 'limit' => $limit);
        $users = $this->paginate();

        $paging = $this->params['paging'];
        $this->set(compact('users', 'paging', 'divClass'));
    }

    public function select2($group_alias = null) {
        $this->layout = "ajax";
        $conditions = array();
        if (!empty($this->request->query['q'])) {
            $term = $this->request->query['q'];

            $conditions = Set::merge($conditions, array('User.name like' => "%{$term}%"));
        }
        if (!is_null($group_alias)) {
            $scopeId = ($this->User->getUserIdByGroupId($this->User->Group->getGroupIdByAlias($group_alias)));
            $conditions = Set::merge($conditions, array('User.id' => $scopeId));
        }

        $this->Paginator->settings = array('conditions' => $conditions, 'order' => array('User.name' => 'ASC'), 'fields' => array('id', 'name', 'avatar '), 'contain' => array('Department'));
        $users = $this->paginate();
        $this->set(compact('users'));
    }

    public function top_authors() {
        $conditions = array();
        $contain = array('HocVi');
        $order = array('User.trong_so_tieu_bieu' => 'DESC');
        $limit = 5;
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order, 'limit' => $limit);
        $this->Paginator->settings = $settings;

        $this->set('authors', $this->paginate());
    }
}
