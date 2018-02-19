<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:24
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\checkout\_partials\order-final-summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157425a8a45842719e3-23860089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f939530f0ea0c20140a5ba3e3422cc4c96abc3e5' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\checkout\\_partials\\order-final-summary.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157425a8a45842719e3-23860089',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'customer' => 0,
    'selected_delivery_option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a458429e213_76947457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a458429e213_76947457')) {function content_5a8a458429e213_76947457($_smarty_tpl) {?>
<section id="order-summary-content" class="page-content page-order-confirmation">
  <div class="row">
    <div class="col-md-12">
      <h4 class="h4 black"><?php echo smartyTranslate(array('s'=>'Please check your order before payment','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</h4>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h4 class="h4">
      <?php echo smartyTranslate(array('s'=>'Addresses','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

        <span class="step-edit step-to-addresses js-edit-addresses"><i class="material-icons edit">mode_edit</i> <?php echo smartyTranslate(array('s'=>'edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span>
      </h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card noshadow">
        <div class="card-block">
          <h4 class="h5 black addresshead"><?php echo smartyTranslate(array('s'=>'Your Delivery Address','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</h4>
          <?php echo $_smarty_tpl->tpl_vars['customer']->value['addresses'][$_smarty_tpl->tpl_vars['cart']->value['id_address_delivery']]['formatted'];?>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card noshadow">
        <div class="card-block">
          <h4 class="h5 black addresshead"><?php echo smartyTranslate(array('s'=>'Your Invoice Address','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</h4>
          <?php echo $_smarty_tpl->tpl_vars['customer']->value['addresses'][$_smarty_tpl->tpl_vars['cart']->value['id_address_invoice']]['formatted'];?>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h4 class="h4">
      <?php echo smartyTranslate(array('s'=>'Shipping Method','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

        <span class="step-edit step-to-delivery js-edit-delivery"><i class="material-icons edit">mode_edit</i> <?php echo smartyTranslate(array('s'=>'edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span>
      </h4>

      <div class="col-md-12 summary-selected-carrier">
        <div class="row">
          <div class="col-md-2">
            <div class="logo-container">
              <?php if ($_smarty_tpl->tpl_vars['selected_delivery_option']->value['logo']) {?>
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
              <?php } else { ?>
                &nbsp;
              <?php }?>
            </div>
          </div>
          <div class="col-md-4">
            <span class="carrier-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
          <div class="col-md-4">
            <span class="carrier-delay"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['delay'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
          <div class="col-md-2">
            <span class="carrier-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    
      <?php echo $_smarty_tpl->getSubTemplate ('checkout/_partials/order-final-summary-table.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['cart']->value['products'],'products_count'=>$_smarty_tpl->tpl_vars['cart']->value['products_count'],'subtotals'=>$_smarty_tpl->tpl_vars['cart']->value['subtotals'],'totals'=>$_smarty_tpl->tpl_vars['cart']->value['totals'],'labels'=>$_smarty_tpl->tpl_vars['cart']->value['labels'],'add_product_link'=>true), 0);?>

    
  </div>
</section>
<?php }} ?>
