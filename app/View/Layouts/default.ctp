<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo ('abc');?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css( array(
                    'bootstrap-theme.min',
                    'bootstrap.min',
                    'style'
                    ));
                echo $this->Html->script('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
	?>
</head>
<body>
    <div class="container">
        <?php echo $this->element('header'); ?>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('footer')?>
        <?php echo $scripts_for_layout; ?>
    </div>
</body>
</html>
