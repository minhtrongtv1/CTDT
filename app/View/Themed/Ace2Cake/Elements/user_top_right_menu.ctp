<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
    <ul class="nav ace-nav">
        

        

        


        <li class="light-blue dropdown-modal user-min">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <?php echo $this->Html->image('/files/user/avatar/' . AuthComponent::user('id') . '/' . AuthComponent::user('avatar'), array("class" => "nav-user-photo")) ?>


                <span class="user-info">
                    <small>Xin chào,</small>
                    <?php echo AuthComponent::user('username') ?>
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                    <a href="<?php echo BASE_URL ?>/users/changePassword">
                        <i class="ace-icon fa fa-cog"></i>
                        Đổi mật khẩu
                    </a>
                </li>

                <li>
                    <a href="<?php echo BASE_URL ?>/myprofile">
                        <i class="ace-icon fa fa-user"></i>
                        Hồ sơ
                    </a>
                </li>

                <li class="divider"></li>

                <li>
                    <a href="<?php echo BASE_URL ?>/logout">
                        <i class="ace-icon fa fa-power-off"></i>
                        Đăng xuất
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
