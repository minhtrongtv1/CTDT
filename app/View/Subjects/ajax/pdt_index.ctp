<?php
$this->Paginator->options(array(
    'url' => array('pdt' => true, 'action' => 'pdt_index'),
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


            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã học phần'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên học phần'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Số tín chỉ lý thuyết'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Số tín chỉ thực hành'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Số giờ lý thuyết'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Số giờ thực hành'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Số giờ tự học'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Ghi chú'); ?></th>


            <th class="column-title"><?php echo $this->Paginator->sort('Miêu tả'); ?></th>



            <th class="column-title"><?php echo $this->Paginator->sort('Đề cương chi tiết'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>


        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Subject']['page'] - 1) * $this->Paginator->params['paging']['Subject']['limit']) + 1; ?>
        <?php foreach ($subjects as $subject):
            ?>
            <tr id="row-<?php echo $subject['Subject']['id'] ?>">
                <td><?php echo $stt++; ?></td>
                <td class=""><?php echo h($subject['Subject']['code']); ?>&nbsp;</td>
                <td class=""><?php echo h($subject['Subject']['name']); ?>&nbsp;</td>
                <td class=""><?php echo h($subject['Subject']['theory_credit']); ?>&nbsp;</td>
                <td class=""><?php echo h($subject['Subject']['practice_credit']); ?>&nbsp;</td>
                <td class=""><?php echo h($subject['Subject']['theory_hour']); ?>&nbsp;</td>
                <td class=""><?php echo h($subject['Subject']['practice_hour']); ?>&nbsp;</td>
                <td class=""><?php echo h($subject['Subject']['self_learning_time']); ?>&nbsp;</td>
                <td class=""><?php echo h($subject['Subject']['note']); ?>&nbsp;</td>
                <td class=""><?php echo h($subject['Subject']['describe']); ?>&nbsp;</td>

                <td class="">

                    <a href="/files/subject/syllabus_filename/<?php echo $subject['Subject']['syllabus_path'] . "/" . $subject['Subject']['syllabus_filename']; ?>">
                        Tải file đề cương</a>&nbsp;</td>

                <td class=""><?php echo h($subject['Subject']['id']); ?>&nbsp;</td>

            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<?php echo $this->element("pagination"); ?>  

<?php
echo $this->Js->writeBuffer();
