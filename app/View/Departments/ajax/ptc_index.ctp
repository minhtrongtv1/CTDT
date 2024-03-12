<?php
$this->Paginator->options(array(
    'url' => array('ptc' => true, 'action' => 'ptc_index'),
    'update' => '#datarows',
    'evalScripts' => true,
    'data' => http_build_query($this->request->data),
    'method' => 'POST'
));
?>

                <table class="table table-bordered table-hover has-checked-item">
                    <thead>

                        <tr class="headings">
                            <th>#</th>


                            <th class="column-title"><?php echo $this->Paginator->sort('code','Mã đơn vị'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('title','Tên đơn vị'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('lms_id'); ?></th>


                            <th class="column-title"><?php echo $this->Paginator->sort('id'); ?></th>

                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php $stt = (($this->Paginator->params['paging']['Department']['page'] - 1) * $this->Paginator->params['paging']['Department']['limit']) + 1; ?>
                        <?php foreach ($departments as $department): ?>
                            <tr id="row-<?php echo $department['Department']['id'] ?>">
                                <td><?php echo $stt++; ?></td>

                                <td class=""><?php echo h($department['Department']['code']); ?>&nbsp;</td>
                                <td class=""><?php echo h($department['Department']['title']); ?>&nbsp;</td>
                                <td class=""><?php echo h($department['Department']['lms_id']); ?>&nbsp;</td>
                                <td class=""><?php echo h($department['Department']['id']); ?>&nbsp;</td>
                                
                        <?php endforeach; ?>           
                   
                    </tbody>
                    
                </table>
                <?php echo $this->element("pagination"); ?>  
            
<?php
echo $this->Js->writeBuffer();
