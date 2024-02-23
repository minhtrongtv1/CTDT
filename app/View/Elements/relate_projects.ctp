<?php
//Liet ke 5 de xuat cung chuyen muc//
$projects = $this->requestAction(array('controller' => 'projects', 'action' => 'relate_projects', $project_id));
?> 
<?php if (!empty($projects)): ?>
    <section id="products" >
        <div class="container d-flex justify-content-center mt-50 mb-50">

            <div class="row">
                <h4 style="color:rgba(1, 4, 136, 0.9)">Nhu cầu cùng lĩnh vực</h4>
                <div class="col-md-12">
                    <?php
                    foreach ($projects as $project):
                        ?>
                        <div class="card card-body">
                            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                <div class="mr-2 mb-3 mb-lg-0"> <img src="<?php echo $this->Html->assetUrl('/files/project/image/' . $project['Project']['id'] . '/' . $project['Project']['image']) ?>" width="50" height="50" alt=""> </div>
                                <div class="media-body">
                                    <h6 class="media-title font-weight-semibold"> <a href="/projects/view/<?php echo $project['Project']['id'] ?>" data-abc="true"><?php echo $project['Project']['name'] ?> <?php echo $this->element('project_status', array('status' => $project['Project']['status'])); ?></a> </h6>
                                    <span class="badge badge-pill"><?php
                                        //$created = new DateTime($project['Project']['created']);
                                        //echo ($created->format('d/m/Y H:i'))
                                        echo $project['Project']['created'];
                                        ?></span>


                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </section>
<?php endif; ?>