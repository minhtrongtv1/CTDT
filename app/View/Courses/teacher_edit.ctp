

<?php
echo $this->Form->create('Course', array(
    'inputDefaults' => array(
        'div' => 'form-group',
        'wrapInput' => false,
        'class' => 'form-control'
    ),
    'class' => 'well'
));
?>
<fieldset>
    <legend>Cập nhật khóa học</legend>
    <?php
    echo $this->Form->input('fullname', array(
        'label' => 'Tên khóa học:',
        'readonly',
        'after' => '<span class="help-block">Tên khóa được đồng bộ từ hệ thống LMS</span>'
    ));
    ?>
    <?php
    echo $this->Form->input('startdate', array(
        'label' => 'Ngày bắt đầu: ',
        'after' => '<span class="help-block"></span>',
        'class' => false,
        'dateFormat'=>'DMY',
        'monthNames'=>false
    ));
    ?>
    
    <?php echo $this->Form->input('id'); ?>

    <div class="clearfix form-actions">
    <div class="">
        <?php echo $this->Form->button('<i class="ace-icon fa fa-check bigger-110"></i>Lưu', array('class' => 'btn btn-info', 'type' => 'submit')); ?>
        &nbsp; &nbsp; &nbsp;
        <?php echo $this->Html->link('<i class="ace-icon fa fa-undo bigger-110"></i>Hủy thao tác', array('action' => 'mycourses','teacher'=>false), array('class' => 'btn btn-warning', 'escape' => false)); ?>

    </div>
</div>
<div class="hr hr-24"></div>

</fieldset>
<?php echo $this->Form->end(); ?>