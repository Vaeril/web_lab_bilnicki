<?php
/* Smarty version 5.4.5, created on 2025-05-19 11:04:19
  from 'file:messages.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682af4130b6377_98214311',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd72017f2ff634263884e5c981fc0fd67b2ab69e9' => 
    array (
      0 => 'messages.tpl',
      1 => 1747645457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_682af4130b6377_98214311 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views\\templates';
?><div class="messages error">
		<div class="welcome-hero-button">
				<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
					<p style="color: #ff545a; 
    				font-size: 1.2em;"><?php echo $_smarty_tpl->getValue('msg')->text;?>
</p>
				<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</div>
</div>
<?php }
}
