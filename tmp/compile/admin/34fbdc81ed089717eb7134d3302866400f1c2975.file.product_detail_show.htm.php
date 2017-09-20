<?php /* Smarty version Smarty-3.1.12, created on 2017-08-14 19:16:44
         compiled from ".\tpl\admin\product_detail_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:168145991869c26aed7-69981538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34fbdc81ed089717eb7134d3302866400f1c2975' => 
    array (
      0 => '.\\tpl\\admin\\product_detail_show.htm',
      1 => 1502693645,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168145991869c26aed7-69981538',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pArr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5991869c2a7f66_32099561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991869c2a7f66_32099561')) {function content_5991869c2a7f66_32099561($_smarty_tpl) {?>	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
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
					<dd><span><?php echo $_smarty_tpl->tpl_vars['pArr']->value['title'];?>
</span></dd>
				</dl>
				<br/><br/>
				<p>产品详情</p>
				<br/><br/><br/><br/>				
				<textarea name="content" placeholder="请输入产品详情" style="width:700px;height:200px;visibility:hidden;float:left;"><?php echo $_smarty_tpl->tpl_vars['pArr']->value['content'];?>
</textarea>		
			</div>
	</div>
</div><?php }} ?>