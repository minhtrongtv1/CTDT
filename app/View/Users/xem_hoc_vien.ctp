
<?php
$this->Html->addCrumb('Học viên', '/users/index', array('prepend' => true));
$this->Html->addCrumb('Xem học viên', array('controller' => 'users', 'action' => 'xem_hoc_vien', $hoc_vien['User']['id']));
?>
<div id="user-profile-2" class="user-profile">
    <h1><?php echo $hoc_vien['User']['name'] ?></h1>
    <div class="tabbable">
        <ul class="nav nav-tabs padding-18">
            <li class="">
                <a data-toggle="tab" href="#home" aria-expanded="false">
                    <i class="green ace-icon fa fa-user bigger-120"></i>
                    Thông tin học viên
                </a>
            </li>

            <li class="active">
                <a data-toggle="tab" href="#lop-hoc" aria-expanded="true">
                    <i class="green ace-icon fa fa-list bigger-120"></i>
                    Lớp học
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#nguoi-than" aria-expanded="false">
                    <i class="green ace-icon fa fa-users bigger-120"></i>
                    Người thân
                </a>
            </li>


        </ul>

        <div class="tab-content no-border padding-24">
            <div id="home" class="tab-pane">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 center">
                        <span class="profile-picture">
                            <?php
                            $avatar = 'avatars/' . $hoc_vien['User']['gender'] . '.jpg';
                            if (!empty($hoc_vien['User']['avatar'])) {
                                $avatar = '/files/user/avatar/' . $hoc_vien['User']['id'] . '/' . $hoc_vien['User']['avatar'];
                            }
                            echo $this->Html->image($avatar, array(
                                "class" => "editable img-responsive", "alt" => "{$hoc_vien['User']['name']} Avatar", "id" => "avatar2"));
                            ?>

                        </span>

                        <?php echo $this->Html->link('<i class="ace-icon fa fa-pencil bigger-120"></i>
                                <span class="bigger-110">Cập nhật</span>', array('action' => 'edit', $hoc_vien['User']['id']), array('class' => "btn btn-sm btn-block btn-success", 'escape' => false)) ?>


                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-9">
                        <h4 class="blue">
                            <span class="middle"><?php echo $hoc_vien['User']['name'] ?></span>
                        </h4>

                        <div class="profile-user-info">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Mã số </div>

                                <div class="profile-info-value">
                                    <span><?php echo $hoc_vien['User']['username'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Ngày sinh </div>

                                <div class="profile-info-value">
                                    <span><?php echo $hoc_vien['User']['ngay_sinh'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Học trường </div>

                                <div class="profile-info-value">
                                    <span><?php echo $hoc_vien['School']['name'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Điện thoại </div>

                                <div class="profile-info-value">

                                    <span><?php echo $hoc_vien['User']['so_dien_thoai'] ?></span>

                                </div>
                            </div>



                            <div class="profile-info-row">
                                <div class="profile-info-name"> Địa chỉ </div>

                                <div class="profile-info-value">
                                    <span><?php echo $hoc_vien['User']['address'] ?></span>
                                </div>
                            </div>




                            <div class="profile-info-row">
                                <div class="profile-info-name"> Ngày tham gia </div>

                                <div class="profile-info-value">
                                    <span><?php echo $this->Time->niceShort($hoc_vien['User']['created']) ?></span>
                                </div>
                            </div>


                        </div>

                        <div class="hr hr-8 dotted"></div>


                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="space-20"></div>


            </div><!-- /#home -->

            <div id="nguoi-than" class="tab-pane ">
                <p>Chức năng đang xây dựng</p>
            </div>
            <div id="lop-hoc" class="tab-pane active">
                <?php if (!empty($hoc_vien['Enrollment'])): ?>

                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                            <th>#</th>
                            <th>Chương trình</th>
                            <th>Tên lớp</th>
                            <th>Giáo viên</th>
                            <th>Học thử</th>
                            <th>Học phí</th>
                            <th>Kết quả</th>
                            <th>Thao tác</th>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 1;
                                foreach ($hoc_vien['Enrollment'] as $enrollment) :
                                    ?>
                                    <tr data-id="<?php echo $enrollment['id'] ?>">
                                        <td><?php echo $stt++ ?></td>
                                        <td><?php echo $enrollment['Course']['Chapter']['name'] ?></td>
                                        <td><?php echo $enrollment['Course']['name'] ?></td>
                                        <td><?php echo $enrollment['Course']['Teacher']['name'] ?></td>
                                        <td><?php echo $this->Common->showHocThu($enrollment['hoc_thu']) ?></td>
                                        <td><?php echo $this->Common->showHocPhi($enrollment['fee']) ?></td>
                                        <td><?php echo $this->Common->showKetQua($enrollment['pass']); ?></td>
                                        <td>

                                            <?php if (!$enrollment['fee']) echo $this->Html->link('In phiếu thu', array('controller' => 'enrollments', 'action' => 'in_phieu_thu', $enrollment['id']), array('class' => 'btn btn-sm btn-info')) ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                        <div class="clearfix"></div>
                        <h2>Ghi chú:</h2>
                        <ul>
                            <li>Ký hiệu học phí: <span class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span> là đã đóng; <span class="text-danger"><i class=" fa fa-exclamation" aria-hidden="true"></i></span> là chưa đóng. Click vào biểu tượng <span class="text-danger"><i class=" fa fa-exclamation" aria-hidden="true"></i></span> để ghi đóng học phí</li>
                            <li>Ký hiệu kết quả: <span class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span> là đạt; <span class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></span> là không đạt</li>
                            <li>Click vào nút In phiếu thu để xuất file phiếu thu (định dạng Word)</li>
                        </ul>

                    </div>

                <?php else: ?>
                    <p>Học viên này chưa tham gia lớp nào</p>
                <?php endif; ?>
            </div>


        </div>
    </div>
</div>
<style>
    .dong-hoc-phi {
        cursor: pointer;
    }
    .huy-dong-hoc-phi {
        cursor: pointer;
    }
</style>
<script>
    $(function () {
        $(document).on("click", "span.dong-hoc-phi", function () {
            var _this = $(this);
            var parent = _this.closest('td');
            if (!confirm("Cập nhật tình trạng học phí là đã đóng ?")) {
                return false;
            } else {
                var erollment_id = _this.closest('tr').data('id');
                $.post("<?php echo BASE_URL ?>/enrollments/hoc_phi/" + erollment_id, {fee: 1}, function (r) {
                    if (r.err) {
                        alert(r.msg);
                    } else {
                        parent.html('<?php echo $this->Common->showHocPhi(1) ?>');
                    }
                }, 'json');
                return true;
                //
            }
        });

        $(document).on("click", "span.huy-dong-hoc-phi", function () {
            var _this = $(this);
            var parent = _this.closest('td');
            if (!confirm("Cập nhật tình trạng học phí là chưa đóng ?")) {
                return false;
            } else {
                var erollment_id = _this.closest('tr').data('id');
                $.post("<?php echo BASE_URL ?>/enrollments/hoc_phi/" + erollment_id, {fee: 0}, function (r) {
                    if (r.err) {
                        alert(r.msg);
                    } else {
                        parent.html('<?php echo $this->Common->showHocPhi(0) ?>');
                    }
                }, 'json');
                return true;
                //
            }
        });
    });
</script>

