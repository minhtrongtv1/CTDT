<?php
App::uses('ProgramObjective', 'Model');

/**
 * ProgramObjective Test Case
 */
class ProgramObjectiveTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.program_objective',
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
		'app.state',
		'app.industryleader',
		'app.role',
		'app.infrastructure',
		'app.device',
		'app.room',
		'app.program_outcome',
		'app.typeoutcome',
		'app.subjects_user',
		'app.subject',
		'app.book',
		'app.subjects_book',
		'app.subjects_curriculumn',
		'app.typeobjective',
		'app.knowledge'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProgramObjective = ClassRegistry::init('ProgramObjective');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProgramObjective);

		parent::tearDown();
	}

}
