<?php
App::uses('QuyDinhHocPhi', 'Model');

/**
 * QuyDinhHocPhi Test Case
 */
class QuyDinhHocPhiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.quy_dinh_hoc_phi',
		'app.chapter',
		'app.level',
		'app.study_progress'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuyDinhHocPhi = ClassRegistry::init('QuyDinhHocPhi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuyDinhHocPhi);

		parent::tearDown();
	}

}
