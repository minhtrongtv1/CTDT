<div id="sidebar" class="sidebar responsive ace-save-state">
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
        <li class="">
            <a href="<?php echo BASE_URL ?>">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Bàn làm việc </span>
            </a>

            <b class="arrow"></b>
        </li>
        
        <li class="">
                    <?php echo $this->Html->link(' <i class="menu-icon fa fa-caret-right"></i>
                        Kiểm tra CĐR (beta)', array('teacher' => false, 'controller' => 'TuVanCdrs', 'action' => 'add'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>

        <li class="">
            <a href="" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    Tập huấn
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <?php echo $this->Html->link(' <i class="menu-icon fa fa-caret-right"></i>
                        Đăng ký', array('teacher' => true, 'controller' => 'workshops', 'action' => 'index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>

                <li class="">

                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                        Tôi tham dự', array('teacher' => false, 'controller' => 'workshops', 'action' => 'my'), array('escape' => false)); ?>


                    <b class="arrow"></b>
                </li>

                <li class="">

                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                        Tôi tập huấn', array('teacher'=>false,'controller' => 'workshops', 'action' => 'i_train'), array('escape' => false)); ?>


                    <b class="arrow"></b>
                </li>






            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Đánh giá khóa học </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">

                    <?php echo $this->Html->link(' <i class="menu-icon fa fa-caret-right"></i>
                        Xem kết quả', array('teacher' => false, 'controller' => 'courses', 'action' => 'mycourses'), array('escape' => false)); ?>


                    <b class="arrow"></b>
                </li>

                <li class="">
                    <?php echo $this->Html->link(' <i class="menu-icon fa fa-caret-right"></i>
                        Gửi yêu cầu hỗ trợ', array('teacher' => false, 'controller' => 'supporting_requests', 'action' => 'add'), array('escape' => false)); ?>


                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link(' <i class="menu-icon fa fa-caret-right"></i>
                        Yêu cầu đã gửi', array('teacher' => false, 'controller' => 'supporting_requests', 'action' => 'index'), array('escape' => false)); ?>


                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="" class="dropdown-toggle">
                <i class="menu-icon fa fa-book" aria-hidden="true"></i>
                <span class="menu-text">
                    Quản lý đào tạo
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">


                <li class="">

                    <?php echo $this->Html->link('
                <span class="menu-text"> Chương trình đào tạo </span>', array('admin' => false, 'plugin' => false, 'controller' => 'curriculumns', 'action' => 'index'), array('escape' => false)); ?>

                    <b class="arrow"></b>
                </li>

                <li class="">
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Đơn vị </span>', '/departments', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Ngành </span>', '/majors', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                  
            
                 <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Trình độ đào tạo </span>', '/levels', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Hình thức đào đạo </span>', '/formoftrainnings', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Mục tiêu đào tạo </span>', '/programoutcomes', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Chương trình đào tạo tham khảo </span>', '/curriculumnsreferences', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Chuẩn đầu ra </span>', '/programobjectives', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Khối kiến thức </span>', '/knowledges', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Học phần </span>', '/subjects', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Tài liệu </span>', '/books', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Cơ sở vật chất </span>', '/rooms', array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                


    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
