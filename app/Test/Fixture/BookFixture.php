<?php
/**
 * Book Fixture
 */
class BookFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mon_hoc_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'kind_of_book_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'bat_dau_bien_soan' => array('type' => 'date', 'null' => true, 'default' => null),
		'ket_thuc_bien_soan' => array('type' => 'date', 'null' => true, 'default' => null),
		'bat_dau_phan_bien' => array('type' => 'date', 'null' => true, 'default' => null),
		'ket_thuc_phan_bien' => array('type' => 'date', 'null' => true, 'default' => null),
		'ngay_nop_tlc' => array('type' => 'date', 'null' => true, 'default' => null),
		'truong_bo_mon_duyet' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'truong_bo_mon_duyet_luc' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'tlc_duyet' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'da_ban_hanh' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'trang_thai' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'name' => 'Lorem ipsum dolor sit amet',
			'mon_hoc_id' => 1,
			'kind_of_book_id' => 1,
			'bat_dau_bien_soan' => '2017-05-04',
			'ket_thuc_bien_soan' => '2017-05-04',
			'bat_dau_phan_bien' => '2017-05-04',
			'ket_thuc_phan_bien' => '2017-05-04',
			'ngay_nop_tlc' => '2017-05-04',
			'truong_bo_mon_duyet' => 1,
			'truong_bo_mon_duyet_luc' => '2017-05-04 10:40:09',
			'tlc_duyet' => 1,
			'da_ban_hanh' => 1,
			'trang_thai' => 1,
			'created' => '2017-05-04 10:40:09',
			'modified' => '2017-05-04 10:40:09',
			'id' => 1
		),
	);

}
