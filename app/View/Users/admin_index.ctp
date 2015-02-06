<div class="breadscrumb">
    <span><?php echo __("UserManagement") ?></span>
    <?php echo $this->Html->image('admin/brk_center.png') ?>
    <span><?php echo __("UserList") ?></span>
</div>

<div id="center">
    <!--left start-->
    <?php echo $this->element('admin/left') ?>
    <!--left end-->
    
    <!--right start-->
    <div id="right_notfull">
    
    <?php echo $this->Session->flash(); ?>

    <div align="right">
        <input type = "button" class="btn_small_blue" onclick="location.href='<?php echo $this->Html->url('/admin/users/add'); ?>';" value="<?php echo __("NewUser") ?>" />
    </div>    
    
    <div class="height10"></div>

    <table class="tblList" width="100%">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('username'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('email'); ?></th>
                <th><?php echo $this->Paginator->sort('active'); ?></th>
                <th><?php echo $this->Paginator->sort('group'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                <td>
                    <center>
                    <?php
                        if($user['User']['id'] != SYSTEM_ID)
                        {
                            if($user['User']['active'])
                                echo $this->Form->postLink($this->Html->image("system/active.png",array('width' => 12, 'height' => 12)),array('action' => 'set_active',$user['User']['id'],0),array('escape'=>false));
                            else
                                echo $this->Form->postLink($this->Html->image("system/lock.png",array('width' => 12, 'height' => 12)),array('action' => 'set_active',$user['User']['id'],1),array('escape'=>false));
                        }
                    ?>
                    </center>
                </td>
                    <td>
                        <?php if(isset($groups[$user['User']['group']])) echo $groups[$user['User']['group']]; else echo '<font color = "#BA0000">'.__('UnknownGroup',true).'</font>'; ?>
                    </td>        
                    <td class="actions">
                        <center>
                        <?php if($user['User']['id'] != SYSTEM_ID) echo $this->Html->link($this->Html->image('system/reset.png',array('width'=>14,'height'=>14,'title'=>__('ResetPassword',true),'tooltip'=>__('ResetPassword',true))), array('action' => 'reset_password', $user['User']['id']),array('escape'=>false)); ?>
                        <?php echo $this->Html->link($this->Html->image('system/edit.png',array('width'=>14,'height'=>14,'title'=>__('Edit',true),'tooltip'=>__('Edit',true))), array('action' => 'edit', $user['User']['id']),array('escape'=>false)); ?>
                        <?php if($user['User']['id'] != SYSTEM_ID) echo $this->Form->postLink($this->Html->image('system/delete.png',array('width'=>14,'height'=>14,'title'=>__('Delete',true),'tooltip'=>__('Delete',true))), array('action' => 'delete', $user['User']['id']), array('escape'=>false), sprintf(__('MsgConfirmDelete', true), $user['User']['id']));?>
                        </center>
                    </td>
            </tr>
        <?php endforeach; ?>
        </table>
    
    <div class="pagination">
        <?php
            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
    
    </div>
    <!--right end-->
    <div class="cl"></div>
    <div class="height10"></div>
</div>