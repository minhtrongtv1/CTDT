<?php
App::uses('BuoiHoc', 'Model');

/**
 * BuoiHoc Test Case
 */
class BuoiHocTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group',
		'app.enrollment',
		'app.period'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BuoiHoc = ClassRegistry::init('BuoiHoc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BuoiHoc);

		parent::tearDown();
	}

}
