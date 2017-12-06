<?php /* Smarty version Smarty-3.1.12, created on 2017-12-01 15:06:53
         compiled from ".\tpl\admin\advinfo_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:186425a20ff8df41825-78992839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5313c64751300c525f2a9f4357743b7e9086f72e' => 
    array (
      0 => '.\\tpl\\admin\\advinfo_new.htm',
      1 => 1510640881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186425a20ff8df41825-78992839',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a20ff8e01b531_44877661',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a20ff8e01b531_44877661')) {function content_5a20ff8e01b531_44877661($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=menu&do=add" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>标题</dt>
					<dd><input type="text" name="title" size="30" class="required" value=""/></dd>
				</dl>

				<dl>
					<dt>url</dt>
					<dd><input type="text" name="url" size="30" class="required" value=""/></dd>
				</dl>
				<dl>
					<dt>类型</dt>
					<dd><input type="text" name="type" size="30" class="required" value=""/></dd>
				</dl>
				<dl>
					<dt>图片</dt>
					<dd><input type="file" name="adv_img[]" class="" multiple id="files" onchange="javascript:setImagePreviews();"/></dd>
					 <p id="preview">
					 </p>
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
<?php }} ?>