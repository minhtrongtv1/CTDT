<?php
App::uses('AppModel', 'Model');
/**
 * ProgramObjective Model
 *
 * @property Curriculumn $Curriculumn
 * @property Programoutcome $Programoutcome
 * @property Typeobjective $Typeobjective
 */
class ProgramObjective extends AppModel {

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
		'programoutcome_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'typeobjective_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'describe' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'level' => array(
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
		'Programoutcome' => array(
			'className' => 'Programoutcome',
			'foreignKey' => 'programoutcome_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Typeobjective' => array(
			'className' => 'Typeobjective',
			'foreignKey' => 'typeobjective_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
