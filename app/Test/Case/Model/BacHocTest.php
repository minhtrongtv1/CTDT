<?php
App::uses('BacHoc', 'Model');

/**
 * BacHoc Test Case
 */
class BacHocTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bac_hoc'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BacHoc = ClassRegistry::init('BacHoc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BacHoc);

		parent::tearDown();
	}

}
