<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow('register', 'login', 'logout', 'forgotPassword', 'googleLoginCalback',
                'activatePassword', 'view');
    }

    private function __checkRecaptchaResponse($response) {
        // verifying the response is done through a request to this URL
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        // The API request has three parameters (last one is optional)
        $data = array('secret' => Configure::read('Recaptcha.SecretKey'),
            'response' => $response,
            'remoteip' => $_SERVER['REMOTE_ADDR']);

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ),
        );

        // We could also use curl to send the API request
        $context = stream_context_create($options);
        $json_result = file_get_contents($url, false, $context);
        $result = json_decode($json_result);
        return $result->success;
    }

    public function login() {



        if ($this->Auth->user('id')) {
            return $this->redirect($this->Auth->loginRedirect);
        }

        $this->theme = 'Ace2Cake';

        $this->layout = 'login';

        if ($this->request->is('post')) {
// Important: Use login() without arguments! See warning below.
            if ($this->Auth->login()) {
                $this->writeToSessionLoginGroups();
                $this->Flash->success('Bạn đã đăng nhập thành công');
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Tài khoản đăng nhập không chính xác');
            }
        }
    }

    /**
     * Hàm này sẽ gửi yêu cầu xác nhận người dùng cho Google
     */
    public function goToGoogleLogin() {
        $this->autoRender = false;
        require_once '../Config/google_login.php';
        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');
        $url = $client->createAuthUrl();
        $this->redirect($url);
    }

    //

    /**
     * Used to register on the site
     *
     * @access public
     * @return void
     */
    public function register() {
        $userId = $this->Auth->user('id');
        if ($userId) {
            return $this->redirect($this->Auth->loginRedirect);
        }
        if (SITE_REGISTRATION) {

            if ($this->request->is('post')) {
                if (!$this->__checkRecaptchaResponse($this->request->data['g-recaptcha-response'])) {
                    $this->Flash->error('Bạn phải check vào ô bên dưới để xác nhận bạn không phải là người máy! ');
                    return $this->redirect('/dang-ky-tai-khoan');
                }
                $uhoten = trim($this->request->data ['User'] ['name']);
                $hoten = mb_convert_case(mb_strtolower($uhoten, 'UTF-8'), MB_CASE_TITLE, "UTF-8");
                // $hoten = ucwords(mb_strtolower($hoten, 'UTF-8'));
                $mang = explode(" ", $hoten);
                $ho = $mang [0];
                $n = count($mang);
                $ten = $mang [$n - 1];
                $lot = "";
                for ($i = 1; $i < $n - 1; $i++) {
                    $lot .= $mang [$i] . " ";
                }

                $this->request->data ['User'] ['first_name'] = $ten;
                $this->request->data ['User'] ['last_name'] = $ho . " " . trim($lot);

                /* Kiá»ƒm tra xem cÃ³ dÃ¹ng captcha */
                if (USE_RECAPTCHA && !$this->request->is('ajax')) {
                    $this->request->data ['User'] ['captcha'] = (isset($this->request->data ['recaptcha_response_field'])) ? $this->request->data ['recaptcha_response_field'] : "";
                }

//Set group registered (19)
                $this->request->data['Group']['Group'][0] = 19;

                $this->request->data ['User'] ['activated'] = 0;

                if (!EMAIL_VERIFICATION) {
                    $this->request->data ['User'] ['email_verified'] = 1;
                    $this->request->data ['User'] ['activated'] = 1;
                }
                //save successfully
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $userId = $this->User->id;
                    $user = $this->User->find('first', array(
                        'conditions' => array('User.id' => $userId),
                        'contain' => array('Group'),
                        'fields' => array('id', 'name', 'email', 'username', 'avatar')
                    ));

                    if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
                        $this->User->sendRegistrationMail($user);
                    }
                    if (EMAIL_VERIFICATION) {
                        $this->User->sendVerificationMail($user);
                    }
                    $this->Flash->success('Đăng ký tài khoản thành công.');
                    return $this->redirect('/login');
                } else {
                    $this->Flash->error('Đăng ký tài khoảng không thành công, vui lòng liên hệ Trung tâm để được giúp đỡ');
                    $this->redirect('/');
                }
            }
            $this->layout = 'register';
        } else {
            $this->Flash->error('Hệ thống tạm thời không thể đăng ký tài khoản');
            $this->redirect('/login');
        }
    }

    /**
     * Hàm này xử l thông tin người dùng đã được Google xác nhận
     */
    public function googleLoginCalback() {
        $this->autoRender = false;
        require_once '../Config/google_login.php';
        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');

        $plus = new Google_PlusService($client);
        $oauth2 = new Google_Oauth2Service($client);
        if (isset($_GET['code'])) {
            $client->authenticate(); // Authenticate
            $_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
        }

        if (isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
        }

        if ($client->getAccessToken()) {
            $_SESSION['access_token'] = $client->getAccessToken();
            $user = $oauth2->userinfo->get();
            try {
                if (!empty($user)) {
                    $studentEmail = $user['email'];
                    $username = explode('@', $studentEmail);

                    $result = $this->User->find('first', array(
                        'conditions' => array('User.username' => $username),
                        'contain' => array('Group'),
                        'fields' => array('id', 'name', 'gender', 'email', 'username', 'avatar')
                    ));

                    if (!empty($result)) {
                        $result['User']['Group'] = $result['Group'];
                        unset($result['Group']);
                        if ($this->Auth->login($result['User'])) {
                            // debug($result);die;
                            $this->User->id = $this->Auth->user('id');
                            $this->User->saveField('last_login', date("Y-m-d H:i:s"));
                            $this->writeToSessionLoginGroups();
                            return $this->redirect($this->Auth->redirectUrl());
                        } else {
                            $this->Flash->error(GOOGLE_LOGIN_FAILURE);
                            $this->redirect(BASE_URL . '/login');
                        }
                    } else {

                        $name = $user['name'];
                        $email = $user['email'];
                        //$gender = $user['gender'];
                        //$sex = ($gender == 'male') ? 1 : 0;
                        $picture = $user['picture'];
                        $activated = 1;
                        $email_verified = 1;
                        //$this->request->data['Group']['Group'][0] = $this->User->Group->getGroupIdByAlias('student');




                        $allowedValues = array(
                            'tvu.edu.vn',
                            'my.tvu.edu.vn',
                            'st.tvu.edu.vn',
                            'tvu.edu.vn',
                            'online.tvu.edu.vn',
                            'rdi.edu.vn',
                            'ctec.tvu.edu.vn',
                            'vicf.tvu.edu.vn',
                            'vics.tvu.edu.vn'
                        );

                        //check duoi cua email de xac dinh co phai giang vien hay khong
                        if (in_array($username[1], $allowedValues)) {
                            $group = $this->User->Group->getGroupIdByAlias('teacher');
                        } else {
                            $this->Flash->error('Hệ thống chỉ cho phép GV thuc TVU đăng nhập (email có dạng @tvu.edu.vn).');
                            $this->redirect('/login');
                        }


                        $newUser = array(
                            'User' => array(
                                'first_name' => $user['given_name'],
                                'last_name' => $user['family_name'],
                                'email' => $email,
                                //'gender' => $sex,
                                //'avatar' => $picture,
                                'username' => $username[0],
                                'activated' => $activated,
                                'email_verified' => $email_verified,
                                'password' => '123456789@'
                            ),
                            'Group' => array(
                                'Group' => array(0 => $group)
                            )
                        );

                        $this->User->create();
                        $this->User->set($newUser);
                        if ($this->User->RegisterValidate()) {
                            $this->User->save();
                            $loginInUser = $this->User->find('first', array(
                                'conditions' => array('User.id' => $this->User->id),
                                'contain' => array('Group'),
                                'fields' => array('id', 'name', 'email', 'username', 'avatar')
                            ));
                            if ($this->Auth->login($loginInUser['User'])) {
                                $this->User->id = $this->Auth->user('id');
                                $this->User->saveField('last_login', date("Y-m-d H:i:s"));
                                $this->writeToSessionLoginGroups();
                                $this->Flash->success('Đã đăng nhập thành công!');
                            } else {
                                $this->Flash->success('Đã thêm người dùng tuy nhiên đăng nhập không thành công');
                            }
                            return $this->redirect($this->Auth->redirectUrl());
                        } else {
                            debug($newUser);
                            die;
                            $this->Session->setFlash('Lưu không thành công.');
                            return $this->redirect($this->Auth->redirectUrl());
                        }
                    }
                } else {
                    $this->Flash->error('Vui lòng kiểm tra lại thông tin đăng nhập');
                    return $this->redirect($this->Auth->redirectUrl());
                }
            } catch (Exception $e) {
                debug($e->getMessage());
                die;
                $this->Flash->error('Có lỗi xuất hiện trong quá trình xử lý đăng nhập');
                $this->redirect(BASE_URL . '/login');
            }
        }
    }

    public function logout($msg = null) {
        $logoutMsg = 'Bạn đã đăng xuất khỏi hệ thống';
        if (!empty($msg)) {
            $logoutMsg = $msg;
        }
        $this->Session->destroy();
        $this->Flash->success($logoutMsg);
        return $this->redirect($this->Auth->logout());
    }

    private function writeToSessionLoginGroups() {
        $this->User->id = $this->Auth->user('id');
        $this->User->contain(array('Group' => array('fields' => array('name', 'alias', 'order', 'id', 'published'))));
        $loggedInUser = $this->User->read(array('id'));
        $LogginUserGroup = Hash::remove($loggedInUser['Group'], '{n}.UsersGroup');
        $LogginUserGroup = Hash::sort($LogginUserGroup, '{n}.order', 'ASC');

        $this->Session->write('LogginUserGroup', $LogginUserGroup);
    }

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $conditions = array();
        $contain = array('Group', 'NoiSinh');
        $order = array('User.last_login' => 'DESC');
        $settings = array('order' => $order, 'conditions' => $conditions, 'contain' => $contain);
        $page = 1;

        if (!empty($this->request->data)) {
            if (!empty($this->request->data['User']['name'])) {
                $conditions = Hash::merge($conditions, array('User.name like' => '%' . trim($this->request->data['User']['name']) . '%'));
            }
            if (!empty($this->request->data['User']['so_dien_thoai'])) {
                $conditions = Hash::merge($conditions, array('User.so_dien_thoai like' => '%' . trim($this->request->data['User']['so_dien_thoai']) . '%'));
            }

            if (!empty($this->request->data['User']['thang_sinh']['month']) && ($this->request->data['User']['thang_sinh']['month'] != '')) {


                $conditions = Hash::merge($conditions, array('MONTH(User.ngay_sinh)' => $this->request->data['User']['thang_sinh']['month']));
            }

            if (!empty($this->request->data['User']['username'])) {
                $conditions = Hash::merge($conditions, array('User.username like' => '%' . trim($this->request->data['User']['username']) . '%'));
            }

            if (!empty($this->request->data['User']['group_id'])) {
                $userId = $this->User->getUserIdByGroupId($this->request->data['User']['group_id']);
                $conditions = Hash::merge($conditions, array('User.id' => $userId));
            }

            $settings = array('order' => $order, 'conditions' => $conditions, 'contain' => $contain, 'page' => $page);

            $this->Session->write('USER_INDEX_SETTINGS', $settings);
            $this->Session->write('USER_INDEX_FILTER', $this->request->data);
        } else {

            if ($this->Session->check('USER_INDEX_SETTINGS')) {
                $settings = $this->Session->read('USER_INDEX_SETTINGS');
            }
            if ($this->Session->check('USER_INDEX_PAGE')) {
                $page = $this->Session->read('USER_INDEX_PAGE');
                $settings = Hash::merge($settings, array('page' => $page));
            }
        }

        $this->Paginator->settings = $settings;
        $groups = $this->User->Group->find('list');
        try {
            $this->set('users', $this->Paginator->paginate());
        } catch (Exception $exc) {
            $settings['page'] = 1;
            $this->Paginator->settings = $settings;
            $this->set('users', $this->Paginator->paginate());
        }




        if (isset($this->request->params['named']['page'])) {

            $this->Session->write('USER_INDEX_PAGE', $this->request->params['named']['page']);
        }



        if (!$this->request->is('ajax'))
            $this->set('groups', $groups);
    }

    /**
     * hoc vien method: liệt kê danh sách các học viên
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $studentId = ($this->User->getUserIdByGroupId($this->User->Group->getGroupIdByAlias('pupil')));
        $conditions = array('User.id' => $studentId);
        $order = array('User.first_name' => 'ASC');
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['User']['name'])) {
                $conditions = Hash::merge($conditions, array('User.name like' => '%' . trim($this->request->data['User']['name']) . '%'));
            }
            if (!empty($this->request->data['User']['so_dien_thoai'])) {
                $conditions = Hash::merge($conditions, array('User.so_dien_thoai like' => '%' . trim($this->request->data['User']['so_dien_thoai']) . '%'));
            }

            if (!empty($this->request->data['User']['thang_sinh']['month']) && ($this->request->data['User']['thang_sinh']['month'] != '')) {


                $conditions = Hash::merge($conditions, array('MONTH(User.ngay_sinh)' => $this->request->data['User']['thang_sinh']['month']));
            }

            if (!empty($this->request->data['User']['username'])) {
                $conditions = Hash::merge($conditions, array('User.username like' => '%' . trim($this->request->data['User']['username']) . '%'));
            }
        }
        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'order' => $order,
        );
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * hoc vien method: liệt kê danh sách các học viên
     *
     * @return void
     */
    public function search() {
        $this->User->recursive = 0;
        $studentId = ($this->User->getUserIdByGroupId($this->User->Group->getGroupIdByAlias('pupil')));
        $conditions = array('User.id' => $studentId);

        if (!empty($this->request->data['name'])) {
            $this->Session->write('UserSearch.name', $this->request->data['name']);
            $conditions = Hash::merge($conditions, array('OR' => array(
                            'User.name like' => '%' . $this->request->data['name'] . '%',
                            'User.so_dien_thoai like' => '%' . $this->request->data['name'] . '%'
            )));
        }

        $settings = array(
            'conditions' => $conditions,
            'order' => array('User.name'),
            'limit' => 5
        );
        $this->set('users', $this->User->find('all', $settings));
    }

    public function admin_profile($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id),
            'contain' => array('Group'),);
        //debug($this->User->find('first', $options));die;
        $this->set('user', $this->User->find('first', $options));
    }

    public function update_my_profile() {
        $id = $this->Auth->user('id');
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('Đã cập nhật thành công');
                return $this->redirect('/myprofile');
            } else {
                $this->Flash->error('Lỗi cập nht hồ sơ!');
            }
        } else {


            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $noiSinhs = $this->User->NoiSinh->find('list', array('order' => array('name' => 'ASC')));
        $departments = $this->User->Department->find('list', array('order' => array('title' => 'ASC')));
        //debug($noiSinhs);die;
        $this->set(compact('noiSinhs', 'departments'));
    }

    /**
     * teacher_edit method 
     * chinh thông tin của giảng viên ngoài trường
     * @return void
     */
    public function registered_add() {

        if (!empty($this->request->data)) {
            $status = false;
            $data = array();
            if (empty($this->request->data['Group']['Group'])) {
                $this->request->data['Group']['Group'][0] = $this->User->Group->getGroupIdByAlias('regitered');
            }
            $this->request->data['User']['created_user_id'] = $this->Auth->user('id');

            $this->request->data['Group']['Group'][0] = 19;
            if (!isset($this->request->data['User']['username'])) {
                $explodeEmail = explode("@", $this->request->data['User']['email']);
                $this->request->data['User']['username'] = $explodeEmail[0];
                $this->request->data['User']['password'] = '123456789@';
                $this->request->data['User']['activated'] = 0;
            }

            if ($this->User->RegisterValidate()) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {

                    if ($this->request->is('ajax')) {

                        $this->autoRender = false;
                        $status = true;
                        $data['id'] = $this->User->id;
                        $data['name'] = $this->User->field('name');
                        echo json_encode(array('status' => $status, 'data' => $data));
                    } else {
                        $this->Flash->success('Đã lưu thành công');
                        return $this->redirect(array('action' => 'index'));
                    }
                } else {
                    if ($this->request->is('ajax')) {
                        $this->autoRender = false;
                        echo json_encode(array('status' => false, 'msg' => 'Lỗi lưu mẫu tin'));
                    } else {
                        $this->Flash->error('Lưu không thành công');
                        return $this->redirect(array('action' => 'index'));
                    }
                }
            } else {
                if ($this->request->is('ajax')) {
                    $this->autoRender = false;
                    echo json_encode(array('status' => false, 'msg' => 'Vui lòng kiểm tra lại các thông tin nhập vào'));
                }
            }
        }
    }

    public function callback() {
        // Validate state
        //$expectedState = session('oauthState');
        $expectedState = $this->Session->read('oauthState');
        $this->Session->delete('oauthState');
        $providedState = $this->request->query('state');

        if (!isset($expectedState)) {
            // If there is no expected state in the session,
            // do nothing and redirect to the home page.
            $this->Flash->error('Vui lòng đăng nhập li!');

            return $this->redirect('/login');
        }

        if (!isset($providedState) || $expectedState != $providedState) {
            $this->Flash->error('Vui lòng đăng nhp lại');
            return $this->redirect('/login');
        }

        // Authorization code should be in the "code" query param
        $authCode = $this->request->query('code');
        if (isset($authCode)) {
            // Initialize the OAuth client
            $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
                'clientId' => OAUTH_APP_ID,
                'clientSecret' => OAUTH_APP_PASSWORD,
                'redirectUri' => OAUTH_REDIRECT_URI,
                'urlAuthorize' => OAUTH_AUTHORITY . OAUTH_AUTHORIZE_ENDPOINT,
                'urlAccessToken' => OAUTH_AUTHORITY . OAUTH_TOKEN_ENDPOINT,
                'urlResourceOwnerDetails' => '',
                'scopes' => OAUTH_SCOPES
            ]);

            // <StoreTokensSnippet>
            try {
                // Make the token request
                $accessToken = $oauthClient->getAccessToken('authorization_code', [
                    'code' => $authCode
                ]);

                $graph = new Microsoft\Graph\Graph();
                $graph->setAccessToken($accessToken->getToken());

                $msuser = $graph->createRequest('GET', '/me?$select=displayName,mail,mailboxSettings,userPrincipalName')
                        ->setReturnType(Model\User::class)
                        ->execute();

                //$tokenCache = new TokenCache();
                //$tokenCache->storeTokens($accessToken, $user);
                $this->TokenCache->storeTokens($accessToken, $msuser);

                //Sinh vien dang nhap thanh cong
                //debug($msuser->getProperties());die;
                try {
                    if (!empty($msuser)) {
                        $user = $msuser->getProperties();

                        $studentEmail = $user['mail'];
                        $email_slit = explode('@', $studentEmail);
                        $username = $email_slit[0];
                        $domain = $email_slit[1];

                        //Lúc này đã đăng nhập bằng google thành công
                        if (empty($domain) || $domain != 'st.tvu.edu.vn' || $domain != 'my.tvu.edu.vn') {
                            $this->Flash->error('Hãy sử dụng Email Trường Đi học Trà Vinh để đăng nhập');
                            $this->redirect(BASE_PATH . 'login');
                        }
                        $result = $this->User->findByUsername($username);

                        if (!empty($result)) {
                            if ($this->UserAuth->login($result)) {


                                $this->redirect($redirect);
                            } else {
                                //
                                $this->Session->setFlash(GOOGLE_LOGIN_FAILURE, 'default', array('class' => 'message error'), 'error');
                                $this->redirect(BASE_PATH . 'login');
                            }
                        }
                        //Trong Edusoft ko co
                        //$user = $oauth2->userinfo->get();
                        //Lúc này không tìm thấy thông tin của sinh viên trong dữ liệu edusoft
                        //Lưu sinh viên dựa vào thông tin gmail
                        $data = array();
                        //debug($user);die;
                        //Thực hiện lưu thông tin $user v table người dùng.
                        $data['User']['username'] = $username;
                        // tách họ tên => họ lót và tên
                        $hoten = trim($user['displayName']);
                        $hoten = mb_convert_case(mb_strtolower($hoten, 'UTF-8'), MB_CASE_TITLE, "UTF-8");
                        // $hoten = ucwords(mb_strtolower($hoten, 'UTF-8'));
                        $mang = explode(" ", $hoten);
                        $ho = $mang [0];
                        $n = count($mang);
                        $ten = $mang [$n - 1];
                        $lot = "";
                        for ($i = 1; $i < $n - 1; $i++) {
                            $lot .= $mang [$i] . " ";
                        }

                        $data['User']['first_name'] = $ten;
                        $data['User']['last_name'] = $ho . " " . trim($lot);

                        //$data['User']['sex'] = 'M';
                        $data['User']['email'] = $user['mail'];
                        $data['User']['ngay_sinh'] = "";
                        //borndate, classroom_id, bornplace                             



                        if ($domain == "st.tvu.edu.vn") {
                            $data['User']['user_group_id'] = STUDENT_GROUP_ID;
                        } else
                        if ($domain == "my.tvu.edu.vn") {
                            $data['User']['user_group_id'] = TEACHER_GROUP_ID;
                        } else {
                            $data['User']['user_group_id'] = REGISTERED_GROUP_ID;
                        }


                        $data['User']['email_verified'] = 1;

                        $data['User']['active'] = 1;

                        $this->User->create();
                        if ($this->User->save($data)) {
                            $this->User->id;
                            $loginUser = $this->User->read(null, $this->User->id);
                            if ($this->UserAuth->login($loginUser)) {
                                $this->Flash->success('Xin chào, bạn đã đăng nhập thành công.');
                                $this->redirect(array('controller' => 'dashboards', 'action' => 'home'));
                            } else {
                                $this->Flash->error('Error 00dn: Hệ thống gặp sự c trong khi đăng nhập tài khoản của bạn. Hãy liên hệ Trung tâm Hỗ trợ - Phát triển Dạy và Học để được giải đáp');
                                $this->redirect(BASE_PATH . 'login');
                            }
                        }
                    } else {
                        $this->Flash->error('Đăng nhp thất bại');
                        $this->redirect(BASE_PATH . 'login');
                    }
                } catch (Exception $e) {
                    //debug($e->getMessage());
                    //die;
                    $this->Flash->error('Có lỗi xuất hiện trong quá trình xử lý đăng nhập');

                    $this->redirect('/login');
                }

                //het doan xu ly sinh vien dang nhap thanh cong


                return $this->redirect('/');
            }
            // </StoreTokensSnippet>
            catch (League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
                $this->Flash->error($e->getMessage());
                return $this->redirect('/');
            }
        }

        $this->Flash->error($this->request->query('error'));
        $this->Flash->error($this->request->query('error_description'));
        return $this->redirect('/');
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {

            if (empty($this->request->data['Group']['Group'])) {
                $this->request->data['Group']['Group'][0] = $this->User->Group->getGroupIdByAlias('pupil');
            }
            $this->request->data['User']['created_user_id'] = $this->Auth->user('id');
            $this->User->create();
            if ($this->User->save($this->request->data)) {

                $this->Flash->success('Thêm thành công');
                return $this->redirect(array('admin' => true, 'action' => 'index'));
            } else {
                $this->Flash->error('Có lỗi! Thêm không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        }

        $groups = $this->User->Group->find('list');

        $this->set(compact('groups'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Group']['Group'][0] = $this->User->Group->getGroupIdByAlias('pupil');
            $this->request->data['User']['created_user_id'] = $this->Auth->user('id');
            $this->User->create();
            if ($this->User->save($this->request->data)) {

                return $this->redirect(array('action' => 'edit', $this->User->id));
            } else {
                $this->Flash->error('Có lỗi! Thêm không thành công!');
            }
        }
    }

    /**
     * edit method
     *
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException('Không tồn tại người này');
        }
        $user_id = $id;

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->User->save($this->request->data)) {

                $this->Flash->success('Cập nhật thành công!');
                return $this->redirect(array('action' => 'index'));
            } else {

                $this->Flash->error('Có lỗi! Thêm không thành công!');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }

        $this->set(compact('user_id'));
    }

    public function view($id) {
        $this->theme = 'Frontend';
        if ($this->Auth->user('id')) {
            $this->theme = 'Ace2Cake';
        }

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $contain = array(
            'Group'
        );
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $id
            ),
            'contain' => $contain
        ));
        $this->set('user', $user);
    }

    public function xem_hoc_vien($id) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Không tồn tại học viên'));
        }
        $contain = array(
            'PhuHuynh', 'School', 'Enrollment' => array('fields' => array('id', 'fee', 'pass', 'hoc_thu'), 'Course' => array('fields' => array('id', 'name'), 'Chapter' => array('fields' => array('name')), 'Teacher' => array('fields' => array('id', 'name'))))
        );
        $fields = array('username', 'name', 'ngay_sinh', 'so_dien_thoai', 'address', 'avatar', 'avatar_path');
        $hoc_vien = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $id
            ),
            'contain' => $contain
        ));
        $this->set('hoc_vien', $hoc_vien);
    }

    public function admin_edit($id) {

        if (!$this->User->exists($id)) {
            throw new NotFoundException('Không tồn tại người này');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('Cập nhật thông tin người dùng thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                if ($this->Session->check('PRE_PAGE')) {
                    return $this->redirect($this->Session->read('PRE_PAGE'));
                }
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('Cập nhật thông tin người dùng không thành công!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        } else {
            $this->Session->write('PRE_PAGE', $this->referer());
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $user = $this->User->find('first', $options);
            $this->request->data = null;
            if (!empty($user)) {
                if (empty($user ['User'] ['password'])) {
                    unset($user ['User'] ['password']);
                };
                $this->request->data = $user;
            }
        }

        $groups = $this->User->Group->find('list');

        $departments = $this->User->Department->find('list');

        $this->set(compact('groups', 'departments'));
    }

    public function admin_view($id) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id),
            'contain' => array('Group', 'HocVi'));
        $this->set('user', $this->User->find('first', $options));
    }

    public function delete($id = null) {
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            if (!empty($this->request->data)) {
                $requestDeleteId = Set::classicExtract($this->request->data['selectedRecord'], '{n}.value');
                if ($this->User->deleteAll(array('User.id' => $requestDeleteId))) {
                    echo true;
                } else {
                    echo false;
                }
            }
            exit();
        }
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid User'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User đã được xóa'));
            $this->redirect(array('admin' => true, 'action' => 'index'));
        } else {
            $this->Flash->error(__('User xóa không thành công'));
            $this->redirect(array('action' => 'index', 'admin' => true));
        }
    }

    /**
     * Used to change the password by user
     *
     * @access public
     * @return void
     */
    public function changePassword() {
        $userId = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->User->set($this->request->data);

            if (!$this->User->verifyOldPass()) {
                $this->Flash->error('Mật khẩu cũ chưa đúng!');
            } else {
                if (!$this->User->verifies()) {
                    $this->Flash->error('Mật khẩu không khp!');
                } else
                if ($this->User->RegisterValidate()) {
                    $user = array();
                    $user['User']['id'] = $userId;
                    if ($this->User->save($user, false))
                        $this->logout('Đổi password thành công. Hãy đăng nhập lại!');
                }
            }
        }
    }

    /**
     * Used to change the user password by Admin
     *
     * @access public
     * @param integer $userId
     *          user id of user
     * @return void
     */
    public function changeUserPassword($userId = null) {

        if ($this->request->is('post')) {
            $this->User->set($this->request->data);

            if (!$this->User->verifies()) {
                $this->Flash->error('Mật khẩu không khớp!');
            } else
            if ($this->User->RegisterValidate()) {
                $user = array();
                $user['User']['id'] = $userId;
                $this->User->save($user, false);

                $this->Flash->success(__('Đổi password thành công.'));
                $this->redirect(array('admin' => true, 'action' => 'index'));
            }
        } else {
            $this->User->id = $userId;
            if (!$this->User->exists()) {
                $this->Flash->error('Không tồn tại ngưi dùng');
                $this->redirect(array('admin' => true, 'action' => 'index'));
            } else {
                $name = $this->User->field('name');
                $this->set('name', $name);
            }
        }
    }

    /**
     * Used to display detail of user by user
     *
     * @access public
     * @return array
     */
    public function myprofile() {
        $userId = $this->Auth->user('id');
        $contain = array(
            'Group', 'NoiSinh'
        );
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $userId
            ),
            'contain' => $contain
        ));

        $this->set('user', $user);
    }

    /* Hàm tìm trả về danh sách user dạng ajax để người dụng chọn 
      thuộc chức năng thêm/sửa thông tin biên soạn tài liệu giảng dạy */

    public function getUsers($group_alias = null, $divClass = null) {
        $limit = 20;
        $order = array();
        $this->layout = 'ajax';
        $conditions = array();

        //Kiem tra day la thanh vien binh thuong hay quan tri
        $LogginUserGroup = $this->Session->read('LogginUserGroup');

        if (!empty($LogginUserGroup)) {
            $LogginUserGroup = Hash::extract($LogginUserGroup, '{n}.alias');
        }

        if ('registered' == $LogginUserGroup[0]) {
            //$conditions = Hash::merge($conditions, array('User.created_user_id' => $this->Auth->user('id')));
        }
        //debug($conditions);die;
        $scopeId = ($this->User->getUserIdByGroupId($this->User->Group->getGroupIdByAlias($group_alias)));

        if (!empty($this->request->data['user_selected'])) {
            $user_seleted = $this->request->data['user_selected'];
            $scopeId = array_diff($scopeId, $user_seleted);
        }

        $conditions = Hash::merge($conditions, array('User.id' => $scopeId));

        if (!empty($this->request->data['search_term'])) {
            $search_term = $this->request->data['search_term'];
            $conditions = Set::merge($conditions, array('User.name like' => "%$search_term%"));
        }

        $this->Paginator->settings = array('conditions' => $conditions, 'order' => $order, 'limit' => $limit);
        $users = $this->paginate();

        $paging = $this->params['paging'];
        $this->set(compact('users', 'paging', 'divClass'));
    }

    public function select2($group_alias = null) {
        $this->layout = "ajax";
        $conditions = array();
        if (!empty($this->request->query['q'])) {
            $term = $this->request->query['q'];

            $conditions = Set::merge($conditions, array('User.name like' => "%{$term}%"));
        }
        if (!is_null($group_alias)) {
            $scopeId = ($this->User->getUserIdByGroupId($this->User->Group->getGroupIdByAlias($group_alias)));
            $conditions = Set::merge($conditions, array('User.id' => $scopeId));
        }

        $this->Paginator->settings = array('conditions' => $conditions, 'order' => array('User.name' => 'ASC'), 'fields' => array('id', 'name', 'avatar '));
        $users = $this->paginate();
        $this->set(compact('users'));
    }

    public function top_authors() {
        $conditions = array();
        $contain = array('HocVi');
        $order = array('User.trong_so_tieu_bieu' => 'DESC');
        $limit = 5;
        $settings = array('conditions' => $conditions, 'contain' => $contain, 'order' => $order, 'limit' => $limit);
        $this->Paginator->settings = $settings;

        $this->set('authors', $this->paginate());
    }

    /**
     * Used to send forgot password email to user
     *
     * @access public
     * @return void
     */
    public function forgotPassword() {
        if ($this->request->isPost()) {
            $this->Recaptcha = $this->Components->load('Recaptcha.Recaptcha');
            if (!$this->__checkRecaptchaResponse($this->request->data['g-recaptcha-response'])) {
                $this->Flash->error('Bạn phải check vào ô bên dưới để xác nhận bạn không phải là người máy! ');
                return $this->redirect($this->referer());
            }

            $this->User->set($this->data);
            if ($this->User->LoginValidate()) {
                $username = $this->data['User'] ['username'];
                $user = $this->User->findByUsername($username);
                if (empty($user)) {
                    $user = $this->User->findByEmail($username);
                    if (empty($user)) {
                        $this->Flash->error('Email hoặc username chưa đúng');
                        return;
                    }
                }

                $this->User->forgotPassword($user);
                $this->Flash->success('Hệ thống đã gửi hưng dẫn đổi mật khẩu vo email ' . $user['User']['email'] . '. Hãy kiểm tra và hon thành hướng dẫn');
                $this->redirect('/login');
            }
        }
    }

    /**
     * Used to reset password when user comes on the by clicking the password reset link from their email.
     *
     * @access public
     * @return void
     */
    public function activatePassword() {
        if ($this->request->isPost()) {
            if (!empty($this->data ['User'] ['ident']) && !empty($this->data ['User'] ['activate'])) {
                $this->set('ident', $this->data ['User'] ['ident']);
                $this->set('activate', $this->data ['User'] ['activate']);
                $this->User->set($this->request->data);
                if ($this->User->RegisterValidate()) {
                    $userId = $this->request->data ['User'] ['ident'];
                    $activateKey = $this->request->data ['User'] ['activate'];
                    $user = $this->User->read(null, $userId);
                    if (!empty($user)) {
                        $user ['User'] ['password'] = $this->data ['User'] ['password'];
                        if ($this->User->save($user, false)) {
                            $this->Flash->success('Đã thay đổi password thành công');
                        } else {
                            $this->Flash->success('Đã thay đổi password không thành công');
                        }
                        return $this->redirect('/login');
                    } else {
                        $this->Flash->error('Không tìm thấy người dùng này');
                    }
                }
            } else {
                $this->Flash->error('Yêu cầu không hợp lệ');
            }
        } else {
            if (isset($_GET ['ident']) && isset($_GET ['activate'])) {
                $this->set('ident', $_GET ['ident']);
                $this->set('activate', $_GET ['activate']);

                $userId = $_GET ['ident'];
                $activateKey = $_GET ['activate'];
                $user = $this->User->read(null, $userId);
                if (!empty($user)) {
                    $password = $user ['User'] ['password'];
                    $thekey = $this->User->getActivationKey($password);
                    if ($thekey != $activateKey) {
                        $this->Flash->error('Yêu cầu này đã hết hiệu lực');
                        $this->redirect('/');
                    }
                }
            }
        }
    }

    //Tich hop Office 365 login

    public function signin() {
        // Initialize the OAuth client
        $oauthClient = new League\OAuth2\Client\Provider\GenericProvider([
            'clientId' => OAUTH_APP_ID,
            'clientSecret' => OAUTH_APP_PASSWORD,
            'redirectUri' => OAUTH_REDIRECT_URI,
            'urlAuthorize' => OAUTH_AUTHORITY . OAUTH_AUTHORIZE_ENDPOINT,
            'urlAccessToken' => OAUTH_AUTHORITY . OAUTH_TOKEN_ENDPOINT,
            'urlResourceOwnerDetails' => '',
            'scopes' => OAUTH_SCOPES
        ]);

        $authUrl = $oauthClient->getAuthorizationUrl();

        // Save client state so we can validate in callback
        $this->Session->write('oauthState', $oauthClient->getState());

        // Redirect to AAD signin page
        //return redirect()->away($authUrl);
        return $this->redirect($authUrl);
    }
}
