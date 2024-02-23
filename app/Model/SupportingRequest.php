<?php

App::uses('AppModel', 'Model');

/**
 * SupportingRequest Model
 *
 * @property Requester $Requester
 * @property Supporter $Supporter
 */
class SupportingRequest extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

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
        'description' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'requester_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'requested_time' => array(
            'datetime' => array(
                'rule' => array('datetime'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'status' => array(
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
        'Requester' => array(
            'className' => 'User',
            'foreignKey' => 'requester_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Supporter' => array(
            'className' => 'User',
            'foreignKey' => 'supporter_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    //
    protected function sendmail($email, $subject, $content) {
        $Email = new CakeEmail();
        $Email->config('office365');
        try {
            $Email->to($email);
            $Email->subject($subject);
            $Email->cc(array('thaitoan2210@gmail.com', 'nttoan@my.tvu.edu.vn'));
            $Email->send($content);
            //$this->TeachingPlan->updateAll(array('send_approved_require' => 1), $conditions);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    protected function test_sendmail() {
        $Email = new CakeEmail();
        $Email->config('office365');
        try {
            $Email->to('thaitoan2210@gmail.com');
            $Email->subject("Test send email");
            //$Email->cc(array('huynhnhu@tvu.edu.vn', 'myhuyentvu@gmail.com', 'nttoan@tvu.edu.vn'));
            $Email->send('Nội dung test email');
            //$this->TeachingPlan->updateAll(array('send_approved_require' => 1), $conditions);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function afterSave($created, $options = []) {

        parent::afterSave($created, $options);
        if ($created) {

            //Gửi mail thông báo cho BCT
            //Bước 1. Lấy danh sách bct phụ trách khoa của người gửi yêu cầu của khoa
            $request_id = $this->data['SupportingRequest']['requester_id'];
            $this->Requester->id = $request_id;
            $department_id = $this->Requester->field('department_id');

            $departmentSupporter = ClassRegistry::init('DepartmentSupporter');
            $bang_phan_cong = $departmentSupporter->find('all', array(
                'conditions' => array('DepartmentSupporter.department_id' => $department_id),
                'contain' => array('Supporter' => array('fields' => array('Supporter.email'))),
                'fields' => array('DepartmentSupporter.department_id', 'DepartmentSupporter.supporter_id')));
            if (!empty($bang_phan_cong)) {
                //Bước 2. Gửi mail
                foreach ($bang_phan_cong as $reciever) {
                    //$name = $reciever['Supporter']['name'];
                    $email = $reciever['Supporter']['email'];

                    $email_split = explode('@', $email);
                    if ($email_split[1] == 'tvu.edu.vn') {
                        $email = $email_split[0] . '@my.tvu.edu.vn';
                    }
                }

                $subject = '[TLC] Yêu cầu ' . $this->data['SupportingRequest']['title'] . ' cần được xử lý!';
                $message = $this->data['SupportingRequest']['description'];
                $this->sendmail($email, $subject, $message);
            }
        } else {
            //$subject = '[TLC] Yêu cầu ' . $this->data['SupportingRequest']['title'] . ' cần được xử lý!';
            //$message = $this->data['SupportingRequest']['description'];
            //$this->sendmail('nttoan@my.tvu.edu.vn', $subject, $message);
            //
            if ($this->data['SupportingRequest']['status'] == YEU_CAU_HO_TRO_DA_XU_LY) {
                $this->Requester->id = $this->data['SupportingRequest']['requester_id'];
                $email = $this->Requester->field('email');

                $email_split = explode('@', $email);
                if ($email_split[1] == 'tvu.edu.vn') {
                    $email = $email_split[0] . '@my.tvu.edu.vn';
                }
                $subject = '[TLC] Yêu cầu ' . $this->data['SupportingRequest']['title'] . ' đã được xử lý!';
                $message = $this->data['SupportingRequest']['responsing'];
                $this->sendmail($email, $subject, $message);
            }
        }
    }

}
