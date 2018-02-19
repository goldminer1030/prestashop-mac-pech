<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\modules\ps_sharebuttons\views\templates\hook\ps_sharebuttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9625a8a4583790e17-30313919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53e7cf76a495c1ec209ca9f292bcf1152d6e0825' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\modules\\ps_sharebuttons\\views\\templates\\hook\\ps_sharebuttons.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9625a8a4583790e17-30313919',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'social_share_links' => 0,
    'social_share_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45837a7304_92937893',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45837a7304_92937893')) {function content_5a8a45837a7304_92937893($_smarty_tpl) {?>


  <?php if ($_smarty_tpl->tpl_vars['social_share_links']->value) {?>
    <div class="social-sharing">
      <span><?php echo smartyTranslate(array('s'=>'Share','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span>
      <ul>
        <?php  $_smarty_tpl->tpl_vars['social_share_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['social_share_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['social_share_links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['social_share_link']->key => $_smarty_tpl->tpl_vars['social_share_link']->value) {
$_smarty_tpl->tpl_vars['social_share_link']->_loop = true;
?>
          <li class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social_share_link']->value['class'], ENT_QUOTES, 'UTF-8');?>
 icon-gray"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social_share_link']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="text-hide" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social_share_link']->value['label'], ENT_QUOTES, 'UTF-8');?>
" target="_blank"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social_share_link']->value['label'], ENT_QUOTES, 'UTF-8');?>
</a></li>
        <?php } ?>
      </ul>
    </div>
  <?php }?>

<?php }} ?>
