<table class="table table-border">
    <thead>
    <th>TT</th>
    <th>Họ và tên GV</th>
    <th>Khoa</th>
    <th>Tên khóa</th>
    <th>Kết quả</th>
    <th>Học kỳ</th>
</thead>
<tbody>

    <?php 
    
    //Configure::write('debug',2); debug($evaluationResults[0]);die;
    $tt=1;
    foreach ($evaluationResults as $result): ?>

        <tr>
            <td><?php echo $tt++?></td>
            <td><?php echo $result['Course']['Teaching'][0]['User']['name']?></td>
            <td><?php echo $result['Course']['Department']['title']?></td>
            <td><?php echo $result['Course']['fullname']?></td>
            <td><?php echo $result['EvaluationResult']['pass']?></td>
            <td><?php echo $result['EvaluationResult']['reason']?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>