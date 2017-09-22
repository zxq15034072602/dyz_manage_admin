<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:41:27
         compiled from ".\tpl\admin\gg_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:2694459c229b7006763-77910843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ae374c659e41200a4392fc94d9162dc9622e030' => 
    array (
      0 => '.\\tpl\\admin\\gg_new.htm',
      1 => 1505895234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2694459c229b7006763-77910843',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c229b7006762_65106472',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c229b7006762_65106472')) {function content_59c229b7006762_65106472($_smarty_tpl) {?>	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
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
		<form method="post" action="?dir=admin&action=gg&do=add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);" enctype="multipart/form-data" >		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt style="float:left;">公告标题：</dt>
					<dd><input type="text" name="name" style="display:block;float:left;" size="30" value=""/></dd>
				</dl>
				<br/><br/>
						<textarea name="content" style="width:700px;height:200px;visibility:hidden;float:left;"></textarea>	
			</div>

			<div class="formBar">
				<ul>
					<li style="list-style-type:none;"><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div><?php }} ?>