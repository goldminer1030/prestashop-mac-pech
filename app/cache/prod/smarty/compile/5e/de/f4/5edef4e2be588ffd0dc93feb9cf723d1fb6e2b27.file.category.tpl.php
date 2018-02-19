<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\catalog\_partials\miniatures\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200275a8a4583a5ce49-97782530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5edef4e2be588ffd0dc93feb9cf723d1fb6e2b27' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\catalog\\_partials\\miniatures\\category.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200275a8a4583a5ce49-97782530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a4583a6c4c0_95809020',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a4583a6c4c0_95809020')) {function content_5a8a4583a6c4c0_95809020($_smarty_tpl) {?>

  <section class="category-miniature">
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
      <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['image']['medium']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['image']['legend'], ENT_QUOTES, 'UTF-8');?>
">
    </a>

    <h1 class="h2">
      <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
    </h1>

    <div class="category-description"><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</div>
  </section>

<?php }} ?>
