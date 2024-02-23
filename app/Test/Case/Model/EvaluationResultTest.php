<?php
App::uses('EvaluationResult', 'Model');

/**
 * EvaluationResult Test Case
 */
class EvaluationResultTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.evaluation_result',
		'app.evaluation_round',
		'app.course',
		'app.department',
		'app.department_supporter',
		'app.user',
		'app.project',
		'app.field',
		'app.team',
		'app.attachment',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group',
		'app.teaching',
		'app.supporter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvaluationResult = ClassRegistry::init('EvaluationResult');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvaluationResult);

		parent::tearDown();
	}

}
