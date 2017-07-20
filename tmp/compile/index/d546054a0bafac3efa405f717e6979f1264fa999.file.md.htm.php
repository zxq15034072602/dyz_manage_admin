<?php /* Smarty version Smarty-3.1.12, created on 2017-03-01 10:40:24
         compiled from ".\tpl\index\md.htm" */ ?>
<?php /*%%SmartyHeaderCode:559758b63498229c60-71926814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd546054a0bafac3efa405f717e6979f1264fa999' => 
    array (
      0 => '.\\tpl\\index\\md.htm',
      1 => 1488276356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '559758b63498229c60-71926814',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'md' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58b634982578c8_36734436',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b634982578c8_36734436')) {function content_58b634982578c8_36734436($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['md']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
<?php } ?><?php }} ?>