<?php /* Smarty version Smarty-3.1.12, created on 2017-03-06 14:37:53
         compiled from ".\tpl\admin\zongbu_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:1613358bd03c1a80f12-32177076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdfd751f3c5b318539f6de9623d5c8f00977d642' => 
    array (
      0 => '.\\tpl\\admin\\zongbu_new.htm',
      1 => 1488782269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1613358bd03c1a80f12-32177076',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58bd03c1aa7170_80485960',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58bd03c1aa7170_80485960')) {function content_58bd03c1aa7170_80485960($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=zongbu&do=add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>总部部门名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div><?php }} ?>