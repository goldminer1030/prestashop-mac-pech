<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\modules\ps_newproducts\views\templates\hook\ps_newproducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312865a8a45836e1837-39980025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff4e8e18d5d0ed0bb2877943d8fae95962a2408b' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\modules\\ps_newproducts\\views\\templates\\hook\\ps_newproducts.tpl',
      1 => 1519009109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312865a8a45836e1837-39980025',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'allNewProductsLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45836ed970_24904025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45836ed970_24904025')) {function content_5a8a45836ed970_24904025($_smarty_tpl) {?>

<section class="featured-products clearfix mt-3">
  <h1 class="h1 products-section-title text-uppercase">
    <?php echo smartyTranslate(array('s'=>'New products','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

  </h1>
  <div class="products">
    <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
      <?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

    <?php } ?>
  </div>
  <a class="all-product-link float-xs-left float-md-right h4" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['allNewProductsLink']->value, ENT_QUOTES, 'UTF-8');?>
">
    <?php echo smartyTranslate(array('s'=>'All new products','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
<i class="material-icons">&#xE315;</i>
  </a>
</section>

<?php }} ?>
