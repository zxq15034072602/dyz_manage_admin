<?php /* Smarty version Smarty-3.1.12, created on 2018-01-13 16:16:10
         compiled from ".\tpl\admin\case_son_class_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:98655a59c04ab08486-33278091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91198f281669caf5fe40c107314463899399d0dd' => 
    array (
      0 => '.\\tpl\\admin\\case_son_class_new.htm',
      1 => 1515026354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98655a59c04ab08486-33278091',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a59c04ab45518_19432339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a59c04ab45518_19432339')) {function content_5a59c04ab45518_19432339($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=case_class&do=son_add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<input type="hidden" name="fatherid" value="<?php echo $_smarty_tpl->tpl_vars['name']->value['id'];?>
" />
				<dl>
					<dt>分类名称：</dt>
					<dd><input type="text" name="name1" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['name']->value['name'];?>
" disabled="disabled"/></dd>
				</dl>
				<dl>
					<dt>病症名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value=""/></dd>
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