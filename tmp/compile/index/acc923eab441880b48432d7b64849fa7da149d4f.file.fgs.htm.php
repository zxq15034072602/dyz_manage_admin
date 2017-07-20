<?php /* Smarty version Smarty-3.1.12, created on 2017-03-01 10:40:04
         compiled from ".\tpl\index\fgs.htm" */ ?>
<?php /*%%SmartyHeaderCode:2788858b634848f6594-82747724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acc923eab441880b48432d7b64849fa7da149d4f' => 
    array (
      0 => '.\\tpl\\index\\fgs.htm',
      1 => 1488276476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2788858b634848f6594-82747724',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fgs' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58b634849241f9_79052246',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b634849241f9_79052246')) {function content_58b634849241f9_79052246($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
<?php } ?><?php }} ?>