<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> Tư vấn phát biểu chuẩn đầu ra </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('TuVanCdr', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('prompt', array('label' => 'CĐR:')); ?>



    <div class="clearfix form-actions">
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Kiểm tra', array('class' => 'btn btn-info', 'type' => 'submit')); ?>
            &nbsp; &nbsp; &nbsp;
            <?php echo $this->Form->button('<i class="ace-icon fa fa-undo bigger-110"></i>Reset', array('class' => 'btn btn-warning', 'type' => 'reset', 'escape' => false)); ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
    <?php echo $this->Form->end(); ?>

</div>


