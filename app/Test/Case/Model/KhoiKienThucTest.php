<?php
App::uses('KhoiKienThuc', 'Model');

/**
 * KhoiKienThuc Test Case
 */
class KhoiKienThucTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.khoi_kien_thuc'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->KhoiKienThuc = ClassRegistry::init('KhoiKienThuc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->KhoiKienThuc);

		parent::tearDown();
	}

}
