<?php /* Smarty version Smarty-3.1.12, created on 2017-02-10 14:59:36
         compiled from ".\tpl\admin\fgs_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:24149589d64484deb18-63163315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6c16a214a35aad4b9aca410123223ce2f155700' => 
    array (
      0 => '.\\tpl\\admin\\fgs_new.htm',
      1 => 1486709865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24149589d64484deb18-63163315',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_589d6448517e86_99700506',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589d6448517e86_99700506')) {function content_589d6448517e86_99700506($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=fgs&do=add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>分公司名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>电话：</dt>
					<dd><input type="text" name="tel" class="required phone" size="30" value=""/></dd>
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