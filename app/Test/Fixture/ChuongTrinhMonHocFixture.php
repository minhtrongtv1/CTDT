<?php
/**
 * ChuongTrinhMonHoc Fixture
 */
class ChuongTrinhMonHocFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'mon_hoc_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'chuong_trinh_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'khoi_kien_thuc_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mon_tu_hoc' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'mon_bat_buoc' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'mon_tu_chon' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'hinh_thuc_hoc_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mon_bo_sung_kien_thuc' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'truong_hop' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'hoc_ky_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'ghi_chu' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modifield' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'mon_hoc_id' => 1,
			'chuong_trinh_id' => 1,
			'khoi_kien_thuc_id' => 1,
			'mon_tu_hoc' => 1,
			'mon_bat_buoc' => 1,
			'mon_tu_chon' => 1,
			'hinh_thuc_hoc_id' => 1,
			'mon_bo_sung_kien_thuc' => 1,
			'truong_hop' => 1,
			'hoc_ky_id' => 1,
			'ghi_chu' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-05-15 05:49:42',
			'modifield' => '2017-05-15 05:49:42',
			'id' => 1
		),
	);

}
