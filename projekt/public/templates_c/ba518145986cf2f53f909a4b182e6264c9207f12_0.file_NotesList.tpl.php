<?php
/* Smarty version 5.4.5, created on 2025-06-10 08:53:14
  from 'file:NotesList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6847d65a39e982_34035821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba518145986cf2f53f909a4b182e6264c9207f12' => 
    array (
      0 => 'NotesList.tpl',
      1 => 1749538378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:NotesListPart.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
))) {
function content_6847d65a39e982_34035821 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php if (\core\SessionUtils::load("groupId",true)) {
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_6610961726847d65a3749a2_86559310', 'left_navbar');
?>

    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5490135406847d65a37bb55_53543999', 'return_action');
?>

<?php }?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4947395386847d65a37f7e0_22900833', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9541400496847d65a39cee8_85785944', "messages");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'left_navbar'} */
class Block_6610961726847d65a3749a2_86559310 extends \Smarty\Runtime\Block
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
class Block_5490135406847d65a37bb55_53543999 extends \Smarty\Runtime\Block
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
class Block_4947395386847d65a37f7e0_22900833 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>


        <div class="welcome-hero-serch-box">
            <form id="search-form" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
notesListPart','list'); return false;">
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


<div class="explore-content" id="list">

<?php $_smarty_tpl->renderSubTemplate("file:NotesListPart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

</div>

<section id="list-topics" class="list-topics">
			<div class="container">
				<div class="list-topics-content">
					<ul>
						<li>
                        <?php if ($_smarty_tpl->getValue('page') > 0) {?>
							<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
notesList?page=<?php echo $_smarty_tpl->getValue('page')-1;?>
&title=<?php echo $_smarty_tpl->getValue('searchForm')->title;?>
&category=<?php echo $_smarty_tpl->getValue('searchForm')->category;?>
"><div class="single-list-topics-content">
                                <div class="explore-map-icon">
                                    <i data-feather="arrow-left"></i>
                                </div>
							</div></a>    
                        <?php }?>
						</li>
						<li>
                        <?php if ($_smarty_tpl->getValue('page') < $_smarty_tpl->getValue('lastPage')-1) {?>
							<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
notesList?page=<?php echo $_smarty_tpl->getValue('page')+1;?>
&title=<?php echo $_smarty_tpl->getValue('searchForm')->title;?>
&category=<?php echo $_smarty_tpl->getValue('searchForm')->category;?>
"><div class="single-list-topics-content">
                                <div class="explore-map-icon">
                                    <i data-feather="arrow-right"></i>
                                </div>
							</div></a>
                        <?php }?>         
						</li>
					</ul>
				</div>
			</div><!--/.container-->
</section>

<?php
}
}
/* {/block 'main_body'} */
/* {block "messages"} */
class Block_9541400496847d65a39cee8_85785944 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
