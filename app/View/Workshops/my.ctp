<?php
$this->Paginator->options(array(
    'url' => array('action' => 'my', 'teacher' => false),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?><div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Các khóa tập huấn tôi đã tham dự</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Workshop', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">
                    <?php echo $this->Form->input('name', array('placeholder' => 'Tên chuyên đề', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <?php echo $this->Form->input('field_id', array('empty' => '-- Lĩnh vực --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <div class="form-group">
                        <?php echo $this->Form->button('Lọc', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')); ?>
                        <?php echo $this->Html->link('Bỏ lọc', array('action' => 'index'), array('class' => 'btn btn-warning btn-xs')); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>            </div>
            <div class="table-responsive" id="datarows">


                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>

                            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên'); ?></th>
                            <th class="column-title">Lĩnh vực</th>

                            <th class="column-title">Tập huấn bởi</th>
                            <th class="column-title">Thời gian, địa điểm</th>
                            <th class="column-title">Số lượng đăng ký</th>
                            <th class="column-title">Kết quả</th>
                            <th class="column-title">Số QĐ cấp CN</th>
                            <th class="column-title">Ngày ký</th>
                            <th class="column-title">File QĐ</th>
                            <th class="column-title"><?php echo $this->Paginator->sort('status', 'Tình trạng'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('lms_course_link', 'Link E-Learning'); ?></th>
                            <th></th>




                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Workshop']['page'] - 1) * $this->Paginator->params['paging']['Workshop']['limit']) + 1; ?>
                        <?php foreach ($workshops as $workshop):
                            ?>
                            <tr id="row-<?php echo $workshop['Workshop']['id'] ?>">
                                <td><?php echo $stt++; ?></td>


                                <td class="">
                                    <?php echo $this->Html->link($workshop['Workshop']['name'], array('teacher' => false, 'controller' => 'workshops', 'action' => 'view', $workshop['Workshop']['id'])); ?>


                                </td>
                                <td class="">
                                    <?php echo $workshop['Chapter']['Field']['name']; ?>
                                </td>
                                <td>

                                    <?php foreach ($workshop['Intrustor'] as $intrustor): ?>
                                        <?php echo ($intrustor['User']['name']); ?>
                                        <br>
                                    <?php endforeach; ?>

                                </td>

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

                                <td><?php echo $workshop['Workshop']['enrolledno'] ?>/<?php echo $workshop['Workshop']['so_luong_dang_ky_toi_da'] ?></td>
                                <td><?php echo $this->Common->showPass($workshop['Enrolment'][0]['result']) ?></td>
                                <td><?php echo ($workshop['Enrolment'][0]['so_qd']) ?></td>
                                <td><?php echo ($workshop['Enrolment'][0]['ngay_qd']) ?></td>
                                <td><?php if (!empty($workshop['Enrolment'][0]['link_file_qd'])) echo $this->Html->link('Tải về', $workshop['Enrolment'][0]['link_file_qd']); ?></td>
                                <td><?php echo $this->Common->showStatus($workshop['Workshop']['status']) ?></td>
                                <td class=""><?php echo h($workshop['Workshop']['lms_course_link']); ?>&nbsp;</td>
                                <td class=""><?php
                                        if ($workshop['Workshop']['status'] == WORKSHOP_DANG_DANG_KY) {
                                            $text = '<button class="btn btn-info btn-xs">Hủy đăng ký</button>';
                                            echo $this->Form->postLink($text, array('action' => 'huy_dang_ky', $workshop['Workshop']['id']), array('escape' => false, 'confirm' => 'Bạn chắc chắn muốn hủy đăng ký?'));
                                        }
                                        ?></td>


                            </tr>
<?php endforeach; ?>
                    </tbody>

                </table>
<?php echo $this->element("pagination"); ?>  
            </div>
        </div>
    </div>
</div>


<script>
    jQuery.fn.fadeOutAndRemove = function (speed) {
        $(this).fadeOut(speed, function () {
            $(this).remove();
        })
    };

    $('#filter-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("<?php echo BASE_URL ?>/workshops/dang_ky", data, function (response) {
            $("#datarows").html(response);
        });

    });






</script>
<?php
echo $this->Js->writeBuffer();
