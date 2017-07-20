<?php /* Smarty version Smarty-3.1.12, created on 2017-03-06 14:37:23
         compiled from ".\tpl\admin\zongbu_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1600858bd038236b120-76783637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6cc8e359fd998c5a13f6b399c980178a71f7eee' => 
    array (
      0 => '.\\tpl\\admin\\zongbu_edit.htm',
      1 => 1488782235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1600858bd038236b120-76783637',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58bd0382395093_60460714',
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58bd0382395093_60460714')) {function content_58bd0382395093_60460714($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=zongbu&do=updata" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>总部部门名称：</dt>
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