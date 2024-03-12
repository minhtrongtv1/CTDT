<?php
/**
 * Trainningroom Fixture
 */
class TrainningroomFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'level_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'department_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'major_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'form_of_trainning_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'credit' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'trainning_time' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'diploma_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'approve' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'name' => 'Lorem ipsum dolor sit amet',
			'level_id' => 1,
			'department_id' => 1,
			'major_id' => 1,
			'form_of_trainning_id' => 1,
			'credit' => 'Lorem ipsum dolor sit amet',
			'trainning_time' => '2024-03-05 15:30:59',
			'diploma_id' => 1,
			'approve' => 'Lorem ipsum dolor sit amet',
			'created' => '2024-03-05 15:30:59',
			'modified' => '2024-03-05 15:30:59',
			'id' => 1
		),
	);

}
