
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Group'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Groups" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Alias'); ?></strong></td>
		<td>
			<?php echo h($group['Group']['alias']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Order'); ?></strong></td>
		<td>
			<?php echo h($group['Group']['order']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Image'); ?></strong></td>
		<td>
			<?php echo h($group['Group']['image']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Image Path'); ?></strong></td>
		<td>
			<?php echo h($group['Group']['image_path']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Decription'); ?></strong></td>
		<td>
			<?php echo h($group['Group']['decription']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Related Users'); ?></h3>
                    <div class="box-tools pull-right">
    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
                </div>
    <?php if (!empty($group['User'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                		<th class="text-center"><?php echo __('Name'); ?></th>
		<th class="text-center"><?php echo __('Sex'); ?></th>
		<th class="text-center"><?php echo __('Hoc Ham Id'); ?></th>
		<th class="text-center"><?php echo __('Hoc Vi Id'); ?></th>
		<th class="text-center"><?php echo __('Department Id'); ?></th>
		<th class="text-center"><?php echo __('Username'); ?></th>
		<th class="text-center"><?php echo __('Password'); ?></th>
		<th class="text-center"><?php echo __('Email'); ?></th>
		<th class="text-center"><?php echo __('Birthday'); ?></th>
		<th class="text-center"><?php echo __('Birthplace'); ?></th>
		<th class="text-center"><?php echo __('Phone Number'); ?></th>
		<th class="text-center"><?php echo __('Address'); ?></th>
		<th class="text-center"><?php echo __('Avatar'); ?></th>
		<th class="text-center"><?php echo __('Avatar Path'); ?></th>
		<th class="text-center"><?php echo __('Activated'); ?></th>
		<th class="text-center"><?php echo __('Last Login'); ?></th>
		<th class="text-center"><?php echo __('Created'); ?></th>
		<th class="text-center"><?php echo __('Modified'); ?></th>
		<th class="text-center"><?php echo __('Id'); ?></th>
		<th class="text-center"><?php echo __('Ip Address'); ?></th>
		<th class="text-center"><?php echo __('Email Verified'); ?></th>
		<th class="text-center"><?php echo __('Created User Id'); ?></th>
		<th class="text-center"><?php echo __('Dropbox Token'); ?></th>
		<th class="text-center"><?php echo __('Dropbox Token Secret'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            	<?php
										$i = 0;
										foreach ($group['User'] as $user): ?>
		<tr>
			<td class="text-center"><?php echo $user['name']; ?></td>
			<td class="text-center"><?php echo $user['sex']; ?></td>
			<td class="text-center"><?php echo $user['hoc_ham_id']; ?></td>
			<td class="text-center"><?php echo $user['hoc_vi_id']; ?></td>
			<td class="text-center"><?php echo $user['department_id']; ?></td>
			<td class="text-center"><?php echo $user['username']; ?></td>
			<td class="text-center"><?php echo $user['password']; ?></td>
			<td class="text-center"><?php echo $user['email']; ?></td>
			<td class="text-center"><?php echo $user['birthday']; ?></td>
			<td class="text-center"><?php echo $user['birthplace']; ?></td>
			<td class="text-center"><?php echo $user['so_dien_thoai']; ?></td>
			<td class="text-center"><?php echo $user['address']; ?></td>
			<td class="text-center"><?php echo $user['avatar']; ?></td>
			<td class="text-center"><?php echo $user['avatar_path']; ?></td>
			<td class="text-center"><?php echo $user['activated']; ?></td>
			<td class="text-center"><?php echo $user['last_login']; ?></td>
			<td class="text-center"><?php echo $user['created']; ?></td>
			<td class="text-center"><?php echo $user['modified']; ?></td>
			<td class="text-center"><?php echo $user['id']; ?></td>
			<td class="text-center"><?php echo $user['ip_address']; ?></td>
			<td class="text-center"><?php echo $user['email_verified']; ?></td>
			<td class="text-center"><?php echo $user['created_user_id']; ?></td>
			<td class="text-center"><?php echo $user['dropbox_token']; ?></td>
			<td class="text-center"><?php echo $user['dropbox_token_secret']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
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

