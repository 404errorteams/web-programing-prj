<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

        echo $this->Html->script(ROOT_URL.'jquery/jquery-1.8.1.min.js');
        
        echo $this->Html->css(ROOT_URL.'jquery/bootstrap/css/bootstrap.css');
        echo $this->Html->script(ROOT_URL.'jquery/bootstrap/js/bootstrap.js');

        echo $this->Html->css(ROOT_URL.'jquery/ui-lightness/jquery-ui-1.9.2.custom.min.css?'.(DEBUG_NO_CACHE?time():'0'));
        echo $this->Html->script(ROOT_URL.'jquery/jquery-ui-1.9.2.custom.min.js?'.(DEBUG_NO_CACHE?time():'0'));
        
		echo $this->Html->script(ROOT_URL.'jquery/jquery-ui-timepicker-addon.js');
        echo $this->Html->script(ROOT_URL.'js/lpplugin.js');        

        echo $this->Html->css(ROOT_URL.'css/admin.css');
        
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <base href="<?php echo ROOT_URL; ?>">
    <style>
    body {
        padding-top: 55px; /* 45px to make the container go all the way to the bottom of the topbar */
    }
    @media screen and (max-width:900px)
    {
        #aaa{
            display: none;
        }
    }
    </style>
</head>
    <body style="background: #003399">
    <div class="container" id="container" >
        <?php // -- BEGIN: Page header ?>
		<div id="header">
		</div>
        <?php // -- END: Page header ?>
        
        <?php // -- BEGIN: Page content ?>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
        <?php // -- END: Page content ?>
        
        <?php // -- BEGIN: Page footer ?>
		<div id="footer">
            <center>
			Copyright &copy; <?php echo date('Y'); ?>&nbsp;<a href="#" target="_blank">404Ebook</a>
            </center>
        </div>
        <?php // -- END: Page footer ?>
	</div>	
</body>
</html>
