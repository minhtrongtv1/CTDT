<?php
/**
 * Chapter Fixture
 */
class ChapterFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'view_couter' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'image' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'image_dir' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'published' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name_UNIQUE' => array('column' => 'name', 'unique' => 1),
			'code' => array('column' => 'code', 'unique' => 1)
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
			'code' => 'Lorem ipsum dolor ',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'view_couter' => 1,
			'image' => 'Lorem ipsum dolor sit amet',
			'image_dir' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'id' => 1
		),
	);

}
