<?php
/**
 * DiemDanh Fixture
 */
class DiemDanhFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'diem_danh';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'buoi_hoc_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'pupil_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'vang' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'ly_do_vang' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'da_goi_dien' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'nguoi_goi_dien' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'id' => 1,
			'buoi_hoc_id' => 1,
			'pupil_id' => 1,
			'vang' => 1,
			'ly_do_vang' => 'Lorem ipsum dolor sit amet',
			'da_goi_dien' => 1,
			'nguoi_goi_dien' => 1
		),
	);

}
