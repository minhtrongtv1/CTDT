<?php
App::uses('LmsCourseTeachingsController', 'Controller');

/**
 * LmsCourseTeachingsController Test Case
 */
class LmsCourseTeachingsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lms_course_teaching',
		'app.lms_course',
		'app.department',
		'app.course',
		'app.evaluation_result',
		'app.teaching',
		'app.department_supporter',
		'app.user',
		'app.project',
		'app.field',
		'app.team',
		'app.attachment',
		'app.notification',
		'app.subject',
		'app.message',
		'app.messages_user',
		'app.group',
		'app.users_group'
	);

}
