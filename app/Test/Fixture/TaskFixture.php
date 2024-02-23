<?php
/**
 * Task Fixture
 */
class TaskFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'document_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'ngay_hoan_thanh' => array('type' => 'date', 'null' => false, 'default' => null),
		'mieu_ta' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'length' => 6),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'length' => 6),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'document_id_user_id_unique' => array('column' => array('document_id', 'user_id'), 'unique' => 1),
			'fk_user' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'document_id' => 1,
			'user_id' => 1,
			'ngay_hoan_thanh' => '2019-08-06',
			'mieu_ta' => 'Lorem ipsum dolor sit amet',
			'created_by' => 1,
			'created' => '2019-08-06 07:42:40',
			'modified' => '2019-08-06 07:42:40',
			'id' => 1
		),
	);

}
