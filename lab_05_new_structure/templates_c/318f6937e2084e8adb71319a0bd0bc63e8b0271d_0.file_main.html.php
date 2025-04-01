<?php
/* Smarty version 5.4.2, created on 2025-03-25 09:20:23
  from 'file:C:\xampp\htdocs\web_lab_bilnicki\lab_04\app\../templates/main.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e267472b79a8_55730551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '318f6937e2084e8adb71319a0bd0bc63e8b0271d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_04\\app\\../templates/main.html',
      1 => 1742890808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e267472b79a8_55730551 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_04\\templates';
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
        <div class="row">
          <div class="col-lg-7 col-md-8 mx-auto">
            <div class="detail-box">
              <h1>
                Konwerter
              </h1>
              <p>
                użyj tego konwertera, aby znaleźć odpowiedniki liczb w systemie binarnym, dziesiętnym i szestnastkowym
              </p>
            </div>
          </div>
        </div>
        <div class="find_container ">
          <div class="container">
            <form action="<?php echo $_smarty_tpl->getValue('config')->app_url;?>
/app/mainCtrl.php#wyniki" method="post">
              <div class="row">
              <div class="col">
                <div class="form-row ">
                  <div class="form-group col-lg-3">
                  <input type="text" class="form-control" id="input" name="input" placeholder="Liczba" value="<?php echo $_smarty_tpl->getValue('form')->input;?>
">
                  </div>
                  <div class="form-group col-lg-3">
                  <select name="input_type" class="form-control wide" id="input_type">
                    <option value="2">System binarny </option>
                    <option value="10">System dziesiętny</option>
                    <option value="16">System szestnastkowy</option>
                  </select>
                  </div>
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col">
                <div class="form-row ">
                  <div class="form-group col-lg-3">
                  <div class="btn-box">
                    <button type="submit" class="btn ">Licz</button>
                  </div>
                  </div>
                </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- results section -->

  <section class="about_section layout_padding">
    <div class="container" id="wyniki">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_209443933967e267472b3e02_73969326', 'content');
?>

    </div>
  </section>

    
  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> 
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_114990871467e267472b72f2_99753683', 'footer');
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
/* {block 'content'} */
class Block_209443933967e267472b3e02_73969326 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_04\\templates';
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_114990871467e267472b72f2_99753683 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_04\\templates';
?>
 Domyślna treść stopki .... <?php
}
}
/* {/block 'footer'} */
}
