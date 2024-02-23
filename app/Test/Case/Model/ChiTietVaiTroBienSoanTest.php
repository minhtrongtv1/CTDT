<?php
App::uses('ChiTietVaiTroBienSoan', 'Model');

/**
 * ChiTietVaiTroBienSoan Test Case
 */
class ChiTietVaiTroBienSoanTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chi_tiet_vai_tro_bien_soan',
		'app.tai_lieu_giang_day',
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
		'app.users_group',
		'app.de_cuong_mon_hoc',
		'app.loai_tlgd',
		'app.vai_tro_bien_soan',
		'app.bang_tong_hop_thanh_toan'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChiTietVaiTroBienSoan = ClassRegistry::init('ChiTietVaiTroBienSoan');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChiTietVaiTroBienSoan);

		parent::tearDown();
	}

}
