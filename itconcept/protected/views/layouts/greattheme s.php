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
		
		<!--fileuplaod-js-->
		<!-- Generic page styles -->
		<link rel="stylesheet" href="<?php echo $this->baseHref();?>/ext/j-file-upload/css/style.css">
		<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
		<link rel="stylesheet" href="<?php echo $this->baseHref();?>/ext/j-file-upload/css/jquery.fileupload.css">
		<!--endfileupload-->
		
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
    <body style="padding-top: 0px;">
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
                </div>
            </div>
            <!-- END Preloader -->

            <!-- Page Container -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available #page-container classes:

                '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

                'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
                'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)

                'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
                'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

                'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

                'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

                'style-alt'                                     for an alternative main style (without it: the default style)
                'footer-fixed'                                  for a fixed footer (without it: a static footer)

                'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar
            -->
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
                            <div class="chat-talk display-none">
                                <!-- Chat Info -->
                                <div class="chat-talk-info sidebar-section">
                                    <button id="chat-talk-close-btn" class="btn btn-xs btn-default pull-right">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <img src="<?php echo $this->baseUrl();?>/themes/greateast/img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle pull-left">
                                    <strong>John</strong> Doe
                                </div>
                                <!-- END Chat Info -->

                                <!-- Chat Messages -->
                                <ul class="chat-talk-messages">
                                    <li class="text-center"><small>Yesterday, 18:35</small></li>
                                    <li class="chat-talk-msg animation-slideRight">Hey admin?</li>
                                    <li class="chat-talk-msg animation-slideRight">How are you?</li>
                                    <li class="text-center"><small>Today, 7:10</small></li>
                                    <li class="chat-talk-msg chat-talk-msg-highlight themed-border animation-slideLeft">I'm fine, thanks!</li>
                                </ul>
                                <!-- END Chat Messages -->

                                <!-- Chat Input -->
                                <form action="<?php echo $this->baseUrl();?>" method="post" id="sidebar-chat-form" class="chat-form">
                                    <input type="text" id="sidebar-chat-message" name="sidebar-chat-message" class="form-control form-control-borderless" placeholder="Type a message..">
                                </form>
                                <!-- END Chat Input -->
                            </div>
                            <!--  END Chat Talk -->
                            <!-- END Chat -->

                            <!-- Activity -->
                            <a href="javascript:void(0)" class="sidebar-title">
                                <i class="fa fa-globe pull-right"></i> <strong>Activity</strong>UI
                            </a>
                            <div class="sidebar-section">
                                <div class="alert alert-danger alert-alt">
                                    <small>just now</small><br>
                                    <i class="fa fa-thumbs-up fa-fw"></i> Upgraded to Pro plan
                                </div>
                                <div class="alert alert-info alert-alt">
                                    <small>2 hours ago</small><br>
                                    <i class="gi gi-coins fa-fw"></i> You had a new sale!
                                </div>
                                <div class="alert alert-success alert-alt">
                                    <small>3 hours ago</small><br>
                                    <i class="fa fa-plus fa-fw"></i> <a href="page_ready_user_profile.html"><strong>John Doe</strong></a> would like to become friends!<br>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Accept</a>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Ignore</a>
                                </div>
                                <div class="alert alert-warning alert-alt">
                                    <small>2 days ago</small><br>
                                    Running low on space<br><strong>18GB in use</strong> 2GB left<br>
                                    <a href="page_ready_pricing_tables.html" class="btn btn-xs btn-primary"><i class="fa fa-arrow-up"></i> Upgrade Plan</a>
                                </div>
                            </div>
                            <!-- END Activity -->

                            <!-- Messages -->
                            <a href="page_ready_inbox.html" class="sidebar-title">
                                <i class="fa fa-envelope pull-right"></i> <strong>Messages</strong>UI (5)
                            </a>
                            <div class="sidebar-section">
                                <div class="alert alert-alt">
                                    Debra Stanley<small class="pull-right">just now</small><br>
                                    <a href="page_ready_inbox_message.html"><strong>New Follower</strong></a>
                                </div>
                                <div class="alert alert-alt">
                                    Sarah Cole<small class="pull-right">2 min ago</small><br>
                                    <a href="page_ready_inbox_message.html"><strong>Your subscription was updated</strong></a>
                                </div>
                                <div class="alert alert-alt">
                                    Bryan Porter<small class="pull-right">10 min ago</small><br>
                                    <a href="page_ready_inbox_message.html"><strong>A great opportunity</strong></a>
                                </div>
                                <div class="alert alert-alt">
                                    Jose Duncan<small class="pull-right">30 min ago</small><br>
                                    <a href="page_ready_inbox_message.html"><strong>Account Activation</strong></a>
                                </div>
                                <div class="alert alert-alt">
                                    Henry Ellis<small class="pull-right">40 min ago</small><br>
                                    <a href="page_ready_inbox_message.html"><strong>You reached 10.000 Followers!</strong></a>
                                </div>
                            </div>
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
                            <a href="<?php echo $this->baseUrl();?>" class="sidebar-brand">
                                <strong><?php echo $this->Website->name;?></strong>
                            </a>
                            <!-- END Brand -->

                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix">
                                <div class="sidebar-user-avatar">
                                    <a href="#">
                                        <img src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo Tools::getLogo()->logo;?>" alt="Your Avatar">
                                    </a>
                                </div>
                                <div class="sidebar-user-name" style="margin-top: 22px;"><?php echo Yii::app()->user->company_name;?></div>
                                 
                            </div>
                            <!-- END User Info -->

                            <!-- Theme Colors -->
                            <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
                            <ul class="sidebar-section sidebar-themes clearfix">
                            	<li>&nbsp;</li>
                                
                                <li class="">
                                    <a href="#" url="<?php echo $this->baseUrl();?>/config/settheme" class="themed-background-dark-default themed-border-default choose-theme" data-theme="default" data-toggle="tooltip" title="Default Blue"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrl();?>/config/settheme" class="themed-background-dark-night themed-border-night choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/night.css" data-toggle="tooltip" title="Night"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrl();?>/config/settheme" class="themed-background-dark-amethyst themed-border-amethyst choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrl();?>/config/settheme" class="themed-background-dark-modern themed-border-modern choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/modern.css" data-toggle="tooltip" title="Modern"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrl();?>/config/settheme" class="themed-background-dark-autumn themed-border-autumn choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrl();?>/config/settheme" class="themed-background-dark-flatie themed-border-flatie choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/flatie.css" data-toggle="tooltip" title="Flatie"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrl();?>/config/settheme" class="themed-background-dark-spring themed-border-spring choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/spring.css" data-toggle="tooltip" title="Spring"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrl();?>/config/settheme" class="themed-background-dark-fancy themed-border-fancy choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/fancy.css" data-toggle="tooltip" title="Fancy"></a>
                                </li>
                                <li>
                                    <a href="#" url="<?php echo $this->baseUrl();?>/config/settheme" class="themed-background-dark-fire themed-border-fire choose-theme" data-theme="<?php echo $this->baseHref();?>/themes/greateast/css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
                                </li>
                                
                            </ul>
                            <!-- END Theme Colors -->

                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="<?php echo $this->baseUrl();?>/dashboard" class=" active"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
                                </li>
                                 
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="gi gi-charts sidebar-nav-icon"></i>Product Management</a>
                                    <ul>
                                    	<li>
                                    		<a href="<?php echo $this->baseUrl();?>/products/admin">Products</a>
                                    	</li>
                                    	<li>
                                    		<a href="<?php echo $this->baseUrl();?>/leads/admin">Leads</a>
                                    	</li>
                                    	<li>
                                    		<a href="<?php echo $this->baseUrl();?>/status/admin">Status</a>
                                    	</li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo $this->baseUrl();?>/agents/admin" class="sidebar-nav-menu-x"><i class="gi gi-charts sidebar-nav-icon"></i>Agents</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->baseUrl();?>/config" class="sidebar-nav-menu-x"><i class="gi gi-charts sidebar-nav-icon"></i>General Configuration</a>
                                    <!--<ul>
                                    	<li>
                                    		<a href="#">Update Company</a>
                                    	</li>
                                    	<li>
                                    		<a href="#">Leads</a>
                                    	</li>
                                    </ul>-->
                                </li>
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
                    <!-- Header -->
                    <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <!--<header class="navbar navbar-default">-->
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
                            <!-- Alternative Sidebar Toggle Button -->
                            <!--
                            <li>
                                
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');">
                                     
                                    <span class="label label-primary label-indicator animation-floating">4</span>
                                </a>
                            </li>
                            -->
                            <!-- END Alternative Sidebar Toggle Button -->

                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo Tools::getLogo()->logo;?>" alt="avatar"> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                    <li class="dropdown-header text-center">Account</li>
                                     
                                     
                                    <li>
                                        <a href="<?php echo $this->baseUrl();?>/config/changepassword">
                                            <i class="fa fa-user fa-fw pull-right"></i>
                                            Change Password
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo $this->baseUrl();?>/login/logout"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
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
                        <div class="pull-right">
                        	&nbsp;
                            <!--Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>-->
                        </div>
                        <div class="pull-left">
                            <span id="year-copy"></span> &copy; <a href="#" target="_blank"><?php echo $this->Website->name;?></a>
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
		<!-- Load and execute javascript code used only in this page -->
        
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/myJs.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <!--<script src="js/pages/compCharts.js"></script>
        <script>$(function(){ CompCharts.init(); });</script>
        <!-- Load and execute javascript code used only in this page -->
        <!--
        <script src="<?php echo $this->baseHref();?>/themes/greateast/js/pages/compCalendar.js"></script>
        <script>$(function(){ CompCalendar.init(); });</script>-->
		
		<!--
		<script src="<?php echo $this->baseHref();?>/themes/greateast/js/pages/index.js"></script>
        <script>$(function(){ Index.init(); });</script>-->
    </body>
</html>