<?php
App::uses('Group', 'Model');

/**
 * Group Test Case
 */
class GroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.group',
		'app.user',
		'app.users_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Group = ClassRegistry::init('Group');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Group);

		parent::tearDown();
	}

/**
 * testParentNode method
 *
 * @return void
 */
	public function testParentNode() {
		$this->markTestIncomplete('testParentNode not implemented.');
	}

/**
 * testGetGroupIdByAlias method
 *
 * @return void
 */
	public function testGetGroupIdByAlias() {
		$this->markTestIncomplete('testGetGroupIdByAlias not implemented.');
	}

}
