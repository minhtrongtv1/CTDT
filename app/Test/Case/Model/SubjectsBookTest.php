<?php
App::uses('SubjectsBook', 'Model');

/**
 * SubjectsBook Test Case
 */
class SubjectsBookTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subjects_book',
		'app.subject',
		'app.semester',
		'app.book',
		'app.curriculumn',
		'app.level',
		'app.major',
		'app.department',
		'app.course',
		'app.evaluation_result',
		'app.evaluation_round',
		'app.user',
		'app.province',
		'app.group',
		'app.users_group',
		'app.message',
		'app.messages_user',
		'app.teaching',
		'app.department_supporter',
		'app.form_of_trainning',
		'app.subjects_curriculumn',
		'app.subjects_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SubjectsBook = ClassRegistry::init('SubjectsBook');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SubjectsBook);

		parent::tearDown();
	}

}
