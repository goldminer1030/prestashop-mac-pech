<?php /* Smarty version Smarty-3.1.19, created on 2018-02-20 22:23:40
         compiled from "E:\xampp\htdocs\mac-peche\demo\modules\welcome\views\templates\lost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178355a8ce63cd3a8f6-29806599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28ab827f229e3dfb5be427f2eda8ddb933c5e5a5' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\modules\\welcome\\views\\templates\\lost.tpl',
      1 => 1519009108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178355a8ce63cd3a8f6-29806599',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8ce63cd43375_31903675',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8ce63cd43375_31903675')) {function content_5a8ce63cd43375_31903675($_smarty_tpl) {?>

<div class="onboarding onboarding-popup bootstrap">
  <div class="content">
    <p><?php echo smartyTranslate(array('s'=>'Hey! Are you lost?','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</p>
    <p><?php echo smartyTranslate(array('s'=>'To continue, click here:','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</p>
    <div class="text-center">
      <button class="btn btn-primary onboarding-button-goto-current"><?php echo smartyTranslate(array('s'=>'Continue','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</button>
    </div>
    <p><?php echo smartyTranslate(array('s'=>'If you want to stop the tutorial for good, click here:','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</p>
    <div class="text-center">
      <button class="btn btn-alert onboarding-button-stop"><?php echo smartyTranslate(array('s'=>'Quit the Welcome tutorial','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</button>
    </div>
  </div>
</div>
<?php }} ?>
