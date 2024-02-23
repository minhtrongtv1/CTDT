<?php

App::uses('AppModel', 'Model');

/**
 * Message Model
 *
 * @property Sender $Sender
 * @property User $Recipient
 */
class Message extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'message';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';
    public $actsAs = array('Containable');

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'title' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'content' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'sender_id' => array(
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
        'Sender' => array(
            'className' => 'User',
            'foreignKey' => 'sender_id',
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
        'Recipient' => array(
            'className' => 'User',
            'joinTable' => 'messages_users',
            'foreignKey' => 'message_id',
            'associationForeignKey' => 'recipient_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        )
    );

    public function afterSave($created, $options = array()) {
        parent::afterSave($created, $options);
        if ($created) {
            $user = ClassRegistry::init('User');
            $saveMessage = $this->read();
            $messageId = $saveMessage['Message']['id'];
            $senderId = $saveMessage['Message']['sender_id'];
            foreach ($saveMessage['Recipient']as $recipient) {
                $user->notify($recipient['id'], 'message', array('User' => $senderId, 'Message' => $messageId));
            }
        }
    }

    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
        //TÌm những thông báo liên quan đến Message để xóa

        $notify = ClassRegistry::init('Notification.Notification');
        $user = ClassRegistry::init('User');
        debug($user->isAdmin());
        die;
        if (!$user->isAdmin()) {
            $notify->markAsDeleted($this->Auth->user('id'), 'Message', $this->id);
        } else {
            $notify->deleteByAdmin($this->Auth->user('id'), 'Message', $this->id);
        }
    }

    public function getRecipient($id = null) {
        if ($id) {
            $this->id = $id;
        }
        if (!$this->exists()) {
            throw new Exception('Tin nhắn không tồn tại');
        }

        $message = $this->find('first', array('conditions' => array('Message.id' => $id), 'contain' => array('Recipient' => array('fields' => array('id')))));

        if (!empty($message['Recipient'])) {

            return Set::classicExtract($message['Recipient'], '{n}.id');
        }
        return array();
    }

    public function isRecipient($id = null) {
        if (!$id) {
            $id = $this->id;
        }
        $userId = AuthComponent::user('id');
        $message = $this->find('first', array('conditions' => array('Message.id' => $id)));


        if (in_array($userId, Set::classicExtract($message['Recipient'], '{n}.id'))) {
            return true;
        } return false;
    }

    public function isSender($id = null) {
        if (!$id) {
            $id = $this->id;
        }
        $userId = AuthComponent::user('id');
        $isTrue = $this->find('count', array(
            'conditions' => array('Message.id' => $id, 'Message.sender_id' => $userId)));

        return $isTrue > 0;
    }

}
