<?php
$this->Paginator->options(array(
    'url' => array('action' => 'index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST',
));
?>
<?php echo $this->Html->css('products-list-style-2'); ?>
<?php echo $this->Html->css('pagination'); ?>
<?php
$this->set('title', 'Danh mục các nhu cầu được đề xuất từ cộng đồng - ' . SITENAME);
?>

<!-- Navbar section -->

<div id="content">
    <div class="container-fluid">

        <div class="row">

            <section id="sidebar">

                <?php echo $this->element('project_desktop_filter'); ?>

            </section>
            <div id="mobile-filter">

                <?php echo $this->element('project_mobile_filter'); ?>
            </div>
            <!-- Sidebar filter section -->

            <!-- products section -->
            <section id="products">
                <div class="container d-flex justify-content-center mt-50 mb-50">

                    <div class="row">

                        <div class="col-md-12">
                            <h4 style="color:rgba(1, 4, 136, 0.9)">NHU CẦU TỪ CỘNG ĐỒNG</h4>

                            <div id="datarows">
                                <?php foreach ($projects as $project):
                                    ?>
                                    <div class="card card-body">
                                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                            <div class="mr-2 mb-3 mb-lg-0"> <img src="<?php echo $this->Html->assetUrl('/files/project/image/' . $project['Project']['id'] . '/' . $project['Project']['image']) ?>" width="150" height="150" alt=""> </div>
                                            <div class="media-body">
                                                <h6 class="media-title font-weight-semibold"> <a href="/projects/view/<?php echo $project['Project']['id'] ?>" data-abc="true"><?php echo $project['Project']['name'] ?></a> <?php echo $this->element('project_status', array('status' => $project['Project']['status'])); ?></h6>

                                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                                    <li class="list-inline-item"><b>Tác giả: </b></li>
                                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"><?php echo $project['CreatedUser']['name'] ?></a></li>

                                                </ul>
                                                <?php if (!empty($project['Team'])): ?>
                                                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                                        <li class="list-inline-item"><b>Người thực hiện: </b></li>
                                                        <?php
                                                        $members = $project['Team'];
                                                        foreach ($members as $member):
                                                            ?>
                                                            <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true"><?php echo $member['User']['name'] ?></a></li>
                                                        <?php endforeach; ?>

                                                    </ul>
                                                <?php endif; ?>
                                                <p class="mb-3"><?php if (!empty($project['Project']['description'])) {
                                                echo $this->Common->html2text($project['Project']['description']);
                                            } ?></p>
                                                <ul class="list-inline list-inline-dotted mb-0">
                                                    <li class="list-inline-item">Lĩnh vực <a href="#" data-abc="true"><?php echo $project['Field']['name'] ?></a></li>

                                                </ul>


                                            </div>
                                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">

                                                <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                                <div class="text-muted"><?php echo $project['Project']['view_counter']; ?> lượt xem</div> <a href="/projects/view/<?php echo $project['Project']['id'] ?>"><button type="button" class="btn btn-warning mt-4 text-white"><i class="icon-cart-add mr-2"></i> Xem chi tiết</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
<?php endforeach; ?>
<?php echo $this->element('pagination'); ?>
                            </div>



                            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
                            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>

<?php echo $this->Js->writeBuffer(); ?>

