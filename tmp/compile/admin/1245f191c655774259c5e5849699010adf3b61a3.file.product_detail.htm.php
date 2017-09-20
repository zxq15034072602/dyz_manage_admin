<?php /* Smarty version Smarty-3.1.12, created on 2017-08-14 14:50:01
         compiled from ".\tpl\admin\product_detail.htm" */ ?>
<?php /*%%SmartyHeaderCode:8875598c0e38d900c4-36425757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1245f191c655774259c5e5849699010adf3b61a3' => 
    array (
      0 => '.\\tpl\\admin\\product_detail.htm',
      1 => 1502693291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8875598c0e38d900c4-36425757',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598c0e38dc7606_96324469',
  'variables' => 
  array (
    'row' => 0,
    'goods' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598c0e38dc7606_96324469')) {function content_598c0e38dc7606_96324469($_smarty_tpl) {?>	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
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
		<form method="post" action="?dir=admin&action=product&do=addpdetail" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<input type="hidden" name="gid" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['id'];?>
" />
				<dl>				    
					<dt>标题：</dt>
					<dd><input type="text" name="title" class="required" size="30" value=""/></dd>
				</dl>	
				<br/><br/>
				<p>产品详情</p>
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
</div><?php }} ?>