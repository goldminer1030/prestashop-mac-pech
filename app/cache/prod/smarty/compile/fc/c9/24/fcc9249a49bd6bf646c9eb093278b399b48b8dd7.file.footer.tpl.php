<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:24
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\_partials\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:310435a8a4584aa1167-55207463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcc9249a49bd6bf646c9eb093278b399b48b8dd7' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\_partials\\footer.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '310435a8a4584aa1167-55207463',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a4584ab3639_56175855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a4584ab3639_56175855')) {function content_5a8a4584ab3639_56175855($_smarty_tpl) {?>
<div class="container">
  <div class="row">
    
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFooterBefore'),$_smarty_tpl);?>

    
  </div>
</div>
<div class="footer-container">
  <div class="container">
    <div class="row">
      
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFooter'),$_smarty_tpl);?>

      
    </div>
    <div class="row">
      
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFooterAfter'),$_smarty_tpl);?>

      
    </div>
    <div class="row">
      <div class="col-md-12">
        <p class="text-sm-center">
          
            <a class="_blank" href="http://www.prestashop.com" target="_blank">
              <?php echo smartyTranslate(array('s'=>'%copyright% %year% - Ecommerce software by %prestashop%','sprintf'=>array('%prestashop%'=>'PrestaShop™','%year%'=>date('Y'),'%copyright%'=>'©'),'d'=>'Shop.Theme.Global'),$_smarty_tpl);?>

            </a>
          
        </p>
      </div>
    </div>
  </div>
</div>
<?php }} ?>
