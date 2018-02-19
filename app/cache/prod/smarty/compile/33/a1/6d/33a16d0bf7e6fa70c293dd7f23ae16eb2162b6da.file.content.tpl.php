<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 00:04:42
         compiled from "E:\xampp\htdocs\mac-peche\demo\admin288s2qepn\themes\default\template\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:323005a8a5aea7936d9-97092585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33a16d0bf7e6fa70c293dd7f23ae16eb2162b6da' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\admin288s2qepn\\themes\\default\\template\\content.tpl',
      1 => 1519009102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '323005a8a5aea7936d9-97092585',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a5aea7997f9_21325678',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a5aea7997f9_21325678')) {function content_5a8a5aea7997f9_21325678($_smarty_tpl) {?>
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
