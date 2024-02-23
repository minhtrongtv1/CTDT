
<style>
    body{
        margin-top:20px;
        background:#f5f5f5;
    }
    /**
     * Panels
     */
    /*** General styles ***/
    .panel {
        box-shadow: none;
    }
    .panel-heading {
        border-bottom: 0;
    }
    .panel-title {
        font-size: 17px;
    }
    .panel-title > small {
        font-size: .75em;
        color: #999999;
    }
    .panel-body *:first-child {
        margin-top: 0;
    }
    .panel-footer {
        border-top: 0;
    }

    .panel-default > .panel-heading {
        color: #333333;
        background-color: transparent;
        border-color: rgba(0, 0, 0, 0.07);
    }

    /**
     * Profile
     */
    /*** Profile: Header  ***/
    .profile__avatar {
        float: left;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 20px;
        overflow: hidden;
    }
    @media (min-width: 768px) {
        .profile__avatar {
            width: 100px;
            height: 100px;
        }
    }
    .profile__avatar > img {
        width: 100%;
        height: auto;
    }
    .profile__header {
        overflow: hidden;
    }
    .profile__header p {
        margin: 20px 0;
    }
    /*** Profile: Table ***/
    @media (min-width: 992px) {
        .profile__table tbody th {
            width: 200px;
        }
    }
    /*** Profile: Recent activity ***/
    .profile-comments__item {
        position: relative;
        padding: 15px 16px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    .profile-comments__item:last-child {
        border-bottom: 0;
    }
    .profile-comments__item:hover,
    .profile-comments__item:focus {
        background-color: #f5f5f5;
    }
    .profile-comments__item:hover .profile-comments__controls,
    .profile-comments__item:focus .profile-comments__controls {
        visibility: visible;
    }
    .profile-comments__controls {
        position: absolute;
        top: 0;
        right: 0;
        padding: 5px;
        visibility: hidden;
    }
    .profile-comments__controls > a {
        display: inline-block;
        padding: 2px;
        color: #999999;
    }
    .profile-comments__controls > a:hover,
    .profile-comments__controls > a:focus {
        color: #333333;
    }
    .profile-comments__avatar {
        display: block;
        float: left;
        margin-right: 20px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
    }
    .profile-comments__avatar > img {
        width: 100%;
        height: auto;
    }
    .profile-comments__body {
        overflow: hidden;
    }
    .profile-comments__sender {
        color: #333333;
        font-weight: 500;
        margin: 5px 0;
    }
    .profile-comments__sender > small {
        margin-left: 5px;
        font-size: 12px;
        font-weight: 400;
        color: #999999;
    }
    @media (max-width: 767px) {
        .profile-comments__sender > small {
            display: block;
            margin: 5px 0 10px;
        }
    }
    .profile-comments__content {
        color: #999999;
    }
    /*** Profile: Contact ***/
    .profile__contact-btn {
        padding: 12px 20px;
        margin-bottom: 20px;
    }
    .profile__contact-hr {
        position: relative;
        border-color: rgba(0, 0, 0, 0.1);
        margin: 40px 0;
    }
    .profile__contact-hr:before {
        content: "OR";
        display: block;
        padding: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: #f5f5f5;
        color: #c6c6cc;
    }
    .profile__contact-info-item {
        margin-bottom: 30px;
    }
    .profile__contact-info-item:before,
    .profile__contact-info-item:after {
        content: " ";
        display: table;
    }
    .profile__contact-info-item:after {
        clear: both;
    }
    .profile__contact-info-item:before,
    .profile__contact-info-item:after {
        content: " ";
        display: table;
    }
    .profile__contact-info-item:after {
        clear: both;
    }
    .profile__contact-info-icon {
        float: left;
        font-size: 18px;
        color: #999999;
    }
    .profile__contact-info-body {
        overflow: hidden;
        padding-left: 20px;
        color: #999999;
    }
    .profile__contact-info-body a {
        color: #999999;
    }
    .profile__contact-info-body a:hover,
    .profile__contact-info-body a:focus {
        color: #999999;
        text-decoration: none;
    }
    .profile__contact-info-heading {
        margin-top: 2px;
        margin-bottom: 5px;
        font-weight: 500;
        color: #999999;
    }
</style>
<div class="container">
    <div class="row">


        <!-- User profile -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Hồ sơ của tôi</h4>
            </div>
            <div class="panel-body">
                <div class="profile__avatar">
                    <?php
                    echo $this->Html->image('/files/user/avatar/' . $user['User']['id'] . '/' . $user['User']['avatar'], array(
                        "class" => "editable img-responsive", "alt" => "{$user['User']['name']} Avatar", "id" => "avatar2"))
                    ?>

                </div>
                <div class="profile__header">
                    <h4><?php echo $user['User']['name'] ?> </h4>

                    <p>Ngày tham gia <?php echo $this->Time->niceShort($user['User']['created']) ?>; Lần đăng nhập cuối <?php echo $this->Time->niceShort($user['User']['last_login']) ?></p>
                </div>
            </div>
            <div class="panel-footer" style="float: right;">
                <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil"></i>
                                <span class="bigger-110">Cập nhật</span>', '/update_my_profile', array('class' => "btn btn-sm btn-success", 'escape' => false)) ?>

            </div>
        </div>

        <!-- User info -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Thông tin cơ bản</h4>
            </div>
            <div class="panel-body">
                <table class="table profile__table">
                    <tbody>
                        <tr>
                            <th><strong>Họ và tên</strong></th>
                            <td><?php echo $user['User']['name'] ?></td>
                        </tr>
                        <tr>
                            <th><strong>Ngày sinh</strong></th>
                            <td><?php echo $user['User']['ngay_sinh'] ?></td>
                        </tr>
                        <tr>
                            <th><strong>Nơi sinh</strong></th>
                            <td><?php echo $user['NoiSinh']['name'] ?></td>
                        </tr>

                        <tr>
                            <th><strong>Số điện thoại</strong></th>
                            <td><?php echo $user['User']['so_dien_thoai'] ?></td>
                        </tr>
                        <tr>
                            <th><strong>Email</strong></th>
                            <td><?php echo $user['User']['email'] ?></td>
                        </tr>
                        <tr>
                            <th><strong>Số CMND/CCCD</strong></th>
                            <td><?php echo $user['User']['so_cmnd'] ?></td>
                        </tr>
                        <tr>
                            <th><strong>Ngày cấp</strong></th>
                            <td><?php echo $user['User']['ngay_cap'] ?></td>
                        </tr>
                        <tr>
                            <th><strong>Nơi cấp</strong></th>
                            <td><?php echo $user['User']['noi_cap'] ?></td>
                        </tr>
                        <tr>
                            <th><strong>Số tài khoản</strong></th>
                            <td><?php echo $user['User']['so_tai_khoan'] ?></td>
                        </tr>
                        <tr>
                            <th><strong>Ngân hàng</strong></th>
                            <td><?php echo $user['User']['ngan_hang'] ?></td>
                        </tr>
                        <tr>
                            <th><strong>Mã số thuế</strong></th>
                            <td><?php echo $user['User']['ma_so_thue'] ?></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>






    </div>
</div>




<?php
//debug($user);
