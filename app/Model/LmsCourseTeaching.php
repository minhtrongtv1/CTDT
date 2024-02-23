<?php

App::uses('AppModel', 'Model');

/**
 * LmsCourseTeaching Model
 *
 * @property LmsCourse $LmsCourse
 * @property Teacher $Teacher
 */
class LmsCourseTeaching extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'lms_course_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'teacher_email' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'LmsCourse' => array(
            'className' => 'LmsCourse',
            'foreignKey' => 'lms_course_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Teacher' => array(
            'className' => 'User',
            'foreignKey' => 'teacher_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
