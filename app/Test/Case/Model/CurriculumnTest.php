<?php
App::uses('Curriculumn', 'Model');

/**
 * Curriculumn Test Case
 */
class CurriculumnTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.curriculumn',
		'app.level',
		'app.major',
		'app.department',
		'app.course',
		'app.evaluation_result',
		'app.evaluation_round',
		'app.user',
		'app.province',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group',
		'app.teaching',
		'app.department_supporter',
		'app.form_of_trainning',
		'app.subjects_curriculumn'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Curriculumn = ClassRegistry::init('Curriculumn');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Curriculumn);

		parent::tearDown();
	}

}
