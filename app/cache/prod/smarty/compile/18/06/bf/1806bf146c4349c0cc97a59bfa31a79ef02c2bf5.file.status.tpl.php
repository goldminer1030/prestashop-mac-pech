<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:26
         compiled from "E:\xampp\htdocs\mac-peche\demo\admin\themes\default\template\controllers\currencies\status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181965a8a45860f1fb6-90643708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1806bf146c4349c0cc97a59bfa31a79ef02c2bf5' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\admin\\themes\\default\\template\\controllers\\currencies\\status.tpl',
      1 => 1519009103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181965a8a45860f1fb6-90643708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45861033a1_30424535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45861033a1_30424535')) {function content_5a8a45861033a1_30424535($_smarty_tpl) {?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel">
			<div class="panel-heading">
				<?php echo smartyTranslate(array('s'=>'Status','d'=>'Admin.Global'),$_smarty_tpl);?>

				<div id="currencyStatus" class="pull-right checkbox titatoggle unchecked-red checkbox-slider--b-flat">
					<label>
						<input type="checkbox" <?php echo 1==$_smarty_tpl->tpl_vars['status']->value ? 'checked="checked"' : '';?>
><span></span>
					</label>
				</div>
				<div class="clearfix"></div>
			</div>
			<span class="status disabled <?php echo 0==$_smarty_tpl->tpl_vars['status']->value ? '' : 'hide';?>
"><?php echo smartyTranslate(array('s'=>"This currency is disabled",'d'=>'Admin.International.Feature'),$_smarty_tpl);?>
</span>
			<span class="status enabled <?php echo 1==$_smarty_tpl->tpl_vars['status']->value ? '' : 'hide';?>
"><?php echo smartyTranslate(array('s'=>"This currency is enabled",'d'=>'Admin.International.Feature'),$_smarty_tpl);?>
</span>
		</div>
	</div>
</div>
<?php }} ?>
