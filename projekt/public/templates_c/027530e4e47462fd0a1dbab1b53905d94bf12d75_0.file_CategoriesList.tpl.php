<?php
/* Smarty version 5.4.5, created on 2025-05-26 20:40:19
  from 'file:CategoriesList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6834b593b13d63_10208205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '027530e4e47462fd0a1dbab1b53905d94bf12d75' => 
    array (
      0 => 'CategoriesList.tpl',
      1 => 1748284795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_6834b593b13d63_10208205 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18404554816834b593af7ca8_80574716', 'return_action');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19868822596834b593afd868_93013442', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4852052476834b593b10313_78029908', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'return_action'} */
class Block_18404554816834b593af7ca8_80574716 extends \Smarty\Runtime\Block
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
class Block_19868822596834b593afd868_93013442 extends \Smarty\Runtime\Block
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
            <div class=" col-md-4 col-sm-6"><div class="single-explore-item"><div class="single-explore-txt bg-theme-1"><h2><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editCategory/<?php echo $_smarty_tpl->getValue('r')['id'];?>
">    <?php echo $_smarty_tpl->getValue('r')["name"];?>
    </a></h2><div class="explore-open-close-part"><div class="row"><div class="col-sm-5"><p> <?php echo $_smarty_tpl->getValue('r')["color"];?>
   </p></div><div class="col-sm-7"><div class="explore-map-icon"><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editCategory/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="edit-2"></i></a><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deleteCategory/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="trash"></i></a></div></div></div></div></div></div></div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

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

            </div>
</div>

<?php
}
}
/* {/block 'main_body'} */
/* {block "messages"} */
class Block_4852052476834b593b10313_78029908 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
