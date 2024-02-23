<?php
/**
 * Curriculumn Fixture
 */
class CurriculumnFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'key' => 'unique', 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'major_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'form_of_trainning_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'name_vn' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'name_eng' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'credit' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'trainning_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'enrollment_subject' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'point_ladder' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'graduation_condition' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'diploma' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'codeindex' => array('column' => 'code', 'unique' => 1),
			'fk_forms' => array('column' => 'form_of_trainning_id', 'unique' => 0),
			'fk_levels' => array('column' => 'level_id', 'unique' => 0),
			'fk_major' => array('column' => 'major_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'code' => 'Lorem ipsum dolor sit amet',
			'level_id' => 1,
			'major_id' => 1,
			'form_of_trainning_id' => 1,
			'name_vn' => 'Lorem ipsum dolor sit amet',
			'name_eng' => 'Lorem ipsum dolor sit amet',
			'credit' => 1,
			'trainning_time' => '2024-02-22 10:13:44',
			'enrollment_subject' => 'Lorem ipsum dolor sit amet',
			'point_ladder' => 1,
			'graduation_condition' => 'Lorem ipsum dolor sit amet',
			'diploma' => 'Lorem ipsum dolor sit amet',
			'created' => '2024-02-22 10:13:44',
			'modified' => '2024-02-22 10:13:44',
			'id' => 1
		),
	);

}
