<?php
/* Smarty version 5.4.5, created on 2025-05-28 18:00:09
  from 'file:ChooseMember.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_68373309da8de3_93070214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0ce4bc5b109e35805ad4833c8dff683984ec744' => 
    array (
      0 => 'ChooseMember.tpl',
      1 => 1748447960,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_68373309da8de3_93070214 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_189749987268373309d81412_77432583', 'return_action');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_115167065168373309d87c49_40015856', 'main_body');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_169431200968373309da4ad5_87516547', "messages");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'return_action'} */
class Block_189749987268373309d81412_77432583 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>
<li><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editGroup/"<?php echo $_smarty_tpl->getValue('form')->id;?>
>return</a></li><?php
}
}
/* {/block 'return_action'} */
/* {block 'main_body'} */
class Block_115167065168373309d87c49_40015856 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>


        <div class="welcome-hero-serch-box">
            <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
chooseMember">
                <div class="welcome-hero-form">
                    <div class="single-welcome-hero-form" style="width:500px;">
                        <h3>mail</h3>
                        <input type="text" name="mail" value="<?php echo $_smarty_tpl->getValue('searchMail');?>
"/>
                    </div>
                    <div class="welcome-hero-serch">
                        <button class="welcome-hero-btn" type="submit">
                                search  <i data-feather="search"></i> 
                        </button>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('form')->id;?>
">
            </form>
        </div>


<div class="explore-content">

        <div class="row">

            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('records'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
            <div class=" col-md-4 col-sm-6"><div class="single-explore-item"><div class="single-explore-txt bg-theme-1"><h2><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
addMember/<?php echo $_smarty_tpl->getValue('form')->id;?>
/<?php echo $_smarty_tpl->getValue('r')['id'];?>
">    <?php echo $_smarty_tpl->getValue('r')["mail"];?>
    </a></h2><div class="explore-open-close-part"><div class="row"><div class="col-sm-5"><p> <?php echo $_smarty_tpl->getValue('r')['role'];?>
 </p></div><div class="col-sm-7"></div></div></div></div></div></div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

        </div>
</div>

<section id="list-topics" class="list-topics">
			<div class="container">
				<div class="list-topics-content">
					<ul>
						<li>
                        <?php if ($_smarty_tpl->getValue('page') > 0) {?>
							<a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
chooseMember?page=<?php echo $_smarty_tpl->getValue('page')-1;?>
&mail=<?php echo $_smarty_tpl->getValue('searchMail');?>
&id=<?php echo $_smarty_tpl->getValue('form')->id;?>
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
chooseMember?page=<?php echo $_smarty_tpl->getValue('page')+1;?>
&name=<?php echo $_smarty_tpl->getValue('searchName');?>
&id=<?php echo $_smarty_tpl->getValue('form')->id;?>
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
class Block_169431200968373309da4ad5_87516547 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?>

	<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
/* {/block "messages"} */
}
