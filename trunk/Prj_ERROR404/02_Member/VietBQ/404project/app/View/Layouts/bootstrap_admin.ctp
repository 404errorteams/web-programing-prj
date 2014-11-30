<!DOCTYPE html>
<html lang="ja">
    <head>
    	<?php echo $this->Html->charset(); ?>
    	<title>
    		<?php echo $title_for_layout; ?>
    	</title>
    	<?php
    		echo $this->Html->meta('icon');
          //  echo $this->Html->css(ROOT_URL.'app/webroot/jquery/bootstrap/css/bootstrap.css');
  
            echo $this->Html->css(ROOT_URL.'app/webroot/jquery/bootstrap/css/bootstrap.min2.css');
            echo $this->Html->css(ROOT_URL.'app/webroot/css/admin_1.css');
            echo $this->Html->css(ROOT_URL.'app/webroot/css/login.css');
            echo $this->Html->css(ROOT_URL.'app/webroot/jquery/ui-lightness/jquery-ui-1.9.2.custom.min.css?'.(DEBUG_NO_CACHE?time():'0'));
            
            echo $this->Html->script(ROOT_URL.'app/webroot/jquery/jquery-1.10.2.min.js');
            echo $this->Html->script(ROOT_URL.'app/webroot/jquery/jquery.validate.min.js');
            echo $this->Html->script(ROOT_URL.'app/webroot/jquery/bootstrap/js/bootstrap.js');
            
            echo $this->Html->script(ROOT_URL.'app/webroot/jquery/jquery-ui-1.9.2.custom.min.js?'.(DEBUG_NO_CACHE?time():'0'));
    		echo $this->Html->script(ROOT_URL.'app/webroot/jquery/jquery-ui-timepicker-addon.js');
            echo $this->Html->script(ROOT_URL.'app/webroot/js/lpplugin.js'); 
            echo $this->Html->script(ROOT_URL.'app/webroot/js/login.js'); 
            
    		echo $this->fetch('meta');
    		echo $this->fetch('css');
    		echo $this->fetch('script');
    	?>
        <base href="<?php echo ROOT_URL; ?>">
        <style>
        body {
            padding-top: 55px; /* 45px to make the container go all the way to the bottom of the topbar */
        }
        </style>
    </head>
    <body >
        <?php // -- BEGIN: Page header ?>
    	<?php echo $this->element("admin_navbar_top"); ?>
    	<?php // -- END: Page header ?>
        <br>
    	<?php // -- BEGIN: Page content ?>
     
    	<?php // NOT LOGGED IN
    		$session_user = $this->Session->read(SESSION_USER_ADMIN);
    		if (empty($session_user)){ ?>
    		<div class="container" >
    			<div class="well" style="margin-left: auto; border: none; margin-right: auto ; width: 240px;">
    				<?php echo $this->fetch('content'); ?>
    			</div>
    		</div>
    	<?php } else { // LOGGED IN ?>
    		<div class="container-fluid" id="container">
    			<div class="row-fluid">
    				<div class="span2" id = 'nav_menu_left'>
    					<?php echo $this->element("admin_nav_menu"); ?>
    				</div>
    				
    				<div id="content-inner" class="span10">
    					<?php echo $this->fetch('content'); ?>
    				</div>
    			</div>
    		</div>
    	<?php } ?>	
    	<?php // -- END: Page content ?>
        <!---- BEGIN: #footer -->
        
      
        <footer class="footer">
            <center>
    			Copyright &copy; <?php echo date('Y'); ?>&nbsp;<a href="#" target="_blank">404Ebook</a>
            </center>
        </footer>
        <!---- END: #footer -->
    </body>
</html>
