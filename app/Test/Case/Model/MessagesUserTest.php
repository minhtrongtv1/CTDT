<?php
App::uses('MessagesUser', 'Model');

/**
 * MessagesUser Test Case
 */
class MessagesUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.messages_user',
		'app.message',
		'app.user',
		'app.notification',
		'app.subject',
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
		$this->MessagesUser = ClassRegistry::init('MessagesUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MessagesUser);

		parent::tearDown();
	}

}
