
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Thi Sinh Hung Bien'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $thiSinhHungBien['ThiSinhHungBien']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="ThiSinhHungBiens" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Ho Va Ten'); ?></strong></td>
		<td>
			<?php echo h($thiSinhHungBien['ThiSinhHungBien']['ho_va_ten']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('So Bao Danh'); ?></strong></td>
		<td>
			<?php echo h($thiSinhHungBien['ThiSinhHungBien']['so_bao_danh']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($thiSinhHungBien['ThiSinhHungBien']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($thiSinhHungBien['ThiSinhHungBien']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($thiSinhHungBien['ThiSinhHungBien']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('Related Du Doan Hung Biens'); ?></h3>
                    <div class="box-tools pull-right">
    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Du Doan Hung Bien'), array('controller' => 'du_doan_hung_biens', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
                </div>
    <?php if (!empty($thiSinhHungBien['DuDoanHungBien'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                		<th class="text-center"><?php echo __('So Dien Thoai'); ?></th>
		<th class="text-center"><?php echo __('Mssv'); ?></th>
		<th class="text-center"><?php echo __('Thi Sinh Id'); ?></th>
		<th class="text-center"><?php echo __('So Du Doan'); ?></th>
		<th class="text-center"><?php echo __('Created'); ?></th>
		<th class="text-center"><?php echo __('Modified'); ?></th>
		<th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            	<?php
										$i = 0;
										foreach ($thiSinhHungBien['DuDoanHungBien'] as $duDoanHungBien): ?>
		<tr>
			<td class="text-center"><?php echo $duDoanHungBien['so_dien_thoai']; ?></td>
			<td class="text-center"><?php echo $duDoanHungBien['mssv']; ?></td>
			<td class="text-center"><?php echo $duDoanHungBien['thi_sinh_id']; ?></td>
			<td class="text-center"><?php echo $duDoanHungBien['so_du_doan']; ?></td>
			<td class="text-center"><?php echo $duDoanHungBien['created']; ?></td>
			<td class="text-center"><?php echo $duDoanHungBien['modified']; ?></td>
			<td class="text-center"><?php echo $duDoanHungBien['id']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'du_doan_hung_biens', 'action' => 'view', $duDoanHungBien['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'du_doan_hung_biens', 'action' => 'edit', $duDoanHungBien['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'du_doan_hung_biens', 'action' => 'delete', $duDoanHungBien['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $duDoanHungBien['id'])); ?>
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

