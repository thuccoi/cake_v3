<div class="breadscrumb">
    <span><?php echo __('UserManagement') ?></span>
    <?php echo $this->Html->image('admin/brk_center.png') ?>
    <span><?php echo __('UserResetPassword') ?></span>
</div>

<div id="center">
    <!--left start-->
    <?php echo $this->element('admin/left') ?>
    <!--left end-->
    
    <!--right start-->
    <div id="right_notfull">
        <?php echo $this->Session->flash(); ?>

        <!-- Table Form { -->
        <?php echo $this->Form->create('User'); ?>
            <?php echo $this->Form->input('id'); ?>
            <input type="hidden" name = "data[User][username]" value="<?php echo $this->request->data['User']['username'] ?>" />
            
            <table width="100%" class="tblForm">
                <tr>
                    <th width="30%"><?php echo __('Username') ?></th>
                    <td width="70%"><?php echo $this->Form->input('username',array('size'=>50,'disabled'=>'disabled','label'=>false,'div'=>false)) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('NewPassword') ?></th>
                    <td><?php echo $this->Form->input('newpassword',array('type'=>'password','size'=>50,'label'=>false,'div'=>false)) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('ConfirmPassword') ?></th>
                    <td><?php echo $this->Form->input('confirmpassword',array('type'=>'password','size'=>50,'label'=>false,'div'=>false)) ?></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button type="submit" class="btn_small_blue"><?php echo __('Reset') ?></button>
                        <button type = "button" class="btn_small_blue" onclick="location.href='<?php echo $this->Html->url('/admin/users/index'); ?>';"><?php echo __("Cancel") ?></button>
                    </td>
                </tr>
            </table>
        <?php echo $this->Form->end(); ?>
        <!-- Table Form } -->
    </div>
    <!--right end-->
    <div class="cl"></div>
    <div class="height10"></div>
</div>