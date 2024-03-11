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
            <h2><?php echo __('Phòng đào tạo'); ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Trainningroom', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php echo $this->Form->input('name', array('placeholder' => 'Tên', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('level_id', array('placeholder' => 'Trình độ', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('department_id', array('placeholder' => 'Đơn vị', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('major_id', array('placeholder' => 'Ngành', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('form_of_trainning_id', array('placeholder' => 'Hình thức đào tạo', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('credit', array('placeholder' => 'Số tín chỉ', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('trainning_time', array('placeholder' => 'Thời gian đào tạo', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('diploma_id', array('placeholder' => 'Văn bằng tốt nghiệp', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('approve', array('placeholder' => 'Phê duyệt', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

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


                            <th class="column-title"><?php echo $this->Paginator->sort('name'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('level_id'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('department_id'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('major_id'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('form_of_trainning_id'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('credit'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('trainning_time'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('diploma_id'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('approve'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all" </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Trainningroom']['page'] - 1) * $this->Paginator->params['paging']['Trainningroom']['limit']) + 1; ?>
                        <?php foreach ($trainningrooms as $trainningroom): ?>
                            <tr id="row-<?php echo $trainningroom['Trainningroom']['id'] ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class=""><?php echo h($trainningroom['Trainningroom']['name']); ?>&nbsp;</td>
                                <td class="">
                                    <?php echo $this->Html->link($trainningroom['Level']['name'], array('controller' => 'levels', 'action' => 'view', $trainningroom['Level']['id'])); ?>
                                </td>
                                <td class="">
                                    <?php echo $this->Html->link($trainningroom['Department']['title'], array('controller' => 'departments', 'action' => 'view', $trainningroom['Department']['id'])); ?>
                                </td>
                                <td class="">
                                    <?php echo $this->Html->link($trainningroom['Major']['name'], array('controller' => 'majors', 'action' => 'view', $trainningroom['Major']['id'])); ?>
                                </td>
                                <td class="">
                                    <?php echo $this->Html->link($trainningroom['FormOfTrainning']['name'], array('controller' => 'form_of_trainnings', 'action' => 'view', $trainningroom['FormOfTrainning']['id'])); ?>
                                </td>
                                <td class=""><?php echo h($trainningroom['Trainningroom']['credit']); ?>&nbsp;</td>
                                <td class=""><?php echo h($trainningroom['Trainningroom']['trainning_time']); ?>&nbsp;</td>
                                <td class="">
                                    <?php echo $this->Html->link($trainningroom['Diploma']['name'], array('controller' => 'diplomas', 'action' => 'view', $trainningroom['Diploma']['id'])); ?>
                                </td>
                                <td class=""><?php echo h($trainningroom['Trainningroom']['approve']); ?>&nbsp;</td>
                                <td class=""><?php echo h($trainningroom['Trainningroom']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $trainningroom['Trainningroom']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                </td>
                                <td>
                                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $trainningroom['Trainningroom']['id'] ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/trainningrooms/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
                    </tfoot>
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
        $.post("http://celri.tvu.edu.local/trainningrooms/index", data, function (response) {
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
            $.post('http://celri.tvu.edu.local/admin/trainningrooms/delete', {selectedRecord: selectedRecord}, function (response) {
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
