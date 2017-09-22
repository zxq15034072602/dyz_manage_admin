<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:42:17
         compiled from ".\tpl\admin\gg_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1597159c229e9c2dfc0-64639073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b64d0df84ee291a8b047185c49394986453ee3a' => 
    array (
      0 => '.\\tpl\\admin\\gg_edit.htm',
      1 => 1505895234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1597159c229e9c2dfc0-64639073',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c229e9c6b055_12016290',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c229e9c6b055_12016290')) {function content_59c229e9c6b055_12016290($_smarty_tpl) {?>	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : 'kindeditor/plugins/code/prettify.css',
				uploadJson : 'kindeditor/php/upload_json.php',
				fileManagerJson : 'kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				//afterBlur: function () { this.sync(); },
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
<div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=gg&do=updata" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt style="float:left;">公告标题：</dt>
					<dd><input type="text" name="name" class="required" style="display:block;float:left;" size="60" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></dd>
				</dl>
				<br/><br/>	
				<textarea name="content" style="width:700px;height:200px;visibility:hidden;"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>
				
			</div>
			<div class="formBar">
				<ul>
					<li style="list-style-type:none;"><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div><?php }} ?>