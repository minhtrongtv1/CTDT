<?php
App::uses('ProgramObjective', 'Model');

/**
 * ProgramObjective Test Case
 */
class ProgramObjectiveTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.program_objective',
		'app.knowledge',
		'app.subjects_curriculumn'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProgramObjective = ClassRegistry::init('ProgramObjective');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProgramObjective);

		parent::tearDown();
	}

}
