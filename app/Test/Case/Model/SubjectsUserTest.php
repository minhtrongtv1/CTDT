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
		'app.group',
		'app.users_group',
		'app.message',
		'app.messages_user',
		'app.subject',
		'app.book',
		'app.subjects_book',
		'app.curriculumn',
		'app.level',
		'app.major',
		'app.form_of_trainning',
		'app.diploma',
		'app.state',
		'app.industryleader',
		'app.role',
		'app.infrastructure',
		'app.device',
		'app.room',
		'app.program_objective',
		'app.typeoutcome',
		'app.program_outcome',
		'app.knowledge',
		'app.subjects_curriculumn',
		'app.semester'
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
