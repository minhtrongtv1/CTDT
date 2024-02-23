<div class="widget-box">
    <div class="widget-header">
        <h4 class="widget-title">Tìm học viên (chỉ 5 học viên)</h4>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <form class="form-inline" id="user-search-form">
                <input class="input" placeholder="Họ và tên..." type="text" name="name">
                <input class="input" placeholder="Số điện thoại..." type="text" name="so_dien_thoai">
                <button type="submit" class="btn btn-info btn-sm">
                    <i class="ace-icon fa fa-search bigger-110"></i>Tìm
                </button>
            </form>
        </div>
        <div id="user-search-results" class="responsive">

        </div>
    </div>
</div>
<script>
    $(function () {
        $("#user-search-form").on('submit', function (e) {
            e.preventDefault();
            var _this = $(this);
            var data = _this.serialize();
            $.post('<?php echo BASE_URL ?>/users/search', data, function (response) {
                $("#user-search-results").html(response);
            });
        });
    });
</script>