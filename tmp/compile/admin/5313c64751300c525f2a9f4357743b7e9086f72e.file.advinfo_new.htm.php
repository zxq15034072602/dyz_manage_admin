<?php /* Smarty version Smarty-3.1.12, created on 2018-01-10 16:19:34
         compiled from ".\tpl\admin\advinfo_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:249635a55cc966faaf1-43029527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5313c64751300c525f2a9f4357743b7e9086f72e' => 
    array (
      0 => '.\\tpl\\admin\\advinfo_new.htm',
      1 => 1502938476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '249635a55cc966faaf1-43029527',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a55cc96737b88_75344243',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a55cc96737b88_75344243')) {function content_5a55cc96737b88_75344243($_smarty_tpl) {?><div class="page">
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