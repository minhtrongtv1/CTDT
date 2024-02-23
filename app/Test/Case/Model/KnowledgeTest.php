<?php
App::uses('Knowledge', 'Model');

/**
 * Knowledge Test Case
 */
class KnowledgeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.knowledge',
		'app.program_objective',
		'app.subjects_curriculumn'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Knowledge = ClassRegistry::init('Knowledge');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Knowledge);

		parent::tearDown();
	}

}
