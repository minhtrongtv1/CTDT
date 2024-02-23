
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Course'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $course['Course']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Courses" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Fullname'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['fullname']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Shortname'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['shortname']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Startdate'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['startdate']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Scholastic'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['scholastic']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Semester'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['semester']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Subject Code'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['subject_code']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Subject Name'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['subject_name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Subject Class'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['subject_class']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Department'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($course['Department']['name'], array('controller' => 'departments', 'action' => 'view', $course['Department']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Lms Created Date'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['lms_created_date']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Lms Modified Date'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['lms_modified_date']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($course['Course']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Evaluation Results'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Evaluation Result'), array('controller' => 'evaluation_results', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($course['EvaluationResult'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Evaluation Round Id'); ?></th>
                                <th class="text-center"><?php echo __('Course Id'); ?></th>
                                <th class="text-center"><?php echo __('Supporter Id'); ?></th>
                                <th class="text-center"><?php echo __('Pass'); ?></th>
                                <th class="text-center"><?php echo __('Reason'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($course['EvaluationResult'] as $evaluationResult):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $evaluationResult['evaluation_round_id']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['course_id']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['supporter_id']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['pass']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['reason']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['created']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['modified']; ?></td>
                                    <td class="text-center"><?php echo $evaluationResult['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'evaluation_results', 'action' => 'view', $evaluationResult['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'evaluation_results', 'action' => 'edit', $evaluationResult['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'evaluation_results', 'action' => 'delete', $evaluationResult['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $evaluationResult['id'])); ?>
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
                <h3 class="box-title"><?php echo __('Related Teachings'); ?></h3>
                <div class="box-tools pull-right">
            <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Teaching'), array('controller' => 'teachings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
<?php if (!empty($course['Teaching'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Course Id'); ?></th>
                                <th class="text-center"><?php echo __('User Id'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($course['Teaching'] as $teaching):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $teaching['course_id']; ?></td>
                                    <td class="text-center"><?php echo $teaching['user_id']; ?></td>
                                    <td class="text-center"><?php echo $teaching['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'teachings', 'action' => 'view', $teaching['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'teachings', 'action' => 'edit', $teaching['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'teachings', 'action' => 'delete', $teaching['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $teaching['id'])); ?>
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

