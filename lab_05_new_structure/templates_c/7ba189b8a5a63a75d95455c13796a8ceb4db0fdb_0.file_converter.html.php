<?php
/* Smarty version 5.4.2, created on 2025-03-25 09:08:42
  from 'file:C:\xampp\htdocs\web_lab_bilnicki\lab_04/app/converter.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67e2648a3a6134_16450143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ba189b8a5a63a75d95455c13796a8ceb4db0fdb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_04/app/converter.html',
      1 => 1742890119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67e2648a3a6134_16450143 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_04\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_109170924967e2648a398559_89477913', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_33768642867e2648a39b7b5_27050888', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_109170924967e2648a398559_89477913 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_04\\app';
?>
All Rights Reserved by Maciej Bilnicki<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_33768642867e2648a39b7b5_27050888 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_04\\app';
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
}
