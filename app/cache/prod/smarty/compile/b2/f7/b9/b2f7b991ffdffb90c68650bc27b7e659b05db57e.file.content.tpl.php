<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:25
         compiled from "E:\xampp\htdocs\mac-peche\demo\admin\themes\default\template\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102685a8a458546dac4-82760470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2f7b991ffdffb90c68650bc27b7e659b05db57e' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\admin\\themes\\default\\template\\content.tpl',
      1 => 1519009102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102685a8a458546dac4-82760470',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a4585474b50_18630984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a4585474b50_18630984')) {function content_5a8a4585474b50_18630984($_smarty_tpl) {?>
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
