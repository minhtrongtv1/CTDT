
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo __('Message'); ?></h3>
                <div class="box-tools pull-right">
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $message['Message']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table id="Messages" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Title'); ?></strong></td>
                            <td>
                                <?php echo h($message['Message']['title']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Content'); ?></strong></td>
                            <td>
                                <?php echo h($message['Message']['content']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Sender'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($message['Sender']['name'], array('controller' => 'users', 'action' => 'view', $message['Sender']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($message['Message']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($message['Message']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                            <td>
                                <?php echo h($message['Message']['id']); ?>
                                &nbsp;
                            </td>
                        </tr>                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Người nhận</h3>
            </div>
            <?php if (!empty($message['Recipient'])): ?>

                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                

                                <th class="text-center"><?php echo __('Name'); ?></th>
                                <th class="text-center"><?php echo __('Username'); ?></th>
                                <th class="text-center"><?php echo __('Email'); ?></th>
                                <th class="text-center"><?php echo __('Phone Number'); ?></th>
                                <th class="text-center"><?php echo __('Avatar'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($message['Recipient'] as $recipient):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $recipient['name']; ?></td>
                                    <td class="text-center"><?php echo $recipient['username']; ?></td>
                                    <td class="text-center"><?php echo $recipient['email']; ?></td>
                                    <td class="text-center"><?php echo $recipient['so_dien_thoai']; ?></td>
                                    <td class="text-center"><?php echo $recipient['avatar']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>



        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

