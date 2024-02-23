<?php
App::uses('HocVi', 'Model');

/**
 * HocVi Test Case
 */
class HocViTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hoc_vi'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HocVi = ClassRegistry::init('HocVi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HocVi);

		parent::tearDown();
	}

}
