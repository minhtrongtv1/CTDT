
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

            <?php echo $this->Html->link('<i class="menu-icon fa fa-plus "></i>
                <span class="menu-text"> Gửi nhu cầu</span>', array('student' => true, 'plugin' => false, 'controller' => 'projects', 'action' => 'add'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li> 
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-paper-plane "></i>
                <span class="menu-text"> Nhu cầu đã đề xuất</span>', array('teacher' => false, 'plugin' => false, 'controller' => 'projects', 'action' => 'my_propose'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li> 
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-play-circle "></i>
                <span class="menu-text"> Nhu cầu đang thực hiện</span>', array('student' => true, 'plugin' => false, 'controller' => 'projects', 'action' => 'my_projects'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li> 





        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-share"></i>
                <span class="menu-text"> Thoát</span>', '/logout', array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->
</div>
