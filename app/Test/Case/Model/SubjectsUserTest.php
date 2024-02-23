<?php
App::uses('SubjectsUser', 'Model');

/**
 * SubjectsUser Test Case
 */
class SubjectsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subjects_user',
		'app.user',
		'app.department',
		'app.course',
		'app.evaluation_result',
		'app.evaluation_round',
		'app.teaching',
		'app.department_supporter',
		'app.province',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group',
		'app.room',
		'app.device'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SubjectsUser = ClassRegistry::init('SubjectsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SubjectsUser);

		parent::tearDown();
	}

}
