<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lấy khóa học từ LMS về hệ thống. Hãy nhập học kỳ  và click thực hiện!

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

            <?php if (isset($khoa_da_them_moi)): ?>
                <h2>Khóa đã thêm</h2>
                <?php foreach ($khoa_da_them_moi as $key => $value): ?>
                    <?php echo $value ?>
                    <br>
                <?php endforeach; ?>

            <?php endif; ?>

            <?php if (isset($khoa_da_bo_qua)): ?>

                <h2>Khóa đã bỏ qua</h2>
                <?php foreach ($khoa_da_bo_qua as $key => $value): ?>
                    <?php echo $value ?>
                    <br>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>


    </div>
    <!-- /.row -->
</section>

