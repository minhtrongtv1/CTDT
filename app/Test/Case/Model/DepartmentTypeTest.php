<?php
App::uses('DepartmentType', 'Model');

/**
 * DepartmentType Test Case
 */
class DepartmentTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.department_type',
		'app.department',
		'app.user',
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
		$this->DepartmentType = ClassRegistry::init('DepartmentType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DepartmentType);

		parent::tearDown();
	}

}
