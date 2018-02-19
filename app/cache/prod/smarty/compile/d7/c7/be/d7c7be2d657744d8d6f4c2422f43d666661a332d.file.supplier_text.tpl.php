<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\modules\ps_supplierlist\views\templates\_partials\supplier_text.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187145a8a45838d9860-77808087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7c7be2d657744d8d6f4c2422f43d666661a332d' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\modules\\ps_supplierlist\\views\\templates\\_partials\\supplier_text.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187145a8a45838d9860-77808087',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'suppliers' => 0,
    'text_list_nb' => 0,
    'supplier' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45838e9d95_42523458',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45838e9d95_42523458')) {function content_5a8a45838e9d95_42523458($_smarty_tpl) {?>

<ul>
  <?php  $_smarty_tpl->tpl_vars['supplier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['supplier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['suppliers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['supplier_list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['supplier']->key => $_smarty_tpl->tpl_vars['supplier']->value) {
$_smarty_tpl->tpl_vars['supplier']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['supplier_list']['iteration']++;
?>
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['supplier_list']['iteration']<=$_smarty_tpl->tpl_vars['text_list_nb']->value) {?>
      <li class="facet-label">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['supplier']->value['link'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['supplier']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['supplier']->value['name'], ENT_QUOTES, 'UTF-8');?>

        </a>
      </li>
    <?php }?>
  <?php } ?>
</ul>
<?php }} ?>
