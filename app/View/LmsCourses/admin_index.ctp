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
            <h2>DANH SÁCH KHÓA HỌC LMS CHƯA XỬ LÝ</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 
            <div class="row">
                <?php echo $this->Form->create('LmsCourse', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php echo $this->Form->input('fullname', array('placeholder' => 'Tên khóa', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('categoryname', array('placeholder' => 'Đơn vị quản lý', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('visible', array('placeholder' => 'Đã ẩn', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>

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

                            <th class="column-title"><?php echo $this->Paginator->sort('fullname', 'Tên đầy đủ'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('startdate', 'Ngày bắt đầu'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('categoryname', 'Đơn vị quản lý'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('visible', 'Đang hiện'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('timecreated', 'Thời điểm tạo'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('timemodified', 'Sửa lần cuối'); ?></th>
                            <th>Kết quả đánh giá</th>
                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all"> </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['LmsCourse']['page'] - 1) * $this->Paginator->params['paging']['LmsCourse']['limit']) + 1; ?>
                        <?php foreach ($lmsCourses as $lmsCourse): ?>
                            <tr id="row-<?php echo $lmsCourse['LmsCourse']['id'] ?>">
                                <td><?php echo $stt++; ?></td>


                                <td class=""><?php echo h($lmsCourse['LmsCourse']['fullname']); ?>&nbsp;</td>
                                <td class=""><?php echo date('Y-m-d', $lmsCourse['LmsCourse']['startdate']); ?>&nbsp;</td>



                                <td class=""><?php echo h($lmsCourse['LmsCourse']['categoryname']); ?>&nbsp;</td>
                                <td class=""><?php echo $this->Common->showTrueFalseAsCheck($lmsCourse['LmsCourse']['visible']); ?>&nbsp;</td>
                                <td class=""><?php echo date('Y-m-d H:i:s', $lmsCourse['LmsCourse']['timecreated']); ?>&nbsp;</td>
                                <td class=""><?php echo date('Y-m-d H:i:s', $lmsCourse['LmsCourse']['timemodified']); ?>&nbsp;</td>
                                <td>
                                    <?php
                                    //debug($course);
                                    $kq = "Chưa đánh giá";

                                    foreach ($course['EvaluationResult'] as $ketqua):

                                        if ($ketqua['pass'] == 1) {
                                            $kq = "Đạt";
                                            break;
                                        } else {
                                            if (is_null($ketqua['pass'])) {
                                                $kq = 'Chưa đánh giá';
                                            } else if ($ketqua['pass'] == 0) {
                                                $kq = '<span class="label label-warning"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i> KHÔNG ĐẠT</span><br>';
                                                if (!empty($ketqua['reason']))
                                                    $kq .= 'Lý do: ' . $ketqua['reason'] . ". Vui lòng liên hệ Bán chuyên trách E-Learning của khoa để được giải đáp(nếu có)</span>";
                                                //$kq .= " " . $this->Html->link('<br>Gửi yêu cầu kiểm tra lại', array('teacher'=>false,'controller' => 'supporting_requests', 'action' => 'add',$ketqua['id']), array('escape' => false));
                                            }
                                        }
                                        ?>

                                        <?php
                                    endforeach;
                                    echo $kq;
                                    ?>
                                </td>
                                <td class=""><?php echo h($lmsCourse['LmsCourse']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $lmsCourse['LmsCourse']['id']), array('class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                    <?php echo $this->Html->link(__('<i class="fa fa-folder-open-o"></i>'), array('action' => 'view', $lmsCourse['LmsCourse']['id']), array('class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>

                                </td>
                                <td>
                                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $lmsCourse['LmsCourse']['id'] ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                    <span class="pull-right">
                        <?php
                        echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Nhập khóa học từ LMS'),
                                "/admin/lms_courses/get_lms_courses",
                                ['class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Kế nối với LMS để lấy các khóa học trong học kỳ chỉ định']);
                        ?>                        
                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    </span>
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
        $.post("<?php echo BASE_URL ?>admin/lms_courses/index", data, function (response) {
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
            $.post('<?php echo BASE_URL ?>admin/lms_courses/delete', {selectedRecord: selectedRecord}, function (response) {
                if (response) {
                    $.each(response, function (arrayID, rowId) {
                        $("#row-" + rowId).fadeOutAndRemove('fast');
                    });
                    $('#filter-form').trigger("submit");
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
