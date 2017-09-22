<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:57:40
         compiled from ".\tpl\admin\fgs_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:2483159c22d84156726-12367552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f90a84aef8e7476255b4556f00e6200247893576' => 
    array (
      0 => '.\\tpl\\admin\\fgs_edit.htm',
      1 => 1500600483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2483159c22d84156726-12367552',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c22d84184f57_68353160',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c22d84184f57_68353160')) {function content_59c22d84184f57_68353160($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=fgs&do=updata" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>分公司名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
"/></dd>
				</dl>
				<dl>
					<dt>电话：</dt>
					<dd><input type="text" name="tel" class="required phone" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
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