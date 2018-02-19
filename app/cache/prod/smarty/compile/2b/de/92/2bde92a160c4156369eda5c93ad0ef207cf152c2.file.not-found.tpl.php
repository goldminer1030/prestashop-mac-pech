<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:24
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\errors\not-found.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54595a8a45849972f3-76011417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bde92a160c4156369eda5c93ad0ef207cf152c2' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\errors\\not-found.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54595a8a45849972f3-76011417',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45849a37b1_76588050',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45849a37b1_76588050')) {function content_5a8a45849a37b1_76588050($_smarty_tpl) {?>
<section id="content" class="page-content page-not-found">
  

    <h4><?php echo smartyTranslate(array('s'=>'Sorry for the inconvenience.','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
</h4>
    <p><?php echo smartyTranslate(array('s'=>'Search again what you are looking for','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
</p>

    
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displaySearch'),$_smarty_tpl);?>

    

    
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayNotFound'),$_smarty_tpl);?>

    

  
</section>
<?php }} ?>
