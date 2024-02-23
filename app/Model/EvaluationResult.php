<?php
App::uses('AppModel', 'Model');
/**
 * EvaluationResult Model
 *
 * @property EvaluationRound $EvaluationRound
 * @property Course $Course
 * @property Supporter $Supporter
 */
class EvaluationResult extends AppModel {

    
    public $actsAs = array('Containable');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'evaluation_round_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'course_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            'pass' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Vui lòng chọn kết quả',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'update', // Limit validation to 'create' or 'update' operations
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
		'EvaluationRound' => array(
			'className' => 'EvaluationRound',
			'foreignKey' => 'evaluation_round_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Supporter' => array(
			'className' => 'User',
			'foreignKey' => 'supporter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
