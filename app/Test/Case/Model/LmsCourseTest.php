<?php
App::uses('LmsCourse', 'Model');

/**
 * LmsCourse Test Case
 */
class LmsCourseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lms_course',
		'app.lms_course_teaching'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LmsCourse = ClassRegistry::init('LmsCourse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LmsCourse);

		parent::tearDown();
	}

}
