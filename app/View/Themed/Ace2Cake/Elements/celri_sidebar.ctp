<div id="sidebar" class="sidebar responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed');
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
        <li class="">
            <a href="<?php echo BASE_URL . 'celri/workshops' ?>">
                <i class="menu-icon fa fa-graduation-cap "></i>
                <span class="menu-text">Các khóa tập huấn</span>
            </a>

            <b class="arrow"></b>
        </li>
        
        
        <li class="">
            <a href="<?php echo BASE_URL . 'celri/enrolments/index' ?>">
                <i class="menu-icon fa fa-id-card"></i>
                <span class="menu-text">Chứng nhận tập huấn</span>
            </a>

            <b class="arrow"></b>
        </li>
        
        <li class="">
            <a href="<?php echo BASE_URL . 'celri/evaluation_results/index' ?>">
                <i class="menu-icon fa fa-gavel"></i>
                <span class="menu-text">KQ đánh giá khóa học</span>
            </a>

            <b class="arrow"></b>
        </li>



        <!--Hết quyết định chứng nhận-->
        <li class="">
            <a href="<?php echo BASE_URL . 'logout' ?>">
                <i class="menu-icon fa fa-sign-out"></i>
                <span class="menu-text"> Đăng xuất</span>
            </a>

            <b class="arrow"></b>
        </li>

    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>