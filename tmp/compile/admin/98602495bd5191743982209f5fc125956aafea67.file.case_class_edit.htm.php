<?php /* Smarty version Smarty-3.1.12, created on 2018-01-13 14:42:28
         compiled from ".\tpl\admin\case_class_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:60475a59aa548e2f74-10757770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98602495bd5191743982209f5fc125956aafea67' => 
    array (
      0 => '.\\tpl\\admin\\case_class_edit.htm',
      1 => 1515721308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60475a59aa548e2f74-10757770',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a59aa54920000_80466545',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a59aa54920000_80466545')) {function content_5a59aa54920000_80466545($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=case_class&do=update" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>分类名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
"/></dd>
				</dl>
 				<dl>
					<dt>图标url：</dt>
					<dd><input type="text" name="img" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['iconfont'];?>
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