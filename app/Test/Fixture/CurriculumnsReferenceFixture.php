<?php
/**
 * CurriculumnsReference Fixture
 */
class CurriculumnsReferenceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'curriculumn_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'major_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'typereference' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'school' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_reference' => array('column' => 'curriculumn_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'curriculumn_id' => 1,
			'major_id' => 1,
			'typereference' => 'Lorem ipsum dolor sit amet',
			'school' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'created' => '2024-03-25 10:33:18',
			'modified' => '2024-03-25 10:33:18',
			'id' => 1
		),
	);

}
