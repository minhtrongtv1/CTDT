<?php
$this->set('title', 'Dự án ' . $project['Project']['name'] . ' - ' . SITENAME);
?>

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
                    <dt>Tác giả</dt>
                    <dd><?php echo $project['CreatedUser']['name'] ?></dd>
                </dl>  <!-- item-property-hor .// -->
                <dl class="param param-feature">
                    <dt>Lĩnh vực</dt>
                    <dd><?php echo $project['Field']['name'] ?></dd>
                </dl>  <!-- item-property-hor .// -->
                <dl class="param param-feature">
                    <dt>Ngày đăng</dt>
                    <dd><?php echo $project['Project']['created'] ?></dd>
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

                <!-- Your share button code -->
                <div class="fb-share-button" 
                     data-href="<?php echo (Router::url('/projects/view/' . $project['Project']['id'])) ?>" 
                     data-layout="button_count">
                </div>



                <hr>


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


            <div id="ban-bien-soan" class="tab-pane">
                <div class="row">
                    <div>
                        <div class="widget-box">
                            <div class="widget-header">
                                <h6 class="widget-title">
                                    <i class="ace-icon fa fa-list"></i>
                                    Danh sách thành viên
                                </h6>


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
        </aside>
    </div> <!-- row.// -->

</div>
<!--container.//-->



<script>
    var url = '<?php echo BASE_URL ?>/users/getUsers';
    jQuery.fn.fadeOutAndRemove = function (speed) {
        $(this).fadeOut(speed, function () {
            $(this).remove();
        })
    };

    $(function () {
        $("#members").load('/teams/index/<?php echo $project['Project']['id'] ?>');









    });


</script>