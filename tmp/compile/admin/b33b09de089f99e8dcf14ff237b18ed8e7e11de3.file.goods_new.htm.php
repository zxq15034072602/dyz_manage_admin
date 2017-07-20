<?php /* Smarty version Smarty-3.1.12, created on 2017-06-22 18:05:17
         compiled from ".\tpl\admin\goods_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:1682658b7bc06cecdb5-89130875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b33b09de089f99e8dcf14ff237b18ed8e7e11de3' => 
    array (
      0 => '.\\tpl\\admin\\goods_new.htm',
      1 => 1498118596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1682658b7bc06cecdb5-89130875',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58b7bc06d1aa21_57107870',
  'variables' => 
  array (
    'pp' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b7bc06d1aa21_57107870')) {function content_58b7bc06d1aa21_57107870($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=goods&do=add" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
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
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div><?php }} ?>