<?php
App::uses('AppModel', 'Model');
/**
 * SubjectsCurriculumn Model
 *
 * @property Curriculumn $Curriculumn
 * @property Subject $Subject
 * @property Knowledge $Knowledge
 * @property Programobjective $Programobjective
 * @property Semester $Semester
 */
class SubjectsCurriculumn extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'curriculumn_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'subject_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'knowledge_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'programobjective_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'semester_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'typesubject' => array(
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
		'Curriculumn' => array(
			'className' => 'Curriculumn',
			'foreignKey' => 'curriculumn_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subject_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Knowledge' => array(
			'className' => 'Knowledge',
			'foreignKey' => 'knowledge_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Programobjective' => array(
			'className' => 'Programobjective',
			'foreignKey' => 'programobjective_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Semester' => array(
			'className' => 'Semester',
			'foreignKey' => 'semester_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
