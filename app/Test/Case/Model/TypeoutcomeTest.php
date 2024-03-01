<?php
App::uses('Typeoutcome', 'Model');

/**
 * Typeoutcome Test Case
 */
class TypeoutcomeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.typeoutcome',
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
		'app.diploma',
		'app.infrastructure',
		'app.device',
		'app.room',
		'app.subjects_user',
		'app.subject',
		'app.semester',
		'app.book',
		'app.subjects_book',
		'app.subjects_curriculumn'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Typeoutcome = ClassRegistry::init('Typeoutcome');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Typeoutcome);

		parent::tearDown();
	}

}
