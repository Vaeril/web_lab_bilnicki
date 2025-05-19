<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Note app</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="{$conf->app_url}/assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/animate.css">

		<!--flaticon.css-->
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/slick.css">
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/slick-theme.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="{$conf->app_url}/assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		

		<!-- top-area Start -->
		<section class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

			        <div class="container">

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
			                    <li class=" scroll active"><a href="#">return</a></li>
			                    <li class="scroll"><a href="#">my groups</a></li>
			                    <li class="scroll"><a href="#">register</a></li>
			                    <li class="scroll"><a href="#">log in</a></li>
			                    <li class="scroll"><a href="#">log out</a></li>
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->
		    <div class="clearfix"></div>

		</section><!-- /.top-area-->
		<!-- top-area End -->

		<div id="top"></div>

		<!--welcome-hero start -->
                {block name = welcome_hero} {/block}
                <!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--explore start -->
		<section id="explore" class="explore">
			<div class="container">
                {block name = main_body} {/block}
			</div><!--/.container-->

		</section><!--/.explore-->
		<!--explore end -->


		<section id="messages" class="explore">
		<div class="container">
			{block name = messages} {/block}
		</div>
		</section>

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="footer-menu">
		           	<div class="row">
			           	<div class="col-sm-3">
			           	</div>
			           	<div class="col-sm-9">
			           		<ul class="footer-menu-item">
			                    <li class="scroll"><a href="#top">return to top</a></li>
			                </ul><!--/.nav -->
			           	</div>
		           </div>
				</div>
				<div class="hm-footer-copyright">
					<div class="row">
						<div class="col-sm-5">
							<p>
								&copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
							</p><!--/p-->
						</div>
					</div>
					
				</div><!--/.hm-footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-->
		<!--footer end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="{$conf->app_url}/assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="{$conf->app_url}/assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="{$conf->app_url}/assets/js/bootsnav.js"></script>

        <!--feather.min.js-->
        <script  src="{$conf->app_url}/assets/js/feather.min.js"></script>

        <!-- counter js -->
		<script src="{$conf->app_url}/assets/js/jquery.counterup.min.js"></script>
		<script src="{$conf->app_url}/assets/js/waypoints.min.js"></script>

        <!--slick.min.js-->
        <script src="{$conf->app_url}/assets/js/slick.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		     
        <!--Custom JS-->
        <script src="{$conf->app_url}/assets/js/custom.js"></script>
        
    </body>
	
</html>