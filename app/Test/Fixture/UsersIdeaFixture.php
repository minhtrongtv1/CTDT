<?php
/**
 * UsersIdea Fixture
 */
class UsersIdeaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'idea_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'vi_tri' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'length' => 6),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'length' => 6),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'user_id' => 1,
			'idea_id' => 1,
			'vi_tri' => 1,
			'id' => 1,
			'created' => '2019-04-23 09:03:43',
			'modified' => '2019-04-23 09:03:43'
		),
	);

}
