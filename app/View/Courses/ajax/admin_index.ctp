<?php
$this->Paginator->options(array(
    'url' => array('admin' => true, 'action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?>



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
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>Cập nhật KQ'), array('admin' => true, 'controller'=>'evaluation_results','action' => 'edit',$ketqua['id']), array('class' => 'btn btn-success btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit'));
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

<?php
echo $this->Js->writeBuffer();
