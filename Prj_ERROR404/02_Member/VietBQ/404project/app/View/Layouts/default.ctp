
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
	<?php echo $this->Html->charset(); ?>
        <title>
		<?php echo $title_for_layout; ?>
        </title>
	<?php
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
                        
	?>
        <base href="http://localhost/404project/">
        <?php 
            echo $this->Html->css(ROOT_URL.'app/webroot/jquery/bootstrap/css/bootstrap.min2.css');
            echo $this->Html->css(ROOT_URL.'app/webroot/jquery/ui-lightness/jquery-ui-1.9.2.custom.min.css?'.(DEBUG_NO_CACHE?time():'0'));
        ?>
        <link href="ebook/css/style.css" rel="stylesheet" type="text/css" /><!-- All css -->
        <link href="ebook/css/bs.css" rel="stylesheet" type="text/css" /><!-- Bootstrap Css -->
        <link rel="stylesheet" type="text/css" href="ebook/css/main-slider.css" /><!-- Main Slider Css -->
        <!--[if lte IE 10]><link rel="stylesheet" type="text/css" href="css/customIE.css" /><![endif]-->
        <link href="ebook/css/font-awesome.css" rel="stylesheet" type="text/css" /><!-- Font Awesome Css -->
        <link href="ebook/css/font-awesome-ie7.css" rel="stylesheet" type="text/css" /><!-- Font Awesome iE7 Css -->
        <noscript>
        <link rel="stylesheet" type="text/css" href="ebook/css/noJS.css" />
        </noscript>
        <link rel="shortcut icon" href="img/book.ico">

    </head>
    <body>
        <?php echo $this->element("ebook_navbar_top"); ?>
        <div id="container">

            <div id="content">

          <?php echo $this->fetch('content'); ?>
            </div>

        </div>
        <?php echo $this->element("ebook_footer"); ?>
        <script type="text/javascript" src="ebook/js/lib.js"></script><!-- lib Js -->
        <script type="text/javascript" src="ebook/js/modernizr.js"></script><!-- Modernizr -->
        <script type="text/javascript" src="ebook/js/easing.js"></script><!-- Easing js -->
        <script type="text/javascript" src="ebook/js/bs.js"></script><!-- Bootstrap -->
        <script type="text/javascript" src="ebook/js/bxslider.js"></script><!-- BX Slider -->
        <script type="text/javascript" src="ebook/js/input-clear.js"></script><!-- Input Clear -->
        <script src="ebook/js/range-slider.js"></script><!-- Range Slider -->
        <script src="ebook/js/jquery.zoom.js"></script><!-- Zoom Effect -->
        <script type="text/javascript" src="ebook/js/bookblock.js"></script><!-- Flip Slider -->
        <script type="text/javascript" src="ebook/js/custom.js"></script><!-- Custom js -->
        <script type="text/javascript" src="ebook/js/social.js"></script><!-- Social Icons -->
        <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script><!-- Social Icons -->
        <script type="text/javascript" src="js/custom.js"></script><!-- Social Icons -->

    </body>
</html>
