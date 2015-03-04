<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>::<?php echo $this->Website->title;?>::</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo $this->baseHref();?>/themes/greateast/img/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo $this->baseHref();?>/themes/greateast/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php echo $this->baseHref();?>/themes/greateast/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?php echo $this->baseHref();?>/themes/greateast/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?php echo $this->baseHref();?>/themes/greateast/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?php echo $this->baseHref();?>/themes/greateast/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?php echo $this->baseHref();?>/themes/greateast/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?php echo $this->baseHref();?>/themes/greateast/img/icon152.png" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo $this->baseHref();?>/themes/greateast/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?php echo $this->baseHref();?>/themes/greateast/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo $this->baseHref();?>/themes/greateast/css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo $this->baseHref();?>/themes/greateast/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/vendor/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <!-- Login Background -->
        <div id="login-background">
            <!-- For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
            <?php
            $BG = Tools::getBgCompany();
			if(empty($BG)){
            ?>
            <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/headers/login_header.jpg" alt="Login Background" class="animation-pulseSlow">
        	<?php }else{ ?>
        	<img src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo $BG->background;?>" alt="Login Background" class="animation-pulseSlow">
			<?php } ?>
        </div>
        <!-- END Login Background -->

        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
            	<img src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo Tools::getLogo()->logo;?>">
                <h1>
                	<strong><?php echo $this->Website->name;?></strong>
                	<br>
                </h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <?php echo $content;?>
            <!-- END Login Block -->

            <!-- Footer -->
            <footer class="text-muted text-center">
                <small><span id="year-copy"></span> &copy; <a href="#" target="_blank">Great Eastern</a></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->

         

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
       <!-- 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
       -->
       <!-- 
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>
       -->

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <!--
        <script src="<?php echo $this->baseUrl();?>/themes/greateast/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo $this->baseUrl();?>/themes/greateast/js/plugins.js"></script>
        <script src="<?php echo $this->baseUrl();?>/themes/greateast/js/app.js"></script>
		-->
        <!-- Load and execute javascript code used only in this page -->
        
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
        
    </body>
</html>