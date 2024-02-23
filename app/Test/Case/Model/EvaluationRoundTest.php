<?php
App::uses('EvaluationRound', 'Model');

/**
 * EvaluationRound Test Case
 */
class EvaluationRoundTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.evaluation_round',
		'app.evaluation_result'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EvaluationRound = ClassRegistry::init('EvaluationRound');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EvaluationRound);

		parent::tearDown();
	}

}
