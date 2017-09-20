<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-14 17:38:03
         compiled from ".\tpl\admin\video_list_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:31173598fc66f8da1c9-94658082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-14 19:18:16
         compiled from ".\tpl\admin\video_list_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:2491599186f822de47-73910803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> upstream/master
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd93101acb6fc4efbc581cfbaff438e918ee1996c' => 
    array (
      0 => '.\\tpl\\admin\\video_list_new.htm',
      1 => 1502703476,
      2 => 'file',
    ),
  ),
<<<<<<< HEAD
  'nocache_hash' => '31173598fc66f8da1c9-94658082',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598fc66f8fd286_46033896',
=======
  'nocache_hash' => '2491599186f822de47-73910803',
  'function' => 
  array (
  ),
>>>>>>> upstream/master
  'variables' => 
  array (
    'vid' => 0,
  ),
  'has_nocache_code' => false,
<<<<<<< HEAD
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598fc66f8fd286_46033896')) {function content_598fc66f8fd286_46033896($_smarty_tpl) {?><div class="page">
=======
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_599186f822de49_46572890',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599186f822de49_46572890')) {function content_599186f822de49_46572890($_smarty_tpl) {?><div class="page">
>>>>>>> upstream/master
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=video&do=video_list_add" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<input type="hidden" name="vid" value="<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
" />
				<dl>
					<dt>标题</dt>
					<dd><input type="text" name="title" size="30" class="required" value=""/></dd>
				</dl>
				<dl>
					<dt>主讲人</dt>
					<dd><input type="text" name="teacher" size="30" class="required" value=""/></dd>
				</dl>
				<dl>
					<dt>url地址</dt>
					<dd><input type="text" name="url" size="30" class="required" value=""/></dd>
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