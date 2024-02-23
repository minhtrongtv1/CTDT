
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Thêm mới tài liệu'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>


    <?php echo $this->Form->create('Book', array(
            'role'=>'form',
            'class' => 'form-horizontal',
            'inputDefaults' => array(
                
                'class' => 'form-control',
               )
            )
        ); ?>
    						<?php echo $this->Form->input('Mã tài liệu'); ?>
						<?php echo $this->Form->input('Tên tài liệu'); ?>
						<?php echo $this->Form->input('Tên tác giả'); ?>
						<?php echo $this->Form->input('Nhà xuất bản'); ?>
						<?php echo $this->Form->input('Năm xuất bản'); ?>
						<?php echo $this->Form->input('Mã định danh'); ?>
						<?php echo $this->Form->input('Ghi chú'); ?>
						<?php echo $this->Form->input('Học phần');?>

    <div class="clearfix form-actions">
        <div class="pull-right">
            					<?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info','type'=>'submit')); ?>
            &nbsp; &nbsp; &nbsp;
            					<?php echo $this->Html->link('<i class="ace-icon fa fa-undo bigger-110"></i>Hủy thao tác',array('action'=>'index') ,array('class' => 'btn btn-warning','escape'=>false)); ?>

        </div>
    </div>
    <div class="hr hr-24"></div>
    			<?php echo $this->Form->end(); ?>

</div>

