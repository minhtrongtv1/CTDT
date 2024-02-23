<style>

    .imagebox {
        background: black;
        padding: 0px;
        position: relative;
        text-align: center;
        width: 100%;
    }

    .imagebox img {
        opacity: 1;
        transition: 0.5s opacity;
    }

    .imagebox .imagebox-desc {
        background-color: rgba(0, 0, 0, 0.6);
        bottom: 0px;
        color: white;
        font-size: 13px;
        left: 0px;
        padding: 10px 15px;
        position: absolute;
        transition: 0.5s padding;
        text-align: center;
        width: 100%;
    }

    .imagebox:hover img {
        opacity: 0.7;
    }

    .imagebox:hover .imagebox-desc {
        padding-bottom: 10%;
    }

</style>
<section id="gallery" class="gallery">
    <div class="container">

        <div class="section-title" data-aos="fade-up">

            <p>Nhu cầu mới đề xuất</p>
        </div>

        <div class="row no-gutters" data-aos="fade-left">


            <?php
            $projects = $this->requestAction(array('controller' => 'Projects', 'action' => 'lastest'));
            foreach ($projects as $project):
                ?>
                

                <div class="col-lg-3 col-md-4">
                    <div class="imagebox">
                        <a href="/projects/view/<?php echo $project['Project']['id']; ?>">
                           
                            <?php 
                            $image='no-image.png';
                            
                            if(!empty($project['Project']['image'])){
                               $file=new File(WWW_ROOT.'/files/project/image/' . $project['Project']['id'] . '/' . $project['Project']['image']);
                               if($file->exists()){
                                   $image='/files/project/image/' . $project['Project']['id'] . '/' . $project['Project']['image'];
                               }
                            }
                            
                            echo $this->Html->image($image, array('alt' => "", 'class' => "img-fluid category-banner img-responsive")) ?>
                            <span class="imagebox-desc"><?php echo $project['Project']['name']; ?></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>



        </div>

    </div>
</section>