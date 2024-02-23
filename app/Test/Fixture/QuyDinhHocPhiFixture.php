<?php
/**
 * QuyDinhHocPhi Fixture
 */
class QuyDinhHocPhiFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'quy_dinh_hoc_phi';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'chapter_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'study_progress_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'study_time' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'study_fee' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'chapter_id' => 1,
			'level_id' => 1,
			'study_progress_id' => 1,
			'study_time' => 1,
			'study_fee' => 1,
			'id' => 1
		),
	);

}
