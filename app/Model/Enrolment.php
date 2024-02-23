<?php
App::uses('AppModel', 'Model');
/**
 * Enrolment Model
 *
 * @property Workshop $Workshop
 * @property Student $Student
 */
class Enrolment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'teacher_id';
        public $actsAs=array('Containable');

        /**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'workshop_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'teacher_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Workshop' => array(
			'className' => 'Workshop',
			'foreignKey' => 'workshop_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Teacher' => array(
			'className' => 'User',
			'foreignKey' => 'teacher_id',
			'conditions' => '',
			'fields' => '',
			'order' => array('first_name'=>'ASC')
		)
	);
}
