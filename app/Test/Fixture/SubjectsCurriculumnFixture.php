<?php
/**
 * SubjectsCurriculumn Fixture
 */
class SubjectsCurriculumnFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'curriculumn_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'subject_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'knowledge_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'programobjective_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'semester_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'typesubject' => array('type' => 'string', 'null' => false, 'default' => '1', 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_knowledge' => array('column' => 'knowledge_id', 'unique' => 0),
			'fk_currilumns' => array('column' => 'curriculumn_id', 'unique' => 0),
			'fk_subjectss' => array('column' => 'subject_id', 'unique' => 0),
			'fk_semester' => array('column' => 'semester_id', 'unique' => 0),
			'fk_programobjective_sc' => array('column' => 'programobjective_id', 'unique' => 0)
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
			'curriculumn_id' => 1,
			'subject_id' => 1,
			'knowledge_id' => 1,
			'programobjective_id' => 1,
			'semester_id' => 1,
			'typesubject' => 'Lorem ipsum dolor sit amet',
			'created' => '2024-03-22 16:39:51',
			'modified' => '2024-03-22 16:39:51',
			'id' => 1
		),
	);

}
