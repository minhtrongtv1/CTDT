<?php
App::uses('Enrollment', 'Model');

/**
 * Enrollment Test Case
 */
class EnrollmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.enrollment',
		'app.student',
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
		'app.period',
		'app.fee_hangling'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Enrollment = ClassRegistry::init('Enrollment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enrollment);

		parent::tearDown();
	}

}
