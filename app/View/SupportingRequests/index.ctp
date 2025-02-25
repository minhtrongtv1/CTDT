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
            <h2>Yêu cầu hỗ trợ</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('SupportingRequest', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php //echo $this->Form->input('requester_id', array('empty' => '-- Chọn người gửi yêu cầu --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('status', array('empty' => '-- Chọn tình trạng --', 'options' => array(YEU_CAU_HO_TRO_CHO_XU_LY => 'Đang chờ xử lý', YEU_CAU_HO_TRO_DA_XU_LY => 'Đã xử lý'), 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php //echo $this->Form->input('supporter_id', array('empty' => '-- Chọn người hỗ trợ --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

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


                            <th class="column-title"><?php echo $this->Paginator->sort('title', 'Tiêu đề'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('requester_id', 'Người gửi'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('status', 'Tình trạng'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all" </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['SupportingRequest']['page'] - 1) * $this->Paginator->params['paging']['SupportingRequest']['limit']) + 1; ?>
                        <?php foreach ($supportingRequests as $supportingRequest): ?>
                            <tr id="row-<?php echo $supportingRequest['SupportingRequest']['id'] ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class=""><?php echo h($supportingRequest['SupportingRequest']['title']); ?>&nbsp;</td>
                                <td class="">
                                    <?php echo $this->Html->link($supportingRequest['Requester']['name'], array('controller' => 'users', 'action' => 'view', $supportingRequest['Requester']['id'])); ?>
                                </td>
                                <td class=""><?php echo $this->Common->showSupportingRequestStatus($supportingRequest['SupportingRequest']['status']); ?>&nbsp;</td>

                                <td class=""><?php echo h($supportingRequest['SupportingRequest']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php if ($supportingRequest['SupportingRequest']['status'] == YEU_CAU_HO_TRO_CHO_XU_LY): ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $supportingRequest['SupportingRequest']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <?php if ($supportingRequest['SupportingRequest']['status'] == YEU_CAU_HO_TRO_CHO_XU_LY): ?>
                                        <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $supportingRequest['SupportingRequest']['id'] ?>">
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/supportingRequests/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
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

    $("#SupportingRequestRequesterId").select2();
    $('#filter-form').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("<?php echo BASE_URL ?>admin/supportingRequests/index", data, function (response) {
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
            $.post('<?php echo BASE_URL ?>admin/supportingRequests/delete', {selectedRecord: selectedRecord}, function (response) {
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
