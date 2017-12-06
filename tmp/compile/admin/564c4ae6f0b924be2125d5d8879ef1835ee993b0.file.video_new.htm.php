<?php /* Smarty version Smarty-3.1.12, created on 2017-12-01 15:04:52
         compiled from ".\tpl\admin\video_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:83535a20feb35f9dd8-18008027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '564c4ae6f0b924be2125d5d8879ef1835ee993b0' => 
    array (
      0 => '.\\tpl\\admin\\video_new.htm',
      1 => 1512111888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83535a20feb35f9dd8-18008027',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a20feb3615d18_42467395',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a20feb3615d18_42467395')) {function content_5a20feb3615d18_42467395($_smarty_tpl) {?>
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
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
				afterBlur: function () { this.sync(); },
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
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=video&do=video_add" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>名称</dt>
					<dd><input type="text" name="name" size="30" class="required" value=""/></dd>
				</dl>
				<dl>
					<dt>简介：</dt>
					<dd ><textarea name="content" placeholder="请输入产品详情" style="width:700px;height:200px;visibility:hidden;float:left;"></textarea></dd>
				</dl>
								<dl>
					<dt>文件类型</dt>
					<dd>
					<input type="radio" name="type" value="0"/>视频
					<input type="radio" name="type" value="1"/>图文					
					</dd>
				</dl>
				<dl>
					<dt>图片：</dt>
					<dd><input type="file" name="video_img" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					<p id="preview">
					        
					</p>
					
					</dd>
				</dl>

			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div>
<?php }} ?>