<?php
/* Smarty version 5.4.2, created on 2025-03-31 18:06:52
  from 'file:C:\xampp\htdocs\web_lab_bilnicki\lab_05_new_structure\app\converter\../../templates/main.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67eabd9c605ab3_99289035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b6f9d880c78368748dc5cc8796c565e0b136c67' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_05_new_structure\\app\\converter\\../../templates/main.html',
      1 => 1742891417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67eabd9c605ab3_99289035 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_05_new_structure\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Konwerter</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getValue('config')->app_url;?>
/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="<?php echo $_smarty_tpl->getValue('config')->app_url;?>
/css/font-awesome.min.css" rel="stylesheet" />
  <!-- nice select -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />

  <!-- Custom styles for this template -->
  <link href="<?php echo $_smarty_tpl->getValue('config')->app_url;?>
/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo $_smarty_tpl->getValue('config')->app_url;?>
/css/responsive.css" rel="stylesheet" />

</head>

<body>
  <div class="hero_area" id="gora_strony">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#gora_strony">Góra strony</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#wyniki">Wyniki</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="container ">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_115215268267eabd9c6046a8_41758246', 'slider');
?>

      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- results section -->

  <section class="about_section layout_padding">
    <div class="container" id="wyniki">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_59520981567eabd9c604f13_79691622', 'content');
?>

    </div>
  </section>

    
  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> 
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_25039828167eabd9c605500_97261410', 'footer');
?>
</br>
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- nice select -->
  <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <!-- custom js -->
  <?php echo '<script'; ?>
 src="js/custom.js"><?php echo '</script'; ?>
>
  <!-- soft scroll js -->
  <?php echo '<script'; ?>
 src="js/softscroll.js"><?php echo '</script'; ?>
>


</body>

</html><?php }
/* {block 'slider'} */
class Block_115215268267eabd9c6046a8_41758246 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_05_new_structure\\templates';
?>
 <?php
}
}
/* {/block 'slider'} */
/* {block 'content'} */
class Block_59520981567eabd9c604f13_79691622 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_05_new_structure\\templates';
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_25039828167eabd9c605500_97261410 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_05_new_structure\\templates';
?>
 Domyślna treść stopki .... <?php
}
}
/* {/block 'footer'} */
}
