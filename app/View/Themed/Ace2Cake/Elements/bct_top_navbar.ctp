
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
                <span class="menu-text">Khóa học cần đánh giá</span>', array('bct' => true, 'plugin' => false, 'controller' => 'evaluation_results', 'action' => 'can_danh_gia'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-check-circle-o"></i>
                <span class="menu-text"> Khóa học đã đánh giá</span>', array('bct' => true, 'plugin' => false, 'controller' => 'evaluation_results', 'action' => 'da_danh_gia'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>
        
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-folder-open"></i>
                <span class="menu-text">Khóa học do tôi quản lý</span>', array('bct' => true, 'plugin' => false, 'controller' => 'evaluation_results', 'action' => 'index'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>
        
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-envelope-o"></i>
                <span class="menu-text">Các yêu cầu hỗ trợ</span>', array('bct' => true, 'plugin' => false, 'controller' => 'supporting_requests', 'action' => 'index'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>


        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-share"></i>
                <span class="menu-text"> Thoát</span>', '/logout', array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->
</div>
