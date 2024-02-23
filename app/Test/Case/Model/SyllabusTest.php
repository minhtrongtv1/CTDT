<?php
App::uses('Syllabus', 'Model');

/**
 * Syllabus Test Case
 */
class SyllabusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.syllabus',
		'app.subject',
		'app.department',
		'app.department_type',
		'app.user',
		'app.province',
		'app.hoc_ham',
		'app.hoc_vi',
		'app.notification',
		'app.group',
		'app.users_group',
		'app.message',
		'app.messages_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Syllabus = ClassRegistry::init('Syllabus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Syllabus);

		parent::tearDown();
	}

}
