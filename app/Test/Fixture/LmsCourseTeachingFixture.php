<?php
/**
 * LmsCourseTeaching Fixture
 */
class LmsCourseTeachingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'lms_course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'teacher_email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'teacher_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'teacher_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
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
			'lms_course_id' => 1,
			'teacher_email' => 'Lorem ipsum dolor sit amet',
			'teacher_name' => 'Lorem ipsum dolor sit amet',
			'teacher_id' => 1,
			'id' => 1
		),
	);

}
