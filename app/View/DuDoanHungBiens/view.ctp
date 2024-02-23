
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Du Doan Hung Bien'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $duDoanHungBien['DuDoanHungBien']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="DuDoanHungBiens" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Ho Va Ten'); ?></strong></td>
		<td>
			<?php echo h($duDoanHungBien['DuDoanHungBien']['ho_va_ten']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('So Dien Thoai'); ?></strong></td>
		<td>
			<?php echo h($duDoanHungBien['DuDoanHungBien']['so_dien_thoai']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Thi Sinh'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($duDoanHungBien['ThiSinh']['ho_va_ten'], array('controller' => 'thi_sinh_hung_biens', 'action' => 'view', $duDoanHungBien['ThiSinh']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('So Du Doan'); ?></strong></td>
		<td>
			<?php echo h($duDoanHungBien['DuDoanHungBien']['so_du_doan']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($duDoanHungBien['DuDoanHungBien']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($duDoanHungBien['DuDoanHungBien']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($duDoanHungBien['DuDoanHungBien']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

