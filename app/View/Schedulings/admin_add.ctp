
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue">Thêm buổi tập huấn </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('Scheduling', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('workshop_id',array('label'=>'Workshop','value'=>$workshop_id)); ?>
    <?php echo $this->Form->input('name',array('label'=>'Tên buổi')); ?>
    <?php echo $this->Form->input('room',array('label'=>'Phòng')); ?>
    <?php echo $this->Form->input('start_time',array('class'=>false,'label'=>'Thời điểm bắt đầu: ')); ?>
    <?php echo $this->Form->input('end_time',array('class'=>false,'label'=>'Thời điểm kết thúc: ')); ?>
<?php echo $this->Form->input('note',array('label'=>'Ghi chú')); ?>

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

