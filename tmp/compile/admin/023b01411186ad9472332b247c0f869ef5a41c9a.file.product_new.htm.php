<?php /* Smarty version Smarty-3.1.12, created on 2017-12-06 14:48:13
         compiled from ".\tpl\admin\product_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:107125a20fc1e29bcf9-27765018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '023b01411186ad9472332b247c0f869ef5a41c9a' => 
    array (
      0 => '.\\tpl\\admin\\product_new.htm',
      1 => 1512542883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107125a20fc1e29bcf9-27765018',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a20fc1e2d8d80_28230338',
  'variables' => 
  array (
    'pp' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a20fc1e2d8d80_28230338')) {function content_5a20fc1e2d8d80_28230338($_smarty_tpl) {?>
	<script type="text/javascript" charset="utf-8" src="http://app.duyiwang.cn/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://app.duyiwang.cn/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="http://app.duyiwang.cn/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=product&do=add" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>商品名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>所属品牌：</dt>
					<select name="pp">
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
						<?php } ?>
					</select>
				</dl>
				<dl>
					<dt>单价：</dt>
					<dd><input type="number" name="money" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>单位：</dt>
					<dd><input type="text" name="dw" class="required" size="20" value=""/></dd>
				</dl>
				<dl>
					<dt>是否推荐：</dt>
					<dd><input type="radio" name="is_recommend" value="1" checked/>是  &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="is_recommend" value="0"/>否</dd>
				</dl>
				<dl>
					<dt>商品链接：</dt>
					<dd><input type="text" name="good_url" class="" size="60" value=""/></dd>
				</dl>
				<dl>
					<dt>商品介绍：</dt>
					<dd><textarea cols="50" rows="6" name="description"></textarea></dd>
				</dl>
				<dl>
					<dt>商品图片：</dt>
					<dd><input type="file" name="good_img" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					<p id="preview">
					        
					</p>
					
					</dd>
				</dl>
				<br/><br/><br/><br/>
				<dl>
					<dt>产品详情标题：</dt>
					<dd><input type="text" name="title" class="" size="60" value=""/></dd>
				</dl>
				
				<dl>
					<dt>产品详情内容：</dt>
					<br/><br/><br/>
					<dd><script id="editor" name="content" type="text/plain" style="width:1024px;height:500px;"></script></dd>
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
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script><?php }} ?>