
<div id="sidebar" class="sidebar h-sidebar navbar-fixed-top navbar-collapse collapse ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-plus "></i>
                <span class="menu-text"> Khóa học E-Learning của tôi</span>', array('teacher' => false, 'plugin' => false, 'controller' => 'courses', 'action' => 'mycourses'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li> 

         <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-plus "></i>
                <span class="menu-text"> Đăng ký tập huấn</span>', array('teacher' => true, 'plugin' => false, 'controller' => 'workshops', 'action' => 'index'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li> 
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-plus "></i>
                <span class="menu-text"> Các đợt tập huấn của tôi</span>', array('teacher' => false, 'plugin' => false, 'controller' => 'workshops', 'action' => 'myenrolments'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li> 
        
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-search"></i>
                <span class="menu-text"> Yêu cầu đã gửi</span>', array('teacher' => true, 'plugin' => false, 'controller' => 'messages', 'action' => 'index',1), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>  
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-check-square-o"></i>
                <span class="menu-text"> Yêu cầu đã xử lý</span>', array('teacher' => true, 'plugin' => false, 'controller' => 'messages', 'action' => 'index',2), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li> 



        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-share"></i>
                <span class="menu-text"> Thoát</span>', '/logout', array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->
</div>
