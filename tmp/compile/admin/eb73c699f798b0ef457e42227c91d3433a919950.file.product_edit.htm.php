<?php /* Smarty version Smarty-3.1.12, created on 2017-12-07 08:47:20
         compiled from ".\tpl\admin\product_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:24135a221824a35d10-51913514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb73c699f798b0ef457e42227c91d3433a919950' => 
    array (
      0 => '.\\tpl\\admin\\product_edit.htm',
      1 => 1512607616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24135a221824a35d10-51913514',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a221824ad26e2_96887205',
  'variables' => 
  array (
    'row' => 0,
    'pp' => 0,
    'roww' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a221824ad26e2_96887205')) {function content_5a221824ad26e2_96887205($_smarty_tpl) {?>
	<script type="text/javascript" charset="utf-8" src="http://192.168.1.106/dyz_manage_admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://192.168.1.106/dyz_manage_admin/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="http://192.168.1.106/dyz_manage_admin/ueditor/lang/zh-cn/zh-cn.js"></script>
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
	
				<dl>
					<dt>产品详情内容</dt>
					<dd><script id="editor" name="content" type="text/plain" style="width:1024px;height:500px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</script></dd>
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