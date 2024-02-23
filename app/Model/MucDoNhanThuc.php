<?php

App::uses('AppModel', 'Model');

/**
 * MucDoNhanThuc Model
 *
 * @property LinhVucNhanThuc $LinhVucNhanThuc
 * @property DongTuTheHien $DongTuTheHien
 */
class MucDoNhanThuc extends AppModel {

    /**
     * Use database config
     *
     * @var string
     */
    public $useDbConfig = 'offline';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'linh_vuc_muc_do_level_name';
    
    
    

    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->virtualFields['linh_vuc_muc_do_level_name'] = sprintf(
                'SELECT CONCAT(%s.level," - ",%s.name," (",LinhVucNhanThuc.name,")") as %s__linh_vuc_muc_do_level_name
        FROM  linh_vuc_nhan_thucs  as LinhVucNhanThuc 
         where %s.linh_vuc_nhan_thuc_id=LinhVucNhanThuc.id', $this->alias, $this->alias,$this->alias,$this->alias
        );
    }

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
        'linh_vuc_nhan_thuc_id' => array(
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
        'LinhVucNhanThuc' => array(
            'className' => 'LinhVucNhanThuc',
            'foreignKey' => 'linh_vuc_nhan_thuc_id',
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
        'DongTuTheHien' => array(
            'className' => 'DongTuTheHien',
            'foreignKey' => 'muc_do_nhan_thuc_id',
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
