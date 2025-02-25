
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Subjects Book'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $subjectsBook['SubjectsBook']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="SubjectsBooks" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Subject'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($subjectsBook['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $subjectsBook['Subject']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Book'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($subjectsBook['Book']['name'], array('controller' => 'books', 'action' => 'view', $subjectsBook['Book']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($subjectsBook['SubjectsBook']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($subjectsBook['SubjectsBook']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($subjectsBook['SubjectsBook']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

