<?php /* Smarty version Smarty-3.1.12, created on 2017-12-01 15:06:50
         compiled from ".\tpl\admin\advinfo_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:100775a20ff8a100a93-73195406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7018d7aaa078a9e4c55e92039306f4acb0700d7' => 
    array (
      0 => '.\\tpl\\admin\\advinfo_edit.htm',
      1 => 1511776256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100775a20ff8a100a93-73195406',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'img_names' => 0,
    'i' => 0,
    'img' => 0,
    'str_img_names' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a20ff8a153389_64982682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a20ff8a153389_64982682')) {function content_5a20ff8a153389_64982682($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data" action="?dir=admin&action=menu&do=updata" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>广告标题：</dt>
					<dd><input type="text" name="title" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></dd>
				</dl>
			  	<dl style="width:100%">
				<dl>
					<dt>url地址：</dt>
					<dd><input type="text" name="url"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"/></dd>
				</dl>
				<dl>
					<dt>类型：</dt>
					<dd><input type="text" name="type"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
"/></dd>
					<dl style="width:100%">
					<dt>图片(可多选上传)：</dt>
					<dd>
					    <input type="file" name="adv_img[]" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					     <p id="preview">
					     <?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['img_names']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value){
$_smarty_tpl->tpl_vars['img']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['img']->key;
?>

					     	<img id="img_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" src="http://192.168.1.138/dyz.duyiwang.cn/img/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
" style="width:70px;height:70px;padding-right:15px"/>
					     	<!-- <img id="img_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" src="/img/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
" style="width:70px;height:70px;padding-right:15px"/> -->
					     	<input type="hidden" name="img_names[]" value="<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
"/>
					     <?php } ?>
					     </p>
					     <input type="hidden" name="old_img_names" value="<?php echo $_smarty_tpl->tpl_vars['str_img_names']->value;?>
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