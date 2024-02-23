<?php

App::uses('AppController', 'Controller');

/**
 * EvaluationResults Controller
 *
 * @property EvaluationResult $EvaluationResult
 * @property PaginatorComponent $Paginator
 */
class EvaluationResultsController extends AppController {

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
        $deleted_courses = $this->EvaluationResult->Course->find('all', array('conditions' => array('deleted' => 1), 'recursive' => -1, 'fields' => array('id')));
        $conditions = array('NOT' => array('EvaluationResult.course_id' => Hash::extract($deleted_courses, '{n}.Course.id')));

        $contain = array();
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('EvaluationResult.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('evaluationResults', $this->paginate());
        if (!$this->request->is('ajax')) {
            $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list');
            $courses = $this->EvaluationResult->Course->find('list');
            $supporters = $this->EvaluationResult->Supporter->find('list');
            $this->set(compact('evaluationRounds', 'courses', 'supporters'));
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
        if (!$this->EvaluationResult->exists($id)) {
            throw new NotFoundException(__('Invalid evaluation result'));
        }
        $options = array('conditions' => array('EvaluationResult.' . $this->EvaluationResult->primaryKey => $id));
        $this->set('evaluationResult', $this->EvaluationResult->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->EvaluationResult->create();
            if ($this->EvaluationResult->save($this->request->data)) {
                $this->Flash->success(__('The evaluation result has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The evaluation result could not be saved. Please, try again.'));
            }
        }
        $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list');
        $courses = $this->EvaluationResult->Course->find('list');
        $supporters = $this->EvaluationResult->Supporter->find('list');
        $this->set(compact('evaluationRounds', 'courses', 'supporters'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->EvaluationResult->id = $id;
        if (!$this->EvaluationResult->exists($id)) {
            throw new NotFoundException(__('Invalid evaluation result'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->EvaluationResult->save($this->request->data)) {
                $this->Flash->success(__('evaluation result đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('evaluation result lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('EvaluationResult.' . $this->EvaluationResult->primaryKey => $id));
            $this->request->data = $this->EvaluationResult->find('first', $options);
        }
        $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list');
        $courses = $this->EvaluationResult->Course->find('list');
        $supporters = $this->EvaluationResult->Supporter->find('list');
        $this->set(compact('evaluationRounds', 'courses', 'supporters'));
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
                if ($this->EvaluationResult->deleteAll(array('EvaluationResult.id' => $requestDeleteId))) {
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
        $this->EvaluationResult->id = $id;
        if (!$this->EvaluationResult->exists()) {
            throw new NotFoundException(__('Invalid evaluation result'));
        }
        if ($this->EvaluationResult->delete()) {
            $this->Flash->success(__('Evaluation result đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Evaluation result xóa không thành công'));
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
        $contain = array('EvaluationRound', 'Course', 'Supporter');

        $order = array();

        if (isset($this->request->data['EvaluationResult']['pass']) && $this->request->data['EvaluationResult']['pass'] !== "") {

            if ($this->request->data['EvaluationResult']['pass'] == -1) {
                $conditions = Hash::merge($conditions, array('EvaluationResult.pass is null'));
            } else
                $conditions = Hash::merge($conditions, array('EvaluationResult.pass' => $this->request->data['EvaluationResult']['pass']));
        }

        if (!empty($this->request->data['EvaluationResult']['department_id'])) {

            $courses = $this->EvaluationResult->Course->find('all', array(
                'recursive' => -1, 
                'fields' => array('id'), 
                'conditions' => array('department_id' => $this->request->data['EvaluationResult']['department_id'])));
            $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => Hash::extract($courses, '{n}.Course.id')));
        }
        $course_by_teacher = array();

        if (!empty($this->request->data['EvaluationResult']['semester'])) {

            $courses = $this->EvaluationResult->Course->find('all', array('recursive' => -1, 'fields' => array('id'), 'conditions' => array('semester' => $this->request->data['EvaluationResult']['semester'])));

            if (!empty($this->request->data['EvaluationResult']['course_name'])) {
                $course_by_teacher = $this->EvaluationResult->Course->find('all', ['recursive' => -1, 'fields' => ['id'], 'conditions' => ['fullname like' => '%' . $this->request->data['EvaluationResult']['course_name'] . '%']]);

                $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => array_intersect(Hash::extract($courses, '{n}.Course.id'), Hash::extract($course_by_teacher, '{n}.Course.id'))));
            } else
                $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => Hash::extract($courses, '{n}.Course.id')));
        }



        if (!empty($this->request->data['EvaluationResult']['supporter_id'])) {
            $conditions = Hash::merge($conditions, array('EvaluationResult.supporter_id' => $this->request->data['EvaluationResult']['supporter_id']));
        }

        if (!empty($this->request->data['EvaluationResult']['evaluation_round_id'])) {
            $conditions = Hash::merge($conditions, array('EvaluationResult.evaluation_round_id' => $this->request->data['EvaluationResult']['evaluation_round_id']));
        }

        if (!empty($this->request->data['EvaluationResult']['teacher_id'])) {
            $teachings = $this->EvaluationResult->Course->Teaching->find('all', array(
                'recursive' => -1,
                
                'fields' => array('course_id'),
                'conditions' => array('user_id' => $this->request->data['EvaluationResult']['teacher_id'])));
            $course = $this->EvaluationResult->Course->find('all', ['recursive' => -1, 'fields' => ['id'],
                'conditions' => array('Course.id' => Hash::extract($teachings, '{n}.Teaching.course_id'))]);

            if (!empty($this->request->data['EvaluationResult']['department_id'])) {

                $courses_of_department = $this->EvaluationResult->Course->find('all', array('recursive' => -1, 'fields' => array('id'), 'conditions' => array('department_id' => $this->request->data['EvaluationResult']['department_id'])));
                $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => array_intersect(Hash::extract($courses_of_department, '{n}.Course.id'), Hash::extract($course, '{n}.Course.id'))));
            } else {
                $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => Hash::extract($course, '{n}.Course.id')));
            }
        }

        if (!empty($this->request->data['EvaluationResult']['course_name']) && empty($course_by_teacher)) {
            $course = $this->EvaluationResult->Course->find('all', ['recursive' => -1, 'fields' => ['id'], 'conditions' => ['fullname like' => '%' . $this->request->data['EvaluationResult']['course_name'] . '%']]);

            if (!empty($this->request->data['EvaluationResult']['department_id'])) {

                $courses_of_department = $this->EvaluationResult->Course->find('all', array('recursive' => -1, 'fields' => array('id'), 'conditions' => array('department_id' => $this->request->data['EvaluationResult']['department_id'])));
                $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => array_intersect(Hash::extract($courses_of_department, '{n}.Course.id'), Hash::extract($course, '{n}.Course.id'))));
            } else {
                $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => Hash::extract($course, '{n}.Course.id')));
            }
        }
        //debug($conditions);
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order,'limit'=>200);
        $this->Paginator->settings = $settings;

        $this->set('evaluationResults', $this->paginate());

        if (!$this->request->is('ajax')) {
            $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list', array('order' => ['created' => 'DESC']));
            //
            $role_bct = $this->User->getUserIdByGroupId(24);
            $departments = $this->User->Department->find('list');

            $supporters = $this->EvaluationResult->Supporter->find('list', array('conditions' => array('id' => $role_bct), 'order' => array('first_name' => 'ASC')));
            $teachers = $this->User->find('list');
            $this->set(compact('evaluationRounds', 'supporters', 'departments', 'teachers'));
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function khcn_index() {
        //Lay danh sach khoa hoc bi xoa mem
        $contain = array('EvaluationRound' => array('fields' => array('EvaluationRound.title')),
            'Course' => array(
                'Department' => array('fields' => array('title')),
                'Teaching' => array('User' => array('fields' => array('User.name'))),
                'fields' => array('fullname')
            ),
            
        );
        $order = array();
        //lay cac khoa thuoc nam hoc hien tai
        #$deleted_courses = $this->EvaluationResult->Course->find('all', array('conditions' => array('deleted' => 1), 'recursive' => -1, 'fields' => array('id')));

        $course_cua_don_vi = array();
        $courses_cua_hk = array();
        $course_name="";
        
        
        if (!empty($this->request->data['EvaluationResult']['department_id'])) {
            $course_cua_don_vi = $this->EvaluationResult->Course->find('all', array(
                'conditions' => array('department_id' => $this->request->data['EvaluationResult']['department_id'], 'OR' => array('deleted' => 0, 'deleted is null')),
                'recursive' => -1,
                'fields' => array('id'))
            );
            $course_cua_don_vi = Hash::extract($course_cua_don_vi, '{n}.Course.id');
        }

        if (!empty($course_cua_don_vi)) {
            $courses_cua_hk = $this->EvaluationResult->Course->find('all', array(
                'conditions' => array('OR' => array('deleted' => 0, 'deleted is null'),'fullname like' => '%2223%', 'Course.id' => $course_cua_don_vi),
                'recursive' => -1,
                'fields' => array('id'))
            );
        } else {

            $courses_cua_hk = $this->EvaluationResult->Course->find('all', array(
                'conditions' => array('fullname like' => '%2223%', 'OR' => array('deleted' => 0, 'deleted is null')),
                'recursive' => -1,
                'fields' => array('id'))
            );
        }
        $conditions = array(
            'EvaluationResult.pass' => 1,
            'EvaluationResult.course_id' => Hash::extract($courses_cua_hk, '{n}.Course.id')
        );

        if (!empty($this->request->data['EvaluationResult']['course_name'])) {

            $course = $this->EvaluationResult->Course->find('all', ['recursive' => -1, 'fields' => ['id'], 'conditions' => ['fullname like' => '%' . $this->request->data['EvaluationResult']['course_name'] . '%']]);

            $conditions = array(
                'EvaluationResult.pass' => 1,
                'EvaluationResult.course_id' => array_intersect(
                        Hash::extract($course, '{n}.Course.id'),
                        Hash::extract($courses_cua_hk, '{n}.Course.id')
                )
            );
        }

        


        if (isset($this->request->data['EvaluationResult']['pass'])) {
            if ($this->request->data['EvaluationResult']['pass'] == -1) {
                $courses_cua_hk_ids=Hash::extract($courses_cua_hk, '{n}.Course.id');

                $passEnrolments = $this->EvaluationResult->find('all', array(
                    'conditions' => array(
                        'EvaluationResult.pass'=>1,
                        'course_id'=>$courses_cua_hk_ids), 
                    'recursive' => -1, 'fields' => array('course_id')));
                
                $passEnrolmentIDs= Hash::extract($passEnrolments, '{n}.EvaluationResult.course_id');
                
                $intersect = array_intersect($courses_cua_hk_ids,$passEnrolmentIDs);
                
                $conditions = array(
                    'EvaluationResult.pass' => 0,
                    'EvaluationResult.course_id' => array_diff($courses_cua_hk_ids, $intersect));
                
                //debug($conditions);
                
            }
        }
        
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order,
            'group'=>array('EvaluationResult.course_id')
            );

        if (isset($this->request->query['export']) && $this->request->query['export'] == 1) {
            $this->autoRender = false;
            $evaluationResults = $this->EvaluationResult->find('all', $settings);
            $this->set('evaluationResults', $evaluationResults);

            $this->render('export');
        } else {
            $this->Paginator->settings = $settings;

            $this->set('evaluationResults', $this->paginate());
        }
        if (!$this->request->is('ajax')) {
            $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list', array('order' => ['created' => 'DESC']));
            //            
            $departments = $this->User->Department->find('list');

            $supporters = $this->EvaluationResult->Supporter->find('list', array('order' => array('first_name' => 'ASC')));

            $this->set(compact('evaluationRounds', 'supporters', 'departments'));
        }
    }
    
    
    /**
     * admin_index method
     *
     * @return void
     */
    public function celri_index() {
        //Lay danh sach khoa hoc bi xoa mem
        $contain = array('EvaluationRound' => array('fields' => array('EvaluationRound.title')),
            'Course' => array(
                'Department' => array('fields' => array('title')),
                'Teaching' => array('User' => array('fields' => array('User.name'))),
                'fields' => array('fullname')
            ),
            
        );
        $order = array();
        //lay cac khoa thuoc nam hoc hien tai
        #$deleted_courses = $this->EvaluationResult->Course->find('all', array('conditions' => array('deleted' => 1), 'recursive' => -1, 'fields' => array('id')));

        $course_cua_don_vi = array();
        $courses_cua_hk = array();
        $course_name="";
        
        
        if (!empty($this->request->data['EvaluationResult']['department_id'])) {
            $course_cua_don_vi = $this->EvaluationResult->Course->find('all', array(
                'conditions' => array('department_id' => $this->request->data['EvaluationResult']['department_id'], 'OR' => array('deleted' => 0, 'deleted is null')),
                'recursive' => -1,
                'fields' => array('id'))
            );
            $course_cua_don_vi = Hash::extract($course_cua_don_vi, '{n}.Course.id');
        }

        if (!empty($course_cua_don_vi)) {
            $courses_cua_hk = $this->EvaluationResult->Course->find('all', array(
                'conditions' => array('OR' => array('deleted' => 0, 'deleted is null'),'fullname like' => '%2122%', 'Course.id' => $course_cua_don_vi),
                'recursive' => -1,
                'fields' => array('id'))
            );
        } else {

            $courses_cua_hk = $this->EvaluationResult->Course->find('all', array(
                'conditions' => array('fullname like' => '%2122%', 'OR' => array('deleted' => 0, 'deleted is null')),
                'recursive' => -1,
                'fields' => array('id'))
            );
        }
        $conditions = array(
            'EvaluationResult.pass' => 1,
            'EvaluationResult.course_id' => Hash::extract($courses_cua_hk, '{n}.Course.id')
        );

        if (!empty($this->request->data['EvaluationResult']['course_name'])) {

            $course = $this->EvaluationResult->Course->find('all', ['recursive' => -1, 'fields' => ['id'], 'conditions' => ['fullname like' => '%' . $this->request->data['EvaluationResult']['course_name'] . '%']]);

            $conditions = array(
                'EvaluationResult.pass' => 1,
                'EvaluationResult.course_id' => array_intersect(
                        Hash::extract($course, '{n}.Course.id'),
                        Hash::extract($courses_cua_hk, '{n}.Course.id')
                )
            );
        }

        


        if (isset($this->request->data['EvaluationResult']['pass'])) {
            if ($this->request->data['EvaluationResult']['pass'] == -1) {
                $courses_cua_hk_ids=Hash::extract($courses_cua_hk, '{n}.Course.id');

                $passEnrolments = $this->EvaluationResult->find('all', array(
                    'conditions' => array(
                        'EvaluationResult.pass'=>1,
                        'course_id'=>$courses_cua_hk_ids), 
                    'recursive' => -1, 'fields' => array('course_id')));
                
                $passEnrolmentIDs= Hash::extract($passEnrolments, '{n}.EvaluationResult.course_id');
                
                $intersect = array_intersect($courses_cua_hk_ids,$passEnrolmentIDs);
                
                $conditions = array(
                    'EvaluationResult.pass' => 0,
                    'EvaluationResult.course_id' => array_diff($courses_cua_hk_ids, $intersect));
                
                //debug($conditions);
                
            }
        }
        
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order,
            'group'=>array('EvaluationResult.course_id')
            );

        if (isset($this->request->query['export']) && $this->request->query['export'] == 1) {
            $this->autoRender = false;
            $evaluationResults = $this->EvaluationResult->find('all', $settings);
            $this->set('evaluationResults', $evaluationResults);

            $this->render('export');
        } else {
            $this->Paginator->settings = $settings;

            $this->set('evaluationResults', $this->paginate());
        }
        if (!$this->request->is('ajax')) {
            $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list', array('order' => ['created' => 'DESC']));
            //            
            $departments = $this->User->Department->find('list');

            $supporters = $this->EvaluationResult->Supporter->find('list', array('order' => array('first_name' => 'ASC')));

            $this->set(compact('evaluationRounds', 'supporters', 'departments'));
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function bct_index() {

        //Lay danh sach khoa hoc bi xoa mem
        $deleted_courses = $this->EvaluationResult->Course->find('all', array('conditions' => array('deleted' => 1), 'recursive' => -1, 'fields' => array('id')));
        $conditions = array('NOT' => array('EvaluationResult.course_id' => Hash::extract($deleted_courses, '{n}.Course.id')));
        $this->loadModel('DepartmentSupporter');
        $departments_supporters = $this->DepartmentSupporter->find('all', array('conditions' => array('DepartmentSupporter.supporter_id' => $this->Auth->user('id')), 'recursive' => -1));

        $courses = $this->EvaluationResult->Course->find('all', array('recursive' => -1, 'fields' => array('id'), 'conditions' => array('department_id' => Hash::extract($departments_supporters, '{n}.DepartmentSupporter.department_id'))));

        $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => Hash::extract($courses, '{n}.Course.id')));
        $contain = array('EvaluationRound', 'Course', 'Supporter');
        $order = array();

        if (isset($this->request->data['EvaluationResult']['pass']) && $this->request->data['EvaluationResult']['pass'] !== "") {

            if ($this->request->data['EvaluationResult']['pass'] == -1) {
                $conditions = Hash::merge($conditions, array('EvaluationResult.pass is null'));
            } else
                $conditions = Hash::merge($conditions, array('EvaluationResult.pass' => $this->request->data['EvaluationResult']['pass']));
        }



        if (!empty($this->request->data['EvaluationResult']['department_id'])) {

            $courses = $this->EvaluationResult->Course->find('all', array('recursive' => -1, 'fields' => array('id'), 'conditions' => array('department_id' => $this->request->data['EvaluationResult']['department_id'])));
            $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => Hash::extract($courses, '{n}.Course.id')));
        }


        if (!empty($this->request->data['EvaluationResult']['semester'])) {

            $courses = $this->EvaluationResult->Course->find('all', array('recursive' => -1, 'fields' => array('id'), 'conditions' => array('semester' => $this->request->data['EvaluationResult']['semester'])));
            $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => Hash::extract($courses, '{n}.Course.id')));
        }

        if (!empty($this->request->data['EvaluationResult']['supporter_id'])) {
            $conditions = Hash::merge($conditions, array('EvaluationResult.supporter_id' => $this->request->data['EvaluationResult']['supporter_id']));
        }

        if (!empty($this->request->data['EvaluationResult']['evaluation_round_id'])) {
            $conditions = Hash::merge($conditions, array('EvaluationResult.evaluation_round_id' => $this->request->data['EvaluationResult']['evaluation_round_id']));
        }

        if (!empty($this->request->data['EvaluationResult']['course_name'])) {
            $course = $this->EvaluationResult->Course->find('all', ['recursive' => -1, 'fields' => ['id'], 'conditions' => ['fullname like' => '%' . $this->request->data['EvaluationResult']['course_name'] . '%']]);

            $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => Hash::extract($course, '{n}.Course.id')));
        }
        //debug($conditions);
        $settings = array('conditions' => $conditions,
            'contain' => $contain,
            'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('evaluationResults', $this->paginate());

        if (!$this->request->is('ajax')) {
            $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list', array('order' => ['created' => 'DESC']));
            //
            $role_bct = $this->User->getUserIdByGroupId(24);
            $departments = $this->User->Department->find('list', array(
                'conditions' => array(
                    'Department.id' => Hash::extract($departments_supporters, '{n}.DepartmentSupporter.department_id')
                )
            ));

            //$departments = $this->User->Department->find('list');

            $supporters = $this->EvaluationResult->Supporter->find('list', array('conditions' => array('id' => $role_bct), 'order' => array('first_name' => 'ASC')));

            $this->set(compact('evaluationRounds', 'supporters', 'departments'));
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
        if (!$this->EvaluationResult->exists($id)) {
            throw new NotFoundException(__('Invalid evaluation result'));
        }
        $options = array('conditions' => array('EvaluationResult.' . $this->EvaluationResult->primaryKey => $id));
        $this->set('evaluationResult', $this->EvaluationResult->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->EvaluationResult->create();
            if ($this->EvaluationResult->save($this->request->data)) {
                $this->Flash->success(__('The evaluation result has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error(__('The evaluation result could not be saved. Please, try again.'));
            }
        }
        $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list');
        $courses = $this->EvaluationResult->Course->find('list');
        $role_bct = $this->User->getUserIdByGroupId(24);

        $supporters = $this->EvaluationResult->Supporter->find('list', array('conditions' => array('Supporter.id' => $role_bct)));
        $this->set(compact('evaluationRounds', 'courses', 'supporters'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->EvaluationResult->id = $id;
        if (!$this->EvaluationResult->exists($id)) {
            throw new NotFoundException(__('Invalid evaluation result'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->EvaluationResult->save($this->request->data)) {
                $this->Flash->success(__('evaluation result đã được lưu'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('evaluation result lưu không thành công, vui lòng thử lại.'));
            }
        } else {
            $options = array('conditions' => array('EvaluationResult.' . $this->EvaluationResult->primaryKey => $id));
            $this->request->data = $this->EvaluationResult->find('first', $options);
        }
        $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list');
        $courses = $this->EvaluationResult->Course->find('list');
        $role_bct = $this->User->getUserIdByGroupId(24);

        $supporters = $this->EvaluationResult->Supporter->find('list', array('conditions' => array('Supporter.id' => $role_bct)));
        $this->set(compact('evaluationRounds', 'courses', 'supporters'));
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
                if ($this->EvaluationResult->deleteAll(array('EvaluationResult.id' => $requestDeleteId))) {
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
        $this->EvaluationResult->id = $id;
        if (!$this->EvaluationResult->exists()) {
            throw new NotFoundException(__('Invalid evaluation result'));
        }
        if ($this->EvaluationResult->delete()) {
            $this->Flash->success(__('Evaluation result đã xóa'));
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Flash->error(__('Evaluation result xóa không thành công'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_phan_cong() {
        $evaluationResultsSave = 0;
        if (!empty($this->request->data)) {

            //debug($this->request->data);die;
            $evaluation_round_id = $this->request->data['EvaluationResult']['evaluation_round_id'];

            if (!$this->EvaluationResult->EvaluationRound->hasAny(['EvaluationRound.id' => $evaluation_round_id])) {
                die('Không tìm thấy Đợt đánh giá');
            }

            $evaluationRound = $this->EvaluationResult->EvaluationRound->read(null, $evaluation_round_id);
            //2021-2022
            $semester = $evaluationRound['EvaluationRound']['semester'] . substr($evaluationRound['EvaluationRound']['scholastic'], 2, 2) . substr($evaluationRound['EvaluationRound']['scholastic'], 7, 2);
            //Lấy các đợt đánh giá đã hoàn thành

            $notCompletedRound = $this->EvaluationResult->EvaluationRound->find('all', ['conditions' => ['isCompleted' => 0], 'fields' => ['id']]);
            $notCompletedRoundId = Hash::extract($notCompletedRound, '{n}.EvaluationRound.id');

            //Save các khóa học chưa được đánh giá
            $courses = $this->EvaluationResult->Course->find('all', ['conditions' => ['semester' => $semester], 'recursive' => -1]);
//save
            //die;
            foreach ($courses as $course) {

                $total = $this->EvaluationResult->hasAny(['course_id' => $course['Course']['id'], 'evaluation_round_id' => $notCompletedRoundId]);

                if ($total) {
                    //Khóa học đã được phân công rồi
                    continue;
                }
                //save
                //die;
                $this->EvaluationResult->create();
                $evaluationResults = ['course_id' => $course['Course']['id'], 'evaluation_round_id' => $evaluation_round_id];
                if ($this->EvaluationResult->save($evaluationResults)) {
                    $evaluationResultsSave++;
                }
            }
            //lay danh sach bct
            $bctID = $this->User->getUserIdByGroupId(24);

            $bcts = $this->EvaluationResult->Supporter->find('all', ['conditions' => ['Supporter.id' => $bctID]]);

            $so_luong_bct = count($bcts);
            $ban_phan_cong = array();

            //lay tong so luong khoa hoc chua danh gia trong dot
            $khoa_hocs = $this->EvaluationResult->find('all', ['conditions' =>
                ['evaluation_round_id' => $evaluation_round_id, 'pass is NULL', 'supporter_id is null']]);
            //debug($khoa_hocs);die;

            $so_luong_khoa_hoc = $n = count($khoa_hocs);

            $khoa_hoc_index = 0;
            $khoa_hoc_data = array();

            while ($n > 0) {

                for ($i = 0; $i < $so_luong_bct && $n > 0; $i++) {

                    $ban_phan_cong[$i][] = $khoa_hocs[$khoa_hoc_index]['EvaluationResult']['id'];
                    $khoa_hoc_index++;
                    $n--;
                }
            }

            if ($so_luong_khoa_hoc > 0)
                for ($i = 0; $i < $so_luong_bct; $i++) {

                    $bct = $bcts[$i];

                    $phan_cong = $ban_phan_cong[$i];
                    $n = count($phan_cong);
                    for ($j = 0; $j < $n; $j++) {
                        //ghi vao csdl viec phan cong
                        $current_results = $this->EvaluationResult->read(null, $phan_cong[$j]);
                        $current_results['EvaluationResult']['supporter_id'] = $bct['Supporter']['id'];
                        try {
                            $this->EvaluationResult->save($current_results, false);
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                            die;
                        }




                        $khoa_hoc_data[$i][] = $this->EvaluationResult->read(null, $phan_cong[$j]);
                    }
                }

            $this->Flash->success('Đã phân công đánh giá ' . $so_luong_khoa_hoc . ' cho ' . $so_luong_bct . ' bán chuyên trách.');
            $this->redirect(array('action' => 'index'));
        } else {
            $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list', array('conditions' => ['isCompleted' => 0]));
            $bctID = $this->User->getUserIdByGroupId(24);
            $supporters = $this->EvaluationResult->Supporter->find('list', array('conditions' => array('id' => $bctID)));
            $this->set(compact('evaluationRounds', 'supporters'));
        }
    }

    public function bct_can_danh_gia() {

        $deleted_courses = $this->EvaluationResult->Course->find('all', array('conditions' => array('deleted' => 1), 'recursive' => -1, 'fields' => array('id')));

        $conditions = array('NOT' => array('EvaluationResult.course_id' => Hash::extract($deleted_courses, '{n}.Course.id')), 'supporter_id' => $this->Auth->user('id'), 'pass is null');
        $contain = array('Supporter', 'EvaluationRound', 'Course');
        $order = array();

        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('evaluationResults', $this->paginate());
        if (!$this->request->is('ajax')) {
            $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list');
            $departments = $this->EvaluationResult->Course->Department->find('list', array('order' => array('title' => 'ASC')));
            $courses = $this->EvaluationResult->Course->find('list');
            $this->loadModel('User');
            $bctIds = $this->User->getUserIdByGroupId(24);

            $supporters = $this->EvaluationResult->Supporter->find('list', array('conditions' => array('id' => $bctIds)));

            $this->set(compact('courses', 'departments', 'evaluationRounds', 'supporters'));
        }
    }

    public function bct_da_danh_gia() {

        $deleted_courses = $this->EvaluationResult->Course->find('all', array('conditions' => array('deleted' => 1), 'recursive' => -1, 'fields' => array('id')));

        $conditions = array('NOT' => array('EvaluationResult.course_id' => Hash::extract($deleted_courses, '{n}.Course.id')), 'supporter_id' => $this->Auth->user('id'), 'pass is not null');

        if (!empty($this->request->data['EvaluationResult']['khoa_id'])) {
            $khoa_hocs = $this->EvaluationResult->Course->find('all', array(
                'recursive' => -1,
                'fields' => array('id'),
                'conditions' => array('department_id' => $this->request->data['EvaluationResult']['department_id'])));
            $conditions = Hash::merge($conditions, array('EvaluationResult.course_id' => Hash::extract($khoa_hocs, "{n}.Course.id")));
        }

        if (!empty($this->request->data['EvaluationResult']['evaluation_round_id'])) {

            $conditions = Hash::merge($conditions, array('EvaluationResult.evaluation_round_id' => $this->request->data['EvaluationResult']['evaluation_round_id']));
        }

        if (!empty($this->request->data['EvaluationResult']['supporter_id'])) {

            $conditions = Hash::merge($conditions, array('EvaluationResult.supporter_id' => $this->request->data['EvaluationResult']['supporter_id']));
        }

        if (isset($this->request->data['EvaluationResult']['pass']) && $this->request->data['EvaluationResult']['pass'] !== "") {

            if ($this->request->data['EvaluationResult']['pass'] == 2)
                $conditions = Hash::merge($conditions, array('EvaluationResult.pass is NULL'));
            else
            if ($this->request->data['EvaluationResult']['pass'] == 3)
                $conditions = Hash::merge($conditions, array('EvaluationResult.pass is not NULL'));
            else
                $conditions = Hash::merge($conditions, array('EvaluationResult.pass' => $this->request->data['EvaluationResult']['pass']));
        }



        $contain = array('Supporter', 'EvaluationRound', 'Course');
        $order = array();
        if (!empty($this->request->data)) {
//$conditions = Set::merge($conditions, array('EvaluationResult.fieldName' => $value));
        }
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order);
        $this->Paginator->settings = $settings;

        $this->set('ketQuaDanhGias', $this->paginate());
        if (!$this->request->is('ajax')) {
            $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list', array('order' => array('created' => 'DESC')));
            $departments = $this->EvaluationResult->Course->Department->find('list', array('order' => array('title' => 'ASC')));
            $courses = $this->EvaluationResult->Course->find('list');
            $this->loadModel('User');
            $bctIds = $this->User->getUserIdByGroupId(24);

            $supporters = $this->EvaluationResult->Supporter->find('list', array('conditions' => array('id' => $bctIds)));

            $this->set(compact('courses', 'departments', 'evaluationRounds', 'supporters'));
        }
    }

    public function bct_edit($id = null) {

        $this->EvaluationResult->id = $id;

        if (!$this->EvaluationResult->exists($id)) {
            throw new NotFoundException(__('Invalid evaluation result'));
        }

        if ($this->EvaluationResult->field('supporter_id') !== $this->Auth->user('id')) {
            $this->Flash->error('Bạn không được phân công đánh giá khóa học này! ');
            $this->redirect(array('action' => 'can_danh_gia'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['EvaluationResult']['support_id'] = $this->Auth->user('id');

            if ($this->EvaluationResult->save($this->request->data)) {
                $this->Flash->success('Đã cập nhật kết quả đánh giá');
                $this->redirect(array('action' => 'can_danh_gia'));
            } else {
                $this->Flash->error('Cập nhật KHÔNG thành công');
            }
        } else {
            $options = array('conditions' => array('EvaluationResult.' . $this->EvaluationResult->primaryKey => $id));
            $this->request->data = $this->EvaluationResult->find('first', $options);
        }
        $evaluationRounds = $this->EvaluationResult->EvaluationRound->find('list', [
            'conditions' => ['id' => $this->request->data['EvaluationResult']['evaluation_round_id']]]);

        $course = $this->EvaluationResult->Course->read(null, $this->request->data['EvaluationResult']['course_id']);
        $courses = $this->EvaluationResult->Course->find('list', [
            'conditions' => ['id' => $this->request->data['EvaluationResult']['course_id']]]);
        // $supporters = $this->EvaluationResult->Supporter->find('list');
        $this->set(compact('evaluationRounds', 'courses', 'course'));
    }
    
    
    

}
