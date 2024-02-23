<?php
$this->Paginator->options(array(
    'url' => array('action' => 'i_train', 'teacher' => false),
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
            <th class="column-title">Lĩnh vực</th>

            <th class="column-title">Tập huấn bởi</th>
            <th class="column-title">Thời gian, địa điểm</th>
            <th class="column-title">Số lượng đăng ký</th>

            <th class="column-title"><?php echo $this->Paginator->sort('status', 'Tình trạng'); ?></th>
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
                    <?php
                    echo $this->Html->link($workshop['Workshop']['name'], array('teacher' => false, 'controller' => 'workshops', 'action' => 'view', $workshop['Workshop']['id']));
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
                        foreach ($workshop['Scheduling'] as $scheduling):
                            $bat_dau = new DateTime($scheduling['start_time']);
                            $ket_thuc = new DateTime($scheduling['end_time']);
                            ?>
                            <li><b><?php echo ($scheduling['name']); ?></b>: Từ <?php echo $bat_dau->format('H:i') ?> - <?php echo $ket_thuc->format('H:i d/m/Y') ?>, Phòng: <?php echo $scheduling['room'] ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </td>

                <td><?php echo $workshop['Workshop']['enrolledno'] ?>/<?php echo $workshop['Workshop']['so_luong_dang_ky_toi_da'] ?></td>


                <td><?php echo $this->Common->showStatus($workshop['Workshop']['status']) ?></td>
                <td class="">
                    <?php echo $this->Html->link('Xem chi tiết', array('teacher' => false, 'controller' => 'workshops', 'action' => 'view', $workshop['Workshop']['id']), array('class' => 'btn btn-xs btn-info'));
                    ?>
                    <?php
                    if ($workshop['Workshop']['status'] == WORKSHOP_DA_MO)
                        echo $this->Html->link('Đánh giá', array('teacher' => true, 'controller' => 'enrolments', 'action' => 'ket_qua', $workshop['Workshop']['id']), array('class' => 'btn btn-xs btn-warning'));
                    ?>
                </td>


            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php echo $this->element("pagination"); ?> 
<?php
echo $this->Js->writeBuffer();