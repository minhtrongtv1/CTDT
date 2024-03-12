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
            <?php
            echo $this->Html->link('<i class="menu-icon fa fa-cloud-download"></i>Sao lưu', array('admin' => true, 'controller' => 'Mysqldumps', 'action' => 'index'), array('escape' => false));
            ?>
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
                <span class="menu-text"> Chương trình đào tạo </span>', array('ptc' => true, 'plugin' => false, 'controller' => 'curriculumns', 'action' => 'ptc_index'), array('escape' => false)); ?>

                    <b class="arrow"></b>
                </li>

                <li class="">
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Đơn vị </span>', array('ptc' => true, 'controller' => 'departments', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class=""><?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Ngành </span>', array('ptc' => true, 'controller' => 'majors', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>


                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Trình độ đào tạo </span>', array('ptc' => true, 'controller' => 'levels', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Hình thức đào đạo </span>', array('ptc' => true, 'controller' => 'formoftrainnings', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Mục tiêu đào tạo </span>', array('ptc' => true, 'controller' => 'programoutcomes', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Chương trình đào tạo tham khảo </span>', array('ptc' => true, 'controller' => 'curriculumnsreferences', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Chuẩn đầu ra </span>', array('ptc' => true, 'controller' => 'programobjectives', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Khối kiến thức </span>', array('ptc' => true, 'controller' => 'knowledges', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i><span class="menu-text"> Học phần </span>', array('ptc' => true, 'controller' => 'subjects', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Tài liệu </span>', array('ptc' => true, 'controller' => 'books', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Cơ sở vật chất </span>', array('ptc' => true, 'controller' => 'infrastructures', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Phòng </span>', array('ptc' => true, 'plugin' => false, 'controller' => 'rooms', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Thiết bị </span>', array('ptc' => true, 'plugin' => false, 'controller' => 'devices', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Văn bằng tốt nghiệp </span>', array('ptc' => true, 'plugin' => false, 'controller' => 'diplomas', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Học kỳ </span>', array('ptc' => true, 'plugin' => false, 'controller' => 'semesters', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Học phần tài liệu </span>', array('ptc' => true, 'plugin' => false, 'controller' => 'subjectsbooks', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Giảng dạy </span>', array('ptc' => true, 'plugin' => false, 'controller' => 'subjectsusers', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Loại chuẩn đầu ra </span>', array('ptc' => true, 'plugin' => false, 'controller' => 'typeoutcomes', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Học phần chương trình đào tạo </span>', array('ptc' => true, 'plugin' => false, 'controller' => 'subjectscurriculumns', 'action' => 'ptc_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>


            </ul><!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
            </div>