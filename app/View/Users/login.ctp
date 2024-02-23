<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
echo $this->Html->css('login')
?>

<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">Đăng nhập</h2>
                <div class="d-flex justify-content-center align-items-center mt-3 mb-3"> 
                    <?php
                    
                    echo $this->Flash->render();
                    echo $this->Flash->render('auth');
                    ?>
                </div> 
                <div  class="text-center"> <a href="https://tlc.tvu.edu.vn">Trang TLC</a></div>
                <div class="p-3 px-4 py-4 border-bottom"> 



                    <br>
                    <a href="<?php echo BASE_URL ?>google-oath">
                        <button class="btn btn-danger btn-block continue google-button d-flex justify-content-start align-items-center"> 
                            <i class="fa fa-google ml-2"></i> <span class="ml-4 " style="font-size: 12px;">Đăng nhập bằng Gmail</span> 
                        </button>
                    </a>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-3 mb-3"> 
                    <span class="line"></span> <small class="px-2 line-text">HOẶC SỬ DỤNG</small> 
                    <span class="line"></span> 
                </div> 
                <form class="login-form" action="<?php echo BASE_URL ?>/users/login" method="post">
                    <div class="form-group">
                        <label for="username" class="text-uppercase">Ký danh:</label>
                        <input type="text" class="form-control" placeholder="" name="data[User][username]">

                    </div>
                    <div class="form-group">
                        <label for="password" class="text-uppercase">Mật khẩu:</label>
                        <input name="data[User][password]" type="password" class="form-control" placeholder="">
                    </div>

                    <?php
                    if (!isset($this->request->data['User']['remember']))
                        $this->request->data['User']['remember'] = true;
                    ?>
                    <div class="form-check">

                        <button type="submit" class="btn btn-login float-right">Thực hiện</button>
                    </div>

                </form>


            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">

                            <?php echo $this->Html->image('login-banner-2.jpg', array('class' => "d-block img-fluid")); ?>
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text text-danger">
                                    <h2>Cổng thông tin - Trung tâm Học liệu - Phát triển Dạy và Học (CELRI - Portal)</h2>
                                    <p>Nếu là Giảng viên của Trường, bạn phải đăng nhập (Click vào Đăng nhập bằng Gmail) và sử dụng tài khoản email do Trường cấp (@tvu.edu.vn) để được gán quyền sử dụng hệ thống phù hợp</p>
                                </div>	
                            </div>
                        </div>


                    </div>	   

                </div>
            </div>
        </div>
    </div>
</section>