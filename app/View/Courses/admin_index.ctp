<?php
$this->Paginator->options(array(
    'url' => array('admin' => true, 'action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?><div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>DANH SÁCH CÁC KHÓA HỌC</h2>
            <div class="pull-right btn-toolbar">
                <?php
                echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Lấy khóa học từ bảng LMS Course'),
                        "/admin/courses/lms_course_syn",
                        ['class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xử lý các khóa học trong bảng lms_courses và nhập vào bảng courses trong học kỳ chỉ định']);
                ?>  
                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>Thêm mới'), "/admin/courses/add", ['class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xóa các dòng đã chọn']); ?>                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>Xóa dòng chọn'), "#", array("id" => "delete-seleted", "class" => "btn btn-danger btn-xs", "escape" => false, "data-toggle" => "tooltip", "title" => "Xóa các dòng đã chọ")); ?>                    
            </div>
            <div class="clearfix"></div>
        </div>
        <br>
        <div class="x_content"> 
            <div class="row">

                <?php echo $this->Form->create('Course', array('url' => array('action' => 'index'), 'id' => 'filter-form', 'class' => 'form-inline', 'role' => 'form', 'novalidate')); ?>
                <div class="col-md-12">

                    <?php echo $this->Form->input('fullname', array('placeholder' => 'Tên đầy đủ...', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('semester', array('placeholder' => 'HKNH', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('subject_code', array('placeholder' => 'Mã HP', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('department_id', array('empty' => '-- Chọn đơn vị quản lý --', 'placeholder' => 'ĐV quản lý', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'))); ?>
                    <?php echo $this->Form->input('deleted', array('empty' => '-- Đã xóa mềm --', 'class' => 'form-control', 'div' => 'form-group', 'label' => array('class' => 'sr-only'), 'options' => array(1 => 'Đã xóa'))); ?>

                    <div class="form-group">
                        <?php echo $this->Form->button('Lọc', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')); ?>
                        <?php echo $this->Html->link('Bỏ lọc', array('action' => 'index'), array('class' => 'btn btn-warning btn-xs')); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>            
            </div>
            <br>
            <div class="table-responsive" id="datarows">



                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>


                            <th class="column-title"><?php echo $this->Paginator->sort('fullname', 'Tên khóa'); ?></th>




                            <th class="column-title"><?php echo $this->Paginator->sort('startdate'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('semester', 'HKNH'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('subject_code', 'Mã HP'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('subject_name', 'Tên HP'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('department_id'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('lms_created_date', 'Ngày tạo khóa'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('lms_modified_date', 'Lần cập nhật cuối'); ?></th>
                            <th>Kết quả đánh giá</th>

                            <th class="column-title"><?php echo $this->Paginator->sort('id', 'ID'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                            <th><input type="checkbox" id="check-all"> </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Course']['page'] - 1) * $this->Paginator->params['paging']['Course']['limit']) + 1; ?>
                        <?php foreach ($courses as $course): ?>
                            <tr id="row-<?php echo $course['Course']['id'] ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class=""><?php echo h($course['Course']['fullname']); ?>&nbsp;</td>
                                <td class=""><?php echo h($course['Course']['startdate']); ?>&nbsp;</td>
                                <td class=""><?php echo h($course['Course']['semester']); ?>&nbsp;</td>
                                <td class=""><?php echo h($course['Course']['subject_code']); ?>&nbsp;</td>
                                <td class=""><?php echo h($course['Course']['subject_name']); ?>&nbsp;</td>
                                <td class="">
                                    <?php echo $course['Department']['title']; ?>
                                </td>
                                <td class=""><?php echo h($course['Course']['lms_created_date']); ?>&nbsp;</td>
                                <td class=""><?php echo h($course['Course']['lms_modified_date']); ?>&nbsp;</td>
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
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>Cập nhật KQ'), array('admin' => true, 'controller' => 'evaluation_results', 'action' => 'edit', $ketqua['id']), array('class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit'));
                                    ?>
                                </td>
                                <td class=""><?php echo h($course['Course']['id']); ?>&nbsp;</td>
                                <td>
    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye"></i> Xem'), array('action' => 'view', $course['Course']['id']), array('class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Xem')); ?>
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $course['Course']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                </td>
                                <td>
                                    <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $course['Course']['id'] ?>">
                                </td>
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
        $.post("<?php echo BASE_URL ?>admin/courses/index", data, function (response) {
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
            $.post('<?php echo BASE_URL ?>admin/courses/delete', {selectedRecord: selectedRecord}, function (response) {
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
