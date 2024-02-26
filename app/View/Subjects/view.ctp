
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Subject'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $subject['Subject']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Subjects" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Code'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['code']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Theory Credit'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['theory_credit']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Practice Credit'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['practice_credit']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Theory Hour'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['theory_hour']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Practice Hour'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['practice_hour']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Self Learning Time'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['self_learning_time']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Note'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['note']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Describe'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['describe']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Syllabus Filename'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['syllabus_filename']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Syllabus Path'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['syllabus_path']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Semester'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($subject['Semester']['name'], array('controller' => 'semesters', 'action' => 'view', $subject['Semester']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($subject['Subject']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Books'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Book'), array('controller' => 'books', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($subject['Book'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Code'); ?></th>
                                <th class="text-center"><?php echo __('Name'); ?></th>
                                <th class="text-center"><?php echo __('Author Name'); ?></th>
                                <th class="text-center"><?php echo __('Publisher'); ?></th>
                                <th class="text-center"><?php echo __('Publishing Year'); ?></th>
                                <th class="text-center"><?php echo __('Link Libary'); ?></th>
                                <th class="text-center"><?php echo __('Note'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($subject['Book'] as $book):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $book['code']; ?></td>
                                    <td class="text-center"><?php echo $book['name']; ?></td>
                                    <td class="text-center"><?php echo $book['author_name']; ?></td>
                                    <td class="text-center"><?php echo $book['publisher']; ?></td>
                                    <td class="text-center"><?php echo $book['publishing_year']; ?></td>
                                    <td class="text-center"><?php echo $book['link_libary']; ?></td>
                                    <td class="text-center"><?php echo $book['note']; ?></td>
                                    <td class="text-center"><?php echo $book['created']; ?></td>
                                    <td class="text-center"><?php echo $book['modified']; ?></td>
                                    <td class="text-center"><?php echo $book['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'books', 'action' => 'view', $book['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'books', 'action' => 'edit', $book['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'books', 'action' => 'delete', $book['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $book['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>



        </div><!-- /.related -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Curriculumns'); ?></h3>
                <div class="box-tools pull-right">
            <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Curriculumn'), array('controller' => 'curriculumns', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
<?php if (!empty($subject['Curriculumn'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Code'); ?></th>
                                <th class="text-center"><?php echo __('Name Vn'); ?></th>
                                <th class="text-center"><?php echo __('Name Eng'); ?></th>
                                <th class="text-center"><?php echo __('Level Id'); ?></th>
                                <th class="text-center"><?php echo __('Major Id'); ?></th>
                                <th class="text-center"><?php echo __('Form Of Trainning Id'); ?></th>
                                <th class="text-center"><?php echo __('Credit'); ?></th>
                                <th class="text-center"><?php echo __('Trainning Time'); ?></th>
                                <th class="text-center"><?php echo __('Enrollment Subject'); ?></th>
                                <th class="text-center"><?php echo __('Point Ladder'); ?></th>
                                <th class="text-center"><?php echo __('Graduation Condition'); ?></th>
                                <th class="text-center"><?php echo __('Diploma'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($subject['Curriculumn'] as $curriculumn):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $curriculumn['code']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['name_vn']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['name_eng']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['level_id']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['major_id']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['form_of_trainning_id']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['credit']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['trainning_time']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['enrollment_subject']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['point_ladder']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['graduation_condition']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['diploma']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['created']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['modified']; ?></td>
                                    <td class="text-center"><?php echo $curriculumn['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'curriculumns', 'action' => 'view', $curriculumn['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'curriculumns', 'action' => 'edit', $curriculumn['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'curriculumns', 'action' => 'delete', $curriculumn['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $curriculumn['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>



        </div><!-- /.related -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Users'); ?></h3>
                <div class="box-tools pull-right">
            <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
<?php if (!empty($subject['User'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('First Name'); ?></th>
                                <th class="text-center"><?php echo __('Last Name'); ?></th>
                                <th class="text-center"><?php echo __('Code'); ?></th>
                                <th class="text-center"><?php echo __('Gender'); ?></th>
                                <th class="text-center"><?php echo __('Ngay Sinh'); ?></th>
                                <th class="text-center"><?php echo __('Noi Sinh'); ?></th>
                                <th class="text-center"><?php echo __('So Dien Thoai'); ?></th>
                                <th class="text-center"><?php echo __('So Cmnd'); ?></th>
                                <th class="text-center"><?php echo __('Ngay Cap'); ?></th>
                                <th class="text-center"><?php echo __('Noi Cap'); ?></th>
                                <th class="text-center"><?php echo __('Email'); ?></th>
                                <th class="text-center"><?php echo __('Chuyen Mon'); ?></th>
                                <th class="text-center"><?php echo __('So Tai Khoan'); ?></th>
                                <th class="text-center"><?php echo __('Ngan Hang'); ?></th>
                                <th class="text-center"><?php echo __('Ma So Thue'); ?></th>
                                <th class="text-center"><?php echo __('Username'); ?></th>
                                <th class="text-center"><?php echo __('Password'); ?></th>
                                <th class="text-center"><?php echo __('Avatar Path'); ?></th>
                                <th class="text-center"><?php echo __('Avatar'); ?></th>
                                <th class="text-center"><?php echo __('Activated'); ?></th>
                                <th class="text-center"><?php echo __('Last Login'); ?></th>
                                <th class="text-center"><?php echo __('Ip Address'); ?></th>
                                <th class="text-center"><?php echo __('Created User Id'); ?></th>
                                <th class="text-center"><?php echo __('Department Id'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($subject['User'] as $user):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $user['first_name']; ?></td>
                                    <td class="text-center"><?php echo $user['last_name']; ?></td>
                                    <td class="text-center"><?php echo $user['code']; ?></td>
                                    <td class="text-center"><?php echo $user['gender']; ?></td>
                                    <td class="text-center"><?php echo $user['ngay_sinh']; ?></td>
                                    <td class="text-center"><?php echo $user['noi_sinh']; ?></td>
                                    <td class="text-center"><?php echo $user['so_dien_thoai']; ?></td>
                                    <td class="text-center"><?php echo $user['so_cmnd']; ?></td>
                                    <td class="text-center"><?php echo $user['ngay_cap']; ?></td>
                                    <td class="text-center"><?php echo $user['noi_cap']; ?></td>
                                    <td class="text-center"><?php echo $user['email']; ?></td>
                                    <td class="text-center"><?php echo $user['chuyen_mon']; ?></td>
                                    <td class="text-center"><?php echo $user['so_tai_khoan']; ?></td>
                                    <td class="text-center"><?php echo $user['ngan_hang']; ?></td>
                                    <td class="text-center"><?php echo $user['ma_so_thue']; ?></td>
                                    <td class="text-center"><?php echo $user['username']; ?></td>
                                    <td class="text-center"><?php echo $user['password']; ?></td>
                                    <td class="text-center"><?php echo $user['avatar_path']; ?></td>
                                    <td class="text-center"><?php echo $user['avatar']; ?></td>
                                    <td class="text-center"><?php echo $user['activated']; ?></td>
                                    <td class="text-center"><?php echo $user['last_login']; ?></td>
                                    <td class="text-center"><?php echo $user['ip_address']; ?></td>
                                    <td class="text-center"><?php echo $user['created_user_id']; ?></td>
                                    <td class="text-center"><?php echo $user['department_id']; ?></td>
                                    <td class="text-center"><?php echo $user['created']; ?></td>
                                    <td class="text-center"><?php echo $user['modified']; ?></td>
                                    <td class="text-center"><?php echo $user['id']; ?></td>
                                    <td class="text-center">
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>



        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

