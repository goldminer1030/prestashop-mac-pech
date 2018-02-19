<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:27
         compiled from "E:\xampp\htdocs\mac-peche\demo\admin\themes\default\template\controllers\modules\warning_module.tpl" */ ?>
<?php /*%%SmartyHeaderCode:317705a8a4587043350-50740147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8e7cf9f1f0e9ff7c0edfac71a2d958c51e627b5' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\admin\\themes\\default\\template\\controllers\\modules\\warning_module.tpl',
      1 => 1519009103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317705a8a4587043350-50740147',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_link' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45870492a9_05160393',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45870492a9_05160393')) {function content_5a8a45870492a9_05160393($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['module_link']->value,'html','UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</a>
<?php }} ?>
