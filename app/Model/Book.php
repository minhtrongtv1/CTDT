<?php

App::uses('AppModel', 'Model');

/**
 * Book Model
 *
 * @property Subject $Subject
 */
class Book extends AppModel {

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
                'required' => false,
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
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            array(
                'rule' => array('isUnique'),
                'message' => 'Tên tài liệu này đã có',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'author_name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'publisher' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Bạn không được bỏ trống thông tin này',
                'allowEmpty' => true,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'publishing_year' => array(
            'date' => array(
                'rule' => array('date'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'link_libary' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'pricing_code' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'quantity' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'note' => array(
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
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Subject' => array(
            'className' => 'Subject',
            'joinTable' => 'subjects_books',
            'foreignKey' => 'book_id',
            'associationForeignKey' => 'subject_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );
}
