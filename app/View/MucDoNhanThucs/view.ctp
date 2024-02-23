
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Muc Do Nhan Thuc'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $mucDoNhanThuc['MucDoNhanThuc']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="MucDoNhanThucs" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Level'); ?></strong></td>
                            <td>
                                <?php echo h($mucDoNhanThuc['MucDoNhanThuc']['level']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($mucDoNhanThuc['MucDoNhanThuc']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('English Name'); ?></strong></td>
                            <td>
                                <?php echo h($mucDoNhanThuc['MucDoNhanThuc']['english_name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Linh Vuc Nhan Thuc'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($mucDoNhanThuc['LinhVucNhanThuc']['name'], array('controller' => 'linh_vuc_nhan_thucs', 'action' => 'view', $mucDoNhanThuc['LinhVucNhanThuc']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($mucDoNhanThuc['MucDoNhanThuc']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($mucDoNhanThuc['MucDoNhanThuc']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($mucDoNhanThuc['MucDoNhanThuc']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Related Dong Tu The Hiens'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> ' . __('New Dong Tu The Hien'), array('controller' => 'dong_tu_the_hiens', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>                    </div><!-- /.actions -->
            </div>
            <?php if (!empty($mucDoNhanThuc['DongTuTheHien'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"><?php echo __('Level'); ?></th>
                                <th class="text-center"><?php echo __('Name'); ?></th>
                                <th class="text-center"><?php echo __('English Name'); ?></th>
                                <th class="text-center"><?php echo __('Muc Do Nhan Thuc Id'); ?></th>
                                <th class="text-center"><?php echo __('Created'); ?></th>
                                <th class="text-center"><?php echo __('Modified'); ?></th>
                                <th class="text-center"><?php echo __('Id'); ?></th>
                                <th class="text-center"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($mucDoNhanThuc['DongTuTheHien'] as $dongTuTheHien):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $dongTuTheHien['level']; ?></td>
                                    <td class="text-center"><?php echo $dongTuTheHien['name']; ?></td>
                                    <td class="text-center"><?php echo $dongTuTheHien['english_name']; ?></td>
                                    <td class="text-center"><?php echo $dongTuTheHien['muc_do_nhan_thuc_id']; ?></td>
                                    <td class="text-center"><?php echo $dongTuTheHien['created']; ?></td>
                                    <td class="text-center"><?php echo $dongTuTheHien['modified']; ?></td>
                                    <td class="text-center"><?php echo $dongTuTheHien['id']; ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'dong_tu_the_hiens', 'action' => 'view', $dongTuTheHien['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'view')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'dong_tu_the_hiens', 'action' => 'edit', $dongTuTheHien['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'edit')); ?>
        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'dong_tu_the_hiens', 'action' => 'delete', $dongTuTheHien['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $dongTuTheHien['id'])); ?>
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

