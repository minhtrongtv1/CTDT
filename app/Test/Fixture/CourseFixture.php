<?php
/**
 * Course Fixture
 */
class CourseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'fullname' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'shortname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'startdate' => array('type' => 'date', 'null' => true, 'default' => null),
		'scholastic' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'semester' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'subject_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'subject_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'subject_class' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'department_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'lms_created_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'lms_modified_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'fullname' => 'Lorem ipsum dolor sit amet',
			'shortname' => 'Lorem ipsum dolor sit amet',
			'startdate' => '2022-04-12',
			'scholastic' => 'Lorem ipsum dolor sit amet',
			'semester' => 'Lorem ipsum dolor sit amet',
			'subject_code' => 'Lorem ipsum dolor sit amet',
			'subject_name' => 'Lorem ipsum dolor sit amet',
			'subject_class' => 'Lorem ipsum dolor sit amet',
			'department_id' => 1,
			'lms_created_date' => '2022-04-12 14:13:24',
			'lms_modified_date' => '2022-04-12 14:13:24',
			'created' => '2022-04-12 14:13:24',
			'modified' => '2022-04-12 14:13:24',
			'id' => 1
		),
	);

}
