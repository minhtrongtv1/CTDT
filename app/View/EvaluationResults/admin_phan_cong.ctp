<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EvaluationResult $evaluationResult
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Phân công đánh giá khóa học

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
                <?php echo $this->Form->create(null, array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )); ?>
                <div class="box-body">
                    <?php
                    echo $this->Form->input('evaluation_round_id', ['options' => $evaluationRounds, 'label' => 'Chọn Đợt:']);
                    
                    ?>
                </div>
                <!-- /.box-body -->

                <?php echo $this->Form->button('Xem trước', ['type' => 'submit', 'name' => 'action', 'value' => 'preview']); ?>

                <?php echo $this->Form->button('Thực hiện', ['type' => 'submit', 'name' => 'action', 'value' => 'do_it']); ?>

                <?php echo $this->Form->end(); ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>

