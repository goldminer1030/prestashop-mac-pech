<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:25
         compiled from "E:\xampp\htdocs\mac-peche\demo\admin\themes\default\template\content-legacy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116635a8a45853cceb1-48661986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba6ddbd4e879614d77efb44771d3ba612d118fc4' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\admin\\themes\\default\\template\\content-legacy.tpl',
      1 => 1519009102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116635a8a45853cceb1-48661986',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a4585403b29_64200497',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a4585403b29_64200497')) {function content_5a8a4585403b29_64200497($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }} ?>
