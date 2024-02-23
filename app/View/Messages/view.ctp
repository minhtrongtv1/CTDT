
<div class="row">
    <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Thông báo</h3>

            </div>

            <div class="box-body table-responsive">
                <table id="Messages" class="table table-bordered table-striped">
                    <tbody>
                        <tr>		
                            <td><strong>Tiêu đề</strong></td>
                            <td>
                                <?php echo ($message['Message']['title']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		<td><strong>Nội dung</strong></td>
                            <td>
                                <?php echo h($message['Message']['content']); ?>
                                &nbsp;
                            </td>
                        </tr>

                        <tr>		<td><strong>Người gửi</strong></td>
                            <td>
                                <?php echo $this->Html->link($message['Sender']['name'], array('controller' => 'users', 'action' => 'view', $message['Sender']['id']), array('class' => '')); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		<td><strong>Ngày gửi</strong></td>
                            <td>
                                <?php echo h($message['Message']['created']); ?>
                                &nbsp;
                            </td>
                        </tr>




                    </tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->

