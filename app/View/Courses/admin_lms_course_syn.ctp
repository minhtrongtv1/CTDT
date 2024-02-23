<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lấy khóa học từ bảng LMS Course và Nhập vào bảng Course!

    </h1>

</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">

                <!-- /.box-header -->
                <!-- form start -->
                <?php
                echo $this->Form->create(null, array(
                    'role' => 'form',
                    'class' => 'form-horizontal',
                    'inputDefaults' => array(
                        'class' => 'form-control',
                    )
                ));
                ?>
                <div class="box-body">
                    <?php
                    echo $this->Form->input('hk', array('label' => 'Nhập học kỳ năm học:'));
                    echo $this->Form->input('confirm', array('label' => 'Gõ OK:'));
                    ?>
                </div>
                <!-- /.box-body -->

                <?php echo $this->Form->submit('Thực hiện'); ?>

                <?php echo $this->Form->end(); ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <?php if(!empty($courseKhongCoGV)):?>
    <div class="row">
        <h2>Các khóa chưa phân công GV (<?php echo count($courseKhongCoGV)?>)</h2>
        <table>
            <thead>
            <th>Tên khóa</th>
            <th>ID đơn vị</th>
            </thead>
            <tbody>
                <?php foreach ($courseKhongCoGV as $row): ?>
                    <tr><td><?php echo $row['fullname'] ?></td><td><?php echo $row['department'] ?></td></tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
     <?php endif;?>
     <?php if(!empty($courseDataFail)):?>
    <div class="row">
        <h2>Các khóa lỗi data</h2>
        <table>
            <thead>
            <th>Tên khóa</th>
            <th>ID đơn vị</th>
            </thead>
            <tbody>
                <?php foreach ($courseDataFail as $row): ?>
                    <tr><td><?php echo $row['fullname'] ?></td><td><?php echo $row['department'] ?></td></tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
     <?php endif;?>
     <?php if(!empty($fail)):?>
    <div class="row">
        <h2>Các khóa lỗi lưu</h2>
        <table>
            <thead>
            <th>Tên khóa</th>
            <th>ID đơn vị</th>
            </thead>
            <tbody>
                <?php foreach ($fail as $row): ?>
                    <tr><td><?php echo $row['fullname'] ?></td><td><?php echo $row['department'] ?></td></tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <?php endif;?>
     <?php if(!empty($existed)):?>
    <div class="row">
        <h2>Các khóa trùng tên (<?php echo count($existed)?>)</h2>
        <table>
            <thead>
            <th>Tên khóa</th>
            
            </thead>
            <tbody>
                <?php foreach ($existed as $row): ?>
                    <tr><td><?php echo $row ?></td></tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <!-- /.row -->
<?php endif;?>
</section>

