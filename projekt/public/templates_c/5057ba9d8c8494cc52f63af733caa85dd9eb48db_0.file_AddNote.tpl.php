<?php
/* Smarty version 5.4.5, created on 2025-05-19 14:41:30
  from 'file:AddNote.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_682b26faa60a31_41318362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5057ba9d8c8494cc52f63af733caa85dd9eb48db' => 
    array (
      0 => 'AddNote.tpl',
      1 => 1747658461,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_682b26faa60a31_41318362 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1980962321682b26faa56057_52426039', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_811663127682b26faa5cff6_06110616', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'main_body'} */
class Block_1980962321682b26faa56057_52426039 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

				<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
addNote" method="POST">
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="title" placeholder="Note title">
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
								<option value="volvo">Volvo</option>
								<option value="saab">Saab</option>
								<option value="opel">Opel</option>
								<option value="audi">Audi</option>
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
											transition:0.3s linear;">Content</textarea>
							</div>
						</div>	
					</div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<button class="appsLand-btn subscribe-btn"><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
notesList">
									Create
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
class Block_811663127682b26faa5cff6_06110616 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
