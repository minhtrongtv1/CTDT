<?php

App::uses('AppModel', 'Model');

/**
 * SubjectsBook Model
 *
 * @property Subject $Subject
 * @property Book $Book
 */
class SubjectsBook extends AppModel {



    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'subject_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            'message' => 'Bạn không được bỏ trống thông tin này',
            //'allowEmpty' => false,
            'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'book_id' => array(
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
        'Subject' => array(
            'className' => 'Subject',
            'foreignKey' => 'subject_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Book' => array(
            'className' => 'Book',
            'foreignKey' => 'book_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
