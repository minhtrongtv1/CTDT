<?php echo $this->Html->script('jquery.shorten.1.0'); ?>
<div class="col-lg-12 content-right">
    <div class="row">
        <h3 class="page-header">Các thông tin liên quan: <?php echo $user['User']['name']; ?> </h3>
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li class="active"><a data-toggle="tab" href="#tab_2-4">Thông tin</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_hoc_vien">Tập huấn viên</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_2-2">Học viên</a></li>
                    <li class=""><a data-toggle="tab" href="#tab_1-1">Vai trò có thể</a></li>

                </ul>
                <div class="tab-content">
                    <div id="tab_hoc_vien" class="tab-pane">
                        <section class="content ">
                            <div class="row">
                                <div class="box-header">
                                    <h3>Tập huấn viên của khóa học</h3>
                                </div>
                                <?php if (!empty($user['TeachingCourse'])): ?>
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên khóa</th>
                                                <th>Trạng thái</th>
                                                <!--<th>Thao tác</th>-->
                                            </tr>
                                            <?php
                                            $i = 1;

                                            foreach ($user['TeachingCourse'] as $teachingCourse):
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td>
                                                        <?php echo $this->Html->link($teachingCourse['name'], array('admin' => true, 'controller' => 'courses', 'action' => 'view1', $teachingCourse['id']), array('class' => 'add-button fancybox.ajax')) ?>
                                                    </td>
                                                    <td class="actions">
                                                        <?php
                                                        if ($teachingCourse['status'] == 1)
                                                            echo 'Đang đăng ký';
                                                        if ($teachingCourse['status'] == 3)
                                                            echo 'Chưa hoàn thành';
                                                        if ($teachingCourse['status'] == 4)
                                                            echo 'Đã hoàn thành';
                                                        if ($teachingCourse['status'] == 5)
                                                            echo 'Đã hủy';
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </section>
                    </div><!-- /.tab-pane -->

                    <div id="tab_1-1" class="tab-pane">
                        <div class="noi_dung" >
                            <div class="related">
                                <section class="content ">
                                    <div class="row">
                                        <h3>Vai trò có thể</h3>
                                        <?php if (!empty($user['Group'])): ?>
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên nhóm</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Ngày cập nhật</th>
                                                </tr>
                                                <?php
                                                $i = 1;
                                                foreach ($user['Group'] as $group):
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $group['name']; ?></td>
                                                        <td><?php
                                                            $created = new DateTime($group['created']);
                                                            echo $created->format('H:i') . ', ngày: ' . $created->format('d/m/Y');
                                                            ?></td>
                                                        <td><?php
                                                            $modified = new DateTime($group['modified']);
                                                            echo $modified->format('H:i') . ', ngày: ' . $modified->format('d/m/Y');
                                                            ?></td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        <?php endif; ?>
                                    </div>
                                </section>
                            </div>

                        </div>
                    </div><!-- /.tab-pane -->
                    <div id="tab_2-2" class="tab-pane">
                        <section class="content ">
                            <div class="row">
                                <div class="related">
                                    <h3>Học viên của khóa học</h3>
                                    <?php if (!empty($user['Attend'])): ?>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên khóa</th>
                                                <th>Chuyên đề</th>
                                                <th>Lĩnh vực</th>
                                                <th>Tình trạng khóa</th>
                                                <th><?php echo __('Kết quả'); ?></th>
                                                <th><?php echo __('Chứng nhận'); ?></th>
                                                <th>Ngày nhận</th>

                                                <th><?php echo __('Ngày cấp CN'); ?></th>
                                                <th><?php echo __('Số CN'); ?></th>
                                                <th><?php echo __('Ngày đăng ký'); ?></th>
                                            </tr>
                                            <?php
                                            //debug($user['Attend']);
                                            $i = 1;
                                            foreach ($user['Attend'] as $attend):
                                                $status = "";
                                                switch ($attend['Course']['status']) {
                                                    case COURSE_CANCELLED:
                                                        $status = 'Đã hủy';
                                                        break;
                                                    case COURSE_COMPLETED:
                                                        $status = 'Đã hoàn thành';
                                                        break;
                                                    case COURSE_UNCOMPLETED:
                                                        $status = 'Chưa hoàn thành';
                                                        break;
                                                    case COURSE_REGISTERING:
                                                        $status = 'Đang đăng ký';
                                                        break;

                                                    default:
                                                        break;
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td>
                                                        <?php echo $this->Html->link($attend['Course']['name'], array('admin' => true, 'controller' => 'courses', 'action' => 'view1', $attend['Course']['id']), array('class' => 'add-button fancybox.ajax')) ?>
                                                    </td>
                                                    <td><?php echo $attend['Course']['Chapter']['name']; ?></td>
                                                    <td><?php echo $attend['Course']['Chapter']['Field']['name']; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                    <td><?php
                                                        if ($attend['Course']['status'] == COURSE_COMPLETED) {
                                                            if (is_null($attend['is_passed']))
                                                                echo "Chưa cập nhật";
                                                            else {
                                                                if ($attend['is_passed'])
                                                                    echo "Đạt";
                                                                else
                                                                    echo "Không đạt";
                                                            }
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <?php
                                                        if ($attend['is_recieved'])
                                                            echo $this->Form->postLink('<button type="button" class="btn btn-warning">Hủy nhận</button>', array('admin' => false, 'controller' => 'attends', 'action' => 'cancel_recieve', $attend['id']), array('escape' => false), __('Bạn có chắc hủy nhận bằng?'));
                                                        ?>
                                                        <?php
                                                        if ($attend['is_recieved'] == 0 && $attend['is_passed'] == 1)
                                                            echo $this->Form->postLink('<button type="button" class="btn btn-warning">Nhận</button>', array('admin' => false, 'controller' => 'attends', 'action' => 'recieve', $attend['id']), array('escape' => false), __('Người này chắc nhận bằng?'));
                                                        ?></td>
                                                    <td><?php
                                                        if (!empty($attend['is_recieved'])) {
                                                            $recieve_date = new DateTime($attend['recieve_date']);
                                                            echo $recieve_date->format('H:i') . ', ngày: ' . $recieve_date->format('d/m/Y');
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <?php
                                                        if ($attend['Course']['status'] == COURSE_COMPLETED) {
                                                            if (!empty($attend['certificated_date'])) {
                                                                $certificated_date = new DateTime($attend['certificated_date']);

                                                                echo $certificated_date->format('H:i') . ', ngày: ' . $certificated_date->format('d/m/Y');
                                                            }
                                                        }
                                                        ?>

                                                    </td>
                                                    <td><?php
                                                        if ($attend['Course']['status'] == COURSE_COMPLETED) {
                                                            echo $attend['certificated_number'];
                                                        }
                                                        ?></td>
                                                    <td><?php
                                                        $created = new DateTime($attend['created']);
                                                        echo $created->format('H:i') . ', ngày: ' . $created->format('d/m/Y');
                                                        ?></td>


                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    <?php endif; ?>

                                </div>
                            </div>

                        </section>
                    </div><!-- /.tab-pane -->

                    <div id="tab_2-4" class="tab-pane active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <section class="content ">    
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <h2 class="page-header">
                                                            <i class="fa fa-globe"></i> Thông tin người dùng: <?php echo $user['User']['name']; ?>
                                                            <small class="pull-right">Ngày tạo: <?php
                                                                $created = new DateTime($user['User']['created']);
                                                                echo $created->format('h:i') . ', ' . $created->format('d/m/Y');
                                                                ?></small>
                                                        </h2>                            
                                                    </div><!-- /.col -->
                                                </div>
                                                <!-- info row -->
                                                <div class="row invoice-info">
                                                    <div class="col-md-6">
                                                        <!-- Primary tile -->
                                                        <div class="box box-solid bg-light-blue">
                                                            <div class="box-header">
                                                                <h3 class="box-title"> Thông tin cơ bản</h3>
                                                            </div>
                                                            <div class="box-body">
                                                                Họ tên: <?php echo $user['User']['name']; ?><br>
                                                                Ngày sinh: <?php echo $user['User']['ngay_sinh']; ?><br>
                                                                <?php if (!empty($user['User']['birthplace'])) { ?>
                                                                    Nơi sinh: <?php echo $user['NoiSinh']['name']; ?><br>
                                                                <?php } ?>


                                                                Học vị: <?php echo $user['HocVi']['name']; ?><br>

                                                                <?php if (!empty($user['User']['so_dien_thoai'])) { ?>
                                                                    Số điện thoại: <?php echo $user['User']['so_dien_thoai']; ?><br>
                                                                <?php } ?>

                                                                <?php if (!empty($user['User']['email'])) { ?>
                                                                    Email: <?php echo $user['User']['email']; ?>
                                                                <?php } ?>

                                                            </div><!-- /.box-body -->
                                                        </div><!-- /.box -->

                                                    </div><!-- /.col -->
                                                    <div class="col-sm-6 invoice-col">
                                                        <div class="box box-solid bg-navy">
                                                            <div class="box-header">
                                                                <h3 class="box-title"> Thông tin hoạt động</h3>
                                                            </div>
                                                            <div class="box-body">
                                                                Tên đăng nhâp: <strong><?php echo $user['User']['username']; ?></strong><br>
                                                                Lần đăng nhập cuối: <?php
                                                                $last_login = new DateTime($user['User']['last_login']);
                                                                echo $last_login->format('h:i') . ", ngày: " . $last_login->format('d/m/Y');
                                                                ?><br>
                                                            </div><!-- /.box-body -->
                                                        </div><!-- /.box -->
                                                    </div><!-- /.col -->

                                                </div><!-- /.row -->


                                                <!-- this row will not appear when printing -->
                                                <div class="row no-print">
                                                    <div class="col-xs-12">
                                                        <a href="<?php echo BASE_URL; ?>/admin/users/index"><button class="btn btn-info pull-right">Back</button></a>
                                                    </div>
                                                </div>
                                            </section>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div><!-- /.tab-content -->
            </div>
        </div>
    </div>
    <hr>
</div>
<script>

    $('.noi_dung').shorten({
        showChars: '4000',
        moreText: 'Đọc thêm',
        lessText: 'Đóng lại'
    });
</script>
<script>
    $(function () {
        $('.delete-attachment-button').live('click', function (e) {
            var tr = $(this).parent().parent();
            e.preventDefault(); // prevent native submit            
            var href = $(this).attr('href');

            if (confirm('Bạn chắc không ?') === true) {
                $.ajax({
                    type: "POST",
                    url: href
                }).done(function (data, textStatus, jqXHR) {
                    var response = JSON.parse(data);
                    if (response.status === 1) {
                        tr.fadeOut(400, function () {
                            tr.remove();
                        });
                    } else {
                        alert('Lỗi xóa không thành công');
                    }
                });
            }

            return false;
        });
    });
</script>
