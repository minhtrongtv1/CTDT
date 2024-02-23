
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Lms Course Teaching'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $lmsCourseTeaching['LmsCourseTeaching']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="LmsCourseTeachings" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Lms Course'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($lmsCourseTeaching['LmsCourse']['fullname'], array('controller' => 'lms_courses', 'action' => 'view', $lmsCourseTeaching['LmsCourse']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Teacher Email'); ?></strong></td>
		<td>
			<?php echo h($lmsCourseTeaching['LmsCourseTeaching']['teacher_email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Teacher Name'); ?></strong></td>
		<td>
			<?php echo h($lmsCourseTeaching['LmsCourseTeaching']['teacher_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Teacher'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($lmsCourseTeaching['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $lmsCourseTeaching['Teacher']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($lmsCourseTeaching['LmsCourseTeaching']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

