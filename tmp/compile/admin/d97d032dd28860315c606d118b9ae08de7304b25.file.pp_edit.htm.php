<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:58:14
         compiled from ".\tpl\admin\pp_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:361159c22da6b11892-43457182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd97d032dd28860315c606d118b9ae08de7304b25' => 
    array (
      0 => '.\\tpl\\admin\\pp_edit.htm',
      1 => 1500600483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '361159c22da6b11892-43457182',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c22da6b3fa80_91918780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c22da6b3fa80_91918780')) {function content_59c22da6b3fa80_91918780($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=pp&do=updata" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
				    <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />
					<dt>品牌名称：</dt>
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