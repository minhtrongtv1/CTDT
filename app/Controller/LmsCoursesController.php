<?php

App::uses('AppController', 'Controller');

/**
 * LmsCourses Controller
 *
 * @property LmsCourse $LmsCourse
 * @property PaginatorComponent $Paginator
 */
class LmsCoursesController extends AppController {

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
        $contain = array('Category');
        $order = array();
        if (!empty($this->request->data['LmsCourse']['fullname'])) {
            $conditions = Hash::merge($conditions, array('LmsCourse.fullname like' => '%' . $this->request->data['LmsCourse']['fullname'] . '%'));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('lmsCourses', $this->paginate());
        if (!$this->request->is('ajax')) {
            
        }
    }

    /**
     * index method
     *
     * @return void
     */

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->LmsCourse->exists($id)) {
            throw new NotFoundException(__('Invalid lms course'));
        }
        $options = array('conditions' => array('LmsCourse.' . $this->LmsCourse->primaryKey => $id));
        $this->set('lmsCourse', $this->LmsCourse->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->LmsCourse->create();
            if ($this->LmsCourse->save($this->request->data)) {
                $this->Flash->success(__('The lms course has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The lms course could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->LmsCourse->id = $id;
        if (!$this->LmsCourse->exists($id)) {
            throw new NotFoundException(__('Invalid lms course'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->LmsCourse->save($this->request->data)) {
                $this->Flash->success(__('lms course đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('lms course lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('LmsCourse.' . $this->LmsCourse->primaryKey => $id));
            $this->request->data = $this->LmsCourse->find('first', $options);
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
    public function delete($id = null) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->LmsCourse->deleteAll(array('LmsCourse.id' => $requestDeleteId))) {
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
        $this->LmsCourse->id = $id;
        if (!$this->LmsCourse->exists()) {
            throw new NotFoundException(__('Invalid lms course'));
        }
        if ($this->LmsCourse->delete()) {
            $this->Flash->success(__('Lms course đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Lms course xóa không thành công'));
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
        if (!empty($this->request->data['LmsCourse']['fullname'])) {
            $conditions = Hash::merge($conditions, array('LmsCourse.fullname like' => '%' . $this->request->data['LmsCourse']['fullname'] . '%'));
        }

        if (!empty($this->request->data['LmsCourse']['categoryname'])) {
            $conditions = Hash::merge($conditions, array('LmsCourse.categoryname like' => '%' . $this->request->data['LmsCourse']['categoryname'] . '%'));
        }

        if (isset($this->request->data['LmsCourse']['visible']) && $this->request->data['LmsCourse']['visible'] != '') {
            $conditions = Hash::merge($conditions, array('LmsCourse.visible' => $this->request->data['LmsCourse']['visible']));
        }


        //debug($conditions);
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order,'limit'=>500);
        $this->Paginator->settings = $settings;

        $this->set('lmsCourses', $this->paginate());
        if (!$this->request->is('ajax')) {
            
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
        if (!$this->LmsCourse->exists($id)) {
            throw new NotFoundException(__('Invalid lms course'));
        }
        $options = array('conditions' => array('LmsCourse.' . $this->LmsCourse->primaryKey => $id));
        $this->set('lmsCourse', $this->LmsCourse->find('first', $options));
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
                $requestDeleteId = Hash::extract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->LmsCourse->deleteAll(array('LmsCourse.id' => $requestDeleteId))) {
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
        $this->LmsCourse->id = $id;
        if (!$this->LmsCourse->exists()) {
            throw new NotFoundException(__('Invalid lms course'));
        }
        if ($this->LmsCourse->delete()) {
            $this->Flash->success(__('Lms course đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Lms course xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_get_lms_courses() {

        //debug($this->request->data);die;
        if (!empty($this->request->data)) {
            $hk = $this->request->data['LmsCourse']['hk'];
            $confirm = $this->request->data['LmsCourse']['confirm'];
            if (trim($hk) != "" && $confirm == 'OK') {

                $this->LmsCourse->deleteAll(['fullname like' => '%'.$hk . '%'],true);

                //$url='http://moodle.local/webservice/rest/server.php?wstoken=9f33f9878fd87f58f859bbcafba23fb6&wsfunction=local_custom_service_get_courses&moodlewsrestformat=json&field=shortname&value=PPGD%';
                $url = "https://lms.tvu.edu.vn/webservice/rest/server.php?wstoken=d1f5f746fac708792610919b86d5050f&wsfunction=local_custom_service_get_courses&moodlewsrestformat=json&field=shortname&value=$hk";
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 40000); //timeout in seconds

                curl_setopt($ch, CURLOPT_POST, false);
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                $api_response_json = curl_exec($ch);
                curl_close($ch);

                //convert json to PHP array for further process
                $courses = json_decode($api_response_json);
                $courses = $courses->courses;
                #debug($courses);die;
                $success = 0;
                $khoa_da_them_moi=array();
                $khoa_da_bo_qua=array();
                foreach ($courses as $key => $raw_course) {
                    
                    if($this->LmsCourse->hasAny(array('LmsCourse.fullname'=>$raw_course->fullname))){
                        $khoa_da_bo_qua[]=$raw_course->fullname;
                        continue;
                    }
                    
                    
                    $this->LmsCourse->create();

                    $lms_course_data = [
                        'lms_course_id' => $raw_course->id,
                        'fullname' => $raw_course->fullname,
                        'shortname' => $raw_course->shortname,
                        'categoryid' => $raw_course->categoryid,
                        'categoryname' => $raw_course->categoryname,
                        'startdate' => $raw_course->startdate,
                        'visible' => $raw_course->visible,
                        'timecreated' => $raw_course->timecreated,
                        'timemodified' => $raw_course->timemodified,
                    ];
                    
                    $contact = $raw_course->contacts;
                    $lms_course_teaching_data=[];
                    foreach ($contact as $teacher) {
                        $teacher_email = $teacher->email;

                        $teacher_fullname = $teacher->fullname;
                        $lms_course_teaching_data[]= [
                            //'lms_course_id' => $lms_course_id,
                            'teacher_email' => $teacher_email,
                            'teacher_name' => $teacher_fullname
                        ];
                        
                    }
                    
                    $data=[
                        'LmsCourse'=>$lms_course_data,
                        'LmsCourseTeaching'=>$lms_course_teaching_data
                        ];


                    if ($this->LmsCourse->saveAssociated($data,['validate'=>false,])) {
                        $success++;
                        $khoa_da_them_moi[]=$raw_course->fullname;
                    } 
                }
                $this->set(compact('khoa_da_them_moi','khoa_da_bo_qua'));
                $this->Flash->success('Đã lấy ' . $success . ' khóa từ LMS');
                $this->redirect(array('controller' => 'LmsCourses', 'action' => 'index'));
            }
        }
    }

}
