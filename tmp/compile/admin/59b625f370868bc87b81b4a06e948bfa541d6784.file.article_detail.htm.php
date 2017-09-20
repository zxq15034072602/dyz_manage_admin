<?php /* Smarty version Smarty-3.1.12, created on 2017-08-13 10:55:56
         compiled from ".\tpl\admin\article_detail.htm" */ ?>
<?php /*%%SmartyHeaderCode:18596598fbf6e4a5089-84643916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59b625f370868bc87b81b4a06e948bfa541d6784' => 
    array (
      0 => '.\\tpl\\admin\\article_detail.htm',
      1 => 1502592943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18596598fbf6e4a5089-84643916',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598fbf6e4d4102_69605222',
  'variables' => 
  array (
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598fbf6e4d4102_69605222')) {function content_598fbf6e4d4102_69605222($_smarty_tpl) {?>	<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
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
		<form method="post" action="?dir=admin&action=video&do=addarticle" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<div class="pageFormContent" layoutH="56">
				<input type="hidden" name="aid" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" />
				<dl>				    
					<dt>标题：</dt>
					<dd><input type="text" name="title" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
"/></dd>
				</dl>	
				<dl>				    
					<dt>主讲人：</dt>
					<dd><input type="text" name="teacher" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['teacher'];?>
"/></dd>
				</dl>	
				<br/><br/><br/><br/>
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
</div><?php }} ?>