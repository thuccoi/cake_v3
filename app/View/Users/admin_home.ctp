<div class="breadscrumb">
    <span><?php echo __('Dashbroad') ?></span>
    <?php echo $this->Html->image('admin/brk_center.png') ?>
</div>

<div id="center">
    <!--left start-->
    <?php echo $this->element('admin/left') ?>
    <!--left end-->
    
    <!--right start-->
    <div id="right_notfull">
        <?php echo $this->Session->flash(); ?>

        <table width="100%" class="tblForm">
            <tr>
                <th width="30%"><?php echo __("Username") ?></th>
                <td><p><?php echo $curUser['username'] ?></p></td>
            </tr>
            <tr>
                <th width="30%"><?php echo __("Email") ?></th>
                <td><p><?php echo $curUser['email'] ?></p></td>
            </tr>
            <tr>
                <th width="30%"><?php echo __("Group") ?></th>
                <td><p><?php echo $group[$curUser['group']] ?></p></td>
            </tr>
            <tr>
                <th width="30%"><?php echo __("LoginCount") ?></th>
                <td><p><?php echo $curUser['login_count'] ?></p></td>
            </tr>
            <tr>
                <th width="30%"><?php echo __("LastLogin") ?></th>
                <td><p><?php echo $curUser['login_last'] ?></p></td>
            </tr>                
            <tr>
                <th width="25%"><?php echo __("CreatedDate") ?></th>
                <td><p><?php echo $curUser['created'] ?></p></td>
            </tr>
        </table>
        
        
        
        <!--right end-->
    </div>
    
    <div class="cl"></div>
    <div class="height10"></div>
</div>