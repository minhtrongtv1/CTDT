<?php
App::uses('DongTuTheHien', 'Model');

/**
 * DongTuTheHien Test Case
 */
class DongTuTheHienTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dong_tu_the_hien',
		'app.muc_do_nhan_thuc',
		'app.linh_vuc_nhan_thuc'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DongTuTheHien = ClassRegistry::init('DongTuTheHien');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DongTuTheHien);

		parent::tearDown();
	}

}
