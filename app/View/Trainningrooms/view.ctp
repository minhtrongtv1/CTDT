
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Trainningroom'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $trainningroom['Trainningroom']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Trainningrooms" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($trainningroom['Trainningroom']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Level'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($trainningroom['Level']['name'], array('controller' => 'levels', 'action' => 'view', $trainningroom['Level']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Department'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($trainningroom['Department']['title'], array('controller' => 'departments', 'action' => 'view', $trainningroom['Department']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Major'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($trainningroom['Major']['name'], array('controller' => 'majors', 'action' => 'view', $trainningroom['Major']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Form Of Trainning'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($trainningroom['FormOfTrainning']['name'], array('controller' => 'form_of_trainnings', 'action' => 'view', $trainningroom['FormOfTrainning']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Credit'); ?></strong></td>
		<td>
			<?php echo h($trainningroom['Trainningroom']['credit']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Trainning Time'); ?></strong></td>
		<td>
			<?php echo h($trainningroom['Trainningroom']['trainning_time']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Diploma'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($trainningroom['Diploma']['name'], array('controller' => 'diplomas', 'action' => 'view', $trainningroom['Diploma']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Approve'); ?></strong></td>
		<td>
			<?php echo h($trainningroom['Trainningroom']['approve']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($trainningroom['Trainningroom']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($trainningroom['Trainningroom']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($trainningroom['Trainningroom']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

