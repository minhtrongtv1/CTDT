<style>
    /* Default tab color */
    .nav-tabs > li > a {
        background-color: #f5f5f5 !important;
    }



    /* Active tab color */
    .nav-tabs > li.active > a {
        background-color: #337ab7 !important;
        color: #fff !important;
    }



    /* Tab content */
    .tab-content {
        background-color: #f5f5f5 !important;
        padding: 10px;
    }
</style>
<nav aria-label="breadcrumb" class="well">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <?php echo $this->Html->link('Các khóa tập huấn của tôi', array('controller' => 'workshops', 'action' => 'my')) ?>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Xem chi tiết</li>
    </ol>
</nav>
<div class="widget-header">
    <h4 class="widget-title lighter">Thông tin khóa tập huấn</h4>

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
                                    <h2><?php echo h($workshop['Workshop']['name']); ?></h2>
                                    <p><?php
                                        if ($workshop['Workshop']['status'] == WORKSHOP_DANG_DANG_KY && !in_array($workshop['Workshop']['id'], $enrolments)) {
                                            $text = '<button class="btn btn-info btn-sm">Đăng ký</button>';
                                            echo $this->Html->link($text, array('teacher' => false, 'action' => 'dang_ky', $workshop['Workshop']['id']), array('escape' => false));
                                        } else {
                                            echo 'Đã đăng ký';
                                        }
                                        ?></p>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>		<td><strong>Chuyên đề</strong></td>
                                <td>
                                    <?php echo $workshop['Chapter']['name']; ?>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>		
                                <td><strong>Tập huấn bởi</strong></td>
                                <td>
                                    <?php if (!empty($workshop['Intrustor'])): ?>
                                        <?php foreach ($workshop['Intrustor'] as $intrustor): ?>
                                            <?php echo ($intrustor['User']['name']); ?> 


                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    &nbsp;
                                </td>
                            </tr>

                            <tr>		<td><strong>Thời gian, địa điểm</strong></td>
                                <td>
                                    <ul>
                                        <?php
                                        foreach ($workshop['Scheduling'] as $scheduling):
                                            $bat_dau = new DateTime($scheduling['start_time']);
                                            $ket_thuc = new DateTime($scheduling['end_time']);
                                            ?>
                                            <li><b><?php echo ($scheduling['name']); ?></b>: Từ <?php echo $bat_dau->format('H:i') ?> - <?php echo $ket_thuc->format('H:i d/m/Y') ?>, Phòng: <?php echo $scheduling['room'] ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                </td>
                            </tr>

                            <tr>		<td><strong>Link Khóa trên LMS</strong></td>
                                <td>
                                    <?php echo h($workshop['Workshop']['lms_course_link']); ?>
                                    &nbsp;
                                </td>
                            </tr><tr>		<td><strong>Miêu tả</strong></td>
                                <td>
                                    <?php echo $this->Text->autoParagraph($workshop['Workshop']['description']); ?>
                                    &nbsp;
                                </td>
                            </tr>



                            <tr>		<td><strong>ID</strong></td>
                                <td>
                                    <?php echo h($workshop['Workshop']['id']); ?>
                                    &nbsp;
                                </td>
                            </tr>                    </tbody>
                    </table><!-- /.table table-striped table-bordered -->


                </div><!-- /.table-responsive -->
                <hr>

            </div>

            <div id="enrolments" class="tab-pane">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách tham dự</h3>

                    </div>
                    <?php
                    if (!empty($workshop['Enrolment'])):
                        $workshop['Enrolment'] = Hash::sort($workshop['Enrolment'], '{n}.Teacher.first_name');
                        ?>

                        <div class="box-body table-responsive">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>

                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th class="">Ngày sinh</th>
                                        <th class="">Nơi sinh</th>
                                        <th class="">Kết quả</th>
                                        <th class="">Vắng không phép</th>
                                        <th class="">Vắng có phép</th>
                                        <th class="">Ngày đăng ký</th>
                                        <th class="">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($workshop['Enrolment'] as $enrolment):
                                        ?>
                                        <tr>
                                            <td class=""><?php echo $enrolment['Teacher']['name']; ?></td>
                                            <td class=""><?php echo $enrolment['Teacher']['email']; ?></td>
                                            <td class=""><?php echo $enrolment['Teacher']['so_dien_thoai']; ?></td>
                                            <td class=""><?php echo $enrolment['Teacher']['ngay_sinh']; ?></td><!-- comment -->
                                            <td class=""><?php echo $enrolment['Teacher']['NoiSinh']['name']; ?></td>
                                            <td class=""><?php echo $this->Common->showPass($enrolment['result']); ?></td>
                                            <td class=""><?php echo $this->Common->showTrueFalseAsCheck($enrolment['vang_khong_phep']); ?></td>
                                            <td class=""><?php echo $this->Common->showTrueFalseAsCheck($enrolment['vang_co_phep']); ?></td>
                                            <td class=""><?php echo $enrolment['created']; ?></td>
                                            <td class=""><?php echo $enrolment['id']; ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table><!-- /.table table-striped table-bordered -->
                            <p>
                                <?php
                                foreach ($workshop['Enrolment'] as $enrolment):
                                    echo $enrolment['Teacher']['email'] . ';';
                                    ?>

                                <?php endforeach; ?>
                            </p>
                            <?php echo $this->Html->link('Xuất danh sách', array('admin' => false, 'controller' => 'workshops', 'action' => 'xuat_danh_sach', $workshop['Workshop']['id']), array('escape' => false, 'class' => 'btn btn-info btn-xs')); ?>
                        </div><!-- /.table-responsive -->

                    <?php endif; ?>



                </div><!-- /.related -->

            </div>
        </div>
    </div>
</div>


