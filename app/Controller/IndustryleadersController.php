<?php

App::uses('AppController', 'Controller');

/**
 * Industryleaders Controller
 *
 * @property Industryleader $Industryleader
 * @property PaginatorComponent $Paginator
 */
class IndustryleadersController extends AppController {

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
//$conditions = Set::merge($conditions, array('Industryleader.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('industryleaders', $this->paginate());
        if (!$this->request->is('ajax')) {
            $users = $this->Industryleader->User->find('list');
            $curriculumns = $this->Industryleader->Curriculumn->find('list');
            $roles = $this->Industryleader->Role->find('list');
            $levels = $this->Industryleader->Level->find('list');
            $majors = $this->Industryleader->Major->find('list');
            $this->set(compact('users', 'curriculumns', 'roles', 'levels', 'majors'));
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
        if (!$this->Industryleader->exists($id)) {
            throw new NotFoundException(__('Chủ trì ngành không hợp lệ'));
        }
        $options = array('conditions' => array('Industryleader.' . $this->Industryleader->primaryKey => $id));
        $this->set('industryleader', $this->Industryleader->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            // Lấy dữ liệu từ form
            $userData = $this->request->data['Industryleader'];

            // Kiểm tra xem đã có giáo viên nào được lưu trong ngành này chưa
            $existingUser = $this->Industryleader->findByUserId($userData['user_id']);

            if (!$existingUser) {
                // Nếu user chưa tồn tại, lưu dữ liệu mới
                if ($this->Industryleader->save($this->request->data)) {
                    $this->Flash->success(__('Chủ trì ngành đã được lưu'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('Không thể lưu chủ trì ngành. Vui lòng thử lại.'));
                }
            } else {
                // Nếu user đã tồn tại, kiểm tra trình độ
                $existingMajorId = $existingUser['Industryleader']['major_id'];
                $existingLevelId = $existingUser['Industryleader']['level_id'];
                $majorId = $userData['major_id'];
                $levelId = $userData['level_id'];

                if ($majorId != $existingMajorId) {
                    // Nếu khác ngành, không lưu và hiển thị thông báo lỗi
                    $this->Flash->error(__('Giáo viên này đã được lưu trong một ngành khác. Vui lòng chọn giáo viên khác.'));
                } elseif ($levelId == $existingLevelId) {
                    // Nếu cùng trình độ, không lưu và hiển thị thông báo lỗi
                    $this->Flash->error(__('Giáo viên này đã được lưu cùng ngành và cùng trình độ. Vui lòng thay đổi ngành hoặc trình độ.'));
                } else {
                    // Nếu cùng ngành và khác trình độ, tiến hành lưu
                    if ($this->Industryleader->save($this->request->data)) {
                        $this->Flash->success(__('Chủ trì ngành đã được lưu'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Flash->error(__('Không thể lưu chủ trì ngành. Vui lòng thử lại.'));
                    }
                }
            }
        }
        // Lấy danh sách các dữ liệu cần thiết cho form
        $users = $this->Industryleader->User->find('list');
        $curriculumns = $this->Industryleader->Curriculumn->find('list');
        $roles = $this->Industryleader->Role->find('list');
        $levels = $this->Industryleader->Level->find('list');
        $majors = $this->Industryleader->Major->find('list');
        $this->set(compact('users', 'curriculumns', 'roles', 'levels', 'majors'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Industryleader->id = $id;
        if (!$this->Industryleader->exists($id)) {
            throw new NotFoundException(__('Invalid industryleader'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Industryleader->save($this->request->data)) {
                $this->Flash->success(__('industryleader đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('industryleader lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Industryleader.' . $this->Industryleader->primaryKey => $id));
            $this->request->data = $this->Industryleader->find('first', $options);
        }
        $users = $this->Industryleader->User->find('list');
        $curriculumns = $this->Industryleader->Curriculumn->find('list');
        $roles = $this->Industryleader->Role->find('list');
        $levels = $this->Industryleader->Level->find('list');
        $majors = $this->Industryleader->Major->find('list');
        $this->set(compact('users', 'curriculumns', 'roles', 'levels', 'majors'));
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
                if ($this->Industryleader->deleteAll(array('Industryleader.id' => $requestDeleteId))) {
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
        $this->Industryleader->id = $id;
        if (!$this->Industryleader->exists()) {
            throw new NotFoundException(__('Invalid industryleader'));
        }
        if ($this->Industryleader->delete()) {
            $this->Flash->success(__('Industryleader đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Industryleader xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }
}
