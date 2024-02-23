<?php

/**
 * Created by PhpStorm.
 * User: NguyenThai
 * Date: 2/6/2017
 * Time: 3:24 PM
 */
App::uses('AppController', 'Controller');

/**
 * DashboardController Controller
 *
 * @property PaginatorComponent $Paginator
 */
class DashboardsController extends AppController {

    public $uses = array('User');

    public function beforeFilter() {
        
        parent::beforeFilter();
        if ($this->Session->check('REQUEST_PARAMS')) {
            $request_params = $this->Session->read('REQUEST_PARAMS');
            $this->Session->delete('REQUEST_PARAMS');
            $this->redirect($request_params);
        }

        $this->Auth->allow(array('contact', 'home', 'help'));
        
    }

    public function home() {

        if ($this->Auth->user('id')) {



            if ($this->Session->read('LAYOUT') != 'default')
                return $this->redirect('/' . $this->Session->read('LAYOUT') . '/dashboards/home');
        } else {
            $this->theme = 'Frontend';
            return $this->redirect(array('action'=>'login','controller'=>'users'));
        }
    }

    public function bao_tri() {
        $this->theme = 'BaoTri';
    }

    public function admin_home() {
        
        $this->redirect(array('admin' => true, 'controller' => 'courses', 'action' => 'index'));
    }
    
    public function khcn_home() {
        
        $this->redirect(array('khcn' => true, 'controller' => 'evaluation_results', 'action' => 'index'));
    }

    public function contact() {
        
    }

    public function help() {
        $this->theme = 'Frontend';
    }

    public function teacher_home() {
        
        $this->redirect(array('teacher' => false, 'controller' => 'courses', 'action' => 'mycourses'));
    }

    public function bct_home() {
        
        $this->redirect(array('bct' => true, 'controller' => 'evaluation_results', 'action' => 'can_danh_gia'));
    }
    
    public function celri_home() {
        
        $this->redirect(array('celri' => true, 'controller' => 'workshops', 'action' => 'index'));
    }

}
