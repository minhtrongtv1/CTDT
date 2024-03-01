
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Curriculumn'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $curriculumn['Curriculumn']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Curriculumns" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Code'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['code']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name Vn'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['name_vn']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name Eng'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['name_eng']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Level'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($curriculumn['Level']['name'], array('controller' => 'levels', 'action' => 'view', $curriculumn['Level']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Major'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($curriculumn['Major']['name'], array('controller' => 'majors', 'action' => 'view', $curriculumn['Major']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Form Of Trainning'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($curriculumn['FormOfTrainning']['name'], array('controller' => 'form_of_trainnings', 'action' => 'view', $curriculumn['FormOfTrainning']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Credit'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['credit']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Trainning Time'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['trainning_time']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Enrollment Subject'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['enrollment_subject']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Point Ladder'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['point_ladder']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Graduation Condition'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['graduation_condition']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Diploma Id'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['diploma_id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($curriculumn['Curriculumn']['modified']); ?>
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
                    <h3 class="box-title"><?php echo __('Related Infrastructures'); ?></h3>
                    <div class="box-tools pull-right">
    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Infrastructure'), array('controller' => 'infrastructures', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
                </div>
    <?php if (!empty($curriculumn['Infrastructure'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                		<th class="text-center"><?php echo __('Code'); ?></th>
		<th class="text-center"><?php echo __('Device Id'); ?></th>
		<th class="text-center"><?php echo __('Room Id'); ?></th>
		<th class="text-center"><?php echo __('Curriculumn Id'); ?></th>
		<th class="text-center"><?php echo __('Created'); ?></th>
		<th class="text-center"><?php echo __('Modified'); ?></th>
		<th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            	<?php
										$i = 0;
										foreach ($curriculumn['Infrastructure'] as $infrastructure): ?>
		<tr>
			<td class="text-center"><?php echo $infrastructure['code']; ?></td>
			<td class="text-center"><?php echo $infrastructure['device_id']; ?></td>
			<td class="text-center"><?php echo $infrastructure['room_id']; ?></td>
			<td class="text-center"><?php echo $infrastructure['curriculumn_id']; ?></td>
			<td class="text-center"><?php echo $infrastructure['created']; ?></td>
			<td class="text-center"><?php echo $infrastructure['modified']; ?></td>
			<td class="text-center"><?php echo $infrastructure['id']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'infrastructures', 'action' => 'view', $infrastructure['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'infrastructures', 'action' => 'edit', $infrastructure['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'infrastructures', 'action' => 'delete', $infrastructure['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $infrastructure['id'])); ?>
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
                    <h3 class="box-title"><?php echo __('Related Program Outcomes'); ?></h3>
                    <div class="box-tools pull-right">
    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Program Outcome'), array('controller' => 'program_outcomes', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
                </div>
    <?php if (!empty($curriculumn['ProgramOutcome'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                		<th class="text-center"><?php echo __('Code'); ?></th>
		<th class="text-center"><?php echo __('Name'); ?></th>
		<th class="text-center"><?php echo __('Content'); ?></th>
		<th class="text-center"><?php echo __('Curriculumn Id'); ?></th>
		<th class="text-center"><?php echo __('Created'); ?></th>
		<th class="text-center"><?php echo __('Modified'); ?></th>
		<th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            	<?php
										$i = 0;
										foreach ($curriculumn['ProgramOutcome'] as $programOutcome): ?>
		<tr>
			<td class="text-center"><?php echo $programOutcome['code']; ?></td>
			<td class="text-center"><?php echo $programOutcome['name']; ?></td>
			<td class="text-center"><?php echo $programOutcome['content']; ?></td>
			<td class="text-center"><?php echo $programOutcome['curriculumn_id']; ?></td>
			<td class="text-center"><?php echo $programOutcome['created']; ?></td>
			<td class="text-center"><?php echo $programOutcome['modified']; ?></td>
			<td class="text-center"><?php echo $programOutcome['id']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'program_outcomes', 'action' => 'view', $programOutcome['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'program_outcomes', 'action' => 'edit', $programOutcome['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'program_outcomes', 'action' => 'delete', $programOutcome['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $programOutcome['id'])); ?>
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
                    <h3 class="box-title"><?php echo __('Related Subjects Users'); ?></h3>
                    <div class="box-tools pull-right">
    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Subjects User'), array('controller' => 'subjects_users', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
                </div>
    <?php if (!empty($curriculumn['SubjectsUser'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                		<th class="text-center"><?php echo __('User Id'); ?></th>
		<th class="text-center"><?php echo __('Subject Id'); ?></th>
		<th class="text-center"><?php echo __('Curriculumn Id'); ?></th>
		<th class="text-center"><?php echo __('Created'); ?></th>
		<th class="text-center"><?php echo __('Modified'); ?></th>
		<th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            	<?php
										$i = 0;
										foreach ($curriculumn['SubjectsUser'] as $subjectsUser): ?>
		<tr>
			<td class="text-center"><?php echo $subjectsUser['user_id']; ?></td>
			<td class="text-center"><?php echo $subjectsUser['subject_id']; ?></td>
			<td class="text-center"><?php echo $subjectsUser['curriculumn_id']; ?></td>
			<td class="text-center"><?php echo $subjectsUser['created']; ?></td>
			<td class="text-center"><?php echo $subjectsUser['modified']; ?></td>
			<td class="text-center"><?php echo $subjectsUser['id']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'subjects_users', 'action' => 'view', $subjectsUser['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'subjects_users', 'action' => 'edit', $subjectsUser['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'subjects_users', 'action' => 'delete', $subjectsUser['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $subjectsUser['id'])); ?>
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
                    <h3 class="box-title"><?php echo __('Related Subjects'); ?></h3>
                    <div class="box-tools pull-right">
    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Subject'), array('controller' => 'subjects', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
                </div>
    <?php if (!empty($curriculumn['Subject'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                		<th class="text-center"><?php echo __('Code'); ?></th>
		<th class="text-center"><?php echo __('Name'); ?></th>
		<th class="text-center"><?php echo __('Theory Credit'); ?></th>
		<th class="text-center"><?php echo __('Practice Credit'); ?></th>
		<th class="text-center"><?php echo __('Theory Hour'); ?></th>
		<th class="text-center"><?php echo __('Practice Hour'); ?></th>
		<th class="text-center"><?php echo __('Self Learning Time'); ?></th>
		<th class="text-center"><?php echo __('Note'); ?></th>
		<th class="text-center"><?php echo __('Describe'); ?></th>
		<th class="text-center"><?php echo __('Syllabus Filename'); ?></th>
		<th class="text-center"><?php echo __('Syllabus Path'); ?></th>
		<th class="text-center"><?php echo __('Semester Id'); ?></th>
		<th class="text-center"><?php echo __('Created'); ?></th>
		<th class="text-center"><?php echo __('Modified'); ?></th>
		<th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            	<?php
										$i = 0;
										foreach ($curriculumn['Subject'] as $subject): ?>
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
			<td class="text-center"><?php echo $subject['syllabus_path']; ?></td>
			<td class="text-center"><?php echo $subject['semester_id']; ?></td>
			<td class="text-center"><?php echo $subject['created']; ?></td>
			<td class="text-center"><?php echo $subject['modified']; ?></td>
			<td class="text-center"><?php echo $subject['id']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'subjects', 'action' => 'view', $subject['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'subjects', 'action' => 'edit', $subject['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'subjects', 'action' => 'delete', $subject['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $subject['id'])); ?>
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

