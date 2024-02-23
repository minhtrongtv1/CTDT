
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Department Supporter'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $departmentSupporter['DepartmentSupporter']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="DepartmentSupporters" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Supporter'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($departmentSupporter['Supporter']['name'], array('controller' => 'users', 'action' => 'view', $departmentSupporter['Supporter']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Department'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($departmentSupporter['Department']['title'], array('controller' => 'departments', 'action' => 'view', $departmentSupporter['Department']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Start Date'); ?></strong></td>
                            <td>
                                <?php echo h($departmentSupporter['DepartmentSupporter']['start_date']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('End Date'); ?></strong></td>
                            <td>
                                <?php echo h($departmentSupporter['DepartmentSupporter']['end_date']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($departmentSupporter['DepartmentSupporter']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($departmentSupporter['DepartmentSupporter']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($departmentSupporter['DepartmentSupporter']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

