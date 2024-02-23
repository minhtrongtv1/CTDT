
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Enrolment'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $enrolment['Enrolment']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Enrolments" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Workshop'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($enrolment['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $enrolment['Workshop']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Teacher'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($enrolment['Teacher']['name'], array('controller' => 'users', 'action' => 'view', $enrolment['Teacher']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Result'); ?></strong></td>
		<td>
			<?php echo h($enrolment['Enrolment']['result']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Vang Khong Phep'); ?></strong></td>
		<td>
			<?php echo h($enrolment['Enrolment']['vang_khong_phep']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Vang Co Phep'); ?></strong></td>
		<td>
			<?php echo h($enrolment['Enrolment']['vang_co_phep']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($enrolment['Enrolment']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($enrolment['Enrolment']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($enrolment['Enrolment']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

