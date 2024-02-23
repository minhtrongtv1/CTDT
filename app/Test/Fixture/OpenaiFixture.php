<?php
/**
 * Openai Fixture
 */
class OpenaiFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'openai';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'prompt' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'completion' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'prompt' => 'Lorem ipsum dolor sit amet',
			'completion' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'created' => '2023-05-20 18:03:34',
			'modified' => '2023-05-20 18:03:34',
			'id' => 1
		),
	);

}
