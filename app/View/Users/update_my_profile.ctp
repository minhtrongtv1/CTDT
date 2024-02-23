
<?php
$this->Html->addCrumb('Cập nhật hồ sơ cá nhân');
?>
<h1>Cập nhật hồ sơ cá nhân</h1>
<?php
/* $this->Html->addCrumb('User', '/manager/teachers');
  $this->Html->addCrumb('Thêm người dùng mới'); */
?>
<?php
echo $this->Form->create('User', array(
    'type' => 'file',
    'inputDefaults' => array(
        'class' => 'form-control'
    ),
    'id' => 'addTeacher'
));
?>


<?php
echo $this->Form->input('id');
echo $this->Form->input('last_name', array('label' => 'Họ lót (*)'), array('class' => "lname"));
echo $this->Form->input('first_name', array('label' => 'Tên (*)'));
echo $this->Form->input('department_id', array('label' => 'Đơn vị (*)'));
?>
<?php
echo $this->Form->input('ngay_sinh', array('label' => 'Ngày sinh (*)', 'type' => 'text', 'required' => false));
?>  
<?php
//debug($noiSinhs);
echo $this->Form->input('noi_sinh', array('label' => 'Nơi sinh (*)', 'options' => $noiSinhs, 'empty' => '-- Chọn nơi sinh -- ', 'required' => false));
?> 
<?php
echo $this->Form->input('so_cmnd', array('label' => 'Số CMND/CCCD', 'type' => 'text', 'required' => false));
?>  
<?php
echo $this->Form->input('ngay_cap', array('label' => 'Ngày cấp', 'type' => 'text', 'required' => false));
?> 
<?php
echo $this->Form->input('noi_cap', array('label' => 'Nơi cấp', 'type' => 'text', 'required' => false));
?> 
<?php
echo $this->Form->input('chuyen_mon', array('label' => 'Chuyên môn', 'type' => 'text', 'required' => false));
?> 
<?php
echo $this->Form->input('so_tai_khoan', array('label' => 'Số tài khoản ngân hàng', 'type' => 'text', 'required' => false));
?>
<?php
echo $this->Form->input('ngan_hang', array('label' => 'Tên ngân hàng (Ghi rõ chi nhánh)', 'type' => 'text', 'required' => false));
?>

<?php
echo $this->Form->input('ma_so_thue', array('label' => 'Mã số thuế', 'type' => 'text', 'required' => false));
?>
<?php
$today = new DateTime();

echo $this->Form->input('avatar', array('type' => 'file', 'label' => 'Ảnh đại diện:'));
echo $this->Form->input('avatar_dir', array('type' => 'hidden'));
?>



<?php
echo $this->Form->input('so_dien_thoai', array('label' => 'Số điện thoại'));
echo $this->Form->input('email', array('label' => 'Email', 'readonly'));
?>



<div class="btn-toolbar text-center" >
    <?php echo $this->Html->link('Back', array('action' => '/myprofile'), array('type' => 'button', 'class' => 'btn btn-danger')) ?>
    <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>

    <?php echo $this->Form->end(); ?>
</div>

<script>
    $(document).ready(function () {
        //$("#UserDepartmentId").select2();
        //$("#UserNoiSinh").select2();
    });
</script>