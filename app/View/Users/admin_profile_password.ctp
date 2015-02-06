<div class="breadscrumb">
    <span><?php echo __('UserManagement') ?></span>
    <?php echo $this->Html->image('admin/brk_center.png') ?>
    <span><?php echo __('UserChangePassword') ?></span>
</div>

<div id="center">
    <!--left start-->
    <?php echo $this->element('admin/left') ?>
    <!--left end-->
    
    <!--right start-->
    <div id="right_notfull">
        <?php echo $this->Session->flash(); ?>

        <?php echo $this->Form->create('User'); ?>
            <?php echo $this->Form->input('id'); ?>
            
            <table width="100%" class="tblForm">
                <tr>
                    <th width="30%"><?php echo __('OldPassword') ?></th>
                    <td width="70%"><?php echo $this->Form->input('oldpassword',array('type'=>'password','size'=>50,'label'=>false,'div'=>false)) ?></td>
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
                        <button type="submit" class="btn_small_blue"><?php echo __('Change') ?></button>
                    </td>
                </tr>
            </table>
        <?php echo $this->Form->end(); ?>
        
        
                
        <!--right end-->
    </div>
    <div class="cl"></div>
    <div class="height10"></div>
</div>