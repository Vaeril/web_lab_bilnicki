<?php
/* Smarty version 5.4.5, created on 2025-05-28 15:18:16
  from 'file:EditGroup.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_68370d18014915_60431709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5fda8c2cb6b388cf26f3a4b9bed508525c72c3f' => 
    array (
      0 => 'EditGroup.tpl',
      1 => 1748438294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_68370d18014915_60431709 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_75331275768370d17f2e068_04830352', 'return_action');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_200989811468370d17f33c61_24464948', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_22559272068370d18010f71_20637802', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'return_action'} */
class Block_75331275768370d17f2e068_04830352 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>
<li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
groupsList">return</a></li><?php
}
}
/* {/block 'return_action'} */
/* {block 'main_body'} */
class Block_200989811468370d17f33c61_24464948 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

				<form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
saveGroup" method="POST">
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<input type="text" class="subscription-input-form" name="name" value="<?php echo $_smarty_tpl->getValue('form')->groupName;?>
">
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
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('form')->id;?>
">
				</form>

                
<div class="explore-content">

            <div class="subscribe-title text-center">
                <h2>
                    Members
                </h2>
            </div>

            <div class="row">

            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('records'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
            <div class=" col-md-4 col-sm-6"><div class="single-explore-item"><div class="single-explore-txt bg-theme-1"><h2> <?php echo $_smarty_tpl->getValue('r')["mail"];?>
    </h2><div class="explore-open-close-part"><div class="row"><div class="col-sm-5"><p> <?php if ($_smarty_tpl->getValue('r')["owner"] == $_smarty_tpl->getValue('r')["id"]) {?>owner<?php }
if ($_smarty_tpl->getValue('r')["owner"] != $_smarty_tpl->getValue('r')["id"]) {?>member<?php }?>  </p></div><div class="col-sm-7"><div class="explore-map-icon"><?php if ($_smarty_tpl->getValue('r')["owner"] != $_smarty_tpl->getValue('r')["id"]) {?><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
removeMember/<?php echo $_smarty_tpl->getValue('form')->id;?>
/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="trash"></i></a><?php }?></div></div></div></div></div></div></div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

                <div class="row">
                <div class=" col-md-4 col-sm-6">
                <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
chooseMember">
                    <button class="welcome-hero-btn" type="submit">
                        + new member
                    </button>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('form')->id;?>
">
                </form>
                </div>
                </div>

            </div>
</div>

                <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deleteGroup" method="POST">

					<div class="subscribe-title text-center"></div>
					<div class="subscribe-title text-center"></div>
					<div class="subscribe-title text-center"></div>
					<div class="subscribe-title text-center"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="subscription-input-group">
								<button class="appsLand-btn subscribe-btn" type="submit">
									DELETE GROUP
								</button>
							</div>
						</div>	
					</div>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('form')->id;?>
">
				</form>

<?php
}
}
/* {/block 'main_body'} */
/* {block "messages"} */
class Block_22559272068370d18010f71_20637802 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
