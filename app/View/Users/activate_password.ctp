<?php
/*
  This file is part of UserMgmt.

  Author: Chetan Varshney (http://ektasoftwares.com)

  UserMgmt is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  UserMgmt is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 */
?>
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1">Đổi mật khẩu</span>

            </div>
            <div class="umhr"></div>
            <div class="um_box_mid_content_mid" id="login">
                <div class="um_box_mid_content_mid_left">
                    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'activatePassword'))); ?>
                    <div>
                        <div class="umstyle3">Mật khẩu mới</div>
                        <div class="umstyle4"><?php echo $this->Form->input("password", array("type" => "password", 'label' => false, 'div' => false, 'class' => "umstyle5")) ?></div>
                        <div style="clear:both"></div>
                    </div>
                    <div>
                        <div class="umstyle3">Nhập lại</div>
                        <div class="umstyle4"><?php echo $this->Form->input("cpassword", array("type" => "password", 'label' => false, 'div' => false, 'class' => "umstyle5")) ?></div>
                        <div style="clear:both"></div>
                    </div>
                    <div>
                        <div class="umstyle3"></div>
                        <div class="umstyle4">
                            <?php
                            if (!isset($ident)) {
                                $ident = '';
                            }
                            if (!isset($activate)) {
                                $activate = '';
                            }
                            ?>
                            <?php echo $this->Form->hidden('ident', array('value' => $ident)) ?>
                            <?php echo $this->Form->hidden('activate', array('value' => $activate)) ?>
                            <?php echo $this->Form->Submit(__('Reset')); ?><?php echo $this->Form->end('Thực hiện'); ?></div>
                        <div style="clear:both"></div>
                    </div>

                </div>
                <div class="um_box_mid_content_mid_right" align="right"></div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
    <div class="um_box_down"></div>
</div>
<script>
    document.getElementById("UserEmail").focus();
</script>