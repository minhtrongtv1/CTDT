<?php echo $this->Html->css('select2.min') ?>
<?php echo $this->Html->css('select2-bootstrap') ?>
<?php echo $this->Html->script('select2.min') ?>

<?php echo $this->Html->css('product-view') ?>

<div class="container">

    <h2>Thông tin nhu cầu</h2>

    <div class="row">

        <aside class="col-sm-3 border-right">
            <article class="gallery-wrap"> 
                <div class="img-big-wrap">
                    <div> <a href="#">
                            <?php
                            if (!empty($project['Project']['image']))
                                echo $this->Html->image('/files/project/image/' . $project['Project']['id'] . '/' . $project['Project']['image'], array('alt' => $project['Project']['name'], 'width' => '250px'));
                            else
                                echo $this->Html->image('no-image.png', array('alt' => $project['Project']['name'], 'width' => '250px'));
                            ?>


                        </a></div>
                </div> <!-- slider-product.// -->

            </article> <!-- gallery-wrap .end// -->

        </aside>
        <aside class="col-sm-3">
            <article class="card-body p-5">
                <h3 class="title mb-3"><?php echo $project['Project']['name'] ?></h3>


                <dl class="param param-feature">
                    <dt>Người đề xuất</dt>
                    <dd><?php echo $this->Html->link($project['CreatedUser']['name'], array('teacher' => false, 'controller' => 'users', 'action' => 'view', $project['CreatedUser']['id'])) ?></dd>
                </dl>  <!-- item-property-hor .// -->
                <dl class="param param-feature">
                    <dt>Lĩnh vực</dt>
                    <dd><?php echo $project['Field']['name'] ?></dd>
                </dl>  <!-- item-property-hor .// -->
                <dl class="param param-feature">
                    <dt>Ngày đăng</dt>
                    <dd><?php
                        $created = new DateTime($project['Project']['created']);
                        echo $created->format('d/m/Y');

                        
                        ?></dd>
                </dl>  <!-- item-property-hor .// -->

<?php if (!empty($project['Project']['plan_file'])): ?>
                    <dl class="param param-feature">
                        <dt>Kế hoạch thực hiện</dt>
                        <dd><?php echo $this->Html->link("<i class='fa fa-download'></i>", '/files/project/plan_file/' . $project['Project']['id'] . '/' . $project['Project']['plan_file'], array('escape' => false)); ?></dd>
                    </dl>  <!-- item-property-hor .// -->
                <?php endif; ?>

<?php if (!empty($project['Project']['reporting_file'])): ?>
                    <dl class="param param-feature">
                        <dt>Báo cáo kết quả</dt>
                        <dd><?php echo $this->Html->link("<i class='fa fa-download'></i>", '/files/project/reporting_file/' . $project['Project']['id'] . '/' . $project['Project']['reporting_file'], array('escape' => false)); ?></dd>
                    </dl>  <!-- item-property-hor .// -->
                <?php endif; ?>

<?php if ($project['Project']['created_user_id'] == AuthComponent::user('id') && !in_array($project['Project']['status'], array(PROJECT_DANG_THUC_HIEN, PROJECT_DA_HOAN_THANH))): ?>
                    <dl class="param param-feature">

                        <dd><?php echo $this->Html->link('Cập nhật <i class="fa fa-pencil"></i>', array('controller' => 'projects', 'action' => 'edit', $project['Project']['id']), array('class' => 'btn btn-info btn-sm', 'escape' => false)) ?></dd>
                    </dl>  <!-- item-property-hor .// -->
<?php endif; ?>
                <hr>


<?php if ($project['Project']['status'] == PROJECT_DA_DUYET) echo $this->Html->link('Chọn thực hiện', array('action' => 'select', $project['Project']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Chọn dự án này để thực hiện')); ?>

            </article> <!-- card-body.// -->

        </aside> <!-- col.// -->

        <aside class="col-sm-6">
            <dl class="item-property">
                <dt>Mô tả</dt>
                <dd><p><?php echo $project['Project']['description'] ?> </p></dd>
            </dl>
            <dl class="item-property">
                <dt>Kết quả thực hiện</dt>
                <dd><p><?php echo $project['Project']['ket_qua'] ?> </p></dd>
            </dl>

<?php if ($project['Project']['status'] == PROJECT_DANG_THUC_HIEN || $project['Project']['status'] == PROJECT_DA_DUOC_CHON): ?>
                <div id="ban-bien-soan" class="tab-pane">
                    <div class="row">
                        <div>
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h6 class="widget-title">
                                        <i class="ace-icon fa fa-list"></i>
                                        Danh sách thành viên
                                    </h6>
                                    <div class="widget-toolbar">                                        
                                        <a href="#" id="add-member" data-toggle = "tooltip" title = "Thêm thành viên">
                                            <i class="ace-icon fa fa-plus text-info
                                               "></i>
                                        </a>
                                        <a href="#" id='delete-seleted' data-toggle = "tooltip" title = "Xóa các dòng đã chọn">
                                            <i class="ace-icon fa fa-trash text-danger"></i>
                                        </a>

                                    </div>

                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="table-responsive" id="members">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <!-- The login modal. Don't display it initially -->
                    </div>

                </div>


<?php endif; ?>


        </aside>
    </div> <!-- row.// -->

</div>
<!--container.//-->

<div id="select-user-modal" class="modal fade" data-easein="expandIn"  role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">Thêm thành viên thực hiện đề tài</h4>
            </div>
            <div class="modal-body">

                <div id="modal-datarows">
                    <div class="well">                                
                        <?php
                        echo $this->Form->create('Team', array(
                            'inputDefaults' => array(
                                'class' => 'form-control'
                            ),
                            'url' => array('controller' => 'teams', 'action' => 'add'),
                            'class' => 'form-horizontal',
                            'id' => 'FormAddMember',
                            "novalidate"
                        ));
                        ?>
                        <div>
                            <label for="ChiTietDeTai">Tên người tham gia</label>
                            <?php
                            echo $this->Form->input('user_id', array('name' => 'members[]',
                                'label' => false
                            ));
                            ?>
                        </div>
                        <?php echo $this->Form->input('role', array('label' => 'Vị trí', 'options' => array(ROLE_GVHD => 'GVHD', ROLE_SVTH => "SVTH"))); ?>

                        <?php
                        echo $this->Form->input('project_id', array('type' => 'hidden', 'value' => $project['Project']['id']));
                        echo $this->Form->input('id', array('type' => 'hidden'));
                        ?>




                    </div>
                    <div class="modal-footer">
<?php echo $this->Form->button('Lưu', array('class' => "btn btn-primary", 'id' => 'addButton')); ?>  
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>                
                    </div>
                    <?php
                    echo $this->Form->end();
                    ?>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    var url = '<?php echo BASE_URL ?>/users/getUsers';
    jQuery.fn.fadeOutAndRemove = function (speed) {
        $(this).fadeOut(speed, function () {
            $(this).remove();
        })
    };
    //Hàm thực hiện tìm article trong modal bài viết và append bài viết vào div id=datarows
    function loadContentForSelectUserModal() {
        mssv_find_term = $("#searchstr").val();
        $.post(url, {'data[search_term]': mssv_find_term, 'data[user_selected]': DSUserDaThamGia}, function (response) {

            $("#modal-datarows").html(response);
        });
    }
    $(function () {
        $("#members").load('/teacher/teams/index/<?php echo $project['Project']['id'] ?>');

//Xử lý khi click chọn vào option ..chọn của selectbox người tham gia
        $(document).on("click", "#add-member", function () {
            DSUserDaThamGia = new Array();
            $("#user-table > tbody > tr").each(function () {
                // var UserDaThamGia = $(this).attr('user-id');
                // DSUserDaThamGia.push(UserDaThamGia);
            });
            //loadContentForSelectUserModal();
            chonCBGVModal = $('#select-user-modal').modal(
                    {
                        keyboard: true,
                        backdrop: "static",
                        show: false
                    }).on('hidden.bs.modal', function (e) {
                //dialogThemChiTietVaiTroBienSoan.modal('show');
            }).modal('show');
        });


        $("#FormAddMember").on('submit', function (e) {
            event.preventDefault();
            var href = '/teams/add';
            console.log(href);

            var data = $(this).serialize();
            $.post(href, data, function (res) {

                if (res.success) {
                    $("#members").load('/teams/index/<?php echo $project['Project']['id'] ?>');
                    chonCBGVModal.modal('hide');
                }

            }, 'json');


        });

        $(document).on("click", "#check-all", function () {

            $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
        });


        //$.fn.modal.Constructor.prototype.enforceFocus = function () {};

        $('#TeamUserId').select2({
            width: 250,
            dropdownParent: $('#select-user-modal'),
            multiple: true,
            placeholder: {
                id: '', // the value of the option
                text: 'Nhập tên thành viên cần tìm...'
            },

            minimumInputLength: 1,
            allowClear: true,
            ajax: {
                url: '/teams/browse_members/<?php echo $project['Project']['id'] ?>',
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data
                    };
                }

                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        $(document).on("click", "#delete-seleted", function (e) {
            e.preventDefault();
            var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();
            //console.log(selectedRecord.length);return false;
            if (selectedRecord.length < 1) {
                alert("Vui lòng chọn dòng muốn xóa !");
                return false;
            }
            if (confirm("Thao tác này không thể phục hồi, bạn chắc chắn muốn thực hiện ?")) {
                var selectedRecord = $(".has-checked-item input[name='selete-item']:checked").serializeArray();




                $.post('/teacher/teams/delete', {selectedRecord: selectedRecord}, function (response) {
                    if (response) {
                        $.each(response, function (arrayID, rowId) {
                            $("#row-" + rowId).fadeOutAndRemove('fast');
                        });
                        return true;

                    } else {
                        alert('Có lỗi trong quá trình thực hiện thao tác!!!');
                        return false;
                    }
                }, 'json').fail(function (response) {
                    alert('Error: ' + response.responseText);
                });
                return true;
            } else {
                return false;
            }
        });

    });


</script>