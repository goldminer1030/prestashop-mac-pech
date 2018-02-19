<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:24
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\checkout\_partials\steps\unreachable.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287855a8a45843c0866-41082432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a42b1c3b1f57a41405b4ec4321c9683dd9ac115' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\checkout\\_partials\\steps\\unreachable.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287855a8a45843c0866-41082432',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'identifier' => 0,
    'position' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45844332b4_31202703',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45844332b4_31202703')) {function content_5a8a45844332b4_31202703($_smarty_tpl) {?>

  <section class="checkout-step -unreachable" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8');?>
">
    <h1 class="step-title h3">
      <span class="step-number"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['position']->value, ENT_QUOTES, 'UTF-8');?>
</span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>

    </h1>
  </section>

<?php }} ?>
