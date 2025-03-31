<?php
/* Smarty version 5.4.2, created on 2025-03-31 18:15:43
  from 'file:converter.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67eabfafabf711_79124599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c962b989c493fe011af7f0f4eaff15a3a34fa2a4' => 
    array (
      0 => 'converter.html',
      1 => 1743437741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67eabfafabf711_79124599 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_05_new_structure\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_116518520167eabfafaaec65_06389636', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_161391537467eabfafab1fb4_51828195', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_173239248367eabfafabe5c9_60278820', 'slider');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_116518520167eabfafaaec65_06389636 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_05_new_structure\\app\\views';
?>
All Rights Reserved by Maciej Bilnicki<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_161391537467eabfafab1fb4_51828195 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_05_new_structure\\app\\views';
?>

      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
                <?php if (!($_smarty_tpl->getValue('messages')->isEmpty())) {?>

                  <div class="heading_container">
                        <h2>
                          Coś poszło nie tak
                        </h2>
                      </div>
                      <ul>
                
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages')->getErrors(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
                  <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </ul>
                  <a href="#gora_strony">
                    Wróć
                  </a>
                <?php }?>
                <?php if ($_smarty_tpl->getValue('messages')->isEmpty() && !($_smarty_tpl->getValue('result')->isEmpty())) {?>

                <div class="heading_container">
                        <h2>
                          Wyniki
                        </h2>
                      </div>
                      <p>
                        Liczba binarna: <?php echo $_smarty_tpl->getValue('result')->results[0];?>

                      </p>
                      <p>
                        Liczba dziesiętna: <?php echo $_smarty_tpl->getValue('result')->results[1];?>

                      </p>
                      <p>
                        Liczba szestnastkowa: <?php echo $_smarty_tpl->getValue('result')->results[2];?>

                      </p>

                      <a href="#gora_strony">
                        Wróć
                      </a>
                <?php }?>

          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="<?php echo $_smarty_tpl->getValue('config')->app_url;?>
/images/about-img.jpg" alt="">
          </div>
        </div>
      </div>
<?php
}
}
/* {/block 'content'} */
/* {block 'slider'} */
class Block_173239248367eabfafabe5c9_60278820 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_05_new_structure\\app\\views';
?>


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
/mainCtrl.php#wyniki" method="post">
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
<?php
}
}
/* {/block 'slider'} */
}
