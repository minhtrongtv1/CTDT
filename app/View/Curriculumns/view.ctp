
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



<!--        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Chương trình đào tạo tham khảo'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('Thêm mới chương trình đào tạo tham khảo'), array('controller' => 'CurriculumnsReferences', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div> /.actions 
            </div>
                <?php if (!empty($curriculumn['CurriculumnsReference'])): ?>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo __('Tên chương trình đào tạo tham khảo'); ?></th>
                                    <th class="text-center"><?php echo __('Chương trình đào tạo tham khảo'); ?></th>                                  
                                    <th class="text-center"><?php echo __('Id'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($curriculumn['CurriculumnsReference'] as $curriculumnsReference):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $curriculumnsReference['name']; ?></td>
                                        <td class="text-center"><?php echo $curriculumnsReference['name_vn']; ?></td> 
                                        <td class="text-center"><?php echo $curriculumnsReference['id']; ?></td>
                                        <td class="text-center">
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'program_outcomes', 'action' => 'view', $programOutcome['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'program_outcomes', 'action' => 'edit', $programOutcome['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'program_outcomes', 'action' => 'delete', $programOutcome['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $programOutcome['id'])); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table> /.table table-striped table-bordered 
                    </div>  /.table-responsive 
                <?php endif; ?>
            </div> /.related  -->


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
                                        <th class="text-center"><?php echo __('Id chương trình đào tạo'); ?></th>
                                        <th class="text-center"><?php echo __('Id chuẩn đầu ra'); ?></th>
                                        <th class="text-center"><?php echo __('Mã chuẩn đầu ra'); ?></th>
                                        <th class="text-center"><?php echo __('Miêu tả'); ?></th>
                                        <th class="text-center"><?php echo __('Trình độ'); ?></th>
                                        <th class="text-center"><?php echo __('Loại nhóm chuẩn đầu ra'); ?></th>

                                        <th class="text-center"><?php echo __('Id'); ?></th>
                                        <th class="text-center"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($curriculumn['ProgramObjective'] as $programObjective):
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $programObjective['curriculumn_id']; ?></td>
                                            <td class="text-center"><?php echo $programObjective['typeoutcome_id']; ?></td>
                                            <td class="text-center"><?php echo $programObjective['code']; ?></td>
                                            <td class="text-center"><?php echo $programObjective['describe']; ?></td>
                                            <td class="text-center"><?php echo $programObjective['level']; ?></td>
                                            <td class="text-center"><?php echo $programObjective['group_type']; ?></td>

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



                </div><!-- /.related -->     
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
                                            <th class="text-center"><?php echo __('Mã mục tiêu đào tạo'); ?></th>
                                            <th class="text-center"><?php echo __('Tên mục tiêu đào tạo'); ?></th>
                                            <th class="text-center"><?php echo __('Nội dung'); ?></th>
                                            <th class="text-center"><?php echo __('Loại mục tiêu đào tạo'); ?></th>
                                            <th class="text-center"><?php echo __('Id chương trình đào tạo'); ?></th>

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
                                                <td class="text-center"><?php echo $programOutcome['code']; ?></td>
                                                <td class="text-center"><?php echo $programOutcome['name']; ?></td>
                                                <td class="text-center"><?php echo $programOutcome['content']; ?></td>
                                                <td class="text-center"><?php echo $programOutcome['typeoutcome_id']; ?></td>
                                                <td class="text-center"><?php echo $programOutcome['curriculumn_id']; ?></td>

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


                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo __('Khối kiến thức'); ?></h3>

                            <?php if (!empty($curriculumn['Knowledge'])): ?>

                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><?php echo __('Code'); ?></th>
                                                <th class="text-center"><?php echo __('Name'); ?></th>
                                                <th class="text-center"><?php echo __('Program Objective Id'); ?></th>
                                                <th class="text-center"><?php echo __('Describe'); ?></th>

                                                <th class="text-center"><?php echo __('Id'); ?></th>
                                                <th class="text-center"><?php echo __('Actions'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($curriculumn['Knowledge'] as $knowledge):
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $knowledge['code']; ?></td>
                                                    <td class="text-center"><?php echo $knowledge['name']; ?></td>
                                                    <td class="text-center"><?php echo $knowledge['program_objective_id']; ?></td>
                                                    <td class="text-center"><?php echo $knowledge['describe']; ?></td>

                                                    <td class="text-center"><?php echo $knowledge['id']; ?></td>
                                                    <td class="text-center">
                                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'knowledges', 'action' => 'view', $knowledge['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'knowledges', 'action' => 'edit', $knowledge['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                                        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'knowledges', 'action' => 'delete', $knowledge['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $knowledge['id'])); ?>
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


                                        <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title"><?php echo __('Phòng'); ?></h3>
                                                <div class="box-tools pull-right">
                                                </div>
                                                <?php if (!empty($curriculumn['Room'])): ?>
                                                    <div class="box-body table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center"><?php echo __('Mã phòng'); ?></th>
                                                                    <th class="text-center"><?php echo __('Tên phòng'); ?></th>
                                                                    <th class="text-center"><?php echo __('Diện tích (m²)'); ?></th>
                                                                    <th class="text-center"><?php echo __('id'); ?></th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $i = 0;
                                                                foreach ($curriculumn['Room'] as $room):
                                                                    ?>
                                                                <td class="text-center"><?php echo $room['code']; ?>&nbsp;</td>
                                                                <td class="text-center"><?php echo $room['name']; ?>&nbsp;</td>
                                                                <td class="text-center"><?php echo $room['acreage']; ?>&nbsp;</td>
                                                                <td class="text-center"><?php echo $room['id']; ?>&nbsp;</td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                            </tbody>
                                                        </table><!-- /.table table-striped table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                <?php endif; ?>
                                            </div><!-- /.related -->
                                            <div class="box box-primary">
                                                <div class="box-header">
                                                    <h3 class="box-title"><?php echo __('Thiết bị'); ?></h3>
                                                    <div class="box-tools pull-right">
                                                    </div>
                                                    <?php if (!empty($curriculumn['Room'])): ?>
                                                        <div class="box-body table-responsive">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center"><?php echo __('Mã thiết bị'); ?></th>
                                                                        <th class="text-center"><?php echo __('Tên thiết bị'); ?></th>
                                                                        <th class="text-center"><?php echo __('Số lượng'); ?></th>
                                                                        <th class="text-center"><?php echo __('Được sử dụng'); ?></th>
                                                                        <th class="text-center"><?php echo __('Ghi chú'); ?></th>
                                                                        <th class="text-center"><?php echo __('id'); ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 0;
                                                                    foreach ($curriculumn['Device'] as $device):
                                                                        ?>
                                                                        <tr>
                                                                            <td class=""><?php echo h($device['Device']['code']); ?>&nbsp;</td>
                                                                            <td class=""><?php echo h($device['Device']['name']); ?>&nbsp;</td>
                                                                            <td class=""><?php echo h($device['Device']['quantity']); ?>&nbsp;</td>
                                                                            <td class=""><?php echo h($device['Device']['used']); ?>&nbsp;</td>
                                                                            <td class=""><?php echo h($device['Device']['note']); ?>&nbsp;</td>
                                                                            <td class=""><?php echo h($device['Device']['id']); ?>&nbsp;</td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table><!-- /.table table-striped table-bordered -->
                                                        </div><!-- /.table-responsive -->
                                                    <?php endif; ?>
                                                </div><!-- /.related -->
                                                <div class="box box-primary">
                                                    <div class="box-header">
                                                        <h3 class="box-title"><?php echo __('Tài liệu'); ?></h3>
                                                        <div class="box-tools pull-right">
                                                        </div>
                                                        <?php if (!empty($curriculumn['Book'])): ?>
                                                            <div class="table-responsive" id="datarows">
                                                                <table class="table table-bordered table-hover has-checked-item">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('code', 'Mã tài liệu'); ?></th>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('name', 'Tên tài liệu'); ?></th>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('author_name', 'Tên tác giả'); ?></th>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('publisher', 'Nhà xuất bản'); ?></th>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('publishing_year', 'Năm xuất bản'); ?></th>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('link_libary', 'Link thư viện'); ?></th>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('pricing_code', 'Mã xếp giá'); ?></th>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('quantity', 'Số lượng'); ?></th>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('note', 'Ghi chú'); ?></th>
                                                                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $stt = (($this->Paginator->params['paging']['Book']['page'] - 1) * $this->Paginator->params['paging']['Book']['limit']) + 1; ?>
                                                                        <?php foreach ($books as $book): ?>
                                                                            <tr id="row-<?php echo $book['Book']['id'] ?>">
                                                                                <td><?php echo $stt++; ?></td>
                                                                                <td class=""><?php echo h($book['Book']['code']); ?>&nbsp;</td>
                                                                                <td class=""><?php echo h($book['Book']['name']); ?>&nbsp;</td>
                                                                                <td class=""><?php echo h($book['Book']['author_name']); ?>&nbsp;</td>
                                                                                <td class=""><?php echo h($book['Book']['publisher']); ?>&nbsp;</td>
                                                                                <td class=""><?php echo h($book['Book']['publishing_year']); ?>&nbsp;</td>
                                                                                <td class=""><?php echo $this->Html->link("Link tài liệu", $book['Book']['link_libary']); ?>&nbsp;</td>
                                                                                <td class=""><?php echo h($book['Book']['pricing_code']); ?>&nbsp;</td>
                                                                                <td class=""><?php echo h($book['Book']['quantity']); ?>&nbsp;</td>
                                                                                <td class=""><?php echo h($book['Book']['note']); ?>&nbsp;</td>
                                                                                <td class=""><?php echo h($book['Book']['id']); ?>&nbsp;</td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody> 
                                                                </table>
                                                                <?php echo $this->element("pagination"); ?>  
                                                            </div>
                                                        <?php endif; ?>
                                                    </div><!-- /.related -->
                                                    <div class="box box-primary">
                                                        <div class="box-header">
                                                            <h3 class="box-title"><?php echo __('Tài liệu học phần'); ?></h3>
                                                            <div class="box-tools pull-right">
                                                            </div>
                                                            <?php if (!empty($curriculumn['SubjectsBook'])): ?>
                                                                <div class="table-responsive" id="datarows">
                                                                    <table class="table table-bordered table-hover has-checked-item">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="column-title"><?php echo $this->Paginator->sort('subject_id', 'Tên học phần'); ?></th>
                                                                                <th class="column-title"><?php echo $this->Paginator->sort('book_id', 'Tên tài liệu',); ?></th>
                                                                                <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>
                                                                                <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                                                                                <th><input type="checkbox" id="check-all" </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $stt = (($this->Paginator->params['paging']['SubjectsBook']['page'] - 1) * $this->Paginator->params['paging']['SubjectsBook']['limit']) + 1; ?>
                                                                            <?php foreach ($subjectsBooks as $subjectsBook): ?>
                                                                                <tr id="row-<?php echo $subjectsBook['SubjectsBook']['id'] ?>">
                                                                                    <td><?php echo $stt++; ?></td>

                                                                                    <td class="">
                                                                                        <?php echo $this->Html->link($subjectsBook['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $subjectsBook['Subject']['id'])); ?>
                                                                                    </td>
                                                                                    <td class="">
                                                                                        <?php echo $this->Html->link($subjectsBook['Book']['name'], array('controller' => 'books', 'action' => 'view', $subjectsBook['Book']['id'])); ?>
                                                                                    </td>
                                                                                    <td class=""><?php echo h($subjectsBook['SubjectsBook']['id']); ?>&nbsp;</td>
                                                                                    <td>
                                                                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $subjectsBook['SubjectsBook']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type = "checkbox" class = "flat" name = "selete-item" value="<?php echo $subjectsBook['SubjectsBook']['id'] ?>">
                                                                                    </td>
                                                                                </tr>
                                                                            <?php endforeach; ?>
                                                                    </table>
                                                                    <?php echo $this->element("pagination"); ?>  
                                                                </div>

                                                            <?php endif; ?>



                                                        </div><!-- /.related -->
                                                        <div class="box box-primary">
                                                            <div class="box-header">
                                                                <h3 class="box-title"><?php echo __('Học phần chương trình đào tạo'); ?></h3>
                                                                <div class="box-tools pull-right">
                                                                </div>
                                                                <?php if (!empty($curriculumn['SubjectsCurriculumn'])): ?>
                                                                    <div class="table-responsive" id="datarows">
                                                                        <table class="table table-bordered table-hover has-checked-item">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="column-title"><?php echo $this->Paginator->sort('Chương trình đào tạo'); ?></th>
                                                                                    <th class="column-title"><?php echo $this->Paginator->sort('Học phần'); ?></th>
                                                                                    <th class="column-title"><?php echo $this->Paginator->sort('Khối kiến thức'); ?></th>
                                                                                    <th class="column-title"><?php echo $this->Paginator->sort('Học kỳ'); ?></th>
                                                                                    <th class="column-title"><?php echo $this->Paginator->sort('Loại học phần'); ?></th>
                                                                                    <th class="column-title"><?php echo $this->Paginator->sort('Id'); ?></th>
                                                                                    <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                                                                                    <th><input type="checkbox" id="check-all" </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $i = 0;
                                                                                foreach ($curriculumn['SubjectsCurriculumn'] as $subjectsCurriculumn):
                                                                                    ?>

                                                                                <td class="text-center"><?php echo $subjectsCurriculumn['Curriculumn']['name_vn']; ?></td>
                                                                                <td class="text-center"><?php echo $subjectsCurriculumn['Subject']['name']; ?></td>
                                                                                <td class="text-center"><?php echo $subjectsCurriculumn['Knowledge']['name']; ?></td>
                                                                                <td class="text-center"><?php echo $subjectsCurriculumn['Semester']['name']; ?></td>
                                                                                <td class="text-center"><?php echo $subjectsCurriculumn['SubjectsCurriculumn']['typesubject']; ?></td>
                                                                                <td class="text-center"><?php echo $subjectsCurriculumn['Id']; ?></td>


                                                                                <td>
                                                                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $subjectsBook['SubjectsBook']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                                                                </td>

                                                                                </tr>
                                                                            <?php endforeach; ?>
                                                                        </table>
                                                                        <?php echo $this->element("pagination"); ?>  
                                                                    </div>

                                                                <?php endif; ?>



                                                            </div><!-- /.related -->
                                                            <?php echo $this->Html->link('Xuất danh sách', array('admin' => false, 'controller' => 'curriculumns', 'action' => 'xuat_danh_sach_ctdt', $curriculumn['Curriculumn']['id']), array('escape' => false, 'class' => 'btn btn-info btn-xs')); ?>

                                                        </div><!-- /#page-content .span9 -->

                                                    </div><!-- /#page-container .row-fluid -->

