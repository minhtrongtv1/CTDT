<?php
App::uses('ChuongTrinhMonHoc', 'Model');

/**
 * ChuongTrinhMonHoc Test Case
 */
class ChuongTrinhMonHocTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chuong_trinh_mon_hoc',
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
		'app.tai_lieu_giang_day',
		'app.loai_tlgd',
		'app.chuong_trinh',
		'app.bac_hoc',
		'app.nganh_hoc',
		'app.hinh_thuc_dao_tao',
		'app.khoi_kien_thuc',
		'app.hinh_thuc_hoc',
		'app.hoc_ky'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChuongTrinhMonHoc = ClassRegistry::init('ChuongTrinhMonHoc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChuongTrinhMonHoc);

		parent::tearDown();
	}

}
