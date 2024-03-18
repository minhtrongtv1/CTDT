<?php

App::uses('AppModel', 'Model');

/**
 * Industryleader Model
 *
 * @property User $User
 * @property Curriculumn $Curriculumn
 * @property Role $Role
 * @property Level $Level
 * @property Major $Major
 */
class Industryleader extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'curriculumn_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'role_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'level_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'major_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
            'unique' => array(
                'rule' => 'validateUniqueMajorId',
                'message' => 'Tên ngành đào tạo này đã có'
            ),
        ),
    );

    // Trả về true nếu tên giáo viên đã tồn tại trong ngành, ngược lại trả về false

    public function validateUniqueMajorId($data) {
        $majorId = $data['major_id'];
        $levelId = $data['level_id'];

        $conditions = array(
            'Industryleader.major_id' => $majorId,
            'Industryleader.level_id' => $levelId
        );

        if (!empty($this->id)) {
            // Make sure we exclude the current record.
            $conditions[$this->alias . '.' . $this->primaryKey . ' !='] = $this->id;
        }

        $recordCount = $this->find('count', array('conditions' => $conditions));

        // Kiểm tra nếu có ít nhất một bản ghi khác có cùng major_id và level_id
        if ($recordCount > 0) {
            // Trả về false để hiển thị thông báo lỗi
            return false;
        }

        return true;
    }

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Curriculumn' => array(
            'className' => 'Curriculumn',
            'foreignKey' => 'curriculumn_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
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
        )
    );
}
