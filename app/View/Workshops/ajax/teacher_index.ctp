<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index', 'teacher' => true),
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

            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('start_date', 'Ngày bắt đầu'); ?></th>
            <th class="column-title">Lĩnh vực</th>

            <th class="column-title">Tập huấn bởi</th>
            <th class="column-title">Thời gian, địa điểm</th>
            <th class="column-title">Số lượng đăng ký</th>
            <th class="column-title"><?php echo $this->Paginator->sort('status', 'Tình trạng'); ?></th>
            <th class="column-title"><?php echo $this->Paginator->sort('lms_course_link', 'Link E-Learning'); ?></th>
            <th></th>




        </tr>
    </thead>

    <tbody>
        <?php $stt = (($this->Paginator->params['paging']['Workshop']['page'] - 1) * $this->Paginator->params['paging']['Workshop']['limit']) + 1; ?>
        <?php foreach ($workshops as $workshop):
            ?>
            <tr id="row-<?php echo $workshop['Workshop']['id'] ?>">
                <td><?php echo $stt++; ?></td>


                <td class="">
                    <?php echo $this->Html->link($workshop['Workshop']['name'], array('teacher' => true, 'controller' => 'workshops', 'action' => 'view', $workshop['Workshop']['id'])); ?>
                    <button class="toggle-muc-tieu-btn">Hiện/Ẩn mục tiêu</button>

                    <span class="muc-tieu">
                        <hr>
                        <?php
                        echo $this->Text->autoParagraph($workshop['Workshop']['description']);
                        ?>
                    </span>


                </td>
                <td>
                    <?php
                    $start_date = new DateTime($workshop['Workshop']['start_date']);
                    echo $start_date->format('d/m/Y')
                    ?>
                </td>
                <td class="">
    <?php echo $workshop['Chapter']['Field']['name']; ?>
                </td>
                <td>

                    <?php foreach ($workshop['Intrustor'] as $intrustor): ?>
                        <?php echo ($intrustor['User']['name']); ?>
                        <br>
    <?php endforeach; ?>

                </td>

                <td>
                    <ul>
                        <?php
                        $workshop['Scheduling'] = Hash::sort($workshop['Scheduling'], '{n}.start_time');

                        foreach ($workshop['Scheduling'] as $scheduling):
                            $bat_dau = new DateTime($scheduling['start_time']);
                            $ket_thuc = new DateTime($scheduling['end_time']);
                            ?>
                            <li><b><?php echo ($scheduling['name']); ?></b>: Từ <?php echo $bat_dau->format('H:i') ?> - <?php echo $ket_thuc->format('H:i d/m/Y') ?>, Phòng: <?php echo $scheduling['room'] ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </td>
                <td><?php echo $workshop['Workshop']['enrolledno'] ?></td>
                <td><?php echo $this->Common->showStatus($workshop['Workshop']['status']) ?></td>
                <td class=""><?php echo h($workshop['Workshop']['lms_course_link']); ?>&nbsp;</td>
                <td class=""><?php
                    if ($workshop['Workshop']['status'] == WORKSHOP_DANG_DANG_KY && !in_array($workshop['Workshop']['id'], $enrolments)) {
                        $text = '<button class="btn btn-info btn-xs">Đăng ký</button>';
                        echo $this->Html->link($text, array('teacher' => false, 'action' => 'dang_ky', $workshop['Workshop']['id']), array('escape' => false));
                    } else {
                        echo 'Đã đăng ký';
                    }
                    ?></td>


            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php echo $this->element("pagination"); ?> 


<?php
echo $this->Js->writeBuffer();
