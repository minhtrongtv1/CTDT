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
            <h2><?php echo __('Curriculumns References'); ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('CurriculumnsReference', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php echo $this->Form->input('name', array('placeholder' => 'name', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('curriculumn_id', array('placeholder' => 'curriculumn_id', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('major_id', array('placeholder' => 'major_id', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('typereference', array('placeholder' => 'typereference', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('school', array('placeholder' => 'school', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('address', array('placeholder' => 'address', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

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


                            <th class="column-title"><?php echo $this->Paginator->sort('name','Tên chương trình đào tạo tham khảo'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('major_id','Ngành đào tạo'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('typereference','Loại đào tạo tham khảo'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('school','Trường đào tạo'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('address','Địa chỉ'); ?></th>
                            
                            
                            <th class="column-title"><?php echo $this->Paginator->sort('curriculumn_id','Chương trình đào tạo'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all" </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['CurriculumnsReference']['page'] - 1) * $this->Paginator->params['paging']['CurriculumnsReference']['limit']) + 1; ?>
                        <?php foreach ($curriculumnsReferences as $curriculumnsReference): ?>
                            <tr id="row-<?php echo $curriculumnsReference['CurriculumnsReference']['id'] ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class=""><?php echo h($curriculumnsReference['CurriculumnsReference']['name']); ?>&nbsp;</td>
                                <td class="">
                                    <?php echo $this->Html->link($curriculumnsReference['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $curriculumnsReference['Curriculumn']['id'])); ?>
                                </td>
                                <td class="">
                                    <?php echo $this->Html->link($curriculumnsReference['Major']['name'], array('controller' => 'majors', 'action' => 'view', $curriculumnsReference['Major']['id'])); ?>
                                </td>
                                <td class=""><?php echo h($curriculumnsReference['CurriculumnsReference']['typereference']); ?>&nbsp;</td>
                                <td class=""><?php echo h($curriculumnsReference['CurriculumnsReference']['school']); ?>&nbsp;</td>
                                <td class=""><?php echo h($curriculumnsReference['CurriculumnsReference']['address']); ?>&nbsp;</td>
                                <td class=""><?php echo h($curriculumnsReference['CurriculumnsReference']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $curriculumnsReference['CurriculumnsReference']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                </td>
                                <td>
                                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $curriculumnsReference['CurriculumnsReference']['id'] ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/curriculumnsReferences/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
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
        $.post("http://celri.tvu.edu.local/curriculumnsReferences/index", data, function (response) {
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
            $.post('http://celri.tvu.edu.local/curriculumnsReferences/delete', {selectedRecord: selectedRecord}, function (response) {
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
