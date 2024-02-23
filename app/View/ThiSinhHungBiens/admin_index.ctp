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
            <h2>DANH SÁCH THÍ SINH HÙNG BIỆN</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('ThiSinhHungBien', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php echo $this->Form->input('ho_va_ten', array('placeholder' => 'ho_va_ten', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('so_bao_danh', array('placeholder' => 'so_bao_danh', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

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
                            <th></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('ho_va_ten', 'Họ và tên'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('so_bao_danh', 'Số báo danh'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('so_bao_danh', 'Số điện thoại'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('so_bao_danh', 'Email'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('nam_du_thi', 'Năm dự thi'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('khoa', 'Khoa'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('vao_chung_ket', 'Vào chung kết'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all" ></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['ThiSinhHungBien']['page'] - 1) * $this->Paginator->params['paging']['ThiSinhHungBien']['limit']) + 1; ?>
                        <?php foreach ($thiSinhHungBiens as $thiSinhHungBien): ?>
                            <tr id="row-<?php echo $thiSinhHungBien['ThiSinhHungBien']['id'] ?>">
                                <td><?php echo $stt++; ?></td>
                                <td class="profile-picture">
                                    <?php
                                    if (!empty($thiSinhHungBien['ThiSinhHungBien']['anh_dai_dien'])) {
                                        $photo = BASE_URL . "files/thi_sinh_hung_bien/anh_dai_dien/{$thiSinhHungBien['ThiSinhHungBien']['id']}/{$thiSinhHungBien['ThiSinhHungBien']['anh_dai_dien']}";
                                    } else {
                                        $photo = BASE_URL . 'img/no-image.png';
                                    }
                                    ?>
                                    <img class="avatar editable img-responsive" style="max-height:80px; max-width: 225px" alt="<?php echo $thiSinhHungBien['ThiSinhHungBien']['ho_va_ten'] ?>" src="<?php echo $photo ?>" style="display: block;"/>
                                </td>
                                <td class=""><?php echo h($thiSinhHungBien['ThiSinhHungBien']['ho_va_ten']); ?>&nbsp;</td>
                                <td class=""><?php echo h($thiSinhHungBien['ThiSinhHungBien']['so_bao_danh']); ?>&nbsp;</td>
                                <td class=""><?php echo h($thiSinhHungBien['ThiSinhHungBien']['so_dien_thoai']); ?>&nbsp;</td><!-- comment -->
                                <td class=""><?php echo h($thiSinhHungBien['ThiSinhHungBien']['email']); ?>&nbsp;</td>
                                <td class=""><?php echo h($thiSinhHungBien['ThiSinhHungBien']['nam_du_thi']); ?>&nbsp;</td>
                                <td class=""><?php echo h($thiSinhHungBien['ThiSinhHungBien']['khoa']); ?>&nbsp;</td>
                                <td class=""><?php echo $this->Common->showTrueFalseAsCheck($thiSinhHungBien['ThiSinhHungBien']['vao_chung_ket']); ?>&nbsp;</td>
                                <td class=""><?php echo h($thiSinhHungBien['ThiSinhHungBien']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $thiSinhHungBien['ThiSinhHungBien']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                </td>
                                <td>
                                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $thiSinhHungBien['ThiSinhHungBien']['id'] ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/thiSinhHungBiens/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
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
        $.post("<?php echo BASE_URL ?>admin/thiSinhHungBiens/index", data, function (response) {
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
            $.post('<?php echo BASE_URL ?>admin/thiSinhHungBiens/delete', {selectedRecord: selectedRecord}, function (response) {
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
