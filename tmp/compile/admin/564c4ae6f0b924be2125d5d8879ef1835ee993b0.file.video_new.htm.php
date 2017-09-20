<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-13 09:49:15
         compiled from ".\tpl\admin\video_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:200598fae56b84e48-05709852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-14 19:16:51
         compiled from ".\tpl\admin\video_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:20872599186a3b00315-07304022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> upstream/master
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '564c4ae6f0b924be2125d5d8879ef1835ee993b0' => 
    array (
      0 => '.\\tpl\\admin\\video_new.htm',
      1 => 1502588948,
      2 => 'file',
    ),
  ),
<<<<<<< HEAD
  'nocache_hash' => '200598fae56b84e48-05709852',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598fae56ba2cb8_97143285',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598fae56ba2cb8_97143285')) {function content_598fae56ba2cb8_97143285($_smarty_tpl) {?><div class="page">
=======
  'nocache_hash' => '20872599186a3b00315-07304022',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_599186a3b00317_38884292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599186a3b00317_38884292')) {function content_599186a3b00317_38884292($_smarty_tpl) {?><div class="page">
>>>>>>> upstream/master
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=video&do=video_add" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>名称</dt>
					<dd><input type="text" name="name" size="30" class="required" value=""/></dd>
				</dl>
				<dl>
					<dt>简介：</dt>
					<dd><textarea cols="50" rows="6" name="content"></textarea></dd>
				</dl>
								<dl>
					<dt>文件类型</dt>
					<dd>
					<input type="radio" name="type" value="0"/>视频
					<input type="radio" name="type" value="1"/>图文					
					</dd>
				</dl>
				<dl>
					<dt>图片：</dt>
					<dd><input type="file" name="video_img" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
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
</div>
<?php }} ?>