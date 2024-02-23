
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Lms Course'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $lmsCourse['LmsCourse']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="LmsCourses" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Lms Course Id'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['lms_course_id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Fullname'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['fullname']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Shortname'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['shortname']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Categoryid'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['categoryid']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Categoryname'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['categoryname']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Startdate'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['startdate']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Visible'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['visible']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Scholastic'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['scholastic']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Timecreated'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['timecreated']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Timemodified'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['timemodified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($lmsCourse['LmsCourse']['modified']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Related Lms Course Teachings'); ?></h3>
                    <div class="box-tools pull-right">
    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Lms Course Teaching'), array('controller' => 'lms_course_teachings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
                </div>
    <?php if (!empty($lmsCourse['LmsCourseTeaching'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                		<th class="text-center"><?php echo __('Lms Course Id'); ?></th>
		<th class="text-center"><?php echo __('Teacher Email'); ?></th>
		<th class="text-center"><?php echo __('Teacher Name'); ?></th>
		<th class="text-center"><?php echo __('Teacher Id'); ?></th>
		<th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            	<?php
										$i = 0;
										foreach ($lmsCourse['LmsCourseTeaching'] as $lmsCourseTeaching): ?>
		<tr>
			<td class="text-center"><?php echo $lmsCourseTeaching['lms_course_id']; ?></td>
			<td class="text-center"><?php echo $lmsCourseTeaching['teacher_email']; ?></td>
			<td class="text-center"><?php echo $lmsCourseTeaching['teacher_name']; ?></td>
			<td class="text-center"><?php echo $lmsCourseTeaching['teacher_id']; ?></td>
			<td class="text-center"><?php echo $lmsCourseTeaching['id']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'lms_course_teachings', 'action' => 'view', $lmsCourseTeaching['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'lms_course_teachings', 'action' => 'edit', $lmsCourseTeaching['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'lms_course_teachings', 'action' => 'delete', $lmsCourseTeaching['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $lmsCourseTeaching['id'])); ?>
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

