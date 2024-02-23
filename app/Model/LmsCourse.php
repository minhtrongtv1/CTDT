<?php

App::uses('AppModel', 'Model');

/**
 * LmsCourse Model
 *
 * @property LmsCourseTeaching $LmsCourseTeaching
 */
class LmsCourse extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'fullname';

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
        'fullname' => array(
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
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'LmsCourseTeaching' => array(
            'className' => 'LmsCourseTeaching',
            'foreignKey' => 'lms_course_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    
    
        /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Department',
            'foreignKey' => 'categoryid',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
