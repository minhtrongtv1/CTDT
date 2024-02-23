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
            <h2><?php echo __('Subjects'); ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Subject',array('url'=>array('action'=>'index'),'id'=>'filter-form','class'=>'form-inline','role'=>'form','novalidate'));?>
                <div class="col-md-12">

                                                                        <?php echo $this->Form->input('code',array('placeholder'=>'code','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('name',array('placeholder'=>'name','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('theory_credit',array('placeholder'=>'theory_credit','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('practice_credit',array('placeholder'=>'practice_credit','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('theory_hour',array('placeholder'=>'theory_hour','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('practice_hour',array('placeholder'=>'practice_hour','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('self_learning_time',array('placeholder'=>'self_learning_time','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('note',array('placeholder'=>'note','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('describe',array('placeholder'=>'describe','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('outline',array('placeholder'=>'outline','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                            
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

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('code'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('name'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('theory_credit'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('practice_credit'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('theory_hour'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('practice_hour'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('self_learning_time'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('note'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('describe'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('outline'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                                                        <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all" </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Subject']['page'] - 1) * $this->Paginator->params['paging']['Subject']['limit']) + 1; ?>
<?php foreach ($subjects as $subject): ?>
<tr id="row-<?php echo $subject['Subject']['id'] ?>">
                        		<td><?php echo $stt++;?></td>

                        		<td class=""><?php echo h($subject['Subject']['code']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['name']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['theory_credit']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['practice_credit']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['theory_hour']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['practice_hour']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['self_learning_time']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['note']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['describe']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['outline']); ?>&nbsp;</td>
		<td class=""><?php echo h($subject['Subject']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $subject['Subject']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
		</td>
                    <td>
                        <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $subject['Subject']['id'] ?>">
                    </td>
                    	</tr>
<?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/subjects/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
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
        $.post("http://celri.tvu.edu.local/admin/subjects/index", data, function (response) {
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
            $.post('http://celri.tvu.edu.local/admin/subjects/delete', {selectedRecord: selectedRecord}, function (response) {
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