<?php
/* Smarty version 4.1.0, created on 2023-01-26 22:38:12
  from '/Applications/MAMP/htdocs/cscart/design/themes/responsive/templates/addons/geo_maps/hooks/index/styles.post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d2d6a46cf3b1_49978123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05be57e3d6ee3c5151d3210bdd13fcb689c2b333' => 
    array (
      0 => '/Applications/MAMP/htdocs/cscart/design/themes/responsive/templates/addons/geo_maps/hooks/index/styles.post.tpl',
      1 => 1674761748,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d2d6a46cf3b1_49978123 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/cscart/app/functions/smarty_plugins/function.style.php','function'=>'smarty_function_style',),1=>array('file'=>'/Applications/MAMP/htdocs/cscart/app/functions/smarty_plugins/function.set_id.php','function'=>'smarty_function_set_id',),));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);
echo smarty_function_style(array('src'=>"addons/geo_maps/styles.less"),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/geo_maps/hooks/index/styles.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/geo_maps/hooks/index/styles.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else {
echo smarty_function_style(array('src'=>"addons/geo_maps/styles.less"),$_smarty_tpl);?>

<?php }
}
}
