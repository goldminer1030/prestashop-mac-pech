<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:24
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\checkout\_partials\cart-detailed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:327515a8a45840c4425-96378977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7567f886dff08a0cfb6f2dbf92267f8ec0ed2fb' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\checkout\\_partials\\cart-detailed.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327515a8a45840c4425-96378977',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45840dbbf5_60973646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45840dbbf5_60973646')) {function content_5a8a45840dbbf5_60973646($_smarty_tpl) {?>

  <div class="cart-overview js-cart" data-refresh-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'cart','params'=>array('ajax'=>true,'action'=>'refresh')),$_smarty_tpl);?>
">
    <?php if ($_smarty_tpl->tpl_vars['cart']->value['products']) {?>
    <ul class="cart-items">
      <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <li class="cart-item">
          
            <?php echo $_smarty_tpl->getSubTemplate ('checkout/_partials/cart-detailed-product-line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>

          
        </li>
        <?php if (count($_smarty_tpl->tpl_vars['product']->value['customizations'])>1) {?><hr><?php }?>
      <?php } ?>
    </ul>
    <?php } else { ?>
      <span class="no-items"><?php echo smartyTranslate(array('s'=>'There are no more items in your cart','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</span>
    <?php }?>
  </div>

<?php }} ?>
