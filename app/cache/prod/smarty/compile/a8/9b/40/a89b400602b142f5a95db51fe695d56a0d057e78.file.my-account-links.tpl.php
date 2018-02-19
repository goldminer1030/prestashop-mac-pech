<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:24
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\customer\_partials\my-account-links.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103605a8a45847705d8-30930075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a89b400602b142f5a95db51fe695d56a0d057e78' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\customer\\_partials\\my-account-links.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103605a8a45847705d8-30930075',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a458477b3e9_61941246',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a458477b3e9_61941246')) {function content_5a8a458477b3e9_61941246($_smarty_tpl) {?>

  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['my_account'], ENT_QUOTES, 'UTF-8');?>
" class="account-link">
    <i class="material-icons">&#xE5CB;</i>
    <span><?php echo smartyTranslate(array('s'=>'Back to your account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
</span>
  </a>
  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
" class="account-link">
    <i class="material-icons">&#xE88A;</i>
    <span><?php echo smartyTranslate(array('s'=>'Home','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
</span>
  </a>

<?php }} ?>
