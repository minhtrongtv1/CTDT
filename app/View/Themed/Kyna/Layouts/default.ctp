<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title><?php echo $this->Session->read('LAYOUT') ?> - <?php echo SITENAME ?></title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <?php
        echo $this->Html->css([
            'videojs.min',
            'all', 'slick-theme.min', 'slick.min', 'main', 'app', 'sweetalert2.min', 'home-page', 'select2.min'
        ]);
        ?>

        <?php
        echo $this->Html->script([
            'jquery.min',
            'yii',
            'bootbox',
            'jquery-ui',
            'autocomplete',
            'videojs.min',
            'videojs-http-streaming.min',
            'videojs-playlist.min',
            'slick.min',
            'jquery.lazy.min',
            'jquery.lazy.plugins.min',
            'sweetalert2.min',
            'header.min',
            'home-page.min',
            'select2.min',
            'tether.min',
            'bootstrap.min',
            'offpage',
            'main',
            'details',
            'ajax-caller',
            'firebase.min',
            'push-notification-main.min',
            'jquery.validate.min',
            'bootstrap-notify',
            'yii.activeForm'
        ]);
        ?>

    </head>

    <body class="desktop scroll-hide">
        <?php
        echo $this->Flash->render();
        echo $this->Flash->render('auth');
        echo $this->fetch('content');
        ?>


        <footer>
            <div id="k-footer">
                <div class="box container clearfix">
                    <div class="hotline">
                        <h4 class="text-transform title">Kết nối với Kyna</h4>

                        <ul class="bottom">
                            <li>
                            <first><i class="fas fa-phone-alt"></i> Hotline</first>
                            <second>1900.6335.07</second>
                            </li>
                            <li>
                            <first><i class="fas fa-envelope"></i>  Email</first>
                            <second>hotro@kyna.vn</second>
                            </li>
                        </ul>
                        <!--end .bottom-->

                        <div class="social">
                            <a href="https://www.facebook.com/kyna.vn" target="_blank">
                                <img class="img-lazy" data-src="https://media-kyna.cdn.vccloud.vn/img/fb_icon_footer.png" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="facebook" width="44" height="44">
                            </a>

                            <a href="https://www.youtube.com/user/kynavn" target="_blank" style="margin:0 5px">
                                <img class="img-lazy" data-src="https://media-kyna.cdn.vccloud.vn/img/youtube_icon_footer.png" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="youtube" width="44" height="44">
                            </a>

                            <!--<a href="https://zalo.me/1985686830006307471" target="_blank">
                              <img class="img-lazy" data-src="/img/zalo_icon_footer.png"
                                   src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                   alt="zalo" width="44" height="44">
                            </a>-->
                        </div>
                        <!--end .social-->


                    </div>
                    <!--end .hotline -->
                    <div class="info">
                        <h4 class="title">Thông tin Kyna</h4>
                        <ul>
                            <li><a href="https://kyna.vn/danh-sach-khoa-hoc">Danh sách khóa học</a></li>
                            <li><a href="https://kyna.vn/p/kyna/cau-hoi-thuong-gap">Câu hỏi thường gặp</a></li>
                            <li><a href="https://kyna.vn/p/kyna/cau-hoi-thuong-gap/huong-dan-thanh-toan-hoc-phi">Cách thanh toán học phí</a>
                            </li>
                            <li><a href="https://kyna.vn/bai-viet" target="_blank">Thông tin hữu ích</a></li>
                            <!--<li>
                              <a href="https://www.vietnamworks.com?utm_source=from_kyna" target="_blank">VietnamWorks</a>
                            </li>
                            <li>
                              <a
                                href="https://www1.primus.vn/?utm_source=Kyna&utm_campaign=Acquisition_ConversionRate_9092020_MKT&utm_medium=CVS_KynaUser_Des.Mob_Direct__VN_&utm_term=&utm_content=footer_EN"
                                target="_blank">PRIMUS
                               </a>
                            </li>-->
                        </ul>
                        <!--end .top-->
                    </div>
                    <!--end .info-->
                    <div class="about ">
                        <h4 class="text-transform title">Về Kyna</h4>
                        <ul>
                            <li class="iconfeature"><a href="https://kyna.vn/giang-vien/hop-tac" class="hover-color-green">Giảng dạy tại
                                    Kyna.vn</a></li>
                            <li><a href="https://kyna.vn/p/affiliates" class="hover-color-green">Đối tác phân phối</a></li>
                            <li><a href="https://kyna.vn/p/kyna/quy-che-hoat-dong-sgdtmdt" class="hover-color-green">Quy chế hoạt động Sàn
                                    GDTMĐT</a></li>
                            <li><a href="https://kyna.vn/p/hop-tac-cung-cls" class="hover-color-green">Đào tạo doanh nghiệp</a></li>
                        </ul>
                        <!--end .top-->
                    </div>
                    <!--end .about-->
                    <div class="app-col" style="opacity: 0;pointer-events: none">
                        <h4 class="bold title">TẢI ỨNG DỤNG MOBILE</h4>
                        <div class="icon-app">
                            <a href="https://play.google.com/store/apps/details?id=com.navikyna" target="_blank" title="Android">
                                <img class="img-lazy" src="/tlc_portal/theme/Kyna/img/playstore_icon.png" alt="android-app-icon" style="">
                            </a>
                            <img class="img-lazy" src="/tlc_portal/theme/Kyna/img/QR-code.png" alt="qr-code" style="">
                        </div>
                    </div>
                    <div class="fanpage ">
                        <div class="face-content">
                            <iframe src="/tlc_portal/theme/Kyna/img/likebox.html" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:220px;" allowtransparency="false"></iframe>
                        </div>
                    </div>
                    <!--end .fanpage-->
                </div>
                <!--end .container-->
            </div>

            <!--    Copyright   -->
            <div id="k-footer-copyright">
                <div class="container">
                    <!-- Start Anchor Text -->
                    <!-- End Anchor Text -->
                    <div class="col-lg-8 col-xs-12 address ">

                        <div class="text">
                            <p class="text-copyright">© 2019 - Bản quyền của Công Ty TNHH Đào Tạo Nguồn Lực Việt (NLV
                                Training)</p>
                            <p>
                            </p><p style="box-sizing: border-box; margin: 0px; line-height: 1.43; color: #333333; font-family: SVN-ProductSans, sans-serif;">VP Hồ Chí Minh: Lầu 5 tòa nhà Bcons - 4A/167A Nguyễn Văn Thương, Phường 25, quận Bình Thạnh, TP Hồ Chí Minh</p>
                            <p style="box-sizing: border-box; margin: 0px; line-height: 1.43; color: #333333; font-family: SVN-ProductSans, sans-serif;">VP Hà Nội: Tầng 3, Sảnh B, tòa nhà Viet Duc Complex, Số 39 Lê Văn Lương, phường Nhân Chính, quận Thanh Xuân, thành phố Hà Nội.</p>
                            <p style="box-sizing: border-box; margin: 0px; line-height: 1.43; color: #333333; font-family: SVN-ProductSans, sans-serif;">VP Đà Nẵng: Lầu 3 DNC - Danang Coworking Space 31 Đường Trần Phú, phường Hải Châu 1, quận Hải Châu, thành phố Đà Nẵng.</p>
                            <p style="box-sizing: border-box; margin: 0px; line-height: 1.43; color: #333333; font-family: SVN-ProductSans, sans-serif;">Địa chỉ ĐKKD: Tầng 1, Tòa nhà Packsimex, 52 Đông Du, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh&nbsp;</p>          <p></p>
                            <p>
                                Giấy phép ĐKKD số 0315889657 do Sở Kế hoạch và Đầu tư TPHCM cấp          </p>
                        </div>
                        <!--end col-xs-8 text-->
                    </div>
                    <!--end .col-sm-7 col-xs-12 left-->
                    <div class="col-lg-4 col-xs-12 info ">
                        <a class="col-lg-6" href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=61482" target="_blank" aria-label="k-footer-copyright">
                            <img alt="Khóa học trực tuyến" data-src="https://media-kyna.cdn.vccloud.vn/img/logo/20150827110756-dathongbao.png?v=1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-pin-nopin="true" class="img-fluid img-lazy"></a>
                        <a class="col-lg-6" href="http://online.gov.vn/Home/WebDetails/60140" target="_blank" aria-label="k-footer-copyright">
                            <img alt="Khóa học trực tuyến" data-src="https://media-kyna.cdn.vccloud.vn/img/logo/logoCCDV.png?v=1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-pin-nopin="true" class="img-fluid img-lazy"></a>
                        <ul>
                            <li><a href="https://kyna.vn/p/kyna/dieu-khoan-dich-vu" class="hover-color-green">Điều khoản dịch vụ</a></li>
                            <li><a href="https://kyna.vn/p/kyna/chinh-sach-bao-mat" class="hover-color-green">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                    <!--end .col-sm-5 col-xs-12 right-->
                </div>
                <!--end .container-->
            </div>
            <!--end #wrap-copyright-->
            <div id="k-footer-mb">
                <ul class="k-footer-mb-contact">
                    <li>
                        <a href="tel:1900.6335.07" target="_blank"><i class="fas fa-phone-alt"></i> 1900.6335.07</a>
                    </li>
                    <li>
                        <a href="mailto:hotro@kyna.vn" target="_blank"><i class="fas fa-envelope"></i> hotro@kyna.vn</a>
                    </li>
                </ul>
                <div class="link">
                    <a href="https://kyna.vn/giang-vien/hop-tac" class="link-text" target="_blank" title="">GIẢNG DẠY TẠI KYNA</a>
                    <a href="https://kyna.vn/p/kyna/cau-hoi-thuong-gap" class="link-text" target="_blank" title="">CÂU HỎI THƯỜNG GẶP</a>
                    <a href="https://kyna.vn/bai-viet/" target="_blank" class="link-text" title="">THÔNG TIN HỮU ÍCH</a>
                    <!--<a href="https://www.vietnamworks.com?utm_source=from_kyna" target="_blank" class="link-text">VIETNAMWORKS</a>
                    <a
                      href="https://www1.primus.vn/?utm_source=Kyna&utm_campaign=Acquisition_ConversionRate_9092020_MKT&utm_medium=CVS_KynaUser_Des.Mob_Direct__VN_&utm_term=&utm_content=footer_EN"
                      target="_blank" class="link-text">PRIMUS</a>-->
                    <a href="https://play.google.com/store/apps/details?id=com.navikyna" target="_blank" hidden="">
                        <img src="/tlc_portal/theme/Kyna/img/ios-android-app.svg" alt="">
                    </a>
                </div>
                <div class="social">
                    <a href="https://www.facebook.com/kyna.vn" target="_blank">
                        <img class="img-lazy" src="/tlc_portal/theme/Kyna/img/fb_icon_footer.png" alt="facebook" style="">
                    </a>

                    <a href="https://www.youtube.com/user/kynavn" target="_blank" style="margin:0 5px">
                        <img class="img-lazy" src="/tlc_portal/theme/Kyna/img/youtube_icon_footer.png" alt="youtube" style="">
                    </a>

                    <!--<a href="https://zalo.me/1985686830006307471" target="_blank">
                      <img class="img-lazy" data-src="/img/zalo_icon_footer.png"
                           src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                           alt="zalo">
                    </a>-->
                </div>
                <p class="copyright">© 2019 - Bản quyền của Công Ty TNHH Đào Tạo Nguồn Lực Việt (NLV Training)</p>

                <div class="mobilefooterbar" "="" style="display: none;">

                    <p>KYNA RA APP - HỌC CỰC ĐÃ</p>
                    <a href="http://onelink.to/2mrz6w" target="_blank" title="App">
                        <img class="icon-app" src="/tlc_portal/theme/Kyna/img/ios-android-app.svg" alt="App">
                    </a>
                    <img class="close" src="/tlc_portal/theme/Kyna/img/close-banner-footer.png" alt="Close">
                </div>

            </div><!--end #k-footer-mb-->
    </body>
</html>

