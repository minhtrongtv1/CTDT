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
		'app.curriculumns'
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
