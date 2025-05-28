<?php
/* Smarty version 5.4.5, created on 2025-05-28 15:29:19
  from 'file:CategoriesList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_68370faf9f48e4_28242839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '027530e4e47462fd0a1dbab1b53905d94bf12d75' => 
    array (
      0 => 'CategoriesList.tpl',
      1 => 1748438775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_68370faf9f48e4_28242839 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php if (\core\SessionUtils::load("groupId",true)) {
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_195215003968370faf9c2708_39677895', 'left_navbar');
?>

<?php }?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_177660436168370faf9ca173_42684638', 'return_action');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_178651880368370faf9cc384_22664886', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_185549153468370faf9f0ac0_58438260', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'left_navbar'} */
class Block_195215003968370faf9c2708_39677895 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>


    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand">Group: <span><?php echo \core\SessionUtils::load("groupName",true);?>
</span></a>

    </div>
<?php
}
}
/* {/block 'left_navbar'} */
/* {block 'return_action'} */
class Block_177660436168370faf9ca173_42684638 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>
<li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
notesList">return</a></li><?php
}
}
/* {/block 'return_action'} */
/* {block 'main_body'} */
class Block_178651880368370faf9cc384_22664886 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>


<div class="explore-content">

            <div class="row">

            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('records'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
            <div class=" col-md-4 col-sm-6"><div class="single-explore-item"><div class="single-explore-txt bg-theme-1"><?php if ((!(\core\SessionUtils::load("groupId",true)) || \core\SessionUtils::load("groupOwner",true) == \core\SessionUtils::load("id",true))) {?><h2><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editCategory/<?php echo $_smarty_tpl->getValue('r')['id'];?>
">    <?php echo $_smarty_tpl->getValue('r')["name"];?>
    </a></h2><?php } else { ?><h2> <?php echo $_smarty_tpl->getValue('r')["name"];?>
    </h2><?php }?><div class="explore-open-close-part"><div class="row"><div class="col-sm-5"><p> <?php echo $_smarty_tpl->getValue('r')["color"];?>
   </p></div><div class="col-sm-7"><?php if ((!(\core\SessionUtils::load("groupId",true)) || \core\SessionUtils::load("groupOwner",true) == \core\SessionUtils::load("id",true))) {?><div class="explore-map-icon"><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editCategory/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="edit-2"></i></a><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deleteCategory/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="trash"></i></a></div><?php }?></div></div></div></div></div></div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

            <?php ob_start();
echo $_smarty_tpl->getValue('recordsNumber') < 20;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1) {?>
            <?php if ((!(\core\SessionUtils::load("groupId",true)) || \core\SessionUtils::load("groupOwner",true) == \core\SessionUtils::load("id",true))) {?>
                <div class="row">
                <div class=" col-md-4 col-sm-6">
                <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
addCategory">
                    <button class="welcome-hero-btn" type="submit">
                        + new category
                    </button>
                </form>
                </div>
                </div>
            <?php }?>
            <?php }?>

            </div>
</div>

<?php
}
}
/* {/block 'main_body'} */
/* {block "messages"} */
class Block_185549153468370faf9f0ac0_58438260 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
