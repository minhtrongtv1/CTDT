<?php
/**
 * MonHoc Fixture
 */
class MonHocFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'department_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mon_an' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'mon_chung_toan_truong' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'co_de_cuong' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'so_tin_chi' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'so_tin_chi_ly_thuyet' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'so_tin_chi_thuc_hanh' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'so_tiet' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'so_tiet_ly_thuyet' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'so_tiet_thuc_hanh' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'so_tiet_bai_tap' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'bai_tap_lon' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'tot_nghiep' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'thuc_tap' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'do_an' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'luan_an' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'department_id' => 1,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet',
			'mon_an' => 1,
			'mon_chung_toan_truong' => 1,
			'co_de_cuong' => 1,
			'so_tin_chi' => 1,
			'so_tin_chi_ly_thuyet' => 1,
			'so_tin_chi_thuc_hanh' => 1,
			'so_tiet' => 1,
			'so_tiet_ly_thuyet' => 1,
			'so_tiet_thuc_hanh' => 1,
			'so_tiet_bai_tap' => 1,
			'bai_tap_lon' => 1,
			'tot_nghiep' => 1,
			'thuc_tap' => 1,
			'do_an' => 1,
			'luan_an' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2017-04-26 10:53:57',
			'modified' => '2017-04-26 10:53:57',
			'id' => 1
		),
	);

}
