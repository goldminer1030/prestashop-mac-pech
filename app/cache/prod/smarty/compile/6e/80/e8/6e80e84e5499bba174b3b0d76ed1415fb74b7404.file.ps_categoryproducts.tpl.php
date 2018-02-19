<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\modules\ps_categoryproducts\views\templates\hook\ps_categoryproducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113715a8a4583311244-10745844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e80e84e5499bba174b3b0d76ed1415fb74b7404' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\modules\\ps_categoryproducts\\views\\templates\\hook\\ps_categoryproducts.tpl',
      1 => 1519009109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113715a8a4583311244-10745844',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a458332a175_94390835',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a458332a175_94390835')) {function content_5a8a458332a175_94390835($_smarty_tpl) {?>
<section class="featured-products clearfix mt-3">
  <h2>
    <?php if (count($_smarty_tpl->tpl_vars['products']->value)==1) {?>
      <?php echo smartyTranslate(array('s'=>'%s other product in the same category:','sprintf'=>array(count($_smarty_tpl->tpl_vars['products']->value)),'d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

    <?php } else { ?>
      <?php echo smartyTranslate(array('s'=>'%s other products in the same category:','sprintf'=>array(count($_smarty_tpl->tpl_vars['products']->value)),'d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

    <?php }?>
  </h2>
  <div class="products">
      <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
          <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

      <?php } ?>
  </div>
</section>
<?php }} ?>
