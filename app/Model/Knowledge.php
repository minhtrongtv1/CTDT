<?php

App::uses('AppModel', 'Model');

/**
 * Knowledge Model
 *
 * @property ProgramObjective $ProgramObjective
 * @property SubjectsCurriculumn $SubjectsCurriculumn
 */
class Knowledge extends AppModel {

    /**
     * Display field
     *
     * @var string
     */


    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'ProgramObjective' => array(
            'className' => 'ProgramObjective',
            'foreignKey' => 'program_objective_id',
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
        'SubjectsCurriculumn' => array(
            'className' => 'SubjectsCurriculumn',
            'foreignKey' => 'knowledge_id',
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