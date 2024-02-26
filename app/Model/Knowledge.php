<?php

App::uses('AppModel', 'Model');

/**
 * Knowledge Model
 *
 * @property ProgramObjective $ProgramObjective
 * @property SubjectsCurriculumn $SubjectsCurriculumn
 */
class Knowledge extends AppModel {

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
        'program_objective_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            'message' => 'Bạn không được bỏ trống thông tin này',
            //'allowEmpty' => false,
            'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name' => array(
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
                'message' => 'Tên khối kiến thức này đã có',
            //'allowEmpty' => false,
            //'required' => false,
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
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'ProgramObjective' => array(
            'className' => 'ProgramObjective',
            'foreignKey' => 'program_objective_id',
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
        'SubjectsCurriculumn' => array(
            'className' => 'SubjectsCurriculumn',
            'foreignKey' => 'knowledge_id',
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
    );
}
