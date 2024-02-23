<?php
App::uses('NganHang', 'Model');

/**
 * NganHang Test Case
 */
class NganHangTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ngan_hang'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NganHang = ClassRegistry::init('NganHang');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NganHang);

		parent::tearDown();
	}

}
