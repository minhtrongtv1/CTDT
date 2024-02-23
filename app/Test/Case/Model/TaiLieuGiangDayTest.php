<?php
App::uses('TaiLieuGiangDay', 'Model');

/**
 * TaiLieuGiangDay Test Case
 */
class TaiLieuGiangDayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.kind_of_book'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TaiLieuGiangDay = ClassRegistry::init('TaiLieuGiangDay');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TaiLieuGiangDay);

		parent::tearDown();
	}

}
