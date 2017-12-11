<?php /* Smarty version Smarty-3.1.12, created on 2017-12-01 14:51:50
         compiled from ".\tpl\admin\video_list_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:165055a20fc06d92d86-19015547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '165055a20fc06d92d86-19015547',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a20fc06dcfe13_82107658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a20fc06dcfe13_82107658')) {function content_5a20fc06dcfe13_82107658($_smarty_tpl) {?><div class="page">
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