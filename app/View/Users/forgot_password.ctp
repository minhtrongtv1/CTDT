<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="container">
    <div class="row">
        <div class="row">

            <div class="col-md-4 col-md-offset-4">
                <?php echo $this->Session->flash(); ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                            <?php echo $this->Html->image('forgot_password.png', array("class" => "login", "height" => "70")); ?>
                            <h3 class="text-center">Quên mật khẩu ?</h3>
                            <p>Nếu bạn quên mật khẩu, đổi mật khẩu tại đây.</p>
                            <div class="panel-body">


                                <?php echo $this->Form->create('User', array('url'=>array('action' => 'forgotPassword'),array('id' => 'forgot-form', "class" => "form"))); ?>
                                <!--start form--><!--add form action as needed-->
                                <fieldset>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <!--EMAIL ADDRESS-->
                                            <?php echo $this->Form->input("username", array('placeholder' => "Địa chỉ email hoặc username", 'label' => false, 'div' => false, "class" => "form-control")); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="<?php echo Configure::read('Recaptcha.SiteKey')?>"></div>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-lg btn-primary btn-block" value="Gửi mật khẩu cho tôi" type="submit">
                                    </div>
                                </fieldset>
                                </form><!--/end form-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("UserEmail").focus();
</script>