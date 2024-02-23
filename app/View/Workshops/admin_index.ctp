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
                    <?php echo $this->Form->input('name', array('placeholder' => 'Tên chuyên đề', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

                    <?php echo $this->Form->input('chapter_id', array('empty' => '-- Chuyên đề --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('status', array('empty' => '-- Tình trạng --', 'options'=>$this->Common->getStatus(),'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

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



                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all"> </th>
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

                                    <?php foreach ($workshop['Intrustor'] as $intrustor): ?>
                                        <?php echo ($intrustor['User']['name']); ?>
                                        <br>
                                    <?php endforeach; ?>

                                </td>


                                <td>
                                    <ul>
                                        <?php
                                        $workshop['Scheduling']=Hash::sort($workshop['Scheduling'], '{n}.start_time');
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

                                
                                <td>
                                    
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), 
                                            array('action' => 'edit', $workshop['Workshop']['id']), 
                                            array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Cập nhật')); 
                                    ?>
                                    
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-duplicate"></i>'), 
                                            array('action' => 'copy', $workshop['Workshop']['id'],'admin'=>false), 
                                            array('class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Nhân bản')); 
                                    ?>
                                
                                </td>
                                
                                <td class=""><?php echo h($workshop['Workshop']['id']); ?>&nbsp;</td>

                                <td>
                                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $workshop['Workshop']['id'] ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/workshops/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        
                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
                    </tfoot>
                </table>
                <p>Số lượt đăng ký: <?php echo $so_luong_hoc_vien;?></p>
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
        $.post("<?php echo BASE_URL ?>admin/workshops/index", data, function (response) {
            $("#datarows").html(response);
        });

    });

    $(document).on("click", "#check-all", function () {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
    });


    $(document).on("click", "#delete-seleted", function () {
        var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
        //console.log(selectedRecord.length);return false;
        if (selectedRecord.length < 1) {
            alert("Vui lòng chọn dòng muốn xóa !");
            return false;
        }
        if (confirm("Thao tác này không thể phục hồi, bạn chắc chắn muốn thực hiện ?")) {
            var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
            $.post('<?php echo BASE_URL ?>admin/workshops/delete', {selectedRecord: selectedRecord}, function (response) {
                if (response) {
                    $.each(response, function (arrayID, rowId) {
                        $("#row-" + rowId).fadeOutAndRemove('fast');
                    });
                    return true;

                } else {
                    alert('Có lỗi trong quá trình thực hiện thao tác!!!');
                    return false;
                }
            }, 'json').fail(function (response) {
                alert('Error: ' + response.responseText);
            });
            return true;
        } else {
            return false;
        }
    });

</script>
<?php
echo $this->Js->writeBuffer();
