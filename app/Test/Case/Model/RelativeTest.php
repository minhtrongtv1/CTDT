<?php
App::uses('Relative', 'Model');

/**
 * Relative Test Case
 */
class RelativeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.relative'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Relative = ClassRegistry::init('Relative');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Relative);

		parent::tearDown();
	}

}
