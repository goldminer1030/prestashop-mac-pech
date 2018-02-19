<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\catalog\_partials\products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267605a8a4583dadb90-15095380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f231ec1b90315e06b3be8436d3cb47504e5d1c84' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\catalog\\_partials\\products.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267605a8a4583dadb90-15095380',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listing' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a4583dbe9b9_98623313',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a4583dbe9b9_98623313')) {function content_5a8a4583dbe9b9_98623313($_smarty_tpl) {?>
<div id="js-product-list">
  <div class="products row">
    <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listing']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
      
        <?php echo $_smarty_tpl->getSubTemplate ('catalog/_partials/miniatures/product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

      
    <?php } ?>
  </div>

  
    <?php echo $_smarty_tpl->getSubTemplate ('_partials/pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('pagination'=>$_smarty_tpl->tpl_vars['listing']->value['pagination']), 0);?>

  

  <div class="hidden-md-up text-xs-right up">
    <a href="#header" class="btn btn-secondary">
      <?php echo smartyTranslate(array('s'=>'Back to top','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

      <i class="material-icons">&#xE316;</i>
    </a>
  </div>
</div>
<?php }} ?>
