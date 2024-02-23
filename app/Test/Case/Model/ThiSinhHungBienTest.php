<?php
App::uses('ThiSinhHungBien', 'Model');

/**
 * ThiSinhHungBien Test Case
 */
class ThiSinhHungBienTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.thi_sinh_hung_bien',
		'app.du_doan_hung_bien'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ThiSinhHungBien = ClassRegistry::init('ThiSinhHungBien');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ThiSinhHungBien);

		parent::tearDown();
	}

}
