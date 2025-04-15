<?php
/* Smarty version 5.4.2, created on 2025-04-15 12:31:09
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67fe356d1901a7_58590679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4d879e7ba3caac86bdfdab3e40767c9780364c4' => 
    array (
      0 => 'login.tpl',
      1 => 1744713065,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67fe356d1901a7_58590679 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_06_control\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_148698772967fe356d179c70_49042316', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_41837526467fe356d17e644_70570031', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_34846010967fe356d17f616_96527346', 'slider');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_148698772967fe356d179c70_49042316 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_06_control\\app\\views';
?>
All Rights Reserved by Maciej Bilnicki<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_41837526467fe356d17e644_70570031 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_06_control\\app\\views';
?>

<?php
}
}
/* {/block 'content'} */
/* {block 'slider'} */
class Block_34846010967fe356d17f616_96527346 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_06_control\\app\\views';
?>


<div class="row">
  <div class="col-lg-7 col-md-8 mx-auto">
    <div class="detail-box">
      <h1>
        Logowanie
      </h1>
        <?php if (!($_smarty_tpl->getValue('messages')->isEmpty())) {?>

        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages')->getErrors(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
            <p><?php echo $_smarty_tpl->getValue('msg');?>
</p>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        <?php }?>
        <?php if (($_smarty_tpl->getValue('messages')->isEmpty())) {?>
      <p>
        zaloguj się, aby użyć konwertera
      </p>
        <?php }?>
    </div>
  </div>
</div>
<div class="find_container ">
  <div class="container">
    <form action="<?php echo $_smarty_tpl->getValue('config')->action_url;?>
/login" method="post">
      <div class="row">
      <div class="col">
        <div class="form-row ">
          <div class="form-group col-lg-3">
            <input type="text" class="form-control" id="login" name="login" placeholder="Login">
          </div>
          <div class="form-group col-lg-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Hasło">
          </div>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col">
        <div class="form-row ">
          <div class="form-group col-lg-3">
          <div class="btn-box">
            <button type="submit" value="zaloguj" class="btn ">Zaloguj</button>
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
