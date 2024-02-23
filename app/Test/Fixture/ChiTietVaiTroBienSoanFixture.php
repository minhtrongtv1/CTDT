<?php
/**
 * ChiTietVaiTroBienSoan Fixture
 */
class ChiTietVaiTroBienSoanFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'tai_lieu_giang_day_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'vai_tro_bien_soan_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'so_hop_dong' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ngay_ky' => array('type' => 'date', 'null' => true, 'default' => null),
		'so_tien' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'bang_tong_hop_thanh_toan_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'ghi_chu' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'tai_lieu_giang_day_id' => 1,
			'user_id' => 1,
			'vai_tro_bien_soan_id' => 1,
			'so_hop_dong' => 'Lorem ipsum dolor sit amet',
			'ngay_ky' => '2017-05-26',
			'so_tien' => 1,
			'bang_tong_hop_thanh_toan_id' => 1,
			'ghi_chu' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-05-26 05:59:28',
			'modified' => '2017-05-26 05:59:28',
			'id' => 1
		),
	);

}
