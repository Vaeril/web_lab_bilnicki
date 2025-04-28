<?php
/* Smarty version 5.4.2, created on 2025-04-15 14:08:19
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67fe4c33ee8912_03914708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8140537cd539b5c79fef227d91ed69f4af16ed8' => 
    array (
      0 => 'login.tpl',
      1 => 1744713104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67fe4c33ee8912_03914708 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_06_routing\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_62630963567fe4c33bfbca5_99127587', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_154869623767fe4c33cd7472_16869076', 'content');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_120564017867fe4c33cd8491_69971779', 'slider');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_62630963567fe4c33bfbca5_99127587 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_06_routing\\app\\views';
?>
All Rights Reserved by Maciej Bilnicki<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_154869623767fe4c33cd7472_16869076 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_06_routing\\app\\views';
?>

<?php
}
}
/* {/block 'content'} */
/* {block 'slider'} */
class Block_120564017867fe4c33cd8491_69971779 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\lab_06_routing\\app\\views';
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
      <p>
        zaloguj się, aby użyć konwertera
      </p>
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
