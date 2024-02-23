
<div id="sidebar" class="sidebar h-sidebar navbar-fixed-top navbar-collapse collapse ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
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

            <?php echo $this->Html->link('<i class="menu-icon fa fa-th-list"></i>
                <span class="menu-text"> Công việc được phân công</span>', array('manager' => false, 'plugin' => false, 'controller' => 'tasks', 'action' => 'my_tasks'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-arrow-up"></i>
                <span class="menu-text"> Văn bản đi</span>', array('manager' => false, 'plugin' => false, 'controller' => 'documents', 'action' => 'index', 1), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-arrow-down"></i>
                <span class="menu-text"> Văn bản đến</span>', array('manager' => false, 'plugin' => false, 'controller' => 'documents', 'action' => 'index', 2), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>



        <li class="hover">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-th-large"></i>
                <span class="menu-text">
                    Danh mục
                </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

                <li class="hover">

                    <?php echo $this->Html->link('<i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Nơi lưu - nhận - gửi </span>', array('manager' => false, 'plugin' => false, 'controller' => 'departments', 'action' => 'index'), array('escape' => false)); ?>

                    <b class="arrow"></b>
                </li>




                <li class="hover">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-plus"></i>
                <span class="menu-text"> Người nhận - ký </span>', array('manager' => false, 'plugin' => false, 'controller' => 'staffs', 'action' => 'index'), array('escape' => false)); ?>

                    <b class="arrow"></b>
                </li>

                <li class="hover">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Loại văn bản</span>', array('manager' => false, 'plugin' => false, 'controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?>

                    <b class="arrow"></b>
                </li>
                
                


            </ul>
        </li>
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-sign-out"></i><span class="menu-text"> Thoát</span>','/logout', array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>



    </ul><!-- /.nav-list -->
</div>
