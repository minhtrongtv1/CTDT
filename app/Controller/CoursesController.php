<?php

App::uses('AppController', 'Controller');

/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 */
class CoursesController extends AppController {

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
        $contain = array('Department', 'EvaluationResult');
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('Course.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('courses', $this->paginate());
        if (!$this->request->is('ajax')) {
            $departments = $this->Course->Department->find('list');
            $this->set(compact('departments'));
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
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
        $this->set('course', $this->Course->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Course->create();
            if ($this->Course->save($this->request->data)) {
                $this->Flash->success(__('The course has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $departments = $this->Course->Department->find('list');
        $this->set(compact('departments'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Course->id = $id;
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Course->save($this->request->data)) {
                $this->Flash->success(__('course đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('course lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
            $this->request->data = $this->Course->find('first', $options);
        }
        $departments = $this->Course->Department->find('list');
        $this->set(compact('departments'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function teacher_edit($id = null) {
        $this->Course->id = $id;
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            unset($this->request->data['Course']['fullname']);
            if ($this->Course->save($this->request->data)) {
                $this->Flash->success('Đã lưu thông tin cập nhật');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Lỗi cập nhật thông tin khóa học');
            }
        } else {
            $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
            $this->request->data = $this->Course->find('first', $options);
        }
        $departments = $this->Course->Department->find('list');
        $this->set(compact('departments'));
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
                if ($this->Course->deleteAll(array('Course.id' => $requestDeleteId))) {
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
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->Course->delete()) {
            $this->Flash->success(__('Course đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Course xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function bct_soft_delete($id = null) {

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException(__('Invalid course'));
        }

        $data = array('deleted' => 1, 'deleted_by' => $this->Auth->user('id'), 'deleted_time' => date('Y-m-d H:i:s'));
        if ($this->Course->save($data)) {
            $this->Flash->success('Khóa học đã xóa');
            $this->redirect(array('action' => 'index', 'bct' => true, 'controller' => 'evaluation_results'));
        } else {
            $this->Flash->error(__('Course xóa không thành công'));
            $this->redirect(array('action' => 'index', 'bct' => true, 'controller' => 'evaluation_results'));
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $conditions = array();
        $contain = array('Department', 'EvaluationResult');
        $order = array();
        if (!empty($this->request->data['Course']['fullname'])) {
            $conditions = Hash::merge($conditions, array('Course.fullname like' => '%' . $this->request->data['Course']['fullname'] . '%'));
        }

        if (!empty($this->request->data['Course']['deleted'])) {
            $conditions = Hash::merge($conditions, array('Course.deleted' => $this->request->data['Course']['deleted']));
        }

        if (!empty($this->request->data['Course']['semester'])) {
            $conditions = Hash::merge($conditions, array('Course.semester like' => '%' . $this->request->data['Course']['semester'] . '%'));
        }
        if (!empty($this->request->data['Course']['subject_code'])) {
            $conditions = Hash::merge($conditions, array('Course.subject_code' => $this->request->data['Course']['subject_code']));
        }
        if (!empty($this->request->data['Course']['department_id'])) {
            $conditions = Hash::merge($conditions, array('Course.department_id' => $this->request->data['Course']['department_id']));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('courses', $this->paginate());
        
        if (!$this->request->is('ajax')) {
            $departments = $this->Course->Department->find('list');
            $this->set(compact('departments'));
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
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
        $this->set('course', $this->Course->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Course->create();
            if ($this->Course->save($this->request->data)) {
                $this->Flash->success(__('The course has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $departments = $this->Course->Department->find('list');
        $this->set(compact('departments'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Course->id = $id;
        if (!$this->Course->exists($id)) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Course->save($this->request->data)) {
                $this->Flash->success(__('course đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('course lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
            $this->request->data = $this->Course->find('first', $options);
        }
        $departments = $this->Course->Department->find('list');
        $this->set(compact('departments'));
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
                if ($this->Course->deleteAll(array('Course.id' => $requestDeleteId))) {
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
        $this->Course->id = $id;
        if (!$this->Course->exists()) {
            throw new NotFoundException(__('Invalid course'));
        }
        if ($this->Course->delete()) {
            $this->Flash->success(__('Course đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Course xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    /* Đồng bộ khóa học với bảng lms_courses */

    /* Đầu vào là học kỳ năm học */

    public function admin_lms_course_syn() {
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            if (trim($data['Course']['confirm']) != 'OK') {
                $this->Flash->error('Vui lòng nhập OK để xác nhận thao tác');
                return $this->redirect($this->referer());
            }

            if (strlen(trim($data['Course']['hk'])) != 5) {
                $this->Flash->error('Vui lòng nhập học kỳ năm học (5 ký tự số)');
                return $this->redirect($this->referer());
            }

            //$this->Course->deleteAll(['fullname like' => '%' . trim($data['Course']['hk']) . '%'], true);

            $this->loadModel('LmsCourse');
            $results = $this->LmsCourse->find('all', array('contain' => array('LmsCourseTeachings')));
            $this->loadModel('Department');
            $departments = $this->Department->find('all', array('recursive' => -1, 'fields' => array('id', 'lms_id')));
            $departmentLmsIds = (Hash::extract($departments, '{n}.lms_id'));

// Iteration will execute the query.
            $save = 0;
            $existed = [];
            $fail = [];
            $courseDataFail = [];
            $courseKhongCoGV = [];

            foreach ($results as $lmsCourse) {
                $fullname = mb_ereg_replace('–', '-', $lmsCourse['LmsCourse']['fullname']);
                if ($this->Course->hasAny(array('fullname' => $lmsCourse['LmsCourse']['fullname']))) {
                    $existed[] = $lmsCourse['LmsCourse']['fullname'];
                    continue;
                }
                $course_department_id = "";
                $department_name = null;
                foreach ($departments as $department) {
                    if ($lmsCourse['LmsCourse']['categoryid'] == $department['Department']['lms_id']) {

                        $course_department_id = $department['Department']['id'];
                        break;
                    }
                }



                $lmsCourseArray = (explode("-", trim($fullname)));

                if (count($lmsCourseArray) < 4) {
                    echo "Lỗi dữ liệu";

                    $courseDataFail[] = $lmsCourse['LmsCourse']['fullname'];
                    continue;
                }

                $teachers = $lmsCourse['LmsCourseTeaching'];
                //debug($lmsCourse);
                $this->loadModel('User');
                $teachings = [];

                if (count($teachers) == 0) {
                    $courseKhongCoGV[] = ['fullname' => $lmsCourse['LmsCourse']['fullname'], 'department' => $lmsCourse['LmsCourse']['categoryid']];
                    continue;
                }
                foreach ($teachers as $teacher) {

                    $email_explore = explode('@', $teacher['teacher_email']);
                    //debug($email_explore);die;
                    $row = $this->User->find('first', [
                        'conditions' => ['User.username' => $email_explore[0]]
                    ]);

                    $teaching = $this->Course->Teaching->create();
                    //debug($row);
                    if (!empty($row)) {

                        $teaching = ['user_id' => $row['User']['id']];
                        $teachings[] = $teaching;
                    } else {
                        //Lưu người dùng mới vào CSDL

                        $this->User->create();
                        $newteacher['name'] = $teacher['teacher_name'];
                        $newteacher['email'] = $teacher['teacher_email'];
                        $ho_va_ten_array = explode(' ', trim($newteacher['name']));
                        $so_word = count($ho_va_ten_array);

                        $ten = $ho_va_ten_array[$so_word - 1];
                        $ten_dem = "";
                        for ($i = 1; $i < $so_word - 1; $i++) {
                            $ten_dem .= $ho_va_ten_array[$i];
                        }
                        $newteacher['last_name'] = $ho_va_ten_array[0] . ' ' . $ten_dem;
                        $newteacher['first_name'] = $ten;
                        $newteacher['username'] = $email_explore[0];
                        $newteacher['password'] = '123$%^789@';
                        $newteacher['cpassword'] = '123$%^789@';
                        $newteacher['department_id'] = $course_department_id;

                        $newteacher['Group'][0] = 23;

                        //debug($newteacher);
                        if ($this->User->save($newteacher)) {

                            $teaching = ['user_id' => $this->User->id];
                            $teachings[] = $teaching;
                        } else {
                            debug($teacher);
                            //debug($newteacher);

                            continue;
                            echo "Lưu User không thành công";
                        }
                    }
                }

                // debug($teachings);die;
                $this->Course->create();

                $courseData = [
                    'fullname' => ($lmsCourse['LmsCourse']['fullname']),
                    'shortname' => trim($lmsCourse['LmsCourse']['shortname']),
                    'startdate' => date('Y-m-d', (int) ($lmsCourse['LmsCourse']['startdate'])),
                    'semester' => trim($lmsCourseArray[0]),
                    'subject_code' => trim($lmsCourseArray[1]),
                    'subject_name' => trim($lmsCourseArray[2]),
                    'department_id' => $course_department_id,
                    'lms_created_date' => date('Y-m-d H:i:s', (int) $lmsCourse['LmsCourse']['timecreated']),
                    'lms_modified_date' => date('Y-m-d H:i:s', (int) $lmsCourse['LmsCourse']['timemodified']),
                    'lms_course_id' => $lmsCourse['LmsCourse']['lms_course_id']
                ];

                $newCourse['Course'] = $courseData;

                $newCourse['Teaching'] = array_values(array_unique($teachings, SORT_REGULAR));
                //debug($newCourse['Teaching']);
                $dataSource = $this->Course->getDataSource();
                try {
                    $dataSource->begin();

                    $this->Course->saveAssociated($newCourse);
                    $dataSource->commit();
                    $save++;
                } catch (NewException $e) {


                    $fail[] = $newCourse['Course']['fullname'];
                    $dataSource->rollback();
                    echo "Fail khi lưu";
                    //debug($newCourse);
                    //die;
                }
            }
            $this->set(compact('courseKhongCoGV', 'courseDataFail', 'fail', 'existed', 'save'));

// Calling all() will execute the query
// and return the result set.
        }
    }

    public function mycourses() {

        //Lay cac dong co user_id =$this->Auth->user('id') trong bang Teaching
        $this->loadModel('Teaching');
        $teachings = $this->Teaching->find('all', array('conditions' => array('Teaching.user_id' => $this->Auth->user('id')), 'recursive' => -1, 'fields' => array('course_id')));
        $deleted_courses = $this->Course->find('all', array('conditions' => array('deleted' => 1), 'recursive' => -1, 'fields' => array('id')));

        $conditions = array(
            'NOT' => array('Course.id' => Hash::extract($deleted_courses, '{n}.Course.id')),
            'Course.id' => Hash::extract($teachings, '{n}.Teaching.course_id'));
        $contain = array('Department', 'EvaluationResult');
        $order = array();
        if (!empty($this->request->data['Course']['fullname'])) {
            $conditions = Hash::merge($conditions, array('Course.fullname like' => '%' . $this->request->data['Course']['fullname'] . '%'));
        }
        if (!empty($this->request->data['Course']['semester'])) {
            $conditions = Hash::merge($conditions, array('Course.semester like' => '%' . $this->request->data['Course']['semester'] . '%'));
        }
        if (!empty($this->request->data['Course']['subject_code'])) {
            $conditions = Hash::merge($conditions, array('Course.subject_code' => $this->request->data['Course']['subject_code']));
        }
        if (!empty($this->request->data['Course']['department_id'])) {
            $conditions = Hash::merge($conditions, array('Course.department_id' => $this->request->data['Course']['department_id']));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('courses', $this->paginate());
        if (!$this->request->is('ajax')) {
            $departments = $this->Course->Department->find('list');
            $this->set(compact('departments'));
        }
    }

}
