<?php
/**
 * Industryleader Fixture
 */
class IndustryleaderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'curriculumn_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'major_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_leaderrole' => array('column' => 'role_id', 'unique' => 0),
			'fk_leaderuser' => array('column' => 'user_id', 'unique' => 0),
			'fk_leadercurri' => array('column' => 'curriculumn_id', 'unique' => 0)
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
			'user_id' => 1,
			'curriculumn_id' => 1,
			'role_id' => 1,
			'level_id' => 1,
			'major_id' => 1,
			'created' => '2024-03-15 14:38:00',
			'modified' => '2024-03-15 14:38:00',
			'id' => 1
		),
	);

}
