<?php
/* Smarty version 5.4.5, created on 2025-05-13 11:26:25
  from 'file:Test.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_68231041cca199_88350119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58c18a7cb11992073f09e5f4df3008632c0f3941' => 
    array (
      0 => 'Test.tpl',
      1 => 1747128384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68231041cca199_88350119 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_2787202568231041cc5b92_32466035', 'main_body');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'main_body'} */
class Block_2787202568231041cc5b92_32466035 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

				<form action="#">
					<div class="subscribe-title text-center">
						<h2>
							REGISTER
						</h2>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="email" class="subscription-input-form" placeholder="Email">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="password" class="subscription-input-form" placeholder="Password">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="password" class="subscription-input-form" placeholder="Repeat password">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" placeholder="Role">
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<button class="appsLand-btn subscribe-btn" onclick="window.location.href='#'">
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
}
