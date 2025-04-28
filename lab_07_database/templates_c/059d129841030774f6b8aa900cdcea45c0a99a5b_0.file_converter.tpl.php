<?php
/* Smarty version 5.4.2, created on 2025-04-28 16:52:15
  from 'file:converter.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_680f961fd11e02_08262762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '059d129841030774f6b8aa900cdcea45c0a99a5b' => 
    array (
      0 => 'converter.tpl',
      1 => 1745851931,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_680f961fd11e02_08262762 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_07_database\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1481416066680f961fce8306_05764165', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_621294552680f961fcedf34_28704555', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_546311028680f961fd0f5b2_80844947', 'slider');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_1481416066680f961fce8306_05764165 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_07_database\\app\\views';
?>
All Rights Reserved by Maciej Bilnicki<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_621294552680f961fcedf34_28704555 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_07_database\\app\\views';
?>

      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
                <?php if ($_smarty_tpl->getValue('messages')->hasError()) {?>

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
                <?php if (!($_smarty_tpl->getValue('messages')->hasError()) && !($_smarty_tpl->getValue('result')->isEmpty())) {?>

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
            

                      <?php if ((null !== ($_smarty_tpl->getValue('result')->lastResult ?? null))) {?>
                        <p>
                        Ostatni wynik: <?php echo $_smarty_tpl->getValue('result')->lastResult['binaryResult'];?>
, <?php echo $_smarty_tpl->getValue('result')->lastResult['decimalResult'];?>
, <?php echo $_smarty_tpl->getValue('result')->lastResult['hexResult'];?>

                        </p>
                      <?php }?>

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
class Block_546311028680f961fd0f5b2_80844947 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_07_database\\app\\views';
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
    <form action="<?php echo $_smarty_tpl->getValue('config')->action_url;?>
compute#wyniki" method="post">
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
