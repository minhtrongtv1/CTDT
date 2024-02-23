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
            <h2><?php echo __('Lms Courses'); ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('LmsCourse',array('url'=>array('action'=>'index'),'id'=>'filter-form','class'=>'form-inline','role'=>'form','novalidate'));?>
                <div class="col-md-12">

                                                                                                                    <?php echo $this->Form->input('lms_course_id',array('placeholder'=>'lms_course_id','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('fullname',array('placeholder'=>'fullname','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('shortname',array('placeholder'=>'shortname','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('categoryid',array('placeholder'=>'categoryid','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('categoryname',array('placeholder'=>'categoryname','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                                                            <?php echo $this->Form->input('visible',array('placeholder'=>'visible','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('scholastic',array('placeholder'=>'scholastic','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('timecreated',array('placeholder'=>'timecreated','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                                                <?php echo $this->Form->input('timemodified',array('placeholder'=>'timemodified','class'=>'form-control','div' => 'form-group','label'=>array('class'=>'sr-only')));?>
                                                                
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

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('lms_course_id'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('fullname'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('shortname'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('categoryid'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('categoryname'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('startdate'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('visible'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('scholastic'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('timecreated'); ?></th>

                            
                                <th class="column-title"><?php echo $this->Paginator->sort('timemodified'); ?></th>

                                                        <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all" </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['LmsCourse']['page'] - 1) * $this->Paginator->params['paging']['LmsCourse']['limit']) + 1; ?>
<?php foreach ($lmsCourses as $lmsCourse): ?>
<tr id="row-<?php echo $lmsCourse['LmsCourse']['id'] ?>">
                        		<td><?php echo $stt++;?></td>

                        		<td class=""><?php echo h($lmsCourse['LmsCourse']['id']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['lms_course_id']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['fullname']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['shortname']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['categoryid']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['categoryname']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['startdate']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['visible']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['scholastic']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['timecreated']); ?>&nbsp;</td>
		<td class=""><?php echo h($lmsCourse['LmsCourse']['timemodified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $lmsCourse['LmsCourse']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
		</td>
                    <td>
                        <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $lmsCourse['LmsCourse']['id'] ?>">
                    </td>
                    	</tr>
<?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/lmsCourses/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
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
        $.post("http://localhost/tlc_portal//admin/lmsCourses/index", data, function (response) {
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
            $.post('http://localhost/tlc_portal//admin/lmsCourses/delete', {selectedRecord: selectedRecord}, function (response) {
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