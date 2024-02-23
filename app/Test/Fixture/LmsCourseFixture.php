<?php
/**
 * LmsCourse Fixture
 */
class LmsCourseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'lms_course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fullname' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'shortname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'categoryid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'categoryname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'startdate' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'visible' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'scholastic' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'timecreated' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'timemodified' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'id' => 1,
			'lms_course_id' => 1,
			'fullname' => 'Lorem ipsum dolor sit amet',
			'shortname' => 'Lorem ipsum dolor sit amet',
			'categoryid' => 1,
			'categoryname' => 'Lorem ipsum dolor sit amet',
			'startdate' => 'Lorem ip',
			'visible' => 1,
			'scholastic' => 'Lorem ipsum dolor sit amet',
			'timecreated' => 'Lorem ipsum dolor sit amet',
			'timemodified' => 'Lorem ipsum dolor sit amet',
			'created' => '2022-04-12 14:56:46',
			'modified' => '2022-04-12 14:56:46'
		),
	);

}
