<?php

App::uses('AppModel', 'Model');

/**
 * ProgramOutcome Model
 *
 * @property Typeoutcome $Typeoutcome
 * @property Curriculumn $Curriculumn
 */
class ProgramOutcome extends AppModel {

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
        'code' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Mã này đã tồn tại',
            //'allowEmpty' => false,
            //'required' => false,
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
                'message' => 'Tên mục tiêu này đã có',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'content' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Bạn không được bỏ trống thông tin này',
                'allowEmpty' => true,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'typeoutcome_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'curriculumn_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
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
        'Typeoutcome' => array(
            'className' => 'Typeoutcome',
            'foreignKey' => 'typeoutcome_id',
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
}
