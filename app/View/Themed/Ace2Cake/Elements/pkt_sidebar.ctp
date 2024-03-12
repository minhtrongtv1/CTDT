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
                <span class="menu-text"> Chương trình đào tạo </span>', array('pkt' => true, 'plugin' => false, 'controller' => 'curriculumns', 'action' => 'pkt_index'), array('escape' => false)); ?>

                    <b class="arrow"></b>
                </li>

                <li class="">
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Đơn vị </span>', array('pkt' => true, 'controller' => 'departments', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Ngành </span>', array('pkt' => true, 'controller' => 'majors', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>


                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>

                                                        <span class="menu-text"> Trình độ đào tạo </span>', array('pkt' => true, 'controller' => 'levels', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Hình thức đào đạo </span>', array('pkt' => true, 'controller' => 'formoftrainnings', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Mục tiêu đào tạo </span>', array('pkt' => true, 'controller' => 'programoutcomes', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Chương trình đào tạo tham khảo </span>', array('pkt' => true, 'controller' => 'curriculumnsreferences', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Chuẩn đầu ra </span>', array('pkt' => true, 'controller' => 'programobjectives', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Khối kiến thức </span>', array('pkt' => true, 'controller' => 'knowledges', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Học phần </span>', array('pkt' => true, 'controller' => 'subjects', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Tài liệu </span>', array('pkt' => true, 'controller' => 'books', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Cơ sở vật chất </span>', array('pkt' => true, 'controller' => 'infrastructures', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Phòng </span>', array('pkt' => true, 'plugin' => false, 'controller' => 'rooms', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Thiết bị </span>', array('pkt' => true, 'plugin' => false, 'controller' => 'devices', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Văn bằng tốt nghiệp </span>', array('pkt' => true, 'plugin' => false, 'controller' => 'diplomas', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Học kỳ </span>', array('pkt' => true, 'plugin' => false, 'controller' => 'semesters', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Học phần tài liệu </span>', array('pkt' => true, 'plugin' => false, 'controller' => 'subjectsbooks', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Giảng dạy </span>', array('pkt' => true, 'plugin' => false, 'controller' => 'subjectsusers', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Loại chuẩn đầu ra </span>', array('pkt' => true, 'plugin' => false, 'controller' => 'typeoutcomes', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-caret-right"></i>
                                                        <span class="menu-text"> Học phần chương trình đào tạo </span>', array('pkt' => true, 'plugin' => false, 'controller' => 'subjectscurriculumns', 'action' => 'pkt_index'), array('escape' => false)); ?>
                    <b class="arrow"></b>
                </li>


            </ul><!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
            </div>
