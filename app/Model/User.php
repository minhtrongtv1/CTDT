<?php

App::uses('AppModel', 'Model');

class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'ho_va_ten_khoa_code';
    
    
    
    
    public $actsAs = array(
        'Acl' => array('type' => 'requester'),
        'Containable',
        'Notification.Notifiable' => array(
            'subjects' => array('User', 'Message')
        ),
        'Upload.Upload' => array(
            'avatar' => array(
                'fields' => array(
                    'dir' => 'avatar_dir',
                    'maxSize' => 200
                )
            )
        )
    );
    public $validate = array(
        'first_name' => array(
            'mustNotEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'Vui lòng nhập tên')
        ),
        'last_name' => array(
            'mustNotEmpty' => array(
                'rule' => 'notBlank',
                
                'message' => 'Vui lòng nhập họ lót'
            )
        ),
        'department_id' => array(
            'mustNotEmpty' => array(
                'rule' => 'notBlank',
          
                'message' => 'Vui lòng nhập khoa'
            )
        ),
        
        'ngay_sinh' => array(
            'mustNotEmpty' => array(
                'rule' => 'notBlank',
          
                'message' => 'Vui lòng nhập ngày sinh định dạng dd/mm/yyyy'
            )
        ),
        'noi_sinh' => array(
            'mustNotEmpty' => array(
                'rule' => 'notBlank',
          
                'message' => 'Vui lòng chọn nơi sinh'
            )
        ),
        
        'department_id' => array(
            'mustNotEmpty' => array(
                'rule' => 'notBlank',
                'on' => 'create',
                'message' => 'Vui lòng nhập khoa'
            )
        ),
        
        'email' => array(
            'mustNotEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'Vui lòng nhập email',
                'last' => true),
            'mustBeEmail' => array(
                'rule' => array('email'),
                'message' => 'Vui lòng nhập địa chỉ email đúng định dạng',
                'last' => true),
            'mustUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Email này đã đăng ký rồi',
                'on' => 'create'
            )
        ),
        'oldpassword' => array(
            'mustNotEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'Nhập password cũ',
                'last' => true,
            ),
            'mustMatch' => array(
                'rule' => array('verifyOldPass'),
                'message' => 'Nhập chính xác password cũ'),
        ),
        'password' => array(
            'mustNotEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'Vui lòng nhập password',
                'on' => 'create',
                'last' => true),
            'mustBeLonger' => array(
                'rule' => array('minLength', 6),
                'message' => 'Password có ít nhất 6 ký tự',
                'on' => 'create',
                'last' => true),
            'mustMatch' => array(
                'rule' => array('verifies'),
                'message' => 'Password chưa giống nhau'),
        //'on' => 'create'
        ),
        'username' => array(
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Username này đã có người sử dụng'
            ),
        ),
        
        
    );

    function isValidUSPhoneFormat($phone) {

        $phone_no = $phone['so_dien_thoai'];
        $phone_no = str_replace(array('-', '.', ' '), '', $phone_no);

        $errors = array();
        if (empty($phone_no)) {
            $errors [] = "Vui lòng nhập số điện thoại";
        } else if (!preg_match('/^0[0-9]{9}$/', $phone_no)) {
            $errors [] = "Vui lòng nhập số điện thoại đúng định dạng";
        }

        if (!empty($errors))
            return implode("\n", $errors);

        return true;
    }

    public function __construct($id = false, $table = null, $ds = null) {

        

        parent::__construct($id, $table, $ds);
        $this->virtualFields['name'] = sprintf(
                'CONCAT(%s.last_name, " ", %s.first_name)', $this->alias, $this->alias
        );
        $this->virtualFields['name_username'] = sprintf(
                'CONCAT(%s.last_name, " ", %s.first_name," (",%s.email,")")', $this->alias, $this->alias, $this->alias
        );
        
        $this->virtualFields['ho_va_ten_khoa_code'] = sprintf(
                'SELECT CONCAT(%s.last_name, " ", %s.first_name,"-",code) as %s__ho_va_ten_khoa_code
        FROM  departments  as Department 
         where %s.department_id=Department.id', $this->alias, $this->alias,$this->alias,$this->alias
        );
    }

    public function parentNode() {
        return null;
    }

    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        if (!empty($this->data[$this->alias]['ngay_sinh'])) {

            $this->data[$this->alias]['ngay_sinh'] = $this->dateFormatBeforeSave(
                    $this->data[$this->alias]['ngay_sinh']
            );
        }
        if (!empty($this->data[$this->alias]['ngay_cap'])) {

            $this->data[$this->alias]['ngay_cap'] = $this->dateFormatBeforeSave(
                    $this->data[$this->alias]['ngay_cap']
            );
        }
    }

    public function beforeSave($options = array()) {
        if (!empty($this->data[$this->alias]['ngay_sinh'])) {

            $this->data[$this->alias]['ngay_sinh'] = $this->dateFormatBeforeSave(
                    $this->data[$this->alias]['ngay_sinh']
            );
        }
        if (!empty($this->data[$this->alias]['ngay_cap'])) {

            $this->data[$this->alias]['ngay_cap'] = $this->dateFormatBeforeSave(
                    $this->data[$this->alias]['ngay_cap']
            );
        }

        if (!empty($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password(
                            $this->data['User']['password']
            );
        }


        return true;
    }

    public function afterFind($results, $primary = false) {

        foreach ($results as $key => $val) {
            if (isset($val[$this->alias]['ngay_sinh'])) {
                $results[$key][$this->alias]['ngay_sinh'] = $this->dateFormatAfterFind(
                        $val[$this->alias]['ngay_sinh']
                );
            }
            if (isset($val[$this->alias]['ngay_cap'])) {
                $results[$key][$this->alias]['ngay_cap'] = $this->dateFormatAfterFind(
                        $val[$this->alias]['ngay_cap']
                );
            }
        }

        return $results;
    }

    public function dateFormatAfterFind($dateString) {
        return date('d/m/Y', strtotime($dateString));
    }

    public function dateFormatBeforeSave($dateString) {
        $dateString = str_replace('/', '-', $dateString);
        return date('Y-m-d', strtotime($dateString));
    }

    /**
     * model validation array
     *
     * @var array
     */
    function RegisterValidate() {
        $validate = array(
            array(
                'first_name' => array(
                    'mustNotEmpty' => array(
                        'rule' => 'notBlank',
                        'message' => 'Vui lòng nhập tên')
                ),
                'last_name' => array(
                    'mustNotEmpty' => array(
                        'rule' => 'notBlank',
                        'on' => 'create',
                        'message' => 'Vui lòng nhập họ lót'
                    )
                ),
                'email' => array(
                    'mustNotEmpty' => array(
                        'rule' => 'notBlank',
                        'message' => 'Vui lòng nhập email',
                        'last' => true),
                    'mustBeEmail' => array(
                        'rule' => array('email'),
                        'message' => 'Vui lòng nhập địa chỉ email đúng định dạng',
                        'last' => true),
                    'mustUnique' => array(
                        'rule' => 'isUnique',
                        'message' => 'Email này đã đăng ký rồi',
                        'on' => 'create'
                    )
                ),
                'oldpassword' => array(
                    'mustNotEmpty' => array(
                        'rule' => 'notBlank',
                        'message' => 'Nhập password cũ',
                        'last' => true,
                    ),
                    'mustMatch' => array(
                        'rule' => array('verifyOldPass'),
                        'message' => 'Nhập chính xác password cũ'),
                ),
                'password' => array(
                    'mustNotEmpty' => array(
                        'rule' => 'notBlank',
                        'message' => 'Vui lòng nhập password',
                        'on' => 'create',
                        'last' => true),
                    'mustBeLonger' => array(
                        'rule' => array('minLength', 6),
                        'message' => 'Password có ít nhất 6 ký tự',
                        'on' => 'create',
                        'last' => true),
                    'mustMatch' => array(
                        'rule' => array('verifies'),
                        'message' => 'Password chưa giống nhau'),
                //'on' => 'create'
                ),
                'username' => array(
                    'isUnique' => array(
                        'rule' => 'isUnique',
                        'message' => 'Username này đã có người sử dụng'
                    ),
                ),
                'ngay_sinh' => array(
                    'date' => array(
                        'rule' => array('date'),
                        'message' => 'Hãy nhập ngày định dạng dd/mm/yyyy ví dụ 15/10/2019',
                    )
                )
        ));
        $this->validate = $validate;
        return $this->validates();
    }

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'department_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'NoiSinh' => array(
            'className' => 'Province',
            'foreignKey' => 'noi_sinh',
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
        'Group' => array(
            'className' => 'Group',
            'joinTable' => 'users_groups',
            'foreignKey' => 'user_id',
            'associationForeignKey' => 'group_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
        'Message' => array(
            'className' => 'Message',
            'joinTable' => 'messages_users',
            'foreignKey' => 'recipient_id',
            'associationForeignKey' => 'message_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ),
    );

    /**
     * So sánh mật khẩu cũ và mật khẩu mới
     *
     * @access public
     * @return boolean
     */
    public function verifyOldPass() {
        $userId = AuthComponent::user('id');
        $user = $this->findById($userId);
        $oldpass = AuthComponent::password($this->data['User']['oldpassword']);

        return($user['User']['password'] === $oldpass);
    }

    /**
     * Kiểm tra khớp giữa 2 mật khẩu nhập vào
     *
     * @access public
     * @return boolean
     */
    public function verifies() {
        return ($this->data['User']['password'] === $this->data['User']['cpassword']);
    }

    /**
     * Lấy mảng group của user đã đăng nhập
     *
     * @access public
     * @return boolean
     */
    public function getAllGroupId() {
        $user = $this->find('first', array('fields' => array('id'),
            'contain' => array('Group' => array('fields' => array('id', 'alias'))),
            'conditions' => array('User.id' => AuthComponent::user('id')))
        );
        return Set::classicExtract($user['Group'], '{n}.id');
    }

    public function getAllGroupAlias() {
        $user = $this->find('first', array('fields' => array('id'),
            'contain' => array('Group' => array('fields' => array('id', 'alias'))),
            'conditions' => array('User.id' => AuthComponent::user('id')))
        );
        return Set::classicExtract($user['Group'], '{n}.alias');
    }

    /**
     * Lấy mảng group của user đã đăng nhập
     *
     * @access public
     * @return boolean
     */
    public function getDefaultGroupAlias() {
        /* $user = $this->find('first', array('fields' => array('id'),
          'contain' => array('Group' => array('fields' => array('id', 'alias'))),
          'conditions' => array('User.id' => AuthComponent::user('id')))
          );
          return Set::classicExtract($user['Group'], '{n}.id');
         * 
         */
        return 'registered';
    }

    /**
     * Kiểm tra người đăng nhâp có vai trò admin không
     *
     * @access public
     * @return boolean
     */
    public function isAdmin($id = null) {
        if (!$id) {
            $user = $this->find('first', array('fields' => array('id'), 'contain' => array('Group' => array('fields' => array('id', 'alias'), 'conditions' => array('Group.alias' => 'admin'))), 'conditions' => array('User.id' => AuthComponent::user('id'))));
        } else {
            $user = $this->find('first', array(
                'fields' => array('id'),
                'contain' => array('Group' => array('fields' => array('id', 'alias'), 'conditions' => array('Group.alias' => 'admin'))),
                'conditions' => array('User.id' => $id)));
        }

        return count($user['Group']) > 0;
    }

    /**
     * Kiểm tra người đăng nhâp có vai trò admin không
     *
     * @access public
     * @return boolean
     */
    public function isManager($id = null) {
        if (!$id) {
            $user = $this->find('first', array('fields' => array('id'), 'contain' => array('Group' => array('fields' => array('id', 'alias'), 'conditions' => array('Group.alias' => 'manager'))), 'conditions' => array('User.id' => AuthComponent::user('id'))));
        } else {
            $user = $this->find('first', array(
                'fields' => array('id'),
                'contain' => array('Group' => array('fields' => array('id', 'alias'), 'conditions' => array('Group.alias' => 'manager'))),
                'conditions' => array('User.id' => $id)));
        }

        return count($user['Group']) > 0;
    }

    public function afterSave($created, $options = array()) {
        if ($created) {
            $user = $this->find('first', array('fields' => array('id'),
                'contain' => array('Group' => array('fields' => array('id', 'alias', 'code'))),
                'conditions' => array('User.id' => $this->id)));

            $userGroups = Set::classicExtract($user['Group'], '{n}.code');
        }
    }

    /**
     * Returns an array of restaurants based on a kitchen id
     * @param string $kitchenId - the id of a kitchen
     * @return array of restaurants
     */
    public function getUserIdByGroupId($groupId = null) {
        if (!$groupId)
            $users = $this->find('all', array(
                'joins' => array(
                    array('table' => 'users_groups',
                        'alias' => 'UserGroup',
                        'type' => 'INNER',
                        'conditions' => array(
                            'UserGroup.user_id = User.id'
                        )
                    )
                ), 'fields' => array('id'),
                'group' => 'User.id'
            ));
        else
            $users = $this->find('all', array(
                'joins' => array(
                    array('table' => 'users_groups',
                        'alias' => 'UserGroup',
                        'type' => 'INNER',
                        'conditions' => array(
                            'UserGroup.group_id' => $groupId,
                            'UserGroup.user_id = User.id'
                        )
                    )
                ), 'fields' => array('id'),
                'group' => 'User.id'
            ));
        return Hash::extract($users, '{n}.User.id');
    }

    /**
     * Used to generate activation key
     *
     * @access public
     * @param string $password user password
     * @return hash
     */
    public function getActivationKey($password) {
        $salt = Configure::read("Security.salt");
        return md5(md5($password) . $salt);
    }

    /**
     * Used to send forgot password mail to user
     *
     * @access public
     * @param array $user user detail
     * @return void
     */
    public function forgotPassword($user) {
        $userId = $user['User']['id'];
        $activate_key = $this->getActivationKey($user ['User']['password']);
        $link = Router::url("/users/activatePassword?ident=$userId&activate=$activate_key", true);
        $body = "Xin chào " . $user['User']['first_name'] . ",bạn đã yêu cầu đổi mật khẩu. Hãy nhấp chuột vào liên kết bên dưới để đổi lại mật khẩu :" . $link . " Xin cảm ơn,\n";

        try {
            //Thực hiện gửi email thông báo cho quản trị viên
            $Email = new CakeEmail();
            $Email->config('default');
            //debug($Email);die;
            $Email->to($user['User']['email']);
            $Email->subject('Quên mật khẩu - Ngân hàng ý tưởng khởi nghiệp Trường Đại học Trà Vinh');
            $Email->send($body);
        } catch (Exception $exc) {
            $exc->getTrace();
            throw new Exception($exc->getTraceAsString());
        }
    }

    /**
     * Used to send registration mail to user
     *
     * @access public
     * @param array $user user detail array
     * @return void
     */
    public function sendRegistrationMail($user) {
        $userId = $user['User']['id'];
        $body = "Chào mừng " . $user['User']['first_name'] . ",Bạn đã đăng ký tài khoản thành công tại  " . SITE_URL . " \n\n Thanks,\n" . EMAIL_FROM_NAME;

        ClassRegistry::init('Queue.QueuedTask')->createJob('Email', array('settings' => array(
                'to' => $user['User']['email'],
                'subject' => 'Trung tâm Hỗ trợ - Phát triển Dạy và Học - Xác nhận đăng ký tài khoản đăng ký kỹ năng mềm.',
                'from' => 'thaitoan2210@gmail.com',
                'template' => 'welcome'),
            'vars' => array('content' => $body)
                ), null, 'Welcome');
    }

    /**
     * Used to send email verification mail to user
     *
     * @access public
     * @param array $user user detail array
     * @return void
     */
    public function sendVerificationMail($user) {
        $userId = $user['User']['id'];
        $activate_key = $this->getActivationKey($user['User']['password']);
        $link = Router::url("/userVerification?ident=$userId&activate=$activate_key", true);
        $body = "Hi " . $user['User']['first_name'] . ", Vui lòng click vào link bên dưới để hoàn tất đăng ký \n\n " . $link;
        ClassRegistry::init('Queue.QueuedTask')->createJob('Email', array('settings' => array(
                'to' => $user['User']['email'],
                'subject' => ' Ngân hàng ý tưởng khởi nghiệp',
                'from' => 'ytuongkhoinghiep@tvu.edu.vn',
                'template' => 'welcome'
            ),
            'vars' => array('content' => $body, '')
                ), null, 'Verification');
    }

    public function reSendVerificationMail($user) {
        $userId = $user['User']['id'];
        $activate_key = $this->getActivationKey($user['User']['password']);
        $link = Router::url("/userVerification?ident=$userId&activate=$activate_key", true);
        $body = "Xin chào " . $user['User']['first_name'] . ", Vui lòng click vào link bên dưới để hoàn tất đăng ký \n\n " . $link;
        ClassRegistry::init('Queue.QueuedTask')->createJob('Email', array('settings' => array(
                'to' => $user['User']['email'],
                'subject' => 'Sàn ý tưởng khởi nghiệp (Gửi lại)',
                'from' => 'thaitoan2210@gmail.com',
                'template' => 'welcome'
            ),
            'vars' => array('content' => $body, '')
                ), null, 'ReSendEmailVerification');
    }

    /**
     * model validation array
     *
     * @var array
     */
    function LoginValidate() {
        $validate1 = array(
            'username' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notBlank',
                    'message' => 'Vui lòng nhập username')
            ),
            'password' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notBlank',
                    'message' => 'Vui lòng nhập password')
            )
        );
        $this->validate = $validate1;
        return $this->validates();
    }

}
