<?php

App::uses('AppModel', 'Model');

/**
 * LinhVucNhanThuc Model
 *
 * @property MucDoNhanThuc $MucDoNhanThuc
 */
class LinhVucNhanThuc extends AppModel {

    /**
     * Use database config
     *
     * @var string
     */
    public $useDbConfig = 'offline';

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    //public $useTable = 'linh_vuc_nhan_thuc';

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
        'name' => array(
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
        'MucDoNhanThuc' => array(
            'className' => 'MucDoNhanThuc',
            'foreignKey' => 'linh_vuc_nhan_thuc_id',
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
