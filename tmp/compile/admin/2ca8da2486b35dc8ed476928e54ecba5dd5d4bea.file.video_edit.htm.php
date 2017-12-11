<?php /* Smarty version Smarty-3.1.12, created on 2017-12-01 14:52:42
         compiled from ".\tpl\admin\video_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:4035a20fc3a1a85e7-70466867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ca8da2486b35dc8ed476928e54ecba5dd5d4bea' => 
    array (
      0 => '.\\tpl\\admin\\video_edit.htm',
      1 => 1502939473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4035a20fc3a1a85e7-70466867',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a20fc3a1e5672_74622047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a20fc3a1e5672_74622047')) {function content_5a20fc3a1e5672_74622047($_smarty_tpl) {?>
<div class="page">
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=video&do=updatevideo" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>名称</dt>
					<dd><input type="text" name="name" size="30" class="required" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
"/></dd>
				</dl>
				<dl>
					<dt>简介：</dt>
					<dd><textarea cols="50" rows="6" name="content"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea></dd>
				</dl>
								<dl>
					<dt>文件类型</dt>
					<dd>
					<?php if ($_smarty_tpl->tpl_vars['row']->value['type']==0){?>
					<input type="radio" name="type" value="0" checked="checked"/>视频
					<input type="radio" name="type" value="1"/>图文			
					<?php }else{ ?>
					<input type="radio" name="type" value="0"/>视频
					<input type="radio" name="type" value="1" checked="checked"/>图文		
					<?php }?>
					</dd>
				</dl>
				<dl>
					<dt>图片：</dt>
					<dd><input type="file" name="video_img" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					<p id="preview">
					 	<?php if ($_smarty_tpl->tpl_vars['row']->value['video_img']){?>
					      <img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['video_img'];?>
"  style="width:70px;height:70px;padding-right:15px"/>  
						  <input type="hidden" name="video_img" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['video_img'];?>
"/>
					</p>
						<?php }?>
					</dd>
				</dl>
			 <input type="hidden" name="old_img_names" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['video_img'];?>
"/> 				
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