<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title><?php echo $this->Session->read('LAYOUT') ?> - <?php echo SITENAME?></title>

        <meta name="description" content="Cổng thông tin quản lý dữ liệu - Trung tâm Hỗ trợ - Phát triển Dạy và Học" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <?php
        echo $this->element('in_header_script');
        echo $this->fetch('scriptTop');
        ?>
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Đóng/Mở Menu</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="<?php echo BASE_URL ?>" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            <?php echo SITENAME ?>
                        </small>
                    </a>
                    <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                        <span class="sr-only">Toggle user menu</span>
                        <?php echo $this->Html->image('/files/user/avatar/' . AuthComponent::user('id') . '/' . AuthComponent::user('avatar')) ?>

                    </button>
                    
                </div>
                <?php echo $this->element('user_top_right_menu'); ?>
                <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">

                    <?php if (count($this->Session->read('LogginUserGroup')) > 1) echo $this->element('change_layout'); ?>
                </nav>

            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <?php echo $this->element($this->Session->read('LAYOUT') .'_sidebar'); ?>

            <div class="main-content">
                <div class="main-content-inner">
     

                    <div class="page-content">
                        

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <?php
                                echo $this->Flash->render();
                                echo $this->Flash->render('auth');
                                echo $this->fetch('content');
                                ?>

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="blue bolder">TLC</span>
                            's Data Center &copy; 2013-2014
                        </span>

                        &nbsp; &nbsp;
                        
                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

       
        <?php echo $this->element('bellow_body_script'); ?>
        <?php echo $this->fetch('scriptBottom'); ?>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function ($) {
                $('#sidebar2').insertBefore('.page-content');
                $('#navbar').addClass('h-navbar');
                $('.footer').insertAfter('.page-content');

                $('.page-content').addClass('main-content');

                $('.menu-toggler[data-target="#sidebar2"]').insertBefore('.navbar-brand');


                $(document).on('settings.ace.two_menu', function (e, event_name, event_val) {
                    if (event_name == 'sidebar_fixed') {
                        if ($('#sidebar').hasClass('sidebar-fixed'))
                            $('#sidebar2').addClass('sidebar-fixed')
                        else
                            $('#sidebar2').removeClass('sidebar-fixed')
                    }
                }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed', $('#sidebar').hasClass('sidebar-fixed')]);

                $('#sidebar2[data-sidebar-hover=true]').ace_sidebar_hover('reset');
                $('#sidebar2[data-sidebar-scroll=true]').ace_sidebar_scroll('reset', true);
            });
            $(function () {

                var path = window.location.pathname;
                path = path.replace(/\/$/, "");
                path = decodeURIComponent(path);
                $("#sidebar a").each(function () {

                    var href = $(this).attr('href');
                    if (path === href) {
                        $(this).closest('li').addClass('active');
                        var treeviewmenu = $(this).closest('li').parent();
                        treeviewmenu.parent().addClass('active open');
                    }
                });
            });
        </script>
    </body>
</html>

