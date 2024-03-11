<?php

App::uses('AppModel', 'Model');

/**
 * ProgramObjective Model
 *
 * @property ProgramOutcome $ProgramOutcome
 * @property Knowledge $Knowledge
 */
class ProgramObjective extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'curriculumn_id' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'group_type' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'code' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            array(
                'rule' => array('isUnique'),
                'message' => 'Tên chuẩn đầu ra này đã có',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'program_outcome_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'describe' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Bạn không được bỏ trống thông tin này',
                'allowEmpty' => true,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
'level' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
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
        'ProgramOutcome' => array(
            'className' => 'ProgramOutcome',
            'foreignKey' => 'program_outcome_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Curriculumn' => array(
            'className' => 'Curriculumn',
            'foreignKey' => 'curriculumn_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Knowledge' => array(
            'className' => 'Knowledge',
            'foreignKey' => 'program_objective_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
//       
    );
}