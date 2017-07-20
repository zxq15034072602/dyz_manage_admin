<?php /* Smarty version Smarty-3.1.12, created on 2017-02-24 14:24:15
         compiled from ".\tpl\index\user_edit_pass.htm" */ ?>
<?php /*%%SmartyHeaderCode:1619858afd18f6ba3c1-45884391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf7e52e7bd27adf18258b5745318031efb7b5560' => 
    array (
      0 => '.\\tpl\\index\\user_edit_pass.htm',
      1 => 1446800652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1619858afd18f6ba3c1-45884391',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58afd18f6e8043_13811927',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58afd18f6e8043_13811927')) {function content_58afd18f6e8043_13811927($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?action=user&do=updatapass" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" style="display:none;"  name="id" value="<?php echo $_SESSION['userid'];?>
"/>
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>用户名：</dt>
					<dd><input type="text" name="username" class="required" size="30" value="<?php echo $_SESSION['username'];?>
" readonly/></dd>
				</dl>
				<dl>
					<dt>密 码：</dt>
					<dd><input name="password" class="required" type="password" size="30"/></dd>
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