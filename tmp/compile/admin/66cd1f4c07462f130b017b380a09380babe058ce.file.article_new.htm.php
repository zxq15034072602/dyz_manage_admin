<?php /* Smarty version Smarty-3.1.12, created on 2017-12-02 10:45:48
         compiled from ".\tpl\admin\article_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:19435a2213dcbc87f2-05074749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66cd1f4c07462f130b017b380a09380babe058ce' => 
    array (
      0 => '.\\tpl\\admin\\article_new.htm',
      1 => 1510640881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19435a2213dcbc87f2-05074749',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a2213dcbf0d26_34875492',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2213dcbf0d26_34875492')) {function content_5a2213dcbf0d26_34875492($_smarty_tpl) {?>	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
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
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=video&do=article_add" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<input type="hidden" name="vid" value="<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
" />
				<dl>
					<dt>标题</dt>
					<dd><input type="text" name="title" size="30" class="required" value=""/></dd>
				</dl>
				<dl>
					<dt>主讲人</dt>
					<dd><input type="text" name="teacher" size="30" class="required" value=""/></dd>
				</dl>
				<br/><br/>
				<p>图文详情</p>
				<br/><br/><br/><br/>
				<textarea name="content" placeholder="请输入产品详情" style="width:700px;height:200px;visibility:hidden;float:left;"></textarea>					
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