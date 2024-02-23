<?php
App::uses('School', 'Model');

/**
 * School Test Case
 */
class SchoolTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.school',
		'app.user',
		'app.department',
		'app.department_type',
		'app.province',
		'app.hoc_vi',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->School = ClassRegistry::init('School');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->School);

		parent::tearDown();
	}

}
