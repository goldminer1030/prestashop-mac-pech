<?php /* Smarty version Smarty-3.1.19, created on 2018-02-20 21:21:54
         compiled from "E:\xampp\htdocs\mac-peche\demo\admin288s2qepn\themes\default\template\helpers\modules_list\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7035a8cd7c27174e9-32824412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '068aedc474cc7c0ae3689756f83e26aa45a55355' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\admin288s2qepn\\themes\\default\\template\\helpers\\modules_list\\modal.tpl',
      1 => 1519009103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7035a8cd7c27174e9-32824412',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8cd7c271e742_78184908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8cd7c271e742_78184908')) {function content_5a8cd7c271e742_78184908($_smarty_tpl) {?>
<div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules and Services'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab_modal" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.fancybox-quick-view').fancybox({
			type: 'ajax',
			autoDimensions: false,
			autoSize: false,
			width: 600,
			height: 'auto',
			helpers: {
				overlay: {
					locked: false
				}
			}
		});
	});
</script>
<?php }} ?>
