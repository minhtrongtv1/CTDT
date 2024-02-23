<div class="col-sm-12">


    <div class="row">

        <div class="col-xs-10 col-xs-offset-1">
            <h3 class="header smaller lighter red">Chào mừng <?php echo AuthComponent::user('name'); ?></h3>
            <div>
                <h4>Hãy bắt đầu bằng cách đọc các hướng dẫn dưới đây:</h4>

                <h3>I.Quan sát thanh menu.</h3>
                <ol>
                    <li>Bạn làm việc - là trang hiện tại</li>
                    <li>Bài báo của tôi - là trang liệt kê danh sách các bài báo mà quý thầy cô đã đăng, cả Tiếng Việt và Tiếng Anh</li>
                    <li>Bài báo Google Scholar  - là trang liệt kê danh sách các bài báo mà quý thầy cô đã đăng trên Google Scholar và nhập về trang web Phòng KHCN để quản lý</li>
                    <li>Nhập từ Google Scholar - Là công cụ cho phép Quý thầy cô kéo danh sách các bài báo từ Google Scholar về website phòng</li>
                </ol>

            </div>


        </div>

    </div>
    <div class="space"></div>

</div>
<script>
    $(function () {

        $.get("<?php echo BASE_URL ?>/buoi_hocs/lop_hoc_hom_nay_cua_toi", function (response) {
            $("#lop-hoc-hom-nay").html(response);
        });

        $.get("<?php echo BASE_URL ?>/courses/lop_hoc_cua_toi/<?php echo LOP_DANG_TUYEN_SINH ?>", function (response) {
                    $("#lop-hoc-dang-tuyen-sinh").html(response);
                });
            })
</script>