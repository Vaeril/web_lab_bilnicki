<?php
/* Smarty version 5.4.5, created on 2025-05-27 10:33:48
  from 'file:GroupsList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_683578ec640d65_44308776',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d2b46c6eaff4860ebdfba5e01e621d1b20d883f' => 
    array (
      0 => 'GroupsList.tpl',
      1 => 1748334060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_683578ec640d65_44308776 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1315700708683578ec61e294_10082055', 'return_action');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_429325589683578ec623f10_35864267', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_737638408683578ec63d380_71115681', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'return_action'} */
class Block_1315700708683578ec61e294_10082055 extends \Smarty\Runtime\Block
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
class Block_429325589683578ec623f10_35864267 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>


        <div class="welcome-hero-serch-box">
            <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
groupsList">
                <div class="welcome-hero-form">
                    <div class="single-welcome-hero-form">
                        <h3>name</h3>
                        <input type="text" name="name" value="<?php echo $_smarty_tpl->getValue('searchName');?>
"/>
                    </div>
                    <div class="single-welcome-hero-form">
                        <h3>member</h3>
                        <input type="text" name="member" value="<?php echo $_smarty_tpl->getValue('searchMember');?>
"/>
                    </div>
                    <div class="welcome-hero-serch">
                        <button class="welcome-hero-btn" type="submit">
                                search  <i data-feather="search"></i> 
                        </button>
                    </div>
                </div>
            </form>
        </div>


<div class="explore-content">

            <div class="row">

            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('records'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
            <div class=" col-md-4 col-sm-6"><div class="single-explore-item"><div class="single-explore-txt bg-theme-1"><h2><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
enterGroupSpace/<?php echo $_smarty_tpl->getValue('r')['id'];?>
">    <?php echo $_smarty_tpl->getValue('r')["name"];?>
    </a></h2><div class="explore-open-close-part"><div class="row"><div class="col-sm-5"><p>     owner: <?php echo $_smarty_tpl->getValue('r')["mail"];?>
   </p></div><div class="col-sm-7"><div class="explore-map-icon"><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editGroup/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="edit-2"></i></a><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deleteGroup/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="trash"></i></a></div></div></div></div></div></div></div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


            <?php if (\core\RoleUtils::inRole("lead")) {?>
                <div class="row">
                <div class=" col-md-4 col-sm-6">
                    <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
addGroup">
                    <button class="welcome-hero-btn">
                        + new group
                    </button>
                    </form>
                </div>
                </div>
            <?php }?>

            </div>
</div>

<?php
}
}
/* {/block 'main_body'} */
/* {block "messages"} */
class Block_737638408683578ec63d380_71115681 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
