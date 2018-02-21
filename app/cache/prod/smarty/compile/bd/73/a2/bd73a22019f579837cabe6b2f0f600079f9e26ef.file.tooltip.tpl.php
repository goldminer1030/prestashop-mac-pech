<?php /* Smarty version Smarty-3.1.19, created on 2018-02-20 21:21:54
         compiled from "E:\xampp\htdocs\mac-peche\demo\modules\welcome\views\templates\tooltip.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5485a8cd7c2a38940-05969161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd73a22019f579837cabe6b2f0f600079f9e26ef' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\modules\\welcome\\views\\templates\\tooltip.tpl',
      1 => 1519009108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5485a8cd7c2a38940-05969161',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8cd7c2a3dc39_21672948',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8cd7c2a3dc39_21672948')) {function content_5a8cd7c2a3dc39_21672948($_smarty_tpl) {?>

<div class="onboarding-tooltip">
  <div class="content"></div>
  <div class="onboarding-tooltipsteps">
    <div class="total"><?php echo smartyTranslate(array('s'=>'Step','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
 <span class="count">1/5</span></div>
    <div class="bulls">
    </div>
  </div>
  <button class="btn btn-primary btn-xs onboarding-button-next"><?php echo smartyTranslate(array('s'=>'Next','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</button>
</div>
<?php }} ?>
