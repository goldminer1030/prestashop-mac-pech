<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:26
         compiled from "E:\xampp\htdocs\mac-peche\demo\admin\themes\default\template\controllers\modules\readmore-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212955a8a4586e7d645-08476499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '995fc35613c30ba0b1a84f4dbc963713a5aa0044' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\admin\\themes\\default\\template\\controllers\\modules\\readmore-header.tpl',
      1 => 1519009103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212955a8a4586e7d645-08476499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'displayName' => 0,
    'version' => 0,
    'author' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a4586e85783_71046073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a4586e85783_71046073')) {function content_5a8a4586e85783_71046073($_smarty_tpl) {?>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 class="modal-title">
	<div class="module_name">
		<a href="#" class="icon icon-chevron-left" onclick="openModulesList()"></a>
			<?php echo $_smarty_tpl->tpl_vars['displayName']->value;?>

			<small class="text-muted"><?php echo smartyTranslate(array('s'=>'v'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
 - <?php echo smartyTranslate(array('s'=>'by'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['author']->value;?>
</small>
	</div>
</h3>
<?php }} ?>
