
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
	<?php echo $this->Html->charset(); ?>
        <title>
		<?php echo $this->fetch('title_for_layout'); ?>
        </title>
	<?php
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
                        
	?>
        <base href="http://localhost/404project/">
        <link href="ebook/css/style.css" rel="stylesheet" type="text/css" /><!-- All css -->
        <link href="ebook/css/bs.css" rel="stylesheet" type="text/css" /><!-- Bootstrap Css -->
        <link rel="stylesheet" type="text/css" href="ebook/css/main-slider.css" /><!-- Main Slider Css -->
        <!--[if lte IE 10]><link rel="stylesheet" type="text/css" href="css/customIE.css" /><![endif]-->
        <link href="ebook/css/font-awesome.css" rel="stylesheet" type="text/css" /><!-- Font Awesome Css -->
        <link href="ebook/css/font-awesome-ie7.css" rel="stylesheet" type="text/css" /><!-- Font Awesome iE7 Css -->
        <noscript>
        <link rel="stylesheet" type="text/css" href="ebook/css/noJS.css" />
        </noscript>
        <link rel="shortcut icon" href="ebook/ico/favicon.png">

    </head>
    <body>
        <?php echo $this->element("ebook_navbar_top"); ?>
        <div id="container">
            
            <div id="content">


            </div>

        </div>
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
    </body>
</html>
