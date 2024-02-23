<?php
App::uses('Curriculum', 'Model');

/**
 * Curriculum Test Case
 */
class CurriculumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.curriculum',
		'app.degree',
		'app.major',
		'app.training_form',
		'app.department',
		'app.department_type',
		'app.user',
		'app.province',
		'app.hoc_ham',
		'app.hoc_vi',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group',
		'app.cirriculum_property',
		'app.curriculum_decorator',
		'app.curriculum_subject'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Curriculum = ClassRegistry::init('Curriculum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Curriculum);

		parent::tearDown();
	}

}
