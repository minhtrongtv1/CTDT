<?php
App::uses('Openai', 'Model');

/**
 * Openai Test Case
 */
class OpenaiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.openai',
		'app.user',
		'app.department',
		'app.course',
		'app.evaluation_result',
		'app.evaluation_round',
		'app.teaching',
		'app.department_supporter',
		'app.province',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Openai = ClassRegistry::init('Openai');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Openai);

		parent::tearDown();
	}

}
