<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:52:03
         compiled from ".\tpl\admin\product_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:2208659c22c33ab1201-73036603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb73c699f798b0ef457e42227c91d3433a919950' => 
    array (
      0 => '.\\tpl\\admin\\product_edit.htm',
      1 => 1505895234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2208659c22c33ab1201-73036603',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'pp' => 0,
    'roww' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c22c33ab1200_49805624',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c22c33ab1200_49805624')) {function content_59c22c33ab1200_49805624($_smarty_tpl) {?><link rel="stylesheet" href="kindeditor/themes/default/default.css" />
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
		<form method="post" action="?dir=admin&action=product&do=update" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
					<dl>
					<dt>商品名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
"/></dd>
				</dl>
				<dl>
					<dt>单 价：</dt>
					<dd><input type="number" name="money" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['money'];?>
"/></dd>
				</dl>
				<dl>
					<dt>单 位：</dt>
					<dd><input type="text" name="dw" class="required" size="15" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['dw'];?>
"/></dd>
				</dl>
				<dl>
					<dt>所属品牌：</dt>
					<select name="pp">
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['ppid'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['ppname'];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['roww'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['roww']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['roww']->key => $_smarty_tpl->tpl_vars['roww']->value){
$_smarty_tpl->tpl_vars['roww']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['roww']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['roww']->value['name'];?>
</option>
						<?php } ?>
					</select>
				</dl>
				<dl>
					<dt>是否推荐：</dt>
					<?php if ($_smarty_tpl->tpl_vars['row']->value['is_recommend']){?>
					<dd><input type="radio" name="is_recommend" value="1" checked/>是  &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="is_recommend" value="0"/>否</dd>
				    <?php }else{ ?>
				    <dd><input type="radio" name="is_recommend" value="1" />是  &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="is_recommend" value="0" checked/>否</dd>
				    <?php }?>
				</dl>
				<dl>
					<dt>商品链接：</dt>
					<dd><input type="text" name="good_url" class="" size="60" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['good_url'];?>
"/></dd>
				</dl>
				<dl>
					<dt>商品介绍：</dt>
					<dd><textarea cols="50" rows="6" name="description"><?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
</textarea></dd>
				</dl>
				<dl>
					<dt>商品图片：</dt>
					<dd><input type="file" name="good_img" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					<p id="preview">
					        <?php if ($_smarty_tpl->tpl_vars['row']->value['good_img']){?>

					     	<img id="img" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['good_img'];?>
" style="width:70px;height:70px;padding-right:15px"/>
					     	<input type="hidden" name="good_img" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['good_img'];?>
"/>
					        <?php }?>
					</p>
					<input type="hidden" name="old_good_img" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['good_img'];?>
"/>
					</dd>
				</dl>
				<br/><br/><br/><br/>
				<dl>
					<dt>产品详情标题：</dt>
					<dd><input type="text" name="title" class="" size="60" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></dd>
				</dl>
				<br/><br/><br/><br/><br/><br/>
				<p>产品详情内容</p>
				<br/><br/><br/><br/>
				<br/><br/><br/><br/>
				<br/><br/><br/><br/>
				<br/><br/><br/><br/>
				<br/><br/><br/><br/>
				<br/><br/><br/><br/>
				<br/><br/><br/><br/>
				<br/><br/><br/><br/>
				<textarea name="content" placeholder="请输入产品详情" style="width:700px;height:200px;visibility:hidden;float:left;"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>			
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div><?php }} ?>