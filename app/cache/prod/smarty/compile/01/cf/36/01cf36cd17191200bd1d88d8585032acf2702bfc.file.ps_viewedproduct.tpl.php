<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\modules\ps_viewedproduct\views\template\hook\ps_viewedproduct.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154355a8a45838fb169-89053177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01cf36cd17191200bd1d88d8585032acf2702bfc' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\modules\\ps_viewedproduct\\views\\template\\hook\\ps_viewedproduct.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154355a8a45838fb169-89053177',
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
  'unifunc' => 'content_5a8a4583904630_33418213',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a4583904630_33418213')) {function content_5a8a4583904630_33418213($_smarty_tpl) {?>
<section class="featured-products clearfix mt-3">
  <h2><?php echo smartyTranslate(array('s'=>'Viewed products','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
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
