<?php
App::uses('KindOfBook', 'Model');

/**
 * KindOfBook Test Case
 */
class KindOfBookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.kind_of_book',
		'app.book'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->KindOfBook = ClassRegistry::init('KindOfBook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->KindOfBook);

		parent::tearDown();
	}

}
