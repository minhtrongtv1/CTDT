<?php
App::uses('Infrastructure', 'Model');

/**
 * Infrastructure Test Case
 */
class InfrastructureTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.infrastructure',
		'app.device',
		'app.room',
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
		$this->Infrastructure = ClassRegistry::init('Infrastructure');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Infrastructure);

		parent::tearDown();
	}

}
