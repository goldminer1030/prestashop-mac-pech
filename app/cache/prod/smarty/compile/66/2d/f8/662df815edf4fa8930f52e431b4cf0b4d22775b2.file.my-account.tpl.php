<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\modules\ps_emailalerts\views\templates\hook\my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16895a8a45834ce297-25487793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '662df815edf4fa8930f52e431b4cf0b4d22775b2' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\modules\\ps_emailalerts\\views\\templates\\hook\\my-account.tpl',
      1 => 1519009109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16895a8a45834ce297-25487793',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45834d51b3_62718125',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45834d51b3_62718125')) {function content_5a8a45834d51b3_62718125($_smarty_tpl) {?>

<a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="emailsalerts"
   href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'ps_emailalerts','controller'=>'account'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'My alerts','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
">
  <span class="link-item">
  <i class="material-icons">&#xE151;</i>
    <?php echo smartyTranslate(array('s'=>'My alerts','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

  </span>
</a>
<?php }} ?>
