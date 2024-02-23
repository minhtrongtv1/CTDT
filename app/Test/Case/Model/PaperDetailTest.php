<?php
App::uses('PaperDetail', 'Model');

/**
 * PaperDetail Test Case
 */
class PaperDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.paper_detail',
		'app.paper',
		'app.field',
		'app.journal',
		'app.journal_type',
		'app.user',
		'app.department',
		'app.department_type',
		'app.province',
		'app.hoc_vi',
		'app.school',
		'app.users_relative',
		'app.relative',
		'app.enrollment',
		'app.course',
		'app.chapter',
		'app.level',
		'app.study_progress',
		'app.buoi_hoc',
		'app.room',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
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
		$this->PaperDetail = ClassRegistry::init('PaperDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaperDetail);

		parent::tearDown();
	}

}
