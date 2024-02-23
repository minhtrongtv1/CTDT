<?php
App::uses('StudyProgress', 'Model');

/**
 * StudyProgress Test Case
 */
class StudyProgressTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.study_progress',
		'app.course',
		'app.chapter',
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
		$this->StudyProgress = ClassRegistry::init('StudyProgress');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StudyProgress);

		parent::tearDown();
	}

}
