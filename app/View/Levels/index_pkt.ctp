<?php
$this->Paginator->options(array(
    'url' => array('pkt' => true,'action' => 'index_pkt'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?><div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?php echo __('Trình Độ Đào Tạo'); ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('Level', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php echo $this->Form->input('code', array('placeholder' => 'Mã trình độ đào tạo', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('name', array('placeholder' => 'Tên trình độ đào tạo', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

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


                            <th class="column-title"><?php echo $this->Paginator->sort('Mã trình độ đào tạo'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('Tên trình độ đào tạo'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                         
                         
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Level']['page'] - 1) * $this->Paginator->params['paging']['Level']['limit']) + 1; ?>
                        <?php foreach ($levels as $level): ?>
                            <tr id="row-<?php echo $level['Level']['id'] ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class=""><?php echo h($level['Level']['code']); ?>&nbsp;</td>
                                <td class=""><?php echo h($level['Level']['name']); ?>&nbsp;</td>
                                <td class=""><?php echo h($level['Level']['id']); ?>&nbsp;</td>
                              
                               
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
        $.post("<?php echo BASE_URL ?>/pkt/levels/index_pkt", data, function (response) {
            $("#datarows").html(response);
        });

    });

    $(document).on("click", "#check-all", function () {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
    });


//    $(document).on("click", "#delete-seleted", function () {
//        var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
//        //console.log(selectedRecord.length);return false;
//        if (selectedRecord.length < 1) {
//            alert("Vui lòng chọn dòng muốn xóa !");
//            return false;
//        }
//        if (confirm("Thao tác này không thể phục hồi, bạn chắc chắn muốn thực hiện ?")) {
//            var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
//            $.post('http://celri.tvu.edu.local/admin/levels/delete', {selectedRecord: selectedRecord}, function (response) {
//                if (response) {
//                    $.each(response, function (arrayID, rowId) {
//                        $("#row-" + rowId).fadeOutAndRemove('fast');
//                    });
//                    return true;
//
//                } else {
//                    alert('Có lỗi trong quá trình thực hiện thao tác!!!');
//                    return false;
//                }
//            }, 'json').fail(function (response) {
//                alert('Error: ' + response.responseText);
//            });
//            return true;
//        } else {
//            return false;
//        }
//    });

</script>
<?php
echo $this->Js->writeBuffer();
