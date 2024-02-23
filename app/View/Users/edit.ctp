<?php
$this->Html->addCrumb('Danh sách học viên', array('action' => 'index'));
$this->Html->addCrumb('Cập nhật thông tin học viên');
?>
<?php
echo $this->Html->script('/select2-4.0.3/js/select2.full', array('block' => 'scriptTop'));
echo $this->Html->script('/select2-4.0.3/js/i18n/vi', array('block' => 'scriptTop'));
echo $this->Html->css('/select2-4.0.3/css/select2.min', array('block' => 'scriptTop'));
echo $this->Html->css('/select2-4.0.3/css/select2-bootstrap.min', array('block' => 'scriptTop'));
?>
<?php $this->Html->script('moment.min', array('block' => 'scriptTop')) ?>
<?php echo $this->Html->css('bootstrap-datepicker3.min') ?>
<?php echo $this->Html->script('bootstrap-datepicker.min', array('block' => 'scriptTop')) ?>
<script>
    $(function () {
        //datepicker plugin
        //link
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
                //show datepicker when clicking on the icon
                .next().on(ace.click_event, function () {
            $(this).prev().focus();
        });

        $('a[data-toggle="tab"]').on('click', function () {
            if ($(this).parent('li').hasClass('disabled')) {
                return false;
            }
            ;
        });

    });
</script>
<div class="container">
    <h4 class="pink">
        <i class="ace-icon fa fa-hand-o-right green"></i>
        <a href="#" class="blue"> Thông tin học viên </a>
    </h4>
    <div class="tabbable">
        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
            <li>
                <a data-toggle="tab" href="#thong-tin-chung" aria-expanded="true" class="active">Thông tin chung</a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#nguoi-than" aria-expanded="false" >Người thân</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#lop-hoc" aria-expanded="false" >Lớp học</a>
            </li>

        </ul>
        <div class="tab-content">
            <div id="thong-tin-chung" class="tab-pane active">
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
                <fieldset>

                    <?php
                    echo $this->Form->input('last_name', array('label' => 'Họ lót'));
                    echo $this->Form->input('first_name', array('label' => 'Tên'));
                    echo $this->Form->input('gender', array('label' => 'Giới tính', 'empty' => '-- Chọn giới tính --', 'type' => 'select', 'options' => array('0' => 'Nữ', '1' => 'Nam')));
                    ?>
                    <div class="form-group">
                        <label for="id-date-picker-1">Ngày sinh</label>

                        <div class="input-group">

                            <?php
                            echo $this->Form->input('ngay_sinh', array('div' => false, 'class' => 'form-control date-picker', 'type' => 'text',
                                "data-date-format" => "dd/mm/yyyy", 'label' => false, 'after' => '<span class="input-group-addon">
                                                                        <i class="fa fa-calendar bigger-110"></i>
                                                                    </span>
                                                                    '));
                            ?>
                        </div>
                    </div>
                    <?php
                    //echo $this->Form->input('noi_sinh', array('label' => 'Nơi sinh', 'options' => $noiSinhes, 'empty' => '..chọn nơi sinh'));
                    echo $this->Form->input('so_dien_thoai', array('label' => 'Số điện thoại'));
                    echo $this->Form->input('school_id', array('label' => 'Học trường', 'empty' => '-- chọn --'));
                    echo $this->Form->input('address', array('label' => 'Địa chỉ'));

                    echo $this->Form->input('id');
                    ?>
                </fieldset>
                <div class="btn-toolbar" style="text-align: center;">
                    <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
                    <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>

                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
            <div id="nguoi-than" class="tab-pane">
                <!-- Đoạn thêm học viên-->
                <div class="row">
                    <div class="col-sm-7">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h6 class="widget-title">
                                    <i class="ace-icon fa fa-list"></i>
                                    Thông tin phụ huynh
                                </h6>
                                <div class="widget-toolbar">                                        

                                    <a href="#" id='delete-phu-huynh-seleted' data-toggle = "tooltip" title = "Xóa các dòng đã chọn">
                                        <i class="ace-icon fa fa-trash text-danger"></i>
                                    </a>

                                </div>

                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="table-responsive" id="phu-huynh-datarows">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-5">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h6 class="widget-title">

                                    Thêm/Cập nhật quan hệ
                                </h6>
                                <div class="widget-toolbar">                                        

                                    <a href="#" id="btn-them-phu-huynh">
                                        <i class="ace-icon fa fa-plus"></i>
                                    </a>
                                    <a href="#" id="btn-sua-phu-huynh">
                                        <i class="ace-icon fa fa-pencil"></i>
                                    </a>


                                    <a href="#" id="btn-cancel-edit-phu-huynh">
                                        <i class="ace-icon fa fa-times"></i>
                                    </a>
                                </div>



                            </div>
                            <div class="widget-body">
                                <div class="well">                                
                                    <?php
                                    echo $this->Form->create('UsersRelative', array(
                                        'inputDefaults' => array(
                                            'class' => 'form-control'
                                        ),
                                        'class' => 'form-horizontal',
                                        'id' => 'form-them-quan-he',
                                        "novalidate"
                                    ));
                                    ?>

                                    <div>
                                        <label for="EnrollmentStudentId">Phụ huynh</label>
                                        <?php
                                        echo $this->Form->input('relative_user_id', array(
                                            'label' => false,
                                            'div' => 'input-group',
                                            'after' => '<span class="input-group-btn">
                                                                <button class="btn btn-sm btn-success" type="button" id="btn-chon-phu-huynh">
                                                                    <i class="ace-icon fa fa-search"></i>
                                                                    chọn..
                                                                </button>
                                                            </span><span class="input-group-btn">
                                                                <button class="btn btn-sm btn-info" type="button" id="btn-them-phu-huynh-moi">
                                                                    <i class="ace-icon fa fa-plus"></i>
                                                                    Thêm mới..
                                                                </button>
                                                            </span>'
                                        ));
                                        ?>
                                    </div>

                                    <?php
                                    echo $this->Form->input('relative_id', array('label' => 'Quan hệ'));
                                    echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user_id));
                                    echo $this->Form->input('id', array('type' => 'hidden'));
                                    ?>
                                    <div class="modal-footer">
                                        <?php echo $this->Form->button('Lưu', array('class' => "btn btn-primary", 'id' => 'addQuanHeBtn')); ?>        

                                        <button type="button" class="btn btn-default" type='reset'>Xóa trống</button>                
                                    </div>

                                    <?php
                                    echo $this->Form->end();
                                    ?>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- The select hoc vien modal. Don't display it initially -->
                    <div id="select-phu-huynh-modal" class="modal fade" data-easein="expandIn" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Chọn Học viên</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group text-sm">
                                        <form id="modalFilterForm">
                                            <div class="input-group-btn">
                                                <input class="input-sm form-control" placeholder="Họ và tên cần tìm.." id="searchstr" type="text">
                                                <button type="submit" class="btn btn-sm btn-default" id="showArticleInModalBtn">Tìm </button>
                                            </div></form>

                                    </div>
                                    <div id="modal-datarows">


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>                
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                    <!-- The thêm mới phụ huynh modal. Don't display it initially -->
                    <div id="them-phu-huynh-moi-modal" class="modal fade" data-easein="expandIn" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Thêm phụ huynh</h4>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    echo $this->Form->create('PhuHuynhMoi', array(
                                        'type' => 'file',
                                        'inputDefaults' => array(
                                            'div' => 'form-group',
                                            'label' => array(
                                                'class' => 'col col-sm-2 control-label'
                                            ),
                                            'wrapInput' => 'col col-sm-6',
                                            'class' => 'form-control'
                                        ),
                                        'class' => 'well form-horizontal', 'id' => 'addPhuHuynhMoiForm'
                                    ));
                                    ?>
                                    <fieldset>

                                        <?php
                                        $today = new DateTime();
                                        echo $this->Form->input('last_name', array('label' => 'Họ lót'));
                                        echo $this->Form->input('first_name', array('label' => 'Tên'));
                                        ?>

                                        <?php
                                        echo $this->Form->input('so_dien_thoai', array('label' => 'Số điện thoại'));
                                        echo $this->Form->input('email', array('label' => 'Email'));
                                        echo $this->Form->input('address', array('label' => 'Địa chỉ'));
                                        ?>
                                    </fieldset>
                                    <div class="btn-toolbar" style="text-align: center;">
                                        <?php echo $this->Html->link('Back', array('action' => 'index'), array('type' => 'button', 'class' => 'btn btn-primary')) ?>
                                        <?php echo $this->Form->button('Lưu', array('type' => 'submit', 'class' => 'btn btn-primary')) ?>

                                        <?php echo $this->Form->end(); ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>                
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>

            </div>
            <div id="lop-hoc" class="tab-pane">

            </div>
        </div>
    </div>


</div>
<script>
    var danhSachPhuHuynh = Array;
    var mssv_find_term = "";
    var phu_huynh_list = $('#phu-huynh-list');
    var user_in_list = Array;
    var url = '<?php echo BASE_URL ?>/users/getUsers';
    var chonPhuHuynhModal = $("#select-phu-huynh-modal");
    var $tbl_phu_huynh = $("#tbl_phu_huynh");
    var $form_them_quan_he = $("#form-them-quan-he");
    var $btn_them_phu_huynh = $("#btn-them-phu-huynh");

    var $btn_sua_phu_huynh = $("#btn-sua-phu-huynh");
    var scope_phu_huynh_action = "";
    var $btn_cancel_edit_phu_huynh = $("#btn-cancel-edit-phu-huynh");
    function disableFormThemPhuHuynh() {

        $form_them_quan_he.find('.form-control').prop('disabled', true);
        $form_them_quan_he.find(':button(not:disabled)').prop('disabled', true);
        $form_them_quan_he.find(':checkbox(not:disabled)').prop('disabled', true);
    }
    function enableFormThemPhuHuynh() {
        $form_them_quan_he.find('.form-control').prop('disabled', false);
        $form_them_quan_he.find(':button(not:disabled)').prop('disabled', false);
        $form_them_quan_he.find(':checkbox(not:disabled)').prop('disabled', false);
    }
    function resetFormThemPhuHuynh() {
        $("#EnrollmentStudentId").empty();
        $form_them_quan_he.trigger('reset');
    }

    function loadPhuHuynh() {
        $("#phu-huynh-datarows").load("<?php echo BASE_URL ?>/UsersRelatives/index/<?php echo $user_id ?>");
            }
            /*Begin Main Hoc vien###################################################################################################################*/
            $(function () {
                loadPhuHuynh();
                disableFormThemPhuHuynh();
                $("#UserSchoolId").select2({
                    placeholder: "--chọn trường học--",
                    allowClear: true
                });
                $btn_them_phu_huynh.on('click', function (e) {
                    e.preventDefault();
                    if (scope_phu_huynh_action === "edit") {
                        alert("Bạn đang cập nhật dữ liệu. Hãy hủy thao tác và chọn thêm lại.");
                        return false;
                    } else {
                        if (scope_phu_huynh_action === "") {
                            scope_phu_huynh_action = "add";
                        }
                    }
                    $("#ChiTietVaiTroBienSoanId").val("");
                    enableFormThemPhuHuynh();
                });
                $btn_sua_phu_huynh.click(function (e) {
                    e.preventDefault();
                    if (scope_phu_huynh_action === "add") {
                        alert("Bạn đang thêm dữ liệu. Hãy hủy thao tác và chọn dòng dữ liệu và click biểu tượng cây viết để cập nhật.");
                        return false;
                    } else {
                        if (scope_phu_huynh_action === "") {
                            alert("Chưa chọn dòng dữ liệu muốn sửa. Hãy chọn và click biểu tượng cây viết để thực hiện.");
                            return false;
                        } else {
                            enableFormThemPhuHuynh();
                        }
                    }
                });
                $btn_cancel_edit_phu_huynh.on('click', function (e) {
                    e.preventDefault();
                    resetFormThemPhuHuynh();
                    disableFormThemPhuHuynh();
                    scope_phu_huynh_action = "";
                });
                $form_them_quan_he.on("submit", function (e) {
                    e.preventDefault();
                    var data = $(this).serialize();
                    //Post dữ liệu của chi tiết vai trò biên soạn lên server
                    $.post("<?php echo BASE_URL ?>/UsersRelatives/add", data, function (response) {
                        if (!response.err) {
                            loadPhuHuynh();
                            resetFormThemPhuHuynh();
                            disableFormThemPhuHuynh();
                            scope_phu_huynh_action = "";
                        }
                    }, 'json');
                    //Show dữ liệu mới thêm lên table $tbl_phu_huynh

                });

                $("#addPhuHuynhMoiForm").on("submit", function (e) {
                    e.preventDefault();
                    var _this = $(this);
                    var data = _this.serialize();
                    $.post("<?php echo BASE_URL ?>/Users/them_phu_huynh", data, function (response) {
                        if (!response.err) {
                            var relative_user_id = response.relative_user_id;
                            var relative_user_name = response.relative_user_name;


                            $("#UsersRelativeRelativeUserId").html(new Option(relative_user_name, relative_user_id, true, true));
                            $("#UsersRelativeRelativeUserId option:first").attr("selected", "selected");
                            _this.trigger('reset');
                            $('#them-phu-huynh-moi-modal').modal('hide');
                        }
                    }, 'json');
                });
                //Hàm thực hiện tìm article trong modal bài viết và append bài viết vào div id=datarows
                function loadContentForSelectUserModal() {
                    mssv_find_term = $("#searchstr").val();
                    $.post(url, {'data[search_term]': mssv_find_term, 'data[user_selected]': danhSachPhuHuynh}, function (response) {

                        $("#modal-datarows").html(response);
                    });
                }

                //Xử lý khi click chọn vào option ..chọn của selectbox người tham gia
                $(document).on("click", "#btn-chon-phu-huynh", function () {
                    danhSachPhuHuynh = new Array();
                    $("#tbl_phu_huynh > tbody > tr").each(function () {
                        var UserDaThamGia = $(this).attr('user-id');
                        danhSachPhuHuynh.push(UserDaThamGia);
                    });
                    loadContentForSelectUserModal();
                    chonPhuHuynhModal = $('#select-phu-huynh-modal').modal(
                            {
                                keyboard: true,
                                backdrop: "static",
                                show: false
                            }).on('hidden.bs.modal', function (e) {
                        //dialogThemChiTietVaiTroBienSoan.modal('show');
                    }).modal('show');
                });

                //Xử lý khi click chọn vào option ..thêm của selectbox phụ huynh
                $(document).on("click", "#btn-them-phu-huynh-moi", function () {
                    themPhuHuynhMoiModal = $('#them-phu-huynh-moi-modal').modal(
                            {
                                keyboard: true,
                                backdrop: "static",
                                show: false
                            }).on('hidden.bs.modal', function (e) {
                        //dialogThemChiTietVaiTroBienSoan.modal('show');
                    }).modal('show');
                });


                //Tùy chỉnh các control form thêm học viên
                $("#EnrollmentFee").change(function () {
                    if (this.checked) {
                        $('label[for="EnrollmentFeeNo"]').show();
                        $("#EnrollmentFeeNo").show();
                    } else {
                        $('label[for="EnrollmentFeeNo"]').hide();
                        $("#EnrollmentFeeNo").hide();
                    }
                });
                //Sự kiện enter tìm user trong modal người dùng
                $('#modalFilterForm').on('submit', function (e) {
                    e.preventDefault();
                    loadContentForSelectUserModal();
                });

//Xử lý khi click chọn người dùng trên modal chon hoc vien
                $(document).on("click", "#modal-hoc-vien-table.table-striped tr[data-id]", function () {
                    var user_id = $(this).data('id');
                    var name = $(this).find('td').eq(1).text();



                    $("#UsersRelativeRelativeUserId").html(new Option(name, user_id, true, true));
                    $("#UsersRelativeRelativeUserId option:first").attr("selected", "selected");
                    chonPhuHuynhModal.modal('hide');


                });

                //Xử lý khi click vào dòng học viên
                $(document).on('click', 'tr.phu-huynh-row', function (e) {

                    var _this = $(this);
                    var id = _this.attr("phu-huynh-id");

                    $.get("<?php echo BASE_URL ?>/UsersRelatives/view/" + id, function (response) {
                        if (!response.err) {
                            $("#UsersRelativeRelativeUserId").html(new Option(response.relative_user_name, response.relative_user_id, true, true));
                            $("#UsersRelativeRelativeUserId option:first").attr("selected", "selected");
                            $("#UsersRelativeRelativeId").val(response.relative_id);
                            $("#UsersRelativeId").val(response.id);
                            scope_phu_huynh_action = "edit";
                        }
                    }, 'json');
                });
                //Hết đoạn xử lý dòng học viên

            });
            /* End main hoc vien#########################################################################################*/
</script>