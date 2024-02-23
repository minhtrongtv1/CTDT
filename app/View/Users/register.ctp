<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="row">
    <div class="col-md-3 register-left">
        <?php
        echo $this->Html->link($this->Html->image('logo-startup-6.png'), '/', array('escape' => false));
        //echo $this->Html->image('logo-startup.png'); 
        ?>
        <h3>Xin chào</h3>
        <p>Vui lòng nhập đầy đủ thông tin bên phải để đăng ký tài khoản hoặc click vào 
            nút Đăng nhập dưới đây để đăng nhập !</p>
        <?php
        echo $this->Html->link('Đăng nhập', '/login', array('class' => 'btn btn-info', 'escape' => false));
        ?>
    </div>
    <div class="col-md-9 register-right">

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">Đăng ký tài khoản</h3>
                <?php
                echo $this->Form->create('User', array(
                    'type' => 'file',
                    'inputDefaults' => array(
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col col-sm-2 control-label'
                        ),
                        'wrapInput' => 'col col-sm-6',
                        'class' => 'form-control'
                    ),
                    'class' => 'well form-horizontal', 'id' => 'addTeacher'
                ));
                ?>
                <div class="row register-form">

                    <div class="col-md-6">


                        <?php
                        echo $this->Form->input('name', array('label' => 'Họ và tên', 'required'));
                        ?>




                        <div class="form-group">
                            <label for="id-date-picker-1">Ngày sinh</label>

                            <div class="input-group">

                                <?php
                                echo $this->Form->input('ngay_sinh', array('required', 'div' => false, 'class' => 'form-control date-picker', 'type' => 'text', 'placeholder' => "dd/mm/yyyy",
                                    "data-date-format" => "dd/mm/yyyy", 'label' => false, 'after' => '<span class="input-group-addon">
                                                                        <i class="fa fa-calendar bigger-110"></i>
                                                                    </span>
                                                                    '));
                                ?>
                            </div>

                        </div>
                        <?php
                        echo $this->Form->input('so_dien_thoai', array('label' => 'Số điện thoại', 'required'));
                        ?>

                        <?php echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control', 'required', 'type' => 'email')); ?>
                        <?php echo $this->Form->input('address', array('label' => 'Địa chỉ', 'class' => 'form-control', 'required')); ?>
                        <?php echo $this->Form->input('so_cmnd', array('label' => 'Số CMND', 'class' => 'form-control')); ?>

                    </div>
                    <div class="col-md-6">
                        <?php echo $this->Form->input('ngay_cap', array('label' => 'Ngày cấp', 'placeholder' => "dd/mm/yyyy", 'type' => 'text', 'class' => 'form-control', 'required')); ?>
                        <?php echo $this->Form->input('noi_cap', array('label' => 'Nơi cấp', 'class' => 'form-control', 'required')); ?>
                        <?php echo $this->Form->input('username', array('label' => 'Tên đăng nhập', 'class' => 'form-control', 'required')); ?>
                        <?php echo $this->Form->input('password', array('label' => 'Mật khẩu', 'class' => 'form-control', 'required')); ?>
                        <?php echo $this->Form->input('cpassword', array('label' => 'Nhập lại mật khẩu', 'class' => 'form-control', 'type' => 'password', 'required')); ?>
                        <div class="g-recaptcha" data-sitekey="<?php echo Configure::read('Recaptcha.SiteKey')?>"></div>

                        <input type="submit" class="btnRegister"  value="Đăng ký"/>
                    </div>

                </div>
                <?php echo $this->Form->end(); ?>
            </div>

        </div>
    </div>
</div>
