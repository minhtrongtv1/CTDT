<?php
App::uses('Industryleader', 'Model');

/**
 * Industryleader Test Case
 */
class IndustryleaderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.industryleader',
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
		'app.curriculumn',
		'app.level',
		'app.major',
		'app.form_of_trainning',
		'app.diploma',
		'app.state',
		'app.infrastructure',
		'app.device',
		'app.room',
		'app.program_objective',
		'app.typeoutcome',
		'app.program_outcome',
		'app.knowledge',
		'app.subjects_curriculumn',
		'app.subject',
		'app.book',
		'app.subjects_book',
		'app.subjects_user',
		'app.semester',
		'app.role'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Industryleader = ClassRegistry::init('Industryleader');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Industryleader);

		parent::tearDown();
	}

}
