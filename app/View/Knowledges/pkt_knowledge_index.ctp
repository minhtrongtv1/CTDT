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
            <h2><?php echo __('Khối kiến thức'); ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Knowledge', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php echo $this->Form->input('code', array('placeholder' => 'Mã khối kiến thức', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                   
                    <?php echo $this->Form->input('name', array('placeholder' => 'Tên khối kiến thức', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('program_objective_id', array('placeholder' => 'Tên chuẩn đầu ra', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    
                    <div class="form-group">
                        <?php echo $this->Form->button('Lọc', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')); ?>
                        <?php echo $this->Html->link('Bỏ lọc', array('action' => 'pkt_knowledge_index'), array('class' => 'btn btn-warning btn-xs')); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>            </div>
            <div class="table-responsive" id="datarows">


                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>


                            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã khối kiến thức'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên khối kiến thức'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('program_objective_id', 'Mã chuẩn đầu ra'); ?></th>





                            <th class="column-title"><?php echo $this->Paginator->sort('describe','Miêu tả'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                          
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Knowledge']['page'] - 1) * $this->Paginator->params['paging']['Knowledge']['limit']) + 1; ?>
                        <?php foreach ($knowledges as $knowledge): ?>
                            <tr id="row-<?php echo $knowledge['Knowledge']['id'] ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class=""><?php echo h($knowledge['Knowledge']['code']); ?>&nbsp;</td>

                                <td class=""><?php echo h($knowledge['Knowledge']['name']); ?>&nbsp;</td>
                                <td class="">
                                    <?php echo $this->Html->link($knowledge['ProgramObjective']['code'], array('controller' => 'program_objectives', 'action' => 'view', $knowledge['ProgramObjective']['id'])); ?>
                                </td>
                                <td class=""><?php echo h($knowledge['Knowledge']['describe']); ?>&nbsp;</td>
                                <td class=""><?php echo h($knowledge['Knowledge']['id']); ?>&nbsp;</td>
                              
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
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
        $.post("<?php echo BASE_URL ?>/knowledges/index", data, function (response) {
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
            $.post('http://celri.tvu.edu.local/admin/knowledges/delete', {selectedRecord: selectedRecord}, function (response) {
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
