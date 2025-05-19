<?php
/* Smarty version 5.4.5, created on 2025-05-19 11:39:32
  from 'file:Register.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682afc5481e4c4_71140612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c2a9433b1f00bd690136e14622e5bec70e81c8c' => 
    array (
      0 => 'Register.tpl',
      1 => 1747647551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_682afc5481e4c4_71140612 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_304775029682afc5480f1d2_66576385', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_569951467682afc5481a953_66572779', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'main_body'} */
class Block_304775029682afc5480f1d2_66576385 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

				<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
register" method="POST">
					<div class="subscribe-title text-center">
						<h2>
							REGISTER
						</h2>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="email" placeholder="Email" value="<?php echo $_smarty_tpl->getValue('registerForm')->email;?>
">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="password" class="subscription-input-form" name="password" placeholder="Password" value="<?php echo $_smarty_tpl->getValue('registerForm')->password;?>
">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="password" class="subscription-input-form" name="password_2" placeholder="Repeat password" value="<?php echo $_smarty_tpl->getValue('registerForm')->password_2;?>
">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="role" placeholder="Role" value="<?php echo $_smarty_tpl->getValue('registerForm')->role;?>
">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<button class="appsLand-btn subscribe-btn" type="submit">
									create account
								</button>
							</div>
						</div>	
					</div>
				</form>

<?php
}
}
/* {/block 'main_body'} */
/* {block "messages"} */
class Block_569951467682afc5481a953_66572779 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
