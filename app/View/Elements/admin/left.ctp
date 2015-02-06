<div id="left">
    <div class="left_top"><?php echo __('User') ?></div>
    <div class="content_left">
        <ul>
            <li><?php echo $this->Html->image('admin/icon_menu_left.png'); ?><?php echo $this->Html->link(__('Profile',true),array('controller'=>'users','action'=>'edit',$curUser['id'])); ?></li>
            <li><?php echo $this->Html->image('admin/icon_menu_left.png'); ?><?php echo $this->Html->link(__('ChangePassword',true),array('controller'=>'users','action'=>'profile_password')); ?></li>
            <li><?php echo $this->Html->image('admin/icon_menu_left.png'); ?><?php echo $this->Html->link(__('Logout',true),array('controller'=>'users','action'=>'logout','admin'=>false)); ?></li>
        </ul>
    </div>
</div>