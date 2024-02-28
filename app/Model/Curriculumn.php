<?php

App::uses('AppModel', 'Model');

/**
 * Curriculumn Model
 *
 * @property Level $Level
 * @property Major $Major
 * @property FormOfTrainning $FormOfTrainning
 * @property Subject $Subject
 */
class Curriculumn extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name_vn';
    public $actsAs = array(
        'Upload.Upload' => array(
            'image_filename' => array(
                'fields' => array(
                    'dir' => 'image_path',
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
        'level_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'major_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'form_of_trainning_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name_vn' => array(
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
                'message' => 'Tên chương trình này đã có',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name_eng' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Bạn không được bỏ trống thông tin này',
                'allowEmpty' => true,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'credit' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'enrollment_subject' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Bạn không được bỏ trống thông tin này',
                //'allowEmpty' => false,
                'required' => true,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'point_ladder' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Bạn không được bỏ trống thông tin này',
                'allowEmpty' => true,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'graduation_condition' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Bạn không được bỏ trống thông tin này',
                'allowEmpty' => true,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
//        'diploma' => array(
//            'notBlank' => array(
//                'rule' => array('notBlank'),
//                'message' => 'Bạn không được bỏ trống thông tin này',
//                //'allowEmpty' => false,
//                'required' => true,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
        'image_filename' => array(
            'rule' => array('isValidMimeType', array('image/png', 'image/jpeg'), false),
            'message' => 'Bạn phải chọn ảnh định dạng PNG hoặc JPEG'
        )
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Level' => array(
            'className' => 'Level',
            'foreignKey' => 'level_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Major' => array(
            'className' => 'Major',
            'foreignKey' => 'major_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'FormOfTrainning' => array(
            'className' => 'FormOfTrainning',
            'foreignKey' => 'form_of_trainning_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Subject' => array(
            'className' => 'Subject',
            'joinTable' => 'subjects_curriculumns',
            'foreignKey' => 'curriculumn_id',
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
