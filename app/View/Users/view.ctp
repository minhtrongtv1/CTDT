<?php echo $this->Html->css('profile') ?>
<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">

                    <?php
                    if (!empty($user['User']['avatar']))
                        echo $this->Html->image('/files/user/avatar/' . $user['User']['id'] . '/' . $user['User']['avatar'], array(
                            "class" => "editable img-responsive", "alt" => "{$user['User']['name']} Avatar", "id" => "avatar2"));
                            
                            else
                                echo $this->Html->image('no-avatar.png', array(
                            "class" => "editable img-responsive", "alt" => "{$user['User']['name']} Avatar", "id" => "avatar2"));
                        ?>


                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-head">
                    <h5>
                        <?php echo $user['User']['name'] ?>
                    </h5>


                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Giới thiệu</a>
                        </li>
                        <?php if ($user['Propose']): ?>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#propose" role="tab" aria-controls="propose" aria-selected="false">Nhu cầu đã đề xuất</a>
                            </li>
                        <?php endif; ?>
                        <?php if ($user['Team']): ?>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="false">Dự án đã tham gia</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">

                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active in    " id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="col-md-6">
                                <label>Họ và tên</label>
                            </div>
                            <div class="col-md-6">
                                <p> <?php echo $user['User']['name'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Số điện thoại</label>
                            </div>
                            <div class="col-md-6">
                                <p> <?php echo $user['User']['so_dien_thoai'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p> <?php echo $user['User']['email'] ?></p>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="propose" role="tabpanel" aria-labelledby="profile-tab">

                        <?php
                        $stt = 1;
                        foreach ($user['Propose'] as $propose):
                            ?>
                            <div class="row"><!-- comment -->

                                <div class="col-md-2">
                                    <label><?php echo $stt++ ?></label>
                                </div>
                                <div class="col-md-8">
                                    <p><?php echo $this->Html->link($propose['name'], array('controller' => 'projects', 'action' => 'view', $propose['id'])) ?></p>
                                </div>
                                <div class="col-md-2">
                                    <label><?php
                                        $created = new DateTime($propose['created']);
                                        echo $created->format('d/m/Y');
                                        ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="profile-tab">
                        <?php
                        $stt = 1;
                        foreach ($user['Team'] as $project):
                            ?>
                            <div class="row"><!-- comment -->
                                <div class="col-md-1">
                                    <label><?php echo $stt++ ?></label>
                                </div>
                                <div class="col-md-8">
                                    <p><?php echo $this->Html->link($project['Project']['name'], array('controller' => 'projects', 'action' => 'view', $project['Project']['id'])) ?></p>
                                </div>
                                <div class="col-md-3">
                                    <label><?php echo $this->element('role', array('role' => $project['role'])) ?></label> - 
                                    <label><?php
                                        $created = new DateTime($project['Project']['created']);
                                        echo $created->format('d/m/Y');
                                        ?></label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>  
            </div>
        </div>
    </form>           
</div>