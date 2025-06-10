<?php
/* Smarty version 5.4.5, created on 2025-06-10 09:25:35
  from 'file:NotesListPart.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6847ddef657b50_35072446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b00823b97b2a578eadc3156976a82d22fff7cea' => 
    array (
      0 => 'NotesListPart.tpl',
      1 => 1749540322,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6847ddef657b50_35072446 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\web_lab_bilnicki\\projekt\\app\\views';
?><div class="row">

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('records'), 'r');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach0DoElse = false;
?>
    <div class=" col-md-4 col-sm-6"><div class="single-explore-item"><div class="single-explore-txt bg-theme-1"><h2><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editNote/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><?php echo $_smarty_tpl->getValue('r')["title"];?>
</a></h2><p class="explore-rating-price">utworzono <?php echo $_smarty_tpl->getValue('r')["creationDate"];?>
<span class="explore-price-box">edytowano <?php echo $_smarty_tpl->getValue('r')["lastModified"];?>
</span></p><div class="explore-person"><div class="row"><div class="col-sm-10"><p><?php echo $_smarty_tpl->getValue('r')["content"];?>
</p></div></div></div><div class="explore-open-close-part"><div class="row"><div class="col-sm-5"><p> <?php echo $_smarty_tpl->getValue('r')["category"];?>
</p></div><div class="col-sm-7"><div class="explore-map-icon"><a href="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
editNote/<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><i data-feather="edit-2"></i></a><a href="" onclick="ajaxPostForm('search-form','<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
deleteNote/<?php echo $_smarty_tpl->getValue('r')['id'];?>
','list'); return false;"><i data-feather="trash"></i></a></div></div></div></div></div></div></div>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>


    <div class="row">
    <div class=" col-md-4 col-sm-6">
        <form action="<?php echo $_smarty_tpl->getValue('conf')->action_url;?>
addNote">
        <button class="welcome-hero-btn">
            + new note
        </button>
        </form>
    </div>
    </div>

</div><?php }
}
