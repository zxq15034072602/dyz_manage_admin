<?php /* Smarty version Smarty-3.1.12, created on 2018-01-13 14:42:09
         compiled from ".\tpl\admin\case_class_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:251755a59aa41367284-09783440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28c6a123e57736b73263b7f8f8a5a85aa46b87f4' => 
    array (
      0 => '.\\tpl\\admin\\case_class_new.htm',
      1 => 1515721126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '251755a59aa41367284-09783440',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a59aa413a4315_70229075',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a59aa413a4315_70229075')) {function content_5a59aa413a4315_70229075($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=case_class&do=add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>分类名称：</dt>
					<dd><input type="text" name="name" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>图标url：</dt>
					<dd><input type="text" name="img" size="30" value=""/></dd>
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