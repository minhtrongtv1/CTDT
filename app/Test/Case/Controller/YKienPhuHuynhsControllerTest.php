<?php
App::uses('YKienPhuHuynhsController', 'Controller');

/**
 * YKienPhuHuynhsController Test Case
 */
class YKienPhuHuynhsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.y_kien_phu_huynh',
		'app.user',
		'app.department',
		'app.department_type',
		'app.province',
		'app.hoc_vi',
		'app.school',
		'app.users_relative',
		'app.relative',
		'app.enrollment',
		'app.course',
		'app.chapter',
		'app.level',
		'app.study_progress',
		'app.buoi_hoc',
		'app.room',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

}
