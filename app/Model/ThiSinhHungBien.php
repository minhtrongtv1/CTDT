<?php

App::uses('AppModel', 'Model');

/**
 * ThiSinhHungBien Model
 *
 * @property DuDoanHungBien $DuDoanHungBien
 */
class ThiSinhHungBien extends AppModel {

    /**
     * Display field
     *
     * @var string
     */

    /**
     * Display field
     *
     * @var string
     */
    public $actsAs = array(
        'Containable',
   
 
        'Upload.Upload' => array(
            'anh_dai_dien' => array(
                'fields' => array(
                    'dir' => 'anh_dai_dien_path',
                    'maxSize' => 1024
                )
            )
    ));
    public $displayField = 'sbd_ho_va_ten';

    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->virtualFields['sbd_ho_va_ten'] = sprintf(
                'SELECT CONCAT(so_bao_danh,"-",ho_va_ten) as %s__sbd_ho_va_ten', $this->alias
        );
    }
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
        'so_bao_danh' => array(
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
        'DuDoanHungBien' => array(
            'className' => 'DuDoanHungBien',
            'foreignKey' => 'thi_sinh_id',
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
