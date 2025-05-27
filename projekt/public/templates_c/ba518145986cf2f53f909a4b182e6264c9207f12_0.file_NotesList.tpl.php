<?php
/* Smarty version 5.4.5, created on 2025-05-27 10:40:02
  from 'file:NotesList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_68357a629efd91_15484113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba518145986cf2f53f909a4b182e6264c9207f12' => 
    array (
      0 => 'NotesList.tpl',
      1 => 1748335200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_68357a629efd91_15484113 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php if (\core\SessionUtils::load("groupId",true)) {
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_37623210968357a629c3e30_58941792', 'left_navbar');
?>

    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_117736555768357a629ca089_56444517', 'return_action');
?>

<?php }?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_42088184568357a629cdc90_63159649', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_91665069468357a629ec0d0_44232688', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'left_navbar'} */
class Block_37623210968357a629c3e30_58941792 extends \Smarty\Runtime\Block
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
class Block_117736555768357a629ca089_56444517 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>
<li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
exitGroupSpace">return</a></li><?php
}
}
/* {/block 'return_action'} */
/* {block 'main_body'} */
class Block_42088184568357a629cdc90_63159649 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>


        <div class="welcome-hero-serch-box">
            <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
notesList">
                <div class="welcome-hero-form">
                    <div class="single-welcome-hero-form">
                        <h3>title</h3>
                        <input type="text" name="title" value="<?php echo $_smarty_tpl->getValue('searchForm')->title;?>
"/>
                    </div>
                    <div class="single-welcome-hero-form">
                        <h3>category</h3>
                    </div>
                        <select name="category" id="category"
								style = "position: relative;
                                        display: flex;
                                        align-items: center;
                                        border: 0px blue;
                                        padding-right: 30px;
                                        padding-left: 30px;">
											
                                    <option value="-1">all categories</option>
								<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
								<option value="<?php echo $_smarty_tpl->getValue('r')["id"];?>
" <?php if (($_smarty_tpl->getValue('r')["id"] == $_smarty_tpl->getValue('searchForm')->category)) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('r')["name"];?>
</option>
								<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
							</select>
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
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach1DoElse = false;
?>
                <div class=" col-md-4 col-sm-6"><div class="single-explore-item"><div class="single-explore-txt bg-theme-1"><h2><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editNote/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><?php echo $_smarty_tpl->getValue('r')["title"];?>
</a></h2><p class="explore-rating-price">utworzono <?php echo $_smarty_tpl->getValue('r')["creationDate"];?>
<span class="explore-price-box">edytowano <?php echo $_smarty_tpl->getValue('r')["lastModified"];?>
</span></p><div class="explore-person"><div class="row"><div class="col-sm-10"><p><?php echo $_smarty_tpl->getValue('r')["content"];?>
</p></div></div></div><div class="explore-open-close-part"><div class="row"><div class="col-sm-5"><p> <?php echo $_smarty_tpl->getValue('r')["category"];?>
</p></div><div class="col-sm-7"><div class="explore-map-icon"><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editNote/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="edit-2"></i></a><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deleteNote/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="trash"></i></a></div></div></div></div></div></div></div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


                <div class="row">
                <div class=" col-md-4 col-sm-6">
                    <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
addNote">
                    <button class="welcome-hero-btn">
                        + new note
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
class Block_91665069468357a629ec0d0_44232688 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
