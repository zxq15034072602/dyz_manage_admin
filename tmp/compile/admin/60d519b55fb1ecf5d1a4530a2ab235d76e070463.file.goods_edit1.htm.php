<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:57:55
         compiled from ".\tpl\admin\goods_edit1.htm" */ ?>
<?php /*%%SmartyHeaderCode:4259c22d935d5993-20770712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d519b55fb1ecf5d1a4530a2ab235d76e070463' => 
    array (
      0 => '.\\tpl\\admin\\goods_edit1.htm',
      1 => 1500600483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4259c22d935d5993-20770712',
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
  'unifunc' => 'content_59c22d9364d616_08956845',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c22d9364d616_08956845')) {function content_59c22d9364d616_08956845($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=goods&do=updata1" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">
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
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div><?php }} ?>