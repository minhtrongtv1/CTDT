<?php

App::uses('AppModel', 'Model');

/**
 * Workshop Model
 *
 * @property Chapter $Chapter
 * @property Enrolment $Enrolment
 * @property Intrustor $Intrustor
 * @property Scheduling $Scheduling
 */
class Workshop extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $actsAs = array('Containable');
    /* so luong dang ky */
    public $virtualFields = array(
        'enrolledno' => "SELECT count(id) as Workshop__enrolledno 
        FROM  enrolments  as Enrolment 
         where Enrolment.workshop_id=Workshop.id",
        
        );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'chapter_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
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
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Chapter' => array(
            'className' => 'Chapter',
            'foreignKey' => 'chapter_id',
            'conditions' => '',
            'fields' => '',
            'order' => array('Chapter.name'=>'ASC')
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Enrolment' => array(
            'className' => 'Enrolment',
            'foreignKey' => 'workshop_id',
            'counterCache' => true,
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Intrustor' => array(
            'className' => 'Intrustor',
            'foreignKey' => 'workshop_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Scheduling' => array(
            'className' => 'Scheduling',
            'foreignKey' => 'workshop_id',
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
