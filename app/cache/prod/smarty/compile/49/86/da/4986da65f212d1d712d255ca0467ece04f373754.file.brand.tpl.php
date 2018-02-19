<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\templates\catalog\_partials\miniatures\brand.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114665a8a4583a32db2-86880283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4986da65f212d1d712d255ca0467ece04f373754' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\templates\\catalog\\_partials\\miniatures\\brand.tpl',
      1 => 1519009110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114665a8a4583a32db2-86880283',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'brand' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a4583a47384_86193038',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a4583a47384_86193038')) {function content_5a8a4583a47384_86193038($_smarty_tpl) {?>

  <li class="brand">
    <div class="brand-img"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['image'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
"></a></div>
    <div class="brand-infos">
      <h3><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a></h3>
      <?php echo $_smarty_tpl->tpl_vars['brand']->value['text'];?>

    </div>
    <div class="brand-products">
      <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['nb_products'], ENT_QUOTES, 'UTF-8');?>
</a>
      <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'View products','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
    </div>
  </li>

<?php }} ?>
