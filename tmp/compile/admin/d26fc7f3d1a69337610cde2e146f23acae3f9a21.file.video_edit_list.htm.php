<?php /* Smarty version Smarty-3.1.12, created on 2017-12-01 16:30:15
         compiled from ".\tpl\admin\video_edit_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:165155a211317c7c2e9-86814187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd26fc7f3d1a69337610cde2e146f23acae3f9a21' => 
    array (
      0 => '.\\tpl\\admin\\video_edit_list.htm',
      1 => 1505895234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165155a211317c7c2e9-86814187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a211317c7c2e9_98434237',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a211317c7c2e9_98434237')) {function content_5a211317c7c2e9_98434237($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=video&do=updatevideo" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
				<input type="hidden" name="vid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['vid'];?>
" />
				<dl>
					<dt>视频标题</dt>
					<dd><input type="text" name="title" size="30" class="required" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"/></dd>
				</dl>
				<dl>
					<dt>主讲人</dt>
					<dd><input type="text" name="teacher" size="30" class="required" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['teacher'];?>
"/></dd>
				</dl>
				<dl>
					<dt>url地址</dt>
					<dd><input type="text" name="url" size="30" class="required" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"/></dd>
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