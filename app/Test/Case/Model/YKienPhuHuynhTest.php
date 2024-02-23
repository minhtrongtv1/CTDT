<?php
App::uses('YKienPhuHuynh', 'Model');

/**
 * YKienPhuHuynh Test Case
 */
class YKienPhuHuynhTest extends CakeTestCase {

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
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->YKienPhuHuynh = ClassRegistry::init('YKienPhuHuynh');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->YKienPhuHuynh);

		parent::tearDown();
	}

}
