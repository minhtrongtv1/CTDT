
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Add Device'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('Device', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('code', ['label' => 'Mã thiết bị']); ?>
    <?php echo $this->Form->input('name', ['label' => 'Tên thiết bị']); ?>
    <?php echo $this->Form->input('quantity', ['label' => 'Số lượng thiết bị']); ?>
    <?php echo $this->Form->input('used', ['label' => 'Được sử dụng']); ?>
<?php echo $this->Form->input('note', ['label' => 'Ghi chú']); ?>

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

