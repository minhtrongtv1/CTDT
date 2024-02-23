
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Supporting Request'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $supportingRequest['SupportingRequest']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="SupportingRequests" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Title'); ?></strong></td>
                            <td>
                                <?php echo h($supportingRequest['SupportingRequest']['title']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
                            <td>
                                <?php echo h($supportingRequest['SupportingRequest']['description']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Requester'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($supportingRequest['Requester']['name'], array('controller' => 'users', 'action' => 'view', $supportingRequest['Requester']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Requested Time'); ?></strong></td>
                            <td>
                                <?php echo h($supportingRequest['SupportingRequest']['requested_time']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Status'); ?></strong></td>
                            <td>
                                <?php echo h($supportingRequest['SupportingRequest']['status']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Supporter'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($supportingRequest['Supporter']['name'], array('controller' => 'users', 'action' => 'view', $supportingRequest['Supporter']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Responsing'); ?></strong></td>
                            <td>
                                <?php echo h($supportingRequest['SupportingRequest']['responsing']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Responded Time'); ?></strong></td>
                            <td>
                                <?php echo h($supportingRequest['SupportingRequest']['responded_time']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($supportingRequest['SupportingRequest']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($supportingRequest['SupportingRequest']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($supportingRequest['SupportingRequest']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

