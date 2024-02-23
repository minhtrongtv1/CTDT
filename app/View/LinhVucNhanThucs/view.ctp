
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Linh Vuc Nhan Thuc'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $linhVucNhanThuc['LinhVucNhanThuc']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="LinhVucNhanThucs" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($linhVucNhanThuc['LinhVucNhanThuc']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('English Name'); ?></strong></td>
                            <td>
                                <?php echo h($linhVucNhanThuc['LinhVucNhanThuc']['english_name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($linhVucNhanThuc['LinhVucNhanThuc']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($linhVucNhanThuc['LinhVucNhanThuc']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($linhVucNhanThuc['LinhVucNhanThuc']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Muc Do Nhan Thucs'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Muc Do Nhan Thuc'), array('controller' => 'muc_do_nhan_thucs', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($linhVucNhanThuc['MucDoNhanThuc'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Name'); ?></th>
                                <th class="text-center"><?php echo __('English Name'); ?></th>
                                <th class="text-center"><?php echo __('Linh Vuc Nhan Thuc Id'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($linhVucNhanThuc['MucDoNhanThuc'] as $mucDoNhanThuc):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $mucDoNhanThuc['name']; ?></td>
                                    <td class="text-center"><?php echo $mucDoNhanThuc['english_name']; ?></td>
                                    <td class="text-center"><?php echo $mucDoNhanThuc['linh_vuc_nhan_thuc_id']; ?></td>
                                    <td class="text-center"><?php echo $mucDoNhanThuc['created']; ?></td>
                                    <td class="text-center"><?php echo $mucDoNhanThuc['modified']; ?></td>
                                    <td class="text-center"><?php echo $mucDoNhanThuc['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'muc_do_nhan_thucs', 'action' => 'view', $mucDoNhanThuc['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'muc_do_nhan_thucs', 'action' => 'edit', $mucDoNhanThuc['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'muc_do_nhan_thucs', 'action' => 'delete', $mucDoNhanThuc['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $mucDoNhanThuc['id'])); ?>
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

