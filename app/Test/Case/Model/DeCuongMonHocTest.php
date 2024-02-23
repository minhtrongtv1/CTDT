<?php
App::uses('DeCuongMonHoc', 'Model');

/**
 * DeCuongMonHoc Test Case
 */
class DeCuongMonHocTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.de_cuong_mon_hoc',
		'app.mon_hoc',
		'app.department',
		'app.department_type',
		'app.user',
		'app.province',
		'app.hoc_ham',
		'app.hoc_vi',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DeCuongMonHoc = ClassRegistry::init('DeCuongMonHoc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DeCuongMonHoc);

		parent::tearDown();
	}

}
