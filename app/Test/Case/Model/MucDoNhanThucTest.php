<?php
App::uses('MucDoNhanThuc', 'Model');

/**
 * MucDoNhanThuc Test Case
 */
class MucDoNhanThucTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.muc_do_nhan_thuc',
		'app.linh_vuc_nhan_thuc',
		'app.dong_tu_the_hien'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MucDoNhanThuc = ClassRegistry::init('MucDoNhanThuc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MucDoNhanThuc);

		parent::tearDown();
	}

}
