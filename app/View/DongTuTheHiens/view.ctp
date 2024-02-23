
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php  echo __('Dong Tu The Hien'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $dongTuTheHien['DongTuTheHien']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="DongTuTheHiens" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Level'); ?></strong></td>
		<td>
			<?php echo h($dongTuTheHien['DongTuTheHien']['level']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($dongTuTheHien['DongTuTheHien']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('English Name'); ?></strong></td>
		<td>
			<?php echo h($dongTuTheHien['DongTuTheHien']['english_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Muc Do Nhan Thuc'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($dongTuTheHien['MucDoNhanThuc']['name'], array('controller' => 'muc_do_nhan_thucs', 'action' => 'view', $dongTuTheHien['MucDoNhanThuc']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($dongTuTheHien['DongTuTheHien']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($dongTuTheHien['DongTuTheHien']['modified']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($dongTuTheHien['DongTuTheHien']['id']); ?>
			&nbsp;
		</td>
</tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        
    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

