<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>
<?php echo $this->Html->css('/select2-4.0.3/css/select2.min'); ?>
<?php echo $this->Html->script('/select2-4.0.3/js/select2.min'); ?>
<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?><div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách các khóa tập huấn</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Workshop', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">
                    <?php //echo $this->Form->input('name', array('placeholder' => 'Tên chuyên đề', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('field_id', array('empty' => '-- Lĩnh vực --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <?php echo $this->Form->input('chapter_id', array('empty' => '-- Chuyên đề --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('from', array('placeholder' => 'Từ ngày... (yyyy-mm-dd)', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('to', array('placeholder' => 'đến ngày... (yyyy-mm-dd)', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <div class="form-group">
                        <?php echo $this->Form->button('Lọc', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')); ?>
                        <?php echo $this->Html->link('Bỏ lọc', array('action' => 'index'), array('class' => 'btn btn-warning btn-xs')); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>            </div>

            <div class="table-responsive" id="datarows">
                <p>Tổng số lượt GV tham dự: <?php echo $tong_so_luot ?> </p>

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
                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Workshop']['page'] - 1) * $this->Paginator->params['paging']['Workshop']['limit']) + 1; ?>
                        <?php foreach ($workshops as $workshop): ?>
                            <tr id="row-<?php echo $workshop['Workshop']['id'] ?>">
                                <td><?php echo $stt++; ?></td>


                                <td class="">
                                    <?php echo $this->Html->link($workshop['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $workshop['Workshop']['id'])); ?>


                                </td>
                                <td class="">
                                    <?php echo $workshop['Workshop']['start_date']; ?>
                                </td>
                                <td class="">
                                    <?php echo $workshop['Chapter']['Field']['name']; ?>
                                </td>

                                <td>

                                    <?php
                                    $workshop['Scheduling'] = Hash::sort($workshop['Scheduling'], '{n}.start_time');
                                    foreach ($workshop['Intrustor'] as $intrustor):
                                        ?>
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
                                <td><?php echo $workshop['Workshop']['enrolledno'] ?></td>
                                <td><?php echo $this->Common->showStatus($workshop['Workshop']['status']) ?></td>


                                <td class=""><?php echo h($workshop['Workshop']['id']); ?>&nbsp;</td>


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

    $("#WorkshopChapterId").select2();
    jQuery.fn.fadeOutAndRemove = function (speed) {
        $(this).fadeOut(speed, function () {
            $(this).remove();
        })
    };

    $('#filter-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("<?php echo BASE_URL ?>celri/workshops/index", data, function (response) {
            $("#datarows").html(response);
        });

    });

    $(document).on("click", "#check-all", function () {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
    });


</script>
<?php
echo $this->Js->writeBuffer();
