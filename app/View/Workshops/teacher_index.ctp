<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index', 'teacher' => true),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?><div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách các khóa tập huấn có thể đăng ký</h2>
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
                            <th class="column-title"><?php echo $this->Paginator->sort('start_date', 'Ngày bắt đầu'); ?></th>
                            <th class="column-title">Lĩnh vực</th>

                            <th class="column-title">Tập huấn bởi</th>
                            <th class="column-title">Thời gian, địa điểm</th>
                            <th class="column-title">Số lượng đăng ký</th>
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
                                    <?php echo $this->Html->link($workshop['Workshop']['name'], array('teacher' => true, 'controller' => 'workshops', 'action' => 'view', $workshop['Workshop']['id'])); ?>
                                    <button class="toggle-muc-tieu-btn">Hiện/Ẩn mục tiêu</button>

                                    <span class="muc-tieu">
                                        <hr>
                                        <?php
                                        echo $this->Text->autoParagraph($workshop['Workshop']['description']);
                                        ?>
                                    </span>


                                </td>
                                <td>
                                    <?php
                                    $start_date = new DateTime($workshop['Workshop']['start_date']);
                                    echo $start_date->format('d/m/Y')
                                    ?>
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
                                        $workshop['Scheduling'] = Hash::sort($workshop['Scheduling'], '{n}.start_time');

                                        foreach ($workshop['Scheduling'] as $scheduling):
                                            $bat_dau = new DateTime($scheduling['start_time']);
                                            $ket_thuc = new DateTime($scheduling['end_time']);
                                            ?>
                                            <li><b><?php echo ($scheduling['name']); ?></b>:<?php echo $bat_dau->format('H:i') ?> - <?php echo $ket_thuc->format('H:i d/m/Y') ?>, <br>Phòng: <?php echo $scheduling['room'] ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                </td>
                                <td><?php echo $workshop['Workshop']['enrolledno'] . '/' . $workshop['Workshop']['so_luong_dang_ky_toi_da'] ?></td>
                                <td><?php echo $this->Common->showStatus($workshop['Workshop']['status']) ?></td>
                                <td class=""><?php echo h($workshop['Workshop']['lms_course_link']); ?>&nbsp;</td>
                                <td class=""><?php
                                    if ($workshop['Workshop']['status'] == WORKSHOP_DANG_DANG_KY && !in_array($workshop['Workshop']['id'], $enrolments)) {
                                        $text = '<button class="btn btn-info btn-xs">Đăng ký</button>';
                                        echo $this->Html->link($text, array('teacher' => false, 'action' => 'dang_ky', $workshop['Workshop']['id']), array('escape' => false));
                                    } else {
                                        echo 'Đã đăng ký';
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

    $(".muc-tieu").hide();

    $(".toggle-muc-tieu-btn").click(function () {
        $(this).siblings('.muc-tieu').toggle();

    });


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
