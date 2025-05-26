<?php
/* Smarty version 5.4.5, created on 2025-05-26 20:40:22
  from 'file:EditCategory.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6834b596bc8494_49170146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ca2a5d28b34e4bf239bf14f0a088179490b1b73' => 
    array (
      0 => 'EditCategory.tpl',
      1 => 1748284802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_6834b596bc8494_49170146 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17188339026834b596bab2e2_43722713', 'return_action');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4587495916834b596bb0be1_77979908', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18617403346834b596bc4572_31908432', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'return_action'} */
class Block_17188339026834b596bab2e2_43722713 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>
<li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
categoriesList">return</a></li><?php
}
}
/* {/block 'return_action'} */
/* {block 'main_body'} */
class Block_4587495916834b596bb0be1_77979908 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

				<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
saveCategory" method="POST">
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="name" placeholder="Category name"  value="<?php echo $_smarty_tpl->getValue('categoryForm')->name;?>
">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
							<select name="color" id="color"
								style = "display: inline-block;
											width: 630px;
                                            padding: 15px;
											padding-left:30px;
											font-size: 16px;
											color: #2d2f31;
											-webkit-border-radius:3px;
											-moz-border-radius:3px;
											border-radius:3px;
											border:1px solid #fff;
											box-shadow: 0 0px 10px rgba(21,19,19,.1);
											-webkit-transition:0.3s linear;
											-moz-transition:0.3s linear;
											-o-transition:0.3s linear;
											transition:0.3s linear;">
								<option value="red" <?php if ($_smarty_tpl->getValue('categoryForm')->color == "red") {?>selected<?php }?>>Red</option>
								<option value="green" <?php if ($_smarty_tpl->getValue('categoryForm')->color == "green") {?>selected<?php }?>>Green</option>
								<option value="white" <?php if ($_smarty_tpl->getValue('categoryForm')->color == "white") {?>selected<?php }?>>White</option>
								<option value="blue" <?php if ($_smarty_tpl->getValue('categoryForm')->color == "blue") {?>selected<?php }?>>Blue</option>
								<option value="purple" <?php if ($_smarty_tpl->getValue('categoryForm')->color == "purple") {?>selected<?php }?>>Purple</option>
								<option value="grey" <?php if ($_smarty_tpl->getValue('categoryForm')->color == "grey") {?>selected<?php }?>>Grey</option>
								<option value="orange" <?php if ($_smarty_tpl->getValue('categoryForm')->color == "orange") {?>selected<?php }?>>Orange</option>
							</select>
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<button class="appsLand-btn subscribe-btn" type="submit">
									Save
								</button>
							</div>
						</div>	
					</div>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('categoryId');?>
">
				</form>

<?php
}
}
/* {/block 'main_body'} */
/* {block "messages"} */
class Block_18617403346834b596bc4572_31908432 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
