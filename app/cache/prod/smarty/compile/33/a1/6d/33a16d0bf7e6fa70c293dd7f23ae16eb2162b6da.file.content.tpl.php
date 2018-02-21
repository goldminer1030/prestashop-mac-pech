<?php /* Smarty version Smarty-3.1.19, created on 2018-02-20 14:58:56
         compiled from "E:\xampp\htdocs\mac-peche\demo\admin288s2qepn\themes\default\template\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26985a8c7e001d0535-81356296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '26985a8c7e001d0535-81356296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8c7e001d8672_99742845',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8c7e001d8672_99742845')) {function content_5a8c7e001d8672_99742845($_smarty_tpl) {?>
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
