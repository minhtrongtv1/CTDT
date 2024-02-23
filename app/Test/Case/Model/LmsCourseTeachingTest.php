<?php
App::uses('LmsCourseTeaching', 'Model');

/**
 * LmsCourseTeaching Test Case
 */
class LmsCourseTeachingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lms_course_teaching',
		'app.lms_course',
		'app.department',
		'app.course',
		'app.evaluation_result',
		'app.teaching',
		'app.department_supporter',
		'app.user',
		'app.project',
		'app.field',
		'app.team',
		'app.attachment',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group',
		'app.teacher'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LmsCourseTeaching = ClassRegistry::init('LmsCourseTeaching');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LmsCourseTeaching);

		parent::tearDown();
	}

}
