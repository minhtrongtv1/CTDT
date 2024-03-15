
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Industryleader'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $industryleader['Industryleader']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Industryleaders" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($industryleader['User']['ho_va_ten_khoa_code'], array('controller' => 'users', 'action' => 'view', $industryleader['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Curriculumn'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($industryleader['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $industryleader['Curriculumn']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Role'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($industryleader['Role']['name'], array('controller' => 'roles', 'action' => 'view', $industryleader['Role']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Level'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($industryleader['Level']['name'], array('controller' => 'levels', 'action' => 'view', $industryleader['Level']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Major'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($industryleader['Major']['name'], array('controller' => 'majors', 'action' => 'view', $industryleader['Major']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($industryleader['Industryleader']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($industryleader['Industryleader']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($industryleader['Industryleader']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

