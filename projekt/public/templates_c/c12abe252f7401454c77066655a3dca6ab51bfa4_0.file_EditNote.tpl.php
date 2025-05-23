<?php
/* Smarty version 5.4.5, created on 2025-05-23 16:17:06
  from 'file:EditNote.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_683083625819e5_02958871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c12abe252f7401454c77066655a3dca6ab51bfa4' => 
    array (
      0 => 'EditNote.tpl',
      1 => 1748009815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_683083625819e5_02958871 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_80736823868308362564ad7_74445254', 'return_action');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1549289129683083625690d6_19656938', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11777824396830836257e135_53453663', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'return_action'} */
class Block_80736823868308362564ad7_74445254 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>
notesList<?php
}
}
/* {/block 'return_action'} */
/* {block 'main_body'} */
class Block_1549289129683083625690d6_19656938 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

				<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
saveNote" method="POST">
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="title" value="<?php echo $_smarty_tpl->getValue('note')->title;?>
">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
							<select name="category" id="category"
								style = "display: inline-block;
											width: 630px;
											padding:30px;
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
											
								<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
								<option value="<?php echo $_smarty_tpl->getValue('r')["id"];?>
" <?php if (($_smarty_tpl->getValue('r')["id"] == $_smarty_tpl->getValue('note')->category)) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('r')["name"];?>
</option>
								<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
							</select>
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<textarea name="text" rows="20" cols="50"
								style = "display: inline-block;
											width: 630px;
											padding:30px;
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
											transition:0.3s linear;"><?php echo $_smarty_tpl->getValue('note')->content;?>
</textarea>
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
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('noteId');?>
">
				</form>

<?php
}
}
/* {/block 'main_body'} */
/* {block "messages"} */
class Block_11777824396830836257e135_53453663 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
