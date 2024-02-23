<?php
App::uses('HocHam', 'Model');

/**
 * HocHam Test Case
 */
class HocHamTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hoc_ham'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HocHam = ClassRegistry::init('HocHam');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HocHam);

		parent::tearDown();
	}

}
