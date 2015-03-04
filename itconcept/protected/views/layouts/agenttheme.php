<?php $AGENT = Tools::geDataAgent();?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?php echo ucfirst($this->Website->title); ?> - <?php echo ucfirst($this->Website->name); ?></title>

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
        <?php if(isset(Yii::app()->user->theme)){
        ?>
        <link class="theme-color-set" rel="stylesheet" href="<?php echo Yii::app()->user->theme;?>" />
        <?php }else{?>
        <link class="theme-color-set" rel="stylesheet" href="#" />
        <?php }?>
        <link rel="stylesheet" href="<?php echo $this->baseHref();?>/themes/greateast/css/myStyle.css">
        <link rel="stylesheet" href="<?php echo $this->baseHref();?>/assets/css/form.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
        <style>
        	#sidebar, #sidebar-alt, .sidebar-partial #sidebar, .sidebar-alt-partial #sidebar-alt{
        		/*opacity:0 !important;*/
        	}
        </style>
        <script>
        	$(function(){
        		$(".toggleMenu").click(function(){
        			
        		});
        		//.sidebar-partial #main-container
        	});
        </script>

    </head>
    <body>
       
        <div id="page-wrapper">
            
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
                </div>
            </div>
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
                <!-- Alternative Sidebar -->
                <div id="sidebar-alt">
                    <!-- Wrapper for scrolling functionality -->
                    <div class="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Chat -->
                            <!-- Chat demo functionality initialized in js/app.js -> chatUi() -->
                            <a href="page_ready_chat.html" class="sidebar-title">
                                <i class="gi gi-comments pull-right"></i> <strong>Chat</strong>UI
                            </a>
                            <!-- Chat Users -->
                            <ul class="chat-users clearfix">
                                <li>
                                    <a href="javascript:void(0)" class="chat-user-online">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar12.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="chat-user-online">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar15.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="chat-user-online">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar10.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="chat-user-online">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="chat-user-away">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar7.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="chat-user-away">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar9.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="chat-user-busy">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar16.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar1.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar3.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar13.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span></span>
                                        <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle">
                                    </a>
                                </li>
                            </ul>
                            <!-- END Chat Users -->

                            <!-- Chat Talk -->
                             
                            <!--  END Chat Talk -->
                            <!-- END Chat -->

                            <!-- Activity -->
                             
                             
                            <!-- END Activity -->

                            <!-- Messages -->
                             
                             
                            <!-- END Messages -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Alternative Sidebar -->

                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Wrapper for scrolling functionality -->
                    <div class="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Brand -->
                            <a href="<?php echo $this->baseUrlAgent();?>" class="sidebar-brand">
                                <strong><?php echo $this->Website->name;?></strong>
                            </a>
                            <!-- END Brand -->

                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix">
                                <div class="sidebar-user-avatar">
                                    <a href="page_ready_user_profile.html">
                                        <?php
										if(!empty($AGENT->avatar)){
                                        ?>
                                        	<img src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo $AGENT->avatar;?>" alt="avatar">
                                        <?php }else{ ?>
                                        	<img src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo Tools::getLogo()->logo;?>" alt="avatar">
                                        <?php } ?>
                                        
                                    	
                                    </a>
                                </div>
                                
                                <div class="sidebar-user-name" style="margin-top: 22px;"><?php echo Yii::app()->user->full_name;?></div>
                                 
                            </div>
                            <!-- END User Info -->

                            <!-- Theme Colors -->
                            <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
                            <ul class="sidebar-section sidebar-themes clearfix">
                            	<li>&nbsp;</li>
                                
                                <li class="">
                                    <a href="#" url="<?php echo $this->baseUrlAgent(TRUE);?>/config/settheme" class="themed-background-dark-default themed-border-default choose-theme" data-theme="default" data-toggle="tooltip" title="Default Blue"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrlAgent(TRUE);?>/config/settheme" class="themed-background-dark-night themed-border-night choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/night.css" data-toggle="tooltip" title="Night"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrlAgent(TRUE);?>/config/settheme" class="themed-background-dark-amethyst themed-border-amethyst choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrlAgent(TRUE);?>/config/settheme" class="themed-background-dark-modern themed-border-modern choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/modern.css" data-toggle="tooltip" title="Modern"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrlAgent(TRUE);?>/config/settheme" class="themed-background-dark-autumn themed-border-autumn choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrlAgent(TRUE);?>/config/settheme" class="themed-background-dark-flatie themed-border-flatie choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/flatie.css" data-toggle="tooltip" title="Flatie"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrlAgent(TRUE);?>/config/settheme" class="themed-background-dark-spring themed-border-spring choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/spring.css" data-toggle="tooltip" title="Spring"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrlAgent(TRUE);?>/config/settheme" class="themed-background-dark-fancy themed-border-fancy choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/fancy.css" data-toggle="tooltip" title="Fancy"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrlAgent(TRUE);?>/config/settheme" class="themed-background-dark-fire themed-border-fire choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
                                </li>
                                
                            </ul>
                            <!-- END Theme Colors -->

                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="<?php echo $this->baseUrlAgent();?>" class=" active"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->baseUrlAgent(TRUE);?>/contacts/admin" class="sidebar-nav-menu-x"><i class="gi gi-share_alt sidebar-nav-icon"></i>Contacts</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->baseUrlAgent(TRUE);?>/leads/admin" class="sidebar-nav-menu-x"><i class="gi gi-share_alt sidebar-nav-icon"></i>Leads</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->baseUrlAgent(TRUE);?>/clients/admin" class="sidebar-nav-menu-x"><i class="hi hi-list-alt sidebar-nav-icon"></i>Clients</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->baseUrlAgent(TRUE);?>/calendar" class="sidebar-nav-menu-x"><i class="gi gi-calendar sidebar-nav-icon"></i>Calendar</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->baseUrlAgent(TRUE);?>/emails/admin" class="sidebar-nav-menu-x"><i class="gi gi-envelope sidebar-nav-icon"></i>Email</a>
                                </li>
                                <!--
                                <li>
                                    <a href="#" class="sidebar-nav-menu-x"><i class="gi gi-calculator sidebar-nav-icon"></i>Drips</a>
                                </li>
                                -->
                                 
                            </ul>
                            <!-- END Sidebar Navigation -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <header class="navbar navbar-inverse">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a class="toggleMenu" href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Template Options -->
                            <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
                            <!--
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="gi gi-settings"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-options">
                                    <li class="dropdown-header text-center">Header Style</li>
                                    <li>
                                        <div class="btn-group btn-group-justified btn-group-sm">
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                                        </div>
                                    </li>
                                    <li class="dropdown-header text-center">Page Style</li>
                                    <li>
                                        <div class="btn-group btn-group-justified btn-group-sm">
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                                        </div>
                                    </li>
                                    <li class="dropdown-header text-center">Main Layout</li>
                                    <li>
                                        <button class="btn btn-sm btn-block btn-primary" id="options-header-top">Fixed Side/Header (Top)</button>
                                        <button class="btn btn-sm btn-block btn-primary" id="options-header-bottom">Fixed Side/Header (Bottom)</button>
                                    </li>
                                    <li class="dropdown-header text-center">Footer</li>
                                    <li>
                                        <div class="btn-group btn-group-justified btn-group-sm">
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-footer-static">Default</a>
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-footer-fixed">Fixed</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            -->
                            <!-- END Template Options -->
                        </ul>
                        <!-- END Left Header Navigation -->

                         

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if(!empty($AGENT->avatar)){?>
                                    	<img src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo $AGENT->avatar;?>" alt="avatar">
                                	<?php }else{ ?>
                                		<img src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo Tools::getLogo()->logo;?>" alt="avatar">
                                	<?php } ?> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                    <li class="dropdown-header text-center">Account</li>
                                     
                                     
                                    <li>
                                        <a href="<?php echo $this->baseUrlAgent(TRUE);?>/my-profile">
                                            <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        
                                        <a href="<?php echo $this->baseUrl().'/agent/login/logout';?>"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                    </li>
                                     
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
                    	<?php echo $content;?>
                    </div>	
                    <!-- END Page Content -->
					
                    <!-- Footer -->
                    <footer class="clearfix">
                        <!--<div class="pull-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                        </div>-->
                        <div class="pull-left">
                            <span id="year-copy"></span> &copy; <a href="#" target="_blank">Great Eastern</a>
                        </div>
                    </footer>
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                    </div>
                    <!-- END Modal Header -->

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                            <fieldset>
                                <legend>Vital Info</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Username</label>
                                    <div class="col-md-8">
                                        <p class="form-control-static">Admin</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
                                    <div class="col-md-8">
                                        <label class="switch switch-primary">
                                            <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Password Update</legend>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Modal Body -->
                </div>
            </div>
        </div>
        
        
        <!-- Modal-X -->
		<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">&nbsp;</h4>
		      </div>
		      <div class="modal-body">
		        <div class="view-x"></div>
		      </div>
		      <!--
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>-->
		    </div>
		  </div>
		</div>
        <!-- END-Modal-X -->
        
        <!-- END User Settings -->

        <!-- Remember to include excanvas for IE8 chart support -->
        <!--[if IE 8]><script src="<?php echo $this->baseUrl();?>/themes/greateast/js/helpers/excanvas.min.js"></script><![endif]-->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
		<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?php echo $this->baseHref();?>/themes/greateast/js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/plugins.js"></script>
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/app.js"></script>
        
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/myJs.js"></script>
            
		<!-- Load and execute javascript code used only in this page -->
        
        

        <!-- Load and execute javascript code used only in this page -->
        <!--<script src="js/pages/compCharts.js"></script>
        <script>$(function(){ CompCharts.init(); });</script>
        <!-- Load and execute javascript code used only in this page -->
        
        <?php 
        /*
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/pages/compCalendar.js"></script>
        <script>$(function(){ CompCalendar.init(); });</script>
		*/
        ?>
         <!--ckfinder-->
        <script src="<?php echo $this->baseHref();?>/ext/ckedifind/ckeditor/ckeditor.js"></script>
        <!--/ckfinder-->
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/highcharts.js"></script>
		<script src="<?php echo $this->baseHref();?>/themes/greateast/js/exporting.js"></script>
		<script>
			$(function () {
				$('#chart-pie-buyer').highcharts({
					credits: {
				      enabled: false
				    },
			        chart: {
			            plotBackgroundColor: null,
			            plotBorderWidth: 1,//null,
			            plotShadow: false
			        },
			        title: {
			            text: 'Top 10 Buyers, 2014'
			        },
			        tooltip: {
			            pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
			        },
			        plotOptions: {
			            pie: {
			                allowPointSelect: true,
			                cursor: 'pointer',
			                dataLabels: {
			                    enabled: true,
			                    format: '<b>{point.name}</b>: {point.percentage:.1f}',
			                    style: {
			                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
			                    }
			                }
			            }
			        },
			        series: [{
			            type: 'pie',
			            name: 'Products',
			            data: [
			                ['Ichigo',   45],
			                ['Nigo',       268],
			                {
			                    name: 'V3',
			                    y: 128,
			                    sliced: true,
			                    selected: true
			                },
			                ['Rider Man',    85],
			                 
			            ]
			        }]
			    });
			    $('#chart-pie').highcharts({
			    	credits: {
				      enabled: false
				    },
			        chart: {
			            plotBackgroundColor: null,
			            plotBorderWidth: 1,//null,
			            plotShadow: false
			        },
			        title: {
			            text: ''
			        },
			        tooltip: {
			            pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
			        },
			        plotOptions: {
			            pie: {
			                allowPointSelect: true,
			                cursor: 'pointer',
			                dataLabels: {
			                    enabled: true,
			                    format: '<b>{point.name}</b>: {point.percentage:.1f}',
			                    style: {
			                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
			                    }
			                }
			            }
			        },
			        series: [{
			            type: 'pie',
			            name: 'Products',
			            data: [
			                ['Retail',   45],
			                ['Boarding',       26],
			                {
			                    name: 'Day Care',
			                    y: 12,
			                    sliced: true,
			                    selected: true
			                },
			                ['Grooming',    8],
			                 
			            ]
			        }]
			    });
			    $('#chart-line').highcharts({
			    	credits: {
				      enabled: false
				    },
			        title: {
			            text: 'Monthly Sales Report',
			            x: -20 //center
			        },
			        subtitle: {
			            //text: 'Source: WorldClimate.com',
			            x: -20
			        },
			        xAxis: {
			            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
			                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			        },
			        yAxis: {
			            title: {
			                text: 'Chart'
			            },
			            plotLines: [{
			                value: 0,
			                width: 1,
			                color: '#808080'
			            }]
			        },
			        tooltip: {
			            valueSuffix: ''
			        },
			        legend: {
			            layout: 'vertical',
			            align: 'right',
			            verticalAlign: 'middle',
			            borderWidth: 0
			        },
			        series: [{
			            name: 'All',
			            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
			        }, {
			            name: 'Retail',
			            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
			        }, {
			            name: 'Boarding',
			            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
			        }, {
			            name: 'Day Care',
			            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
			        },{
			            name: 'Grooming',
			            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
			        }]
			    });
			});
		</script>
		<!--
		<script src="<?php echo $this->baseUrl();?>/themes/greateast/js/pages/index.js"></script>
        <script>$(function(){ Index.init(); });</script>-->
    </body>
</html>