<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:26
         compiled from "E:\xampp\htdocs\mac-peche\demo\admin\themes\default\template\controllers\logs\employee_field.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114215a8a4586855632-66483146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3f449ec6c94757bd7835f758816d7da53d411db' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\admin\\themes\\default\\template\\controllers\\logs\\employee_field.tpl',
      1 => 1519009103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114215a8a4586855632-66483146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'employee_image' => 0,
    'employee_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a458685b3a6_57720546',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a458685b3a6_57720546')) {function content_5a8a458685b3a6_57720546($_smarty_tpl) {?>
<span class="employee_avatar_small">
	<img class="imgm img-thumbnail" alt="" src="<?php echo $_smarty_tpl->tpl_vars['employee_image']->value;?>
" width="32" height="32" />
</span>
<?php echo $_smarty_tpl->tpl_vars['employee_name']->value;?>

<?php }} ?>
