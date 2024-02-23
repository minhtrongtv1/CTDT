<?php
/**
 * BuoiHoc Fixture
 */
class BuoiHocFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'buoi_hoc';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ngay_trong_tuan' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'buoi_hoc' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'bat_dau' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ket_thuc' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ghi_chu' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
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
			'course_id' => 1,
			'ngay_trong_tuan' => 1,
			'buoi_hoc' => 1,
			'bat_dau' => 'Lorem ipsum dolor sit amet',
			'ket_thuc' => 'Lorem ipsum dolor sit amet',
			'ghi_chu' => 'Lorem ipsum dolor sit amet',
			'id' => 1
		),
	);

}
