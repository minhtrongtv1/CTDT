<?php
App::uses('State', 'Model');

/**
 * State Test Case
 */
class StateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.state',
		'app.curriculumn',
		'app.level',
		'app.department',
		'app.course',
		'app.evaluation_result',
		'app.evaluation_round',
		'app.user',
		'app.province',
		'app.group',
		'app.users_group',
		'app.message',
		'app.messages_user',
		'app.teaching',
		'app.department_supporter',
		'app.major',
		'app.form_of_trainning',
		'app.diploma',
		'app.industryleader',
		'app.role',
		'app.infrastructure',
		'app.device',
		'app.room',
		'app.program_objective',
		'app.program_outcome',
		'app.typeoutcome',
		'app.knowledge',
		'app.subjects_curriculumn',
		'app.subject',
		'app.book',
		'app.subjects_book',
		'app.subjects_user',
		'app.semester'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->State = ClassRegistry::init('State');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->State);

		parent::tearDown();
	}

}
