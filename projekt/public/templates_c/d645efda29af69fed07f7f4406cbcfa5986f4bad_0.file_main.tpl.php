<?php
/* Smarty version 5.4.5, created on 2025-05-26 20:40:16
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6834b5905cbbb6_71076357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd645efda29af69fed07f7f4406cbcfa5986f4bad' => 
    array (
      0 => 'main.tpl',
      1 => 1748284811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6834b5905cbbb6_71076357 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
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
		<link rel="shortcut icon" type="image/icon" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/animate.css">

		<!--flaticon.css-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/slick.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/slick-theme.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
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
								<?php if ((\core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("user"))) {?>
			                    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17458974656834b5905aedf6_95628099', 'return_action');
?>

								<?php }?>
								<?php if (\core\RoleUtils::inRole("user")) {?>
			                    <li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
groupsList">my groups</a></li>
								<?php }?>
								<?php if (\core\RoleUtils::inRole("user")) {?>
			                    <li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
categoriesList">my categories</a></li>
								<?php }?>
								<?php if (!(\core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("user"))) {?>
			                    <li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
register">register</a></li>
								<?php }?>
								<?php if (!(\core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("user"))) {?>
			                    <li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
login">log in</a></li>
								<?php }?>
								<?php if ((\core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("user"))) {?>
			                    <li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
logout">log out</a></li>
								<?php }?>
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
                <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7342208476834b5905bfcd0_24955453', 'welcome_hero');
?>

                <!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--explore start -->
		<section id="explore" class="explore">
			<div class="container">
                <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11193955106834b5905c11e0_00287104', 'main_body');
?>

			</div><!--/.container-->

		</section><!--/.explore-->
		<!--explore end -->


		<section id="messages" class="explore">
		<div class="container">
			<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13146597016834b5905c2610_67649327', 'messages');
?>

		</div>
		</section>

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
			
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

		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/jquery.js"><?php echo '</script'; ?>
>
        
        <!--modernizr.min.js-->
        <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"><?php echo '</script'; ?>
>
		
		<!--bootstrap.min.js-->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/bootstrap.min.js"><?php echo '</script'; ?>
>
		
		<!-- bootsnav js -->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/bootsnav.js"><?php echo '</script'; ?>
>

        <!--feather.min.js-->
        <?php echo '<script'; ?>
  src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/feather.min.js"><?php echo '</script'; ?>
>

        <!-- counter js -->
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/jquery.counterup.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/waypoints.min.js"><?php echo '</script'; ?>
>

        <!--slick.min.js-->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/slick.min.js"><?php echo '</script'; ?>
>

		<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"><?php echo '</script'; ?>
>
		     
        <!--Custom JS-->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/assets/js/custom.js"><?php echo '</script'; ?>
>
        
    </body>
	
</html><?php }
/* {block 'return_action'} */
class Block_17458974656834b5905aedf6_95628099 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views\\templates';
}
}
/* {/block 'return_action'} */
/* {block 'welcome_hero'} */
class Block_7342208476834b5905bfcd0_24955453 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views\\templates';
?>
 <?php
}
}
/* {/block 'welcome_hero'} */
/* {block 'main_body'} */
class Block_11193955106834b5905c11e0_00287104 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views\\templates';
?>
 <?php
}
}
/* {/block 'main_body'} */
/* {block 'messages'} */
class Block_13146597016834b5905c2610_67649327 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views\\templates';
?>
 <?php
}
}
/* {/block 'messages'} */
}
