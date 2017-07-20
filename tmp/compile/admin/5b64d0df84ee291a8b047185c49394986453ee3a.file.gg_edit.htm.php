<?php /* Smarty version Smarty-3.1.12, created on 2017-03-07 10:14:35
         compiled from ".\tpl\admin\gg_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1765358a26c6ab95ad1-92147175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b64d0df84ee291a8b047185c49394986453ee3a' => 
    array (
      0 => '.\\tpl\\admin\\gg_edit.htm',
      1 => 1487039897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1765358a26c6ab95ad1-92147175',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58a26c6abbfa49_41616634',
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58a26c6abbfa49_41616634')) {function content_58a26c6abbfa49_41616634($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=gg&do=updata" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>公告标题：</dt>
					<dd><input type="text" name="name" class="required" size="60" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></dd>
				</dl>
				<dl>
					<dt>公告图片：</dt>
					<dd><img name="img" class="required" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['img'];?>
"/></dd>
				</dl>
				<dl>
					<dt>公告内容：</dt>
					<dd><textarea name="content" rows="20" cols="50"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea></dd>
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