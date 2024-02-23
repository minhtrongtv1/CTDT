<?php
App::uses('CurriculumnsReference', 'Model');

/**
 * CurriculumnsReference Test Case
 */
class CurriculumnsReferenceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.curriculumns_reference',
		'app.curriculumns'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CurriculumnsReference = ClassRegistry::init('CurriculumnsReference');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CurriculumnsReference);

		parent::tearDown();
	}

}
