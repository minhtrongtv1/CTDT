<?php

App::uses('AppModel', 'Model');

/**
 * MessagesUser Model
 *
 * @property Message $Message
 * @property Recipient $Recipient
 */
class MessagesUser extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'message_id';


    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Message' => array(
            'className' => 'Message',
            'foreignKey' => 'message_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Recipient' => array(
            'className' => 'User',
            'foreignKey' => 'recipient_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
