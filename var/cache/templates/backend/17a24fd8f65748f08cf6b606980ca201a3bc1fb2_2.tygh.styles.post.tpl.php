<?php
/* Smarty version 4.1.0, created on 2023-01-26 22:37:27
  from '/Applications/MAMP/htdocs/cscart/design/backend/templates/addons/help_center/hooks/index/styles.post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d2d67765f154_24841188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17a24fd8f65748f08cf6b606980ca201a3bc1fb2' => 
    array (
      0 => '/Applications/MAMP/htdocs/cscart/design/backend/templates/addons/help_center/hooks/index/styles.post.tpl',
      1 => 1665485680,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d2d67765f154_24841188 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/cscart/app/functions/smarty_plugins/function.style.php','function'=>'smarty_function_style',),));
if ((defined('ACCOUNT_TYPE') ? constant('ACCOUNT_TYPE') : null) === "admin") {?>
    <?php echo smarty_function_style(array('src'=>"addons/help_center/styles.less"),$_smarty_tpl);?>

<?php }
}
}
