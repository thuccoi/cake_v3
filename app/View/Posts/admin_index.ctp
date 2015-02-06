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
        <input type = "button" class="btn_small_blue" onclick="location.href='<?php echo $this->Html->url('/admin/posts/add'); ?>';" value="<?php echo __("Add post") ?>" />
    </div>    
    
    <div class="height10"></div>

    <table class="tblList" width="100%">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
                 <th><?php echo $this->Paginator->sort('created'); ?></th>
        </tr>
        <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Post']['created']; ?>
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