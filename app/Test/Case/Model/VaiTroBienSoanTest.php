<?php
App::uses('VaiTroBienSoan', 'Model');

/**
 * VaiTroBienSoan Test Case
 */
class VaiTroBienSoanTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vai_tro_bien_soan'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->VaiTroBienSoan = ClassRegistry::init('VaiTroBienSoan');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VaiTroBienSoan);

		parent::tearDown();
	}

}
