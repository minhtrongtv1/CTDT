<?php
App::uses('ProgramOutcome', 'Model');

/**
 * ProgramOutcome Test Case
 */
class ProgramOutcomeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.program_outcome',
		'app.curriculumn',
		'app.level',
		'app.major',
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
		'app.form_of_trainning',
		'app.subject',
		'app.semester',
		'app.book',
		'app.subjects_book',
		'app.subjects_curriculumn',
		'app.subjects_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProgramOutcome = ClassRegistry::init('ProgramOutcome');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProgramOutcome);

		parent::tearDown();
	}

}
