
<div id="sidebar" class="sidebar h-sidebar navbar-fixed-top navbar-collapse collapse ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">

        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">





        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-calendar-check-o"></i>
                <span class="menu-text">Đợt đánh giá</span>', array('admin' => true, 'plugin' => false, 'controller' => 'evaluation_rounds', 'action' => 'index'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-folder-open"></i>
                <span class="menu-text"> Khóa học</span>', array('admin' => true, 'plugin' => false, 'controller' => 'courses', 'action' => 'index'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa  fa-graduation-cap"></i>
                <span class="menu-text"> Khóa học LMS</span>', array('admin' => true, 'plugin' => false, 'controller' => 'lms_courses', 'action' => 'index'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-gavel"></i>
                <span class="menu-text"> Kết quả đánh giá</span>', array('admin' => true, 'plugin' => false, 'controller' => 'evaluation_results', 'action' => 'index'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-gavel"></i>
                <span class="menu-text">Tư vấn CĐR</span>', array('admin' => true, 'plugin' => false, 'controller' => 'evaluation_results', 'action' => 'index'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>


        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">
                    Người dùng
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="hover">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>

                        Quản lý truy cập
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="hover">
                            <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Cập nhật ACOS </span>', '/admin/acl_manager/acl/update_acos', array('escape' => false)); ?>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Cập nhật AROS </span>', '/admin/acl_manager/acl/update_aros', array('escape' => false)); ?>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <?php echo $this->Html->link('<i class="menu-icon fa fa-check"></i>
                                                        <span class="menu-text"> Phân quyền </span>', '/admin/acl_manager/acl', array('escape' => false)); ?>
                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>

                <li class="hover">

                    <?php echo $this->Html->link('<i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Quản lý User </span>', array('admin' => true, 'plugin' => false, 'controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>

                    <b class="arrow"></b>
                </li>

                <li class="hover">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Quản lý Group </span>', array('admin' => true, 'plugin' => false, 'controller' => 'groups'), array('escape' => false)); ?>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-share"></i>
                <span class="menu-text"> Thoát</span>', '/logout', array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->
</div>
