<?php
/**
 * MessagesUser Fixture
 */
class MessagesUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'message_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'recipient_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'is_read' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'is_delete' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'message_id' => 1,
			'recipient_id' => 1,
			'is_read' => 1,
			'is_delete' => 1,
			'created' => '2017-04-14 10:10:25',
			'modified' => '2017-04-14 10:10:25',
			'id' => 1
		),
	);

}
