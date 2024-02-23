<?php

App::uses('AppModel', 'Model');

/**
 * DuDoanHungBien Model
 *
 * @property ThiSinh $ThiSinh
 */
class DuDoanHungBien extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'ho_va_ten';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'ho_va_ten' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'so_dien_thoai' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Số điện thoại này đã tham gia dự đoán rồi.',
                'required' => 'create'
            ),
        ),
        'thi_sinh_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'so_du_doan' => array(
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
        'ThiSinh' => array(
            'className' => 'ThiSinhHungBien',
            'foreignKey' => 'thi_sinh_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
