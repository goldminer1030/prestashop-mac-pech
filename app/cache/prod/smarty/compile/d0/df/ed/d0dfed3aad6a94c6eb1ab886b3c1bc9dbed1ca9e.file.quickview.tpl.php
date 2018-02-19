<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\catalog\_partials\quickview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:286795a8a4583dcab09-78948319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0dfed3aad6a94c6eb1ab886b3c1bc9dbed1ca9e' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\catalog\\_partials\\quickview.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '286795a8a4583dcab09-78948319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'urls' => 0,
    'static_token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a4583df43e5_83811470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a4583df43e5_83811470')) {function content_5a8a4583df43e5_83811470($_smarty_tpl) {?>
<div id="quickview-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" class="modal fade quickview" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <div class="row">
        <div class="col-md-6 col-sm-6 hidden-xs-down">
          
            <?php echo $_smarty_tpl->getSubTemplate ('catalog/_partials/product-cover-thumbnails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

          
          <div class="arrows js-arrows">
            <i class="material-icons arrow-up js-arrow-up">&#xE316;</i>
            <i class="material-icons arrow-down js-arrow-down">&#xE313;</i>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <h1 class="h1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</h1>
          
            <?php echo $_smarty_tpl->getSubTemplate ('catalog/_partials/product-prices.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

          
          
            <div id="product-description-short" itemprop="description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
          
          
            <div class="product-actions">
              <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
" method="post" id="add-to-cart-or-refresh">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="id_product" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" id="product_page_product_id">
                <input type="hidden" name="id_customization" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" id="product_customization_id">
                
                  <?php echo $_smarty_tpl->getSubTemplate ('catalog/_partials/product-variants.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                

                
                  <?php echo $_smarty_tpl->getSubTemplate ('catalog/_partials/product-add-to-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                

                
                  <input class="product-refresh" data-url-update="false" name="refresh" type="submit" value="<?php echo smartyTranslate(array('s'=>'Refresh','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
" hidden>
                
            </form>
          </div>
        
        </div>
      </div>
     </div>
     <div class="modal-footer">
       <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductAdditionalInfo','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

    </div>
   </div>
 </div>
</div>
<?php }} ?>
