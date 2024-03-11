
<div class="col-md-9 col-md-offset-1 well">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> <?php echo __('Thêm mới chương trình đào tạo'); ?> </a>
    </h4>
    <div class="hr hr-18 dotted hr-double"></div>

    <?php
    echo $this->Form->create('Curriculumn', array(
        'role' => 'form',
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'class' => 'form-control',
        )
            )
    );
    ?>
    <?php echo $this->Form->input('code', ['label' => 'Mã chương trình đào tạo']); ?>
    <?php echo $this->Form->input('name_vn', ['label' => 'Tên tiếng Việt']); ?>
    <?php echo $this->Form->input('name_eng', ['label' => 'Tên tiếng Anh']); ?>
    <?php echo $this->Form->input('level_id', ['label' => 'Trình độ']); ?>
    <?php echo $this->Form->input('major_id', ['label' => 'Ngành đào tạo']); ?>
    <?php echo $this->Form->input('form_of_trainning_id', ['label' => 'Hình thức đào tạo']); ?>
    <?php echo $this->Form->input('credit', ['label' => 'Số tín chỉ']); ?>
    <?php echo $this->Form->input('trainning_time', ['label' => 'Thời gian đào tạo']); ?>
    <?php echo $this->Form->input('enrollment_subject', ['label' => 'Đối tượng tuyển sinh']); ?>
    <?php echo $this->Form->input('point_ladder', ['label' => 'Thang điểm']); ?>
    <?php echo $this->Form->input('graduation_condition', ['label' => 'Điều kiện tốt nghiệp']); ?>
    <?php echo $this->Form->input('diploma_id', ['label' => 'Văn bằng tốt nghiệp']); ?>

    <?php
    echo $this->Form->radio('approve', [
        'Đã duyệt' => 'Đã duyệt',
        'Chưa duyệt' => 'Chưa duyệt'
    ]);
    ?>
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

