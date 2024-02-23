
<div class="widget-header">
    <h4 class="widget-title lighter">Thông tin tập huấn</h4>

    <div class="widget-toolbar no-border">
        <ul class="nav nav-tabs" id="myTab2">
            <li class="active">
                <a data-toggle="tab" href="#workshop" aria-expanded="true">Chung</a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#enrolments" aria-expanded="false">Danh sách tham dự</a>
            </li>


        </ul>
    </div>
</div>

<div class="widget-body">
    <div class="widget-main padding-12 no-padding-left no-padding-right">
        <div class="tab-content padding-4">
            <div id="workshop" class="tab-pane active">
                <div class="box-body table-responsive">
                    <table id="Workshops" class="table table-bordered table-striped">
                        <tbody>

                            <tr>		
                                <td><strong>Tên Workshop</strong></td>
                                <td>
                                    <?php echo h($workshop['Workshop']['name']); ?>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>		<td><strong>Chuyên đề</strong></td>
                                <td>
                                    <?php echo $this->Html->link($workshop['Chapter']['name'], array('controller' => 'chapters', 'action' => 'view', $workshop['Chapter']['id']), array('class' => '')); ?>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>		
                                <td><strong>Tập huấn bởi</strong></td>
                                <td>
                                    <?php if (!empty($workshop['Intrustor'])): ?>
                                        <?php foreach ($workshop['Intrustor'] as $intrustor): ?>
                                            <?php echo ($intrustor['User']['name']); ?> 

                                            <?php
                                            echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'),
                                                    array('admin' => false, 'controller' => 'intrustors', 'action' => 'delete', $intrustor['id']),
                                                    array('class' => 'text-danger', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'),
                                                    __('Bạn chắc muốn xóa tập huấn viên tên # %s?', $intrustor['User']['name']));
                                            ?>

                                            <br>
                                        <?php endforeach; ?>
<?php endif; ?>
<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> '), array('controller' => 'intrustors', 'action' => 'add', $workshop['Workshop']['id']), array('id' => 'add_instructor_btn', 'class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Thêm')); ?>

                                    &nbsp;
                                </td>
                            </tr>

                            <tr>		<td><strong>Thời gian, địa điểm</strong></td>
                                <td>
                                    <ul>
                                        <?php
                                        $workshop['Scheduling'] = Hash::sort($workshop['Scheduling'], '{n}.start_time');
                                        foreach ($workshop['Scheduling'] as $scheduling):
                                            $bat_dau = new DateTime($scheduling['start_time']);
                                            $ket_thuc = new DateTime($scheduling['end_time']);
                                            ?>
                                            <li><b><?php echo ($scheduling['name']); ?></b>: Từ <?php echo $bat_dau->format('H:i') ?> - <?php echo $ket_thuc->format('H:i d/m/Y') ?>, Phòng: <?php echo $scheduling['room'] ?>

                                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('admin' => false, 'controller' => 'schedulings', 'action' => 'delete', $scheduling['id']), array('class' => 'text-danger', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $scheduling['id'])); ?>

                                            </li>
                                    <?php endforeach; ?>
                                    </ul>
<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>'), array('controller' => 'schedulings', 'action' => 'add', $workshop['Workshop']['id']), array('class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Thêm')); ?>

                                </td>
                            </tr>


                            <tr>		<td><strong>Link Khóa trên LMS</strong></td>
                                <td>
<?php echo h($workshop['Workshop']['lms_course_link']); ?>
                                    &nbsp;
                                </td>
                            </tr><tr>		<td><strong>Miêu tả</strong></td>
                                <td>
<?php echo h($workshop['Workshop']['description']); ?>
                                    &nbsp;
                                </td>
                            </tr><tr>		<td><strong>Ngày tạo</strong></td>
                                <td>
<?php echo h($workshop['Workshop']['created']); ?>
                                    &nbsp;
                                </td>
                            </tr><tr>		<td><strong>Ngày cập nhật cuối</strong></td>
                                <td>
<?php echo h($workshop['Workshop']['modified']); ?>
                                    &nbsp;
                                </td>
                            </tr><tr>		<td><strong>ID</strong></td>
                                <td>
<?php echo h($workshop['Workshop']['id']); ?>
                                    &nbsp;
                                </td>
                            </tr>                    </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->
                <hr>
                <div class="btn-toolbar">
<?php echo $this->Html->link('Cập nhật', array('action' => 'edit', $workshop['Workshop']['id']), array('class' => 'btn btn-info btn-xs')) ?>
                </div>
            </div>

            <div id="enrolments" class="tab-pane">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách tham dự</h3>

                    </div>
                    <?php
                    if (!empty($workshop['Enrolment'])):
                        ?>

                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th class="text-center">Họ và tên</th>
                                        <th class="text-center">Ngày sinh</th>
                                        <th class="text-center">Nơi sinh</th>
                                        <th class="text-center">Kết quả</th>
                                        <th class="text-center">Vắng không phép</th>
                                        <th class="text-center">Vắng có phép</th>
                                        <th class="text-center">Ngày đăng ký</th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($workshop['Enrolment'] as $enrolment):
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $enrolment['Teacher']['name']; ?></td>
                                            <td class="text-center"><?php echo $enrolment['Teacher']['ngay_sinh']; ?></td><!-- comment -->
                                            <td class="text-center"><?php echo $enrolment['Teacher']['NoiSinh']['name']; ?></td>
                                            <td class="text-center"><?php echo $this->Common->showPass($enrolment['result']); ?></td>
                                            <td class="text-center"><?php echo $this->Common->showTrueFalseAsCheck($enrolment['vang_khong_phep']); ?></td>
                                            <td class="text-center"><?php echo $this->Common->showTrueFalseAsCheck($enrolment['vang_co_phep']); ?></td>
                                            <td class="text-center"><?php echo $enrolment['created']; ?></td>
                                            <td class="text-center"><?php echo $enrolment['id']; ?></td>
                                            <td class="text-center">
                                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'enrolments', 'action' => 'edit', $enrolment['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'enrolments', 'action' => 'delete', 'admin' => false, $enrolment['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $enrolment['id'])); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table><!-- /.table table-striped table-bordered -->
                            <?php echo $this->Html->link('Xuất danh sách', array('admin' => false, 'controller' => 'workshops', 'action' => 'xuat_danh_sach', $workshop['Workshop']['id']), array('escape' => false, 'class' => 'btn btn-info btn-xs')); ?>
                        </div><!-- /.table-responsive -->

                    <?php endif; ?>



                </div><!-- /.related -->

            </div>
        </div>
    </div>
</div>


