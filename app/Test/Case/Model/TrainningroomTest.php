<?php
App::uses('Trainningroom', 'Model');

/**
 * Trainningroom Test Case
 */
class TrainningroomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trainningroom',
		'app.level',
		'app.curriculumn',
		'app.major',
		'app.form_of_trainning',
		'app.diploma',
		'app.infrastructure',
		'app.device',
		'app.room',
		'app.program_outcome',
		'app.typeoutcome',
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
		'app.subjects_curriculumn'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Trainningroom = ClassRegistry::init('Trainningroom');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Trainningroom);

		parent::tearDown();
	}

}
