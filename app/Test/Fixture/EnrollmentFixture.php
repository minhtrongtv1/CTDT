<?php
/**
 * Enrollment Fixture
 */
class EnrollmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'student_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'fee' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'fee_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'fee_hangling_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'fee_amount' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'fee_paper_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pass' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'hoc_thu' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'ghi_chu' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_attends_courses1_idx' => array('column' => 'course_id', 'unique' => 0),
			'fk_attends_users1_idx' => array('column' => 'student_id', 'unique' => 0)
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
			'student_id' => 1,
			'course_id' => 1,
			'fee' => 1,
			'fee_date' => '2017-07-14 09:16:11',
			'fee_hangling_id' => 1,
			'fee_amount' => 1,
			'fee_paper_no' => 'Lorem ipsum dolor sit amet',
			'pass' => 1,
			'hoc_thu' => 1,
			'ghi_chu' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-07-14 09:16:11',
			'modified' => '2017-07-14 09:16:11',
			'id' => 1
		),
	);

}
