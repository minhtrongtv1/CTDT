
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

            <?php echo $this->Html->link('<i class="menu-icon fa fa-plus"></i>
                <span class="menu-text"> Gửi nhu cầu</span>', array('registered' => true, 'plugin' => false, 'controller' => 'projects', 'action' => 'add'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>    
        
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-paper-plane "></i>
                <span class="menu-text"> Nhu cầu đã gửi</span>', array('registered' => true, 'plugin' => false, 'controller' => 'projects', 'action' => 'index'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li> 

        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-play-circle "></i>
                <span class="menu-text"> Dự án tôi tham gia</span>', array('registered' => true, 'plugin' => false, 'controller' => 'projects', 'action' => 'my_projects'), array('escape' => false)); ?>

            <b class="arrow"></b>
        </li> 
        
        <li class="hover">

            <?php echo $this->Html->link('<i class="menu-icon fa fa-share"></i>
                <span class="menu-text"> Thoát</span>', '/logout', array('escape' => false)); ?>

            <b class="arrow"></b>
        </li>
    </ul><!-- /.nav-list -->
</div>
