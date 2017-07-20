<?php /* Smarty version Smarty-3.1.12, created on 2017-03-06 15:01:42
         compiled from ".\tpl\index\zb.htm" */ ?>
<?php /*%%SmartyHeaderCode:1186458b67653b99344-54956055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64b01153401c2984141386e0692a24b3b72d24ee' => 
    array (
      0 => '.\\tpl\\index\\zb.htm',
      1 => 1488783625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1186458b67653b99344-54956055',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58b67653bb7b82_96720107',
  'variables' => 
  array (
    'zb' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b67653bb7b82_96720107')) {function content_58b67653bb7b82_96720107($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['zb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
<?php } ?><?php }} ?>