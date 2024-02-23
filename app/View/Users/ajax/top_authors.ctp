<table id="ctl00_ContentPlaceHolder_SubMenu_DataList1" cellspacing="0" border="0" style="border-collapse:collapse;">
    <tbody><?php
        $stt = 1;
        
        foreach ($authors as $user):
            
            ?>
            <tr>
                <td>
                    <div class="author_box_1">
                        <div class="author_1">
                            <?php 
                            $avatar="no-image.png";
                            if(!empty($user['User']['avatar'])){
                                $avatar='/files/user/avatar/'.$user['User']['avatar_path'].'/'.$user['User']['avatar'];
                            }
                            echo $this->Html->image($avatar, array('style="border-width:0px;"')); ?>
                            <div class="info">
                                <a id="ctl00_ContentPlaceHolder_SubMenu_DataList1_ctl00_HyperLink1" ><?php echo $user['User']['name'] ?></a>
                                <br />
                                <span id="ctl00_ContentPlaceHolder_SubMenu_DataList1_ctl00_lblDegree"><?php echo $user['HocVi']['name']?></span>
                                <br />
                                <span id="ctl00_ContentPlaceHolder_SubMenu_DataList1_ctl00_lblCV" ><?php echo $user['User']['paper_count'] ?> bài báo,  <?php echo $user['User']['project_count'] ?> đề tài</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

