<?php /* Smarty version Smarty-3.1.12, created on 2017-08-10 20:31:05
         compiled from ".\tpl\admin\cheats_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:26794598c51e05bd0a3-40608163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f2c218111a66406a6f5606e839d5991667ee1bc' => 
    array (
      0 => '.\\tpl\\admin\\cheats_new.htm',
      1 => 1502368263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26794598c51e05bd0a3-40608163',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598c51e05db1b4_26067348',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598c51e05db1b4_26067348')) {function content_598c51e05db1b4_26067348($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=cheats&do=add" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>类别名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>类别介绍：</dt>
					<dd><textarea cols="40" rows="20" name="content"></textarea></dd>
				</dl>
				<dl>
					<dt>类别图片：</dt>
					<dd><input type="file" name="cheats_img" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					<p id="preview">
					        
					</p>
					
					</dd>
				</dl>
				
				<dl>
					<dt>主讲人：</dt>
					<dd><input type="number" name="teacher" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>视频标题：</dt>
					<dd><input type="text" name="title" class="required" size="20" value=""/></dd>
				</dl>
				<dl>
					<dt>视频url：</dt>
					<dd><input type="text" name="url" class="required" size="20" value=""/></dd>
				</dl>

				<dl>
					<dt>视频简介：</dt>
					<dd><textarea cols="40" rows="20" name="spcontent"></textarea></dd>
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