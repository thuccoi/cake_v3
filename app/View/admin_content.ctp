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

        <!-- Table List { -->
        <div class="height10"></div>
        <table width="100%" class="tblList">
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        
        <div class="pagination">
            <?php
                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
            ?>
        </div>
        <!-- Table List } -->
        
        
        <!-- Table Form { -->
        <table width="100%" class="tblForm">
            <tr>
                <th width="30%"><?php echo __('') ?></th>
                <td width="70%"></td>
            </tr>
            <tr>
                <th><?php echo __('') ?></th>
                <td></td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <button type="submit" class="btn_small_blue"><?php echo __('Save') ?></button>
                    <button type = "button" class="btn_small_blue" onclick="location.href='<?php echo $this->Html->url('/admin/users/index'); ?>';"><?php echo __("Back") ?></button>
                </td>
            </tr>
        </table>
        <!-- Table Form } -->
    </div>
    <!--right end-->
    <div class="cl"></div>
    <div class="height10"></div>
</div>



Additionnal

<!--Select section start-->
<div class="select_section">
Sort by
<select style="width:120px;">
    <option>222</option>
</select>
</div>
<!--Select section end-->


<!--button start-->
<input type="submit" class="btn_small_blue" value="Small" />
<input type="submit" class="btn_medium_blue" value="Medium" />
<input type="submit" class="btn_large_blue" value="Large" />
<br />
<input type="submit" class="btn_small_pink" value="Small" />
<input type="submit" class="btn_medium_pink" value="Medium" />
<input type="submit" class="btn_large_pink" value="Large" />
<br />
<input type="submit" class="btn_small_grey" value="Small" />
<input type="submit" class="btn_medium_grey" value="Medium" />
<input type="submit" class="btn_large_grey" value="Large" />
<!--button end-->


