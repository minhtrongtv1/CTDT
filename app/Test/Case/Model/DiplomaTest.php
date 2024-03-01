<?php
App::uses('Diploma', 'Model');

/**
 * Diploma Test Case
 */
class DiplomaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.diploma',
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
		'app.infrastructure',
		'app.device',
		'app.room',
		'app.program_outcome',
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
		$this->Diploma = ClassRegistry::init('Diploma');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Diploma);

		parent::tearDown();
	}

}
