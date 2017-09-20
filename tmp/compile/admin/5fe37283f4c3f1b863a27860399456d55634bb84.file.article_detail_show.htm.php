<?php /* Smarty version Smarty-3.1.12, created on 2017-08-14 15:16:02
         compiled from ".\tpl\admin\article_detail_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:19216598fc29a33b528-62793015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fe37283f4c3f1b863a27860399456d55634bb84' => 
    array (
      0 => '.\\tpl\\admin\\article_detail_show.htm',
      1 => 1502693773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19216598fc29a33b528-62793015',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598fc29a368b22_01816562',
  'variables' => 
  array (
    'aArr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598fc29a368b22_01816562')) {function content_598fc29a368b22_01816562($_smarty_tpl) {?>	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
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
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>标题：</dt>
					<dd><span><?php echo $_smarty_tpl->tpl_vars['aArr']->value['title'];?>
</span></dd>
				</dl>
					<br/><br/>
				<p>图文详情</p>
				<br/><br/><br/><br/>
				<textarea name="content" placeholder="请输入产品详情" style="width:700px;height:200px;visibility:hidden;float:left;"><?php echo $_smarty_tpl->tpl_vars['aArr']->value['content'];?>
</textarea>		
			</div>
	</div>
</div><?php }} ?>