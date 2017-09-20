<?php /* Smarty version Smarty-3.1.12, created on 2017-08-13 16:34:50
         compiled from ".\tpl\admin\file_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:20156598a81f91a3815-52389803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f71ddd930c336d1cd9b828ced6b044fea177e4aa' => 
    array (
      0 => '.\\tpl\\admin\\file_new.htm',
      1 => 1502613037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20156598a81f91a3815-52389803',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598a81f91c1d29_59453861',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598a81f91c1d29_59453861')) {function content_598a81f91c1d29_59453861($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=file&do=add" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>文件名</dt>
					<dd><input type="file" name="filename[]" class="" multiple id="files" onchange="javascript:setImagePreviews();"/></dd>
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

			<!-- 	<dl>
					<dt>文件类型</dt>
					<dd>
					<input type="radio" name="type" value="0"/>产品资料
					<input type="radio" name="type" value="1"/>营销秘籍
					<input type="radio" name="type" value="2"/>康复案例
					
					</dd>
				</dl> -->
<?php }} ?>