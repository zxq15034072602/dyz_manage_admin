<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-14 11:01:35
         compiled from ".\tpl\admin\gg_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:122955971b6dd21c196-67365681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-09 09:53:25
         compiled from ".\tpl\admin\gg_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:18507598a6b1522de49-49181686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> upstream/master
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ae374c659e41200a4392fc94d9162dc9622e030' => 
    array (
      0 => '.\\tpl\\admin\\gg_new.htm',
<<<<<<< HEAD
      1 => 1502419110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122955971b6dd21c196-67365681',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5971b6dd24fca2_31812842',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5971b6dd24fca2_31812842')) {function content_5971b6dd24fca2_31812842($_smarty_tpl) {?>	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
=======
      1 => 1500877394,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18507598a6b1522de49-49181686',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598a6b1522de48_81997613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598a6b1522de48_81997613')) {function content_598a6b1522de48_81997613($_smarty_tpl) {?>	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
>>>>>>> upstream/master
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