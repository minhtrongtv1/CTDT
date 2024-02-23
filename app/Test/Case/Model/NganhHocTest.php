<?php
App::uses('NganhHoc', 'Model');

/**
 * NganhHoc Test Case
 */
class NganhHocTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nganh_hoc',
		'app.chuong_trinh'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NganhHoc = ClassRegistry::init('NganhHoc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NganhHoc);

		parent::tearDown();
	}

}
