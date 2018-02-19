<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\modules\ps_productinfo\views\templates\hook\ps_productinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115755a8a45837019a8-29142152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '563eab9334b679f9954ddc9a02715f9cf10098c0' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\modules\\ps_productinfo\\views\\templates\\hook\\ps_productinfo.tpl',
      1 => 1519009109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115755a8a45837019a8-29142152',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vars_nb_people' => 0,
    'vars_date_last_order' => 0,
    'vars_date_last_cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a458371bd84_53664085',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a458371bd84_53664085')) {function content_5a8a458371bd84_53664085($_smarty_tpl) {?>
<div class="js-productinfo mt-1">
  <?php if (isset($_smarty_tpl->tpl_vars['vars_nb_people']->value)) {?>
    <p>
      <?php if ($_smarty_tpl->tpl_vars['vars_nb_people']->value['%nb_people%']==1) {?>
        <?php echo smartyTranslate(array('s'=>'1 person is currently watching this product.','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

      <?php } else { ?>
        <?php echo smartyTranslate(array('s'=>'%nb_people% people are currently watching this product.','sprintf'=>$_smarty_tpl->tpl_vars['vars_nb_people']->value,'d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

      <?php }?>
    </p>
  <?php }?>

  <?php if (isset($_smarty_tpl->tpl_vars['vars_date_last_order']->value)) {?>
    <p><?php echo smartyTranslate(array('s'=>'Last time this product was bought: %date_last_order%','sprintf'=>$_smarty_tpl->tpl_vars['vars_date_last_order']->value,'d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</p>
  <?php }?>

  <?php if (isset($_smarty_tpl->tpl_vars['vars_date_last_cart']->value)) {?>
    <p><?php echo smartyTranslate(array('s'=>'Last time this product was added to a cart: %date_last_cart%','sprintf'=>$_smarty_tpl->tpl_vars['vars_date_last_cart']->value,'d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</p>
  <?php }?>
</div>
<?php }} ?>
