<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
            <button data-target="#sidebar2" type="button" class="pull-left menu-toggler navbar-toggle">
                <span class="sr-only">Toggle sidebar</span>

                <i class="ace-icon fa fa-dashboard white bigger-125"></i>
            </button><a href="index.html" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    D&H Data Management
                </small>
            </a>

            <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                <span class="sr-only">Toggle user menu</span>

                <img src="assets/images/avatars/user.jpg" alt="Jason's Photo">
            </button>

            <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>
        </div>

        <?php echo $this->element('change_layout'); ?>

        <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
            <ul class="nav navbar-nav">
                

                <li>
                    <a href="#">
                        <i class="ace-icon fa fa-envelope"></i>
                        Tin nhắn mới
                        <span class="badge badge-warning">5</span>
                    </a>
                </li>
            </ul>


        </nav>
    </div><!-- /.navbar-container -->
</div>