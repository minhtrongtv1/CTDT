<?php
$this->Paginator->options(array(
    'url' => array('bct' => true, 'action' => 'bct_can_danh_gia'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));

//debug($ketQuaDanhGias);die;
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>KHÓA HỌC TÔI ĐƯỢC PHÂN CÔNG ĐÁNH GIÁ</h2>
            <p>Dòng nền vàng là khoá học tới hạn đánh giá.</p>
            <div class="clearfix"></div>
        </div>

        <div class="x_content"> 

            <div class="table-responsive" id="datarows">


                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>


                            <th class="column-title"><?php echo $this->Paginator->sort('evaluation_round_id', 'Đợt đánh giá'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('course_id', 'Khóa học'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('start_date', 'Ngày bắt đầu dạy'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('pass', 'Kết quả'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('not_exist', 'Không tìm thấy khóa học'); ?></th>

                            <th class="column-title"><?php echo $this->Paginator->sort('reason', 'Ghi chú'); ?></th>
                            <th class="column-title"><?php echo $this->Paginator->sort('supporter_id', 'Bán chuyên trách'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            <th class="column-title no-link last"><span class="nobr">Hành động</span></th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['EvaluationResult']['page'] - 1) * $this->Paginator->params['paging']['EvaluationResult']['limit']) + 1; ?>
                        <?php
                        foreach ($evaluationResults as $ketQuaDanhGia):
                            $start_date = new DateTimeImmutable($ketQuaDanhGia['Course']['startdate']);
                            $tr_bgcolor = "";
                            $now = new DateTime();
                            $start_date = $start_date->modify('+7 day');

                            if ($start_date <= $now && is_null($ketQuaDanhGia['EvaluationResult']['pass'])) {
                                $tr_bgcolor = "yellow";
                            }
                            //debug($ketQuaDanhGia);die;
                            ?>
                            <tr id="row-<?php echo $ketQuaDanhGia['EvaluationResult']['id'] ?>" bgcolor="<?php echo $tr_bgcolor; ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class="">
                                    <?php echo $ketQuaDanhGia['EvaluationRound']['title']; ?>
                                </td>
                                <td class="">
                                    <?php
                                    if (empty($ketQuaDanhGia['Course']['lms_course_id'])) {
                                        $url = "https://lms.tvu.edu.vn/course/search.php?q=" . $ketQuaDanhGia['Course']['subject_code'];
                                    } else {
                                        $url = "https://lms.tvu.edu.vn/course/view.php?id=" . $ketQuaDanhGia['Course']['lms_course_id'];
                                    }
                                    echo $this->Html->link($ketQuaDanhGia['Course']['fullname'], $url, array('target' => "_blank"));
                                    ?>
                                </td>
                                <td><?php echo $ketQuaDanhGia['Course']['startdate'];
                                    ?>


                                </td>
                                <td class=""><?php echo h($ketQuaDanhGia['EvaluationResult']['pass']); ?>&nbsp;</td>
                                <td class=""><?php echo h($ketQuaDanhGia['EvaluationResult']['not_exist']); ?>&nbsp;</td>
                                <td class=""><?php echo h($ketQuaDanhGia['EvaluationResult']['reason']); ?>&nbsp;</td>
                                <td class=""><?php echo h($ketQuaDanhGia['Supporter']['last_name'] . ' ' . $ketQuaDanhGia['Supporter']['first_name']); ?>&nbsp;</td>
                                <td class=""><?php echo h($ketQuaDanhGia['EvaluationResult']['id']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>Cập nhật'), array('bct' => true, 'action' => 'edit', $ketQuaDanhGia['EvaluationResult']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                </td>



                            </tr>
                        <?php endforeach; ?>
                    </tbody>


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
        $.post("<?php echo BASE_URL ?>/bct/EvaluationResults/phan_cong", data, function (response) {
            $("#datarows").html(response);
        });

    });


</script>
<?php
echo $this->Js->writeBuffer();
