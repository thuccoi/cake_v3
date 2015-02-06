<div class="header">
    <div class="fl"><?php echo $this->Html->image('admin/logo.png'); ?></div>
    <div class="fr" style="padding-top:45px;">
        <?php echo __("Welcome") ?>, <strong><?php echo $curUser['username'] ?></strong> [ <?php echo $this->Html->link(__('Logout',true),array('controller'=>'users','action'=>'logout','admin'=>0)); ?> ]
        <?php echo __("Last login") ?>: <strong><?php echo $curUser['login_last'] ?></strong>
    </div>
    <div class="cl"></div>
    <!-- menu start-->
    
    <div id="menu_nav">
        <ul>
            <?php if(isset($topMenu) && count($topMenu) > 0): ?>
            <?php foreach($topMenu as $item): ?>
            <?php if(empty($item['MainMenu']['Menu']['controller']) && count($item['SubMenu']) == 0) continue; ?>
                <li class="upp">
                    <a href="<?php 
                        if(!empty($item['MainMenu']['Menu']['controller']))
                        {
                            $controllerMain = $item['MainMenu']['Menu']['controller'];
                            $actionMain = str_replace('admin_','',$item['MainMenu']['Menu']['action']);
                            echo Router::url("../$controllerMain/$actionMain");
                        }                                                    
                        else 
                        {
                            echo "#";
                        }
                        ?>">
                        <p class="top_left"></p>
                        <p class="top_center"><?php echo __($item['MainMenu']['Menu']['name'],true) ?></p>
                        <p class="top_right"></p>
                        <div class="cl"></div>
                    </a>
                    <!-- Render Child { -->
                    <?php if(isset($item['SubMenu']) && count($item['SubMenu']) > 0): ?>
                    <ul class="linkchild" style="z-index:2;">                    
                        <?php foreach($item['SubMenu'] as $sub): ?>
                            <?php 
                                $controller = $sub['Menu']['controller'];
                                $action = str_replace('admin_','',$sub['Menu']['action']);
                             ?>
                            <li><a href="<?php echo Router::url("../$controller/$action") ?>"><p><?php echo __($sub['Menu']['name'],true); ?></p></a></li>
                        <?php endforeach; ?>                                        
                    </ul>
                    <?php endif; ?>
                    <!-- Render Child } -->
                </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <!-- menu end-->
</div>