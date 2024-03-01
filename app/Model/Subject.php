<?php

App::uses('AppModel', 'Model');

/**
 * Subject Model
 *
 * @property Semester $Semester
 * @property Book $Book
 * @property Curriculumn $Curriculumn
 * @property User $User
 */
class Subject extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $actsAs = array(
        'Upload.Upload' => array(
            'syllabus_filename' => array(
                'fields' => array(
                    'dir' => 'syllabus_path',
                    'maxSize' => 200
                )
            )
        )
    );

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
                'message' => 'Tên học phần này đã có',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'theory_credit' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            'message' => 'Bạn không được bỏ trống thông tin này',
            //'allowEmpty' => false,
            'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'practice_credit' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            'message' => 'Bạn không được bỏ trống thông tin này',
            //'allowEmpty' => false,
            'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'theory_hour' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            'message' => 'Bạn không được bỏ trống thông tin này',
            //'allowEmpty' => false,
            'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'practice_hour' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            'message' => 'Bạn không được bỏ trống thông tin này',
            //'allowEmpty' => false,
            'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'self_learning_time' => array(
            'numeric' => array(
                'rule' => array('numeric'),
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
        
        
        
        'syllabus_filename' => array(
           'rule' => array('isValidMimeType', array('application/pdf'), false),
            'message' => 'Bạn phải nhập file PDF'
        )
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
   

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Book' => array(
            'className' => 'Book',
            'joinTable' => 'subjects_books',
            'foreignKey' => 'subject_id',
            'associationForeignKey' => 'book_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'Curriculumn' => array(
            'className' => 'Curriculumn',
            'joinTable' => 'subjects_curriculumns',
            'foreignKey' => 'subject_id',
            'associationForeignKey' => 'curriculumn_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'User' => array(
            'className' => 'User',
            'joinTable' => 'subjects_users',
            'foreignKey' => 'subject_id',
            'associationForeignKey' => 'user_id',
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
