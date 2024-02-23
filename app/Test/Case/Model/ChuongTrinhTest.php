<?php
App::uses('ChuongTrinh', 'Model');

/**
 * ChuongTrinh Test Case
 */
class ChuongTrinhTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chuong_trinh',
		'app.bac_hoc',
		'app.nganh_hoc',
		'app.hinh_thuc_dao_tao',
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
		'app.users_group',
		'app.chuong_trinh_mon_hoc'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChuongTrinh = ClassRegistry::init('ChuongTrinh');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChuongTrinh);

		parent::tearDown();
	}

}
