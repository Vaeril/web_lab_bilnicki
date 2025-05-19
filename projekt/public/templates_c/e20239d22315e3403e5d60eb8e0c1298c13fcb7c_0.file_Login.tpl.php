<?php
/* Smarty version 5.4.5, created on 2025-05-19 12:36:36
  from 'file:Login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682b09b43a2aa3_29336651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e20239d22315e3403e5d60eb8e0c1298c13fcb7c' => 
    array (
      0 => 'Login.tpl',
      1 => 1747650994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_682b09b43a2aa3_29336651 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1307137915682b09b4396e30_54288288', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2051447918682b09b439e9f7_96766855', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'main_body'} */
class Block_1307137915682b09b4396e30_54288288 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

				<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
register" method="POST">
					<div class="subscribe-title text-center">
						<h2>
							LOGIN
						</h2>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="email" placeholder="Email" value="<?php echo $_smarty_tpl->getValue('loginForm')->email;?>
">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="password" class="subscription-input-form" name="password" placeholder="Password" value="<?php echo $_smarty_tpl->getValue('loginForm')->password;?>
">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<button class="appsLand-btn subscribe-btn" type="submit">
									Log in
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
class Block_2051447918682b09b439e9f7_96766855 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
