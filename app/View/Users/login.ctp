
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo __('Login') ?></title>
<?php echo $this->Html->css('login.css'); ?>
</head>
<body>
<div class="wrap">
    <div id="content">
        <div id="main">
            <div class="full_w">
            
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('User'); ?>
                    <label for="login"><?php echo __("Username") ?>:</label>
                    <?php echo $this->Form->input('username',array('label'=>'','div'=>'','size'=>30,'class'=>'text'));?>
                    <label for="pass"><?php echo __("Password") ?>:</label>
                    <?php echo $this->Form->input('password',array('label'=>'','div'=>'','size'=>30,'class'=>'text'));?>
                    <label for="rem" style="display: inline;"><?php echo __("Remember") ?></label>
                    <input type="checkbox" name="data[User][remember]" />
                    <div class="sep"></div>
                    <button type="submit" class="ok"><?php echo __("Login") ?></button>
                <?php echo $this->Form->end(); ?>
                
            </div>
            <div class="footer"></div>
        </div>
    </div>
</div>

</body>
</html>
