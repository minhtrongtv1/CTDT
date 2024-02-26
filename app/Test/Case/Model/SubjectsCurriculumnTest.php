<?php
App::uses('SubjectsCurriculumn', 'Model');

/**
 * SubjectsCurriculumn Test Case
 */
class SubjectsCurriculumnTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subjects_curriculumn',
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
		'app.subject',
		'app.semester',
		'app.book',
		'app.subjects_book',
		'app.subjects_user',
		'app.knowledge',
		'app.program_objective'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SubjectsCurriculumn = ClassRegistry::init('SubjectsCurriculumn');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SubjectsCurriculumn);

		parent::tearDown();
	}

}
