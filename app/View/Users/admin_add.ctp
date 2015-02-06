<div class="breadscrumb">
    <span><?php echo __('UserManagement') ?></span>
    <?php echo $this->Html->image('admin/brk_center.png') ?>
    <span><?php echo $this->Html->link(__('UserList',true),array('action'=>'index')); ?></span> >     
    <span><?php echo __('UserAdd') ?></span>
</div>

<div id="center">
    <!--left start-->
    <?php echo $this->element('admin/left') ?>
    <!--left end-->
    
    <!--right start-->
    <div id="right_notfull">
    <?php echo $this->Session->flash(); ?>
    
    <?php echo $this->Form->create('User'); ?>
        <table width="100%" class="tblForm">
            <tr>
                <th width="30%"><?php echo __('Username') ?></th>
                <td width="70%"><?php echo $this->Form->input('username',array('size'=>50,'label'=>false,'div'=>false)); ?></td>
            </tr>
            <tr>
                <th><?php echo __('Password') ?></th>
                <td><?php echo $this->Form->input('password',array('size'=>50,'label'=>false,'div'=>false)); ?></td>
            </tr>
            <tr>
                <th><?php echo __('Name') ?></th>
                <td><?php echo $this->Form->input('name',array('size'=>50,'label'=>false,'div'=>false)); ?></td>
            </tr>
            <tr>
                <th><?php echo __('Email') ?></th>
                <td><?php echo $this->Form->input('email',array('size'=>50,'label'=>false,'div'=>false)); ?></td>
            </tr>
            <tr>
                <th><?php echo __('Group') ?></th>
                <td><?php echo $this->Form->input('group',array('label'=>false,'div'=>false)); ?></td>
            </tr>
            <tr>
                <th><?php echo __('Active') ?></th>
                <td><?php echo $this->Form->input('active',array('label'=>false,'div'=>false)); ?></td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <button type="submit" class="btn_small_blue"><?php echo __('Save') ?></button>
                    <button type = "button" class="btn_small_blue" onclick="location.href='<?php echo $this->Html->url('/admin/users/index'); ?>';"><?php echo __("Back") ?></button>
                </td>
            </tr>
        </table>        
    <?php echo $this->Form->end(); ?>
    
    </div>
    <!--right end-->
    
    <div class="cl"></div>
    <div class="height10"></div>
</div>