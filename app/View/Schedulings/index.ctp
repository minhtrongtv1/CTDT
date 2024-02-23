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
            <h2><?php echo __('Schedulings'); ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Scheduling',array('url'=>array('action'=>'index'),'id'=>'filter-form','class'=>'form-inline','role'=>'form','novalidate'));?>
                <div class="col-md-12">

                                                                        <?php echo $this->Form->input('workshop_id',array('placeholder'=>'workshop_id','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('name',array('placeholder'=>'name','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('room',array('placeholder'=>'room','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('start_time',array('placeholder'=>'start_time','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('end_time',array('placeholder'=>'end_time','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('note',array('placeholder'=>'note','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                            
                    <div class="form-group">
                        <?php echo $this->Form->button('Lọc',array('type'=>'submit','class'=>'btn btn-primary btn-xs'));?>
                        <?php echo $this->Html->link('Bỏ lọc',array('action'=>'index'),array('class'=>'btn btn-warning btn-xs'));?>
                    </div>
                </div>
                <?php echo $this->Form->end();?>            </div>
            <div class="table-responsive" id="datarows">


                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('workshop_id'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('name'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('room'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('start_time'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('end_time'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('note'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                                                        <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all" </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Scheduling']['page'] - 1) * $this->Paginator->params['paging']['Scheduling']['limit']) + 1; ?>
<?php foreach ($schedulings as $scheduling): ?>
<tr id="row-<?php echo $scheduling['Scheduling']['id'] ?>">
                        		<td><?php echo $stt++;?></td>

                        		<td class="">
			<?php echo $this->Html->link($scheduling['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $scheduling['Workshop']['id'])); ?>
		</td>
		<td class=""><?php echo h($scheduling['Scheduling']['name']); ?>&nbsp;</td>
		<td class=""><?php echo h($scheduling['Scheduling']['room']); ?>&nbsp;</td>
		<td class=""><?php echo h($scheduling['Scheduling']['start_time']); ?>&nbsp;</td>
		<td class=""><?php echo h($scheduling['Scheduling']['end_time']); ?>&nbsp;</td>
		<td class=""><?php echo h($scheduling['Scheduling']['note']); ?>&nbsp;</td>
		<td class=""><?php echo h($scheduling['Scheduling']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $scheduling['Scheduling']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
		</td>
                    <td>
                        <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $scheduling['Scheduling']['id'] ?>">
                    </td>
                    	</tr>
<?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/schedulings/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
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
        $.post("http://localhost/tlc_portal//admin/schedulings/index", data, function (response) {
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
            $.post('http://localhost/tlc_portal//admin/schedulings/delete', {selectedRecord: selectedRecord}, function (response) {
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
<?php echo $this->Js->writeBuffer();