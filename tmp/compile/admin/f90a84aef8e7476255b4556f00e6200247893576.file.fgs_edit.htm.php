<?php /* Smarty version Smarty-3.1.12, created on 2017-02-10 15:05:34
         compiled from ".\tpl\admin\fgs_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:5708589d6633917c52-66071495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f90a84aef8e7476255b4556f00e6200247893576' => 
    array (
      0 => '.\\tpl\\admin\\fgs_edit.htm',
      1 => 1486710330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5708589d6633917c52-66071495',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_589d6633954ce7_76404925',
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589d6633954ce7_76404925')) {function content_589d6633954ce7_76404925($_smarty_tpl) {?><div class="page">
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