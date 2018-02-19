<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\modules\ps_facetedsearch\ps_facetedsearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:218235a8a458350aec8-64710828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8c75c94053d1b5c6d6646daa6e40e200434a767' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\modules\\ps_facetedsearch\\ps_facetedsearch.tpl',
      1 => 1519009109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '218235a8a458350aec8-64710828',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listing' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45835150b7_12684854',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45835150b7_12684854')) {function content_5a8a45835150b7_12684854($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['listing']->value['rendered_facets'])) {?>
<div id="search_filters_wrapper" class="hidden-sm-down">
  <div id="search_filter_controls" class="hidden-md-up">
      <span id="_mobile_search_filters_clear_all"></span>
      <button class="btn btn-secondary ok">
        <i class="material-icons">&#xE876;</i>
        <?php echo smartyTranslate(array('s'=>'OK','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

      </button>
  </div>
  <?php echo $_smarty_tpl->tpl_vars['listing']->value['rendered_facets'];?>

</div>
<?php }?>
<?php }} ?>
