<?php /* Smarty version Smarty-3.1.19, created on 2018-02-19 04:33:23
         compiled from "E:\xampp\htdocs\mac-peche\demo\themes\classic\modules\ps_languageselector\ps_languageselector.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126505a8a458358cb84-73359910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4aea41f266e08a458cad7aba9114ccc59d9a9785' => 
    array (
      0 => 'E:\\xampp\\htdocs\\mac-peche\\demo\\themes\\classic\\modules\\ps_languageselector\\ps_languageselector.tpl',
      1 => 1519009109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126505a8a458358cb84-73359910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_language' => 0,
    'languages' => 0,
    'language' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5a8a45835a95d3_29433765',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8a45835a95d3_29433765')) {function content_5a8a45835a95d3_29433765($_smarty_tpl) {?>
<div id="_desktop_language_selector">
  <div class="language-selector-wrapper">
    <span id="language-selector-label" class="hidden-md-up"><?php echo smartyTranslate(array('s'=>'Language:','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
</span>
    <div class="language-selector dropdown js-dropdown">
      <button data-toggle="dropdown" class="hidden-sm-down btn-unstyle" aria-haspopup="true" aria-expanded="false" aria-label="<?php echo smartyTranslate(array('s'=>'Language dropdown','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
">
        <span class="expand-more"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['current_language']->value['name_simple'], ENT_QUOTES, 'UTF-8');?>
</span>
        <i class="material-icons expand-more">&#xE5C5;</i>
      </button>
      <ul class="dropdown-menu hidden-sm-down" aria-labelledby="language-selector-label">
        <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
          <li <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['current_language']->value['id_lang']) {?> class="current" <?php }?>>
            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'language','id'=>$_smarty_tpl->tpl_vars['language']->value['id_lang']),$_smarty_tpl);?>
" class="dropdown-item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['name_simple'], ENT_QUOTES, 'UTF-8');?>
</a>
          </li>
        <?php } ?>
      </ul>
      <select class="link hidden-md-up" aria-labelledby="language-selector-label">
        <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'language','id'=>$_smarty_tpl->tpl_vars['language']->value['id_lang']),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['current_language']->value['id_lang']) {?> selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['name_simple'], ENT_QUOTES, 'UTF-8');?>
</option>
        <?php } ?>
      </select>
    </div>
  </div>
</div>
<?php }} ?>
