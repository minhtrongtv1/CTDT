<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::import('Vendor', 'oauth2', array('file' => 'oauth2/vendor/autoload.php'));
App::import('Vendor', 'microsoft-graph', array('file' => 'microsoft/microsoft-graph/vendor/autoload.php'));
//App::import('Vendor', 'Graph', array('file' => 'microsoft/Graph.php'));
//App::import('Vendor', 'PhpWord', array('file' => 'PhpWord/Autoloader.php'));
//App::uses('TokenCache', 'Lib');
App::uses('Microsoft\Graph\Graph', 'Vendor');
App::uses('CakeEmail', 'Network/Email');

use Microsoft\Graph\Model;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $theme = 'Ace2Cake';
    public $uses = array(
        'Message',
        'User',
        'Message',
        'Workshop'
    );
    public $allowActions = array(
        'changeLayout',
        'slideshow',
        'display',
        'bao_tri',
        'goToGoogleLogin',
        'signin',
        'login',
        'home'
    );
    public $loggedInUser = NULL;
    public $helpers = array(
        'Notification.Notification',
        'Common',
        'TinyMCE.TinyMCE'
    );
    public $components = array(
        'Cookie',
        'Paginator',
        'Session',
        'Flash',
        'DebugKit.Toolbar',
        'RequestHandler',
        'Auth' => array(
            'authorize' => array(
                'Controller',
                'Actions' => array(
                    'actionPath' => 'controllers'
                ),
                'Authorize.Acl' => array(
                    'actionPath' => 'Models/'
                )
            ),
            'authError' => 'Bạn không có quyền truy cập địa chỉ này',
            'unauthorizedRedirect' => array(
                'controller' => 'pages',
                'action' => 'display',
                'home',
                'prefix' => false,
                'plugin' => false
            ),
            'flash' => array(
                'element' => 'error',
                'key' => 'auth',
                'params' => array(
                    'class' => 'alert-danger'
                )
            )
        ),
        'Acl' => array(
            'habtm' => array(
                'userModel' => 'User',
                'groupAlias' => 'Group'
            )
        )
    );

    //Update trạng thái lớp hết hạn và đủ điều kiện mở lớp

    protected function autoStatusUpdate() {

        $conditions = array('DATEDIFF(ADDDATE(Workshop.start_date,0),CURDATE())<1', "Workshop.status" => WORKSHOP_DANG_DANG_KY);
        $this->loadModel('Workshop');
        $count = $this->Workshop->find('count', array('conditions' => $conditions));
        //debug($count);die;
        if ($count > 0) {
            $this->Workshop->updateAll(
                    array('Workshop.status' => WORKSHOP_DA_MO), 
                    Hash::merge($conditions, array('Workshop.enrolledno >=' => WORKSHOP_SO_LUONG_DANG_KY_TOI_THIEU)));
            //Gui email thong bao cho THV va GV
            $this->Workshop->updateAll(array('Workshop.status' => WORKSHOP_DA_HUY), Hash::merge($conditions, array('Workshop.enrolledno <' => WORKSHOP_SO_LUONG_DANG_KY_TOI_THIEU)));
            //Gui email thong bao cho THV va GV
        }
    }

    //Gửi mail thông báo khóa học đến hạn đánh giá

    public function autoEmailNotification() {
        $this->loadModel('EvaluationRound');
        $activeEvaluationRound = $this->EvaluationRound->find('first', array('conditions' => array('EvaluationRound.isCompleted' => 0)));
        if (!empty($activeEvaluationRound)) {
            $this->loadModel('EvaluationResult');
            $evaluation_results = $this->EvaluationResult->find('all', array(
                'conditions' => array('evaluation_round_id' => $activeEvaluationRound['EvaluationRound']['id'], 'email_sent is NULL'),
                //'fields'=>array('email_sent','supporter_id'),
                'contain' => array(
                    'Course' => array('fields' => array('fullname', 'startdate', 'deleted', 'lms_course_id'), 'Teaching' => array('User' => array('id', 'name', 'email'))),
                    'Supporter' => array('name', 'email', 'gender')
                )
                    )
            );
            $n = count($evaluation_results);
            $THONG_BAO_DANH_GIA_DA_GUI = 0;
            if ($this->Session->check('THONG_BAO_DANH_GIA_DA_GUI')) {
                $THONG_BAO_DANH_GIA_DA_GUI = $this->Session->read('THONG_BAO_DANH_GIA_DA_GUI');
            }
            for ($i = 0; $i < $n; $i++) {

                if ($i > 2 && !$THONG_BAO_DANH_GIA_DA_GUI){
                    $this->Session->write('THONG_BAO_DANH_GIA_DA_GUI', 2);
                    break;
                }
                $item = $evaluation_results[$i];
                if ($item['EvaluationResult']['email_sent'] || $item['Course']['deleted'])
                    continue;

                //debug($item);die;
                try {
                    $this->EvaluationResult->id = $item['EvaluationResult']['id'];

                    $gender = ($item['Supporter']['gender']) ? "Thầy" : "Cô";
                    $name = $item['Supporter']['name'];
                    $course_name = $item['Course']['fullname'];
                    $deadline = $item['Course']['startdate'];
                    $link = BASE_URL . "bct/evaluation_results/edit/" . $item['EvaluationResult']['id'];
                    //Gui mail thong bao cho BCT
                    /* Gửi email thông báo cho BTC */
                    $to_email = $item['Supporter']['email'];
                    //$to_email = 'nttoan@tvu.edu.vn';
                    $tb_subject = "[BCT-ELearning] TB khóa học " . $course_name . " cần đánh giá";
                    $cc_email = "hdkhoa@tvu.edu.vn";
                    $Email = new CakeEmail();
                    $Email->config('gmail');
                    $Email->template('tb_danh_gia_khoa_hoc');
                    $Email->emailFormat('html');
                    $Email->to($to_email);
                    $Email->cc($cc_email);
                    $Email->subject($tb_subject);

                    $Email->viewVars(array(
                        'gender' => $gender,
                        'name' => $name,
                        'course_name' => $course_name,
                        'link' => $link,
                        'deadline' => $deadline));
                    $Email->send();
                    //Lưu lại tình trạng da gui mail
                    $this->EvaluationResult->saveField('email_sent', 1);
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
            }
        }
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->theme = 'Ace2Cake';
        //Update status cua Workshop
        $this->autoStatusUpdate();
        //$this->autoEmailNotification();
        if (in_array($this->request->action, $this->allowActions)) {

            $this->Auth->allow($this->request->action);
        }
        //begin for AuditLog plugin
        if (!empty($this->request->data) && empty($this->request->data[$this->Auth->userModel])) {
            $user['User']['id'] = $this->Auth->user('id');
            $this->request->data[$this->Auth->userModel] = $user;
        }
        //end for AuditLog plugin
        if (!$this->Auth->loggedIn()) {
            $this->Auth->authError = false;

            if (!in_array($this->request->action, $this->allowActions)) {

                $request_params = str_replace($this->params->base, "", $this->params->here);

                $this->Session->write('REQUEST_PARAMS', $request_params);
            }
        }

        // Cài đặt các thông số Auth.

        $this->Auth->loginAction = array(
            'controller' => 'users',
            'action' => 'login',
            'plugin' => false,
            'admin' => false
        );
        $this->Auth->loginRedirect = array(
            'controller' => 'dashboards',
            'action' => 'home'
        );

        $this->Auth->logoutRedirect = array(
            'controller' => 'users',
            'action' => 'login',
            'plugin' => false,
            'admin' => false
        );
        $this->Auth->unauthorizedRedirect = array(
            'controller' => 'dashboards',
            'action' => 'home'
        );

        if ($this->Auth->user('id')) {


            $layout = $this->setLoggedInLayout();

            if (!$this->Session->check('LAYOUT')) {


                $this->Session->write('LAYOUT', $layout);
                $newURL = '/' . $layout . '/dashboards/home';
                $this->redirect($newURL);
            }
        }
        if ($this->Session->check('LAYOUT'))
            $this->layout = $this->Session->read('LAYOUT');

        $this->set("title_for_layout", SITENAME);
    }

    public function beforeRender() {
        parent::beforeRender();
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $this->viewPath .= '/ajax';
        }
        //$this->theme = 'Kyna';

        if ($this->Auth->user('id')) {
            $this->theme = 'Ace2Cake';
        }
        if ($this->Auth->user('id') && ($this->request->param('action') != 'update_my_profile') && ($this->request->param('action') != 'logout')) {
            $this->User->id = $this->Auth->user('id');

            $department_id = $this->User->field('department_id');
            $last_name = $this->User->field('last_name');
            $first_name = $this->User->field('first_name');
            $ngay_sinh = $this->User->field('ngay_sinh');
            $noi_sinh = $this->User->field('noi_sinh');
            if (empty($department_id)) {
                $this->Flash->error('Vui lòng nhập đầy đủ thông tin (Họ tên, Khoa, ngày sinh và nơi sinh)');
                return $this->redirect('/update_my_profile');
            }
        }
    }

    // Thiết lập giao diện
    public function setLoggedInLayout() {
        $layout = "default";

        $LogginUserGroup = $this->Session->read('LogginUserGroup');

        if (!empty($LogginUserGroup)) {
            $LogginUserGroup = Hash::extract($LogginUserGroup, '{n}.alias');
        } else {

            $this->Auth->logout();
        }

        if (in_array('admin', $LogginUserGroup)) {

            $this->theme = 'Ace2Cake';
            $layout = 'admin';
        }

        if (!empty($this->request->params['prefix'])) {

            if (in_array($this->request->params['prefix'], $LogginUserGroup)) {
                $layout = $this->request->params['prefix'];
            }
        } else {

            $layout = $LogginUserGroup[0];
        }

        return $layout;
    }

    // Đổi giao diện
    public function changeLayout() {

        $layout = $this->Session->read('LAYOUT');
        if (isset($this->request->data['layout'])) {
            $layout = $this->request->data['layout'];
            $this->Session->write('LAYOUT', $layout);
        }

        // $newURL = BASE_URL . '/' . $layout . '/dashboards/home';

        return $this->redirect(array(
                    'action' => 'home',
                    'controller' => 'dashboards',
                    $layout => true
        ));
    }

    function isAuthorized($user) {
        if (AuthComponent::user('id') !== null)
            return $this->User->isAdmin();

        return false;
    }

}
