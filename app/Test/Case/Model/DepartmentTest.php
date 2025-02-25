<?php
App::uses('Department', 'Model');

/**
 * Department Test Case
 */
class DepartmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.department'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Department = ClassRegistry::init('Department');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Department);

		parent::tearDown();
	}

/**
 * testGetDocumentsByDepartmentId method
 *
 * @return void
 */
	public function testGetDocumentsByDepartmentId() {
		$this->markTestIncomplete('testGetDocumentsByDepartmentId not implemented.');
	}

}
