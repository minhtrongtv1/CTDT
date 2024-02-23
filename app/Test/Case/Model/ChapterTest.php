<?php
App::uses('Chapter', 'Model');

/**
 * Chapter Test Case
 */
class ChapterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chapter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Chapter = ClassRegistry::init('Chapter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Chapter);

		parent::tearDown();
	}

}
