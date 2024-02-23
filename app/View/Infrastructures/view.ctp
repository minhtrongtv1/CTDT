
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Infrastructure'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $infrastructure['Infrastructure']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Infrastructures" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Code'); ?></strong></td>
                            <td>
                                <?php echo h($infrastructure['Infrastructure']['code']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Device'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($infrastructure['Device']['name'], array('controller' => 'devices', 'action' => 'view', $infrastructure['Device']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Room'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($infrastructure['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $infrastructure['Room']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Curriculumn'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($infrastructure['Curriculumn']['name_vn'], array('controller' => 'curriculumns', 'action' => 'view', $infrastructure['Curriculumn']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($infrastructure['Infrastructure']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($infrastructure['Infrastructure']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($infrastructure['Infrastructure']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

