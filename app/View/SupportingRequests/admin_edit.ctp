
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> Cập nhật yêu cầu hỗ trợ </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php
    echo $this->Form->create('SupportingRequest', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('id'); ?>
    <?php echo $this->Form->input('title', array('label' => 'Tiêu đề', 'readonly')); ?>
    <?php echo $this->Form->input('description', array('label' => 'Chi tiết nội dung cần hỗ trợ', 'readonly')); ?>
    <?php echo $this->Form->input('requester_id'); ?>
    <?php //echo $this->Form->input('requested_time'); ?>
    <?php echo $this->Form->input('status', array('options' => array(YEU_CAU_HO_TRO_CHO_XU_LY => 'Chờ xử lý', YEU_CAU_HO_TRO_DA_XU_LY => 'Đã xử lý'))); ?>
    <?php echo $this->Form->input('approved', array('options' => array(0 => 'Chưa xong', 1 => 'Đã xong'))); ?>


    <?php //echo $this->Form->input('supporter_id'); ?>
    <?php echo $this->Form->input('responsing', array('label' => 'Phản hồi:')); ?>
    <?php //echo $this->Form->input('responded_time'); ?>

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

