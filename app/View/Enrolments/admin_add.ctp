<?php $this->Js->JqueryEngine->jQueryObject = 'jQuery'; ?>
<?php echo $this->Html->css('/select2-4.0.3/css/select2.min'); ?>
<?php echo $this->Html->script('/select2-4.0.3/js/select2.min'); ?>
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Add Enrolment'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('Enrolment', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('workshop_id'); ?>
    <?php echo $this->Form->input('teacher_id'); ?>
    <?php echo $this->Form->input('result'); ?>
    <?php echo $this->Form->input('vang_khong_phep'); ?>
    <?php echo $this->Form->input('vang_co_phep'); ?>
    <?php echo $this->Form->input('so_qd'); ?>
    <?php echo $this->Form->input('ngay_qd', array('class' => false)); ?>

    <div class="clearfix form-actions">
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info', 'type' => 'submit')); ?>
            &nbsp; &nbsp; &nbsp;
            <?php echo $this->Html->link('<i class="ace-icon fa fa-undo bigger-110"></i>Hủy thao tác', array('action' => 'index'), array('class' => 'btn btn-warning', 'escape' => false)); ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
    <?php echo $this->Form->end(); ?>

</div>

<script>
    $("#EnrolmentWorkshopId").select2();
    $("#EnrolmentTeacherId").select2();
</script>