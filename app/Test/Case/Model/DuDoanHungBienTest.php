<?php
App::uses('DuDoanHungBien', 'Model');

/**
 * DuDoanHungBien Test Case
 */
class DuDoanHungBienTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.du_doan_hung_bien',
		'app.thi_sinh'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DuDoanHungBien = ClassRegistry::init('DuDoanHungBien');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DuDoanHungBien);

		parent::tearDown();
	}

}
