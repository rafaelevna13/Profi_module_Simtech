<?php
/* Smarty version 4.1.0, created on 2023-01-26 22:37:28
  from '/Applications/MAMP/htdocs/cscart/design/backend/templates/addons/rus_payments/hooks/index/scripts.post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d2d6788f60e3_62079525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '354a0f68224646ddff800685d6ca3d6974c5a374' => 
    array (
      0 => '/Applications/MAMP/htdocs/cscart/design/backend/templates/addons/rus_payments/hooks/index/scripts.post.tpl',
      1 => 1665485680,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d2d6788f60e3_62079525 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/cscart/app/functions/smarty_plugins/function.script.php','function'=>'smarty_function_script',),));
echo smarty_function_script(array('src'=>"js/addons/rus_payments/yandex_checkpoint.js"),$_smarty_tpl);
}
}
