
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Curriculumn'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $curriculumn['Curriculumn']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Curriculumns" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Mã chương trình đào tạo'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['code']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Tên tiếng Việt'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['name_vn']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Tên tiếng Anh'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['name_eng']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Trình độ đào tạo'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($curriculumn['Level']['name'], array('controller' => 'levels', 'action' => 'view', $curriculumn['Level']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Đơn vị quản lý'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($curriculumn['Department']['title'], array('controller' => 'departments', 'action' => 'view', $curriculumn['Department']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Ngành đạo tạo'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($curriculumn['Major']['name'], array('controller' => 'majors', 'action' => 'view', $curriculumn['Major']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Hình thức đào tạo'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($curriculumn['FormOfTrainning']['name'], array('controller' => 'form_of_trainnings', 'action' => 'view', $curriculumn['FormOfTrainning']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Số tín chỉ'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['credit']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Thời gian đào tạo'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['trainning_time']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Đối tượng tuyển sinh'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['enrollment_subject']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Thang điểm'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['point_ladder']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Điều kiện tốt nghiệp'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['graduation_condition']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Văn bằng tốt nghiệp'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($curriculumn['Diploma']['name'], array('controller' => 'diplomas', 'action' => 'view', $curriculumn['Diploma']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Năm bắt đầu áp dụng chương trình'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['year_of_curriculumn']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Số quyết định ban hành'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($curriculumn['Curriculumn']['decision_number'], array('controller' => 'states', 'action' => 'view', $curriculumn['Curriculumn']['decision_number']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('File quyết định'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($curriculumn['Curriculumn']['decision_filename'], array('controller' => 'Curriculumns', 'action' => 'view', $curriculumn['Curriculumn']['decision_filename']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Trạng thái'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($curriculumn['State']['name'], array('controller' => 'states', 'action' => 'view', $curriculumn['State']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Phê duyệt'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['approve']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($curriculumn['Curriculumn']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->





        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Mục tiêu đào tạo'); ?></h3>
                <div class="box-tools pull-right">
                </div>
                <?php if (!empty($curriculumn['ProgramOutcome'])): ?>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo __('Tên mục tiêu đào tạo'); ?></th>
                                    <th class="text-center"><?php echo __('Nội dung'); ?></th>
                                    <th class="text-center"><?php echo __('Loại mục tiêu đào tạo'); ?></th>
                                    <th class="text-center"><?php echo __('Tên chương trình đào tạo'); ?></th>

                                    <th class="text-center"><?php echo __('Id'); ?></th>
                                    <th class="text-center"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($curriculumn['ProgramOutcome'] as $programOutcome):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $programOutcome['name']; ?></td>
                                        <td class="text-center"><?php echo $programOutcome['content']; ?></td>
                                        <td class="text-center"><?php echo $programOutcome['typeoutcome_id']; ?></td>
                                        <td class="text-center"><?php echo $curriculumn['Curriculumn']['name_vn']; ?></td>

                                        <td class="text-center"><?php echo $programOutcome['id']; ?></td>
                                        <td class="text-center">
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'program_outcomes', 'action' => 'view', $programOutcome['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'program_outcomes', 'action' => 'edit', $programOutcome['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'program_outcomes', 'action' => 'delete', $programOutcome['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $programOutcome['id'])); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><!-- /.table table-striped table-bordered -->
                    </div><!-- /.table-responsive -->
                <?php endif; ?>
            </div><!-- /.related -->

        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Chuẩn đầu ra'); ?></h3>
                <div class="box-tools pull-right">
                </div>
                <?php if (!empty($curriculumn['ProgramObjective'])): ?>

                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo __('Tên chương trình đào tạo'); ?></th>
                                    <th class="text-center"><?php echo __('Tên mục tiêu đào tạo'); ?></th>
                                    <th class="text-center"><?php echo __('Trình độ'); ?></th>
                                    <th class="text-center"><?php echo __('Miêu tả'); ?></th>
                                    <th class="text-center"><?php echo __('Loại nhóm chuẩn đầu ra'); ?></th>

                                    <th class="text-center"><?php echo __('Id'); ?></th>
                                    <th class="text-center"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($curriculumn['ProgramObjective'] as $programObjective):
                                    //debug($programObjective);die;
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $curriculumn['Curriculumn']['name_vn']; ?></td>

                                        <td class="text-center"><?php echo $programOutcome['name']; ?></td>
                                        <td class="text-center"><?php echo $programObjective['level']; ?></td>
                                        <td class="text-center"><?php echo $programObjective['describe']; ?></td>
                                        <td class="text-center"><?php echo $programObjective['typeobjective_id']; ?></td>

                                        <td class="text-center"><?php echo $programObjective['id']; ?></td>
                                        <td class="text-center">
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'program_objectives', 'action' => 'view', $programObjective['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'program_objectives', 'action' => 'edit', $programObjective['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'program_objectives', 'action' => 'delete', $programObjective['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $programObjective['id'])); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><!-- /.table table-striped table-bordered -->
                    </div><!-- /.table-responsive -->

                <?php endif; ?>

            </div>

        </div><!-- /.related -->     






        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Học phần'); ?></h3>
                <div class="box-tools pull-right">
                </div>
                <?php if (!empty($curriculumn['Subject'])): ?>

                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo __('Mã học phần'); ?></th>
                                    <th class="text-center"><?php echo __('Tên học phần'); ?></th>
                                    <th class="text-center"><?php echo __('Số tín chỉ lý thuyết'); ?></th>
                                    <th class="text-center"><?php echo __('Số tín chỉ bắt buộc'); ?></th>
                                    <th class="text-center"><?php echo __('Số Giờ Lý Thuyết'); ?></th>
                                    <th class="text-center"><?php echo __('Số Giờ Thực Hành'); ?></th>
                                    <th class="text-center"><?php echo __('Số Giờ Tự Học'); ?></th>
                                    <th class="text-center"><?php echo __('Ghi Chú'); ?></th>
                                    <th class="text-center"><?php echo __('Miêu Tả'); ?></th>
                                    <th class="text-center"><?php echo __('Đề Cương Chi Tiết'); ?></th>
                                    <th class="text-center"><?php echo __('Id học kỳ'); ?></th>

                                    <th class="text-center"><?php echo __('Id'); ?></th>
                                    <th class="text-center"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($curriculumn['Subject'] as $subject):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $subject['code']; ?></td>
                                        <td class="text-center"><?php echo $subject['name']; ?></td>
                                        <td class="text-center"><?php echo $subject['theory_credit']; ?></td>
                                        <td class="text-center"><?php echo $subject['practice_credit']; ?></td>
                                        <td class="text-center"><?php echo $subject['theory_hour']; ?></td>
                                        <td class="text-center"><?php echo $subject['practice_hour']; ?></td>
                                        <td class="text-center"><?php echo $subject['self_learning_time']; ?></td>
                                        <td class="text-center"><?php echo $subject['note']; ?></td>
                                        <td class="text-center"><?php echo $subject['describe']; ?></td>
                                        <td class="text-center"><?php echo $subject['syllabus_filename']; ?></td>
                                        <td class="text-center"><?php echo $subject['semester_id']; ?></td>

                                        <td class="text-center"><?php echo $subject['id']; ?></td>
                                        <td class="text-center">
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'subjects', 'action' => 'view', $subject['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'subjects', 'action' => 'edit', $subject['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'subjects', 'action' => 'delete', $subject['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $subject['id'])); ?>
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
                    <h3 class="box-title"><?php echo __('Giảng dạy'); ?></h3>
                    <div class="box-tools pull-right">
                    </div>
                    <?php if (!empty($curriculumn['SubjectsUser'])): ?>

                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo __('Id giáo viên'); ?></th>
                                        <th class="text-center"><?php echo __('Id học phần'); ?></th>
                                        <th class="text-center"><?php echo __('Id chương trình đào tạo'); ?></th>

                                        <th class="text-center"><?php echo __('Id'); ?></th>
                                        <th class="text-center"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($curriculumn['SubjectsUser'] as $subjectsUser):
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $subjectsUser['user_id']; ?></td>
                                            <td class="text-center"><?php echo $subjectsUser['subject_id']; ?></td>
                                            <td class="text-center"><?php echo $subjectsUser['curriculumn_id']; ?></td>

                                            <td class="text-center"><?php echo $subjectsUser['id']; ?></td>
                                            <td class="text-center">
                                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'subjects_users', 'action' => 'view', $subjectsUser['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'subjects_users', 'action' => 'edit', $subjectsUser['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'subjects_users', 'action' => 'delete', $subjectsUser['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $subjectsUser['id'])); ?>
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
                        <h3 class="box-title"><?php echo __('Chủ trì ngành'); ?></h3>
                        <div class="box-tools pull-right">
                        </div>
                        <?php if (!empty($curriculumn['Industryleader'])): ?>

                            <div class="box-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo __('Id giáo viên'); ?></th>
                                            <th class="text-center"><?php echo __('Id chương trình đào tạo'); ?></th>
                                            <th class="text-center"><?php echo __('Id vai trò'); ?></th>

                                            <th class="text-center"><?php echo __('Id'); ?></th>
                                            <th class="text-center"><?php echo __('Actions'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($curriculumn['Industryleader'] as $industryleader):
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $industryleader['user_id']; ?></td>
                                                <td class="text-center"><?php echo $industryleader['curriculumn_id']; ?></td>
                                                <td class="text-center"><?php echo $industryleader['role_id']; ?></td>

                                                <td class="text-center"><?php echo $industryleader['id']; ?></td>
                                                <td class="text-center">
                                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'industryleaders', 'action' => 'view', $industryleader['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'industryleaders', 'action' => 'edit', $industryleader['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'industryleaders', 'action' => 'delete', $industryleader['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $industryleader['id'])); ?>
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
                            <h3 class="box-title"><?php echo __('Cơ sở vật chất'); ?></h3>
                            <div class="box-tools pull-right">
                            </div>
                            <?php if (!empty($curriculumn['Infrastructure'])): ?>
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><?php echo __('Mã cơ sở vật chất'); ?></th>
                                                <th class="text-center"><?php echo __('Id thiết bị'); ?></th>
                                                <th class="text-center"><?php echo __('Id phòng'); ?></th>
                                                <th class="text-center"><?php echo __('Id chương trình đào tạo'); ?></th>

                                                <th class="text-center"><?php echo __('Id'); ?></th>
                                                <th class="text-center"><?php echo __('Actions'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($curriculumn['Infrastructure'] as $infrastructure):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $infrastructure['code']; ?></td>
                                                    <td class="text-center"><?php echo $infrastructure['device_id']; ?></td>
                                                    <td class="text-center"><?php echo $infrastructure['room_id']; ?></td>
                                                    <td class="text-center"><?php echo $infrastructure['curriculumn_id']; ?></td>

                                                    <td class="text-center"><?php echo $infrastructure['id']; ?></td>
                                                    <td class="text-center">
                                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'infrastructures', 'action' => 'view', $infrastructure['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'infrastructures', 'action' => 'edit', $infrastructure['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                                        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'infrastructures', 'action' => 'delete', $infrastructure['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $infrastructure['id'])); ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table><!-- /.table table-striped table-bordered -->
                                </div><!-- /.table-responsive -->

                            <?php endif; ?>



                        </div><!-- /.related -->



                        <?php echo $this->Html->link('Xuất danh sách', array('admin' => false, 'controller' => 'curriculumns', 'action' => 'xuat_danh_sach_ctdt', $curriculumn['Curriculumn']['id']), array('escape' => false, 'class' => 'btn btn-info btn-xs')); ?>

                    </div><!-- /#page-content .span9 -->

                </div><!-- /#page-container .row-fluid -->

