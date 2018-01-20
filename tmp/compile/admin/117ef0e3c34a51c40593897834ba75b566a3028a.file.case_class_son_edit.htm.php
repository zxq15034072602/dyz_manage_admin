<?php /* Smarty version Smarty-3.1.12, created on 2018-01-13 16:16:19
         compiled from ".\tpl\admin\case_class_son_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:9515a59c0536809d2-01164542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '117ef0e3c34a51c40593897834ba75b566a3028a' => 
    array (
      0 => '.\\tpl\\admin\\case_class_son_edit.htm',
      1 => 1515027350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9515a59c0536809d2-01164542',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a59c0536bda65_09195614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a59c0536bda65_09195614')) {function content_5a59c0536bda65_09195614($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=case_class&do=son_update" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>分类名称：</dt>
					<dd><input type="text" name="cname" disable="disable" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cname'];?>
"/></dd>
				</dl>
				<dl>
					<dt>分类名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
"/></dd>
				</dl>
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div><?php }} ?>