<?php
App::uses('DiemDanh', 'Model');

/**
 * DiemDanh Test Case
 */
class DiemDanhTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.diem_danh',
		'app.buoi_hoc',
		'app.course',
		'app.chapter',
		'app.level',
		'app.study_progress',
		'app.user',
		'app.department',
		'app.department_type',
		'app.province',
		'app.hoc_vi',
		'app.school',
		'app.users_relative',
		'app.relative',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group',
		'app.enrollment',
		'app.room',
		'app.pupil'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DiemDanh = ClassRegistry::init('DiemDanh');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DiemDanh);

		parent::tearDown();
	}

}
