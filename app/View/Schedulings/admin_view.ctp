
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Scheduling'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $scheduling['Scheduling']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Schedulings" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Workshop'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($scheduling['Workshop']['name'], array('controller' => 'workshops', 'action' => 'view', $scheduling['Workshop']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($scheduling['Scheduling']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Room'); ?></strong></td>
		<td>
			<?php echo h($scheduling['Scheduling']['room']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Start Time'); ?></strong></td>
		<td>
			<?php echo h($scheduling['Scheduling']['start_time']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('End Time'); ?></strong></td>
		<td>
			<?php echo h($scheduling['Scheduling']['end_time']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Note'); ?></strong></td>
		<td>
			<?php echo h($scheduling['Scheduling']['note']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($scheduling['Scheduling']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($scheduling['Scheduling']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($scheduling['Scheduling']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

