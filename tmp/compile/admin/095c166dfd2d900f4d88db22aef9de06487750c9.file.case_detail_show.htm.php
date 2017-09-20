<?php /* Smarty version Smarty-3.1.12, created on 2017-08-14 19:19:44
         compiled from ".\tpl\admin\case_detail_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:2742759918750b00313-05376455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '095c166dfd2d900f4d88db22aef9de06487750c9' => 
    array (
      0 => '.\\tpl\\admin\\case_detail_show.htm',
      1 => 1502365767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2742759918750b00313-05376455',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'case' => 0,
    'cArr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59918750b3d3a7_38958310',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59918750b3d3a7_38958310')) {function content_59918750b3d3a7_38958310($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=case&do=addcdetail" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<div class="pageFormContent" layoutH="56">
				<input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['id'];?>
" />
				<p>来自:<?php echo $_smarty_tpl->tpl_vars['cArr']->value['mname'];?>
</p>
				<dl>				    
					<dt>患者：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['cArr']->value['name'];?>
"/></dd>
				</dl>
			
				<dl>
					<dt>年龄：</dt>
					<dd><input type="text" name="age" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['cArr']->value['age'];?>
"/></dd>
				</dl>
				<dl>
					<dt>用药：</dt>
					<dd><input type="text" name="yongyao" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['cArr']->value['yongyao'];?>
"/></dd>
				</dl>
				<dl>
					<dt>周期：</dt>
					<dd><input type="text" name="date" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['cArr']->value['date'];?>
"/></dd>
				</dl>
				<dl>
					<dt>如何知道独一张：</dt>
					<dd><input type="text" name="way" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['cArr']->value['way'];?>
"/></dd>
				</dl>

				<dl>
					<dt>康复故事：</dt>
					<dd><textarea name="content" rows="30" cols="60"><?php echo $_smarty_tpl->tpl_vars['cArr']->value['content'];?>
</textarea></dd>
				</dl>
				<dl>
					<dt>调理过程：</dt>
					<dd><textarea name="process" rows="30" cols="60"><?php echo $_smarty_tpl->tpl_vars['cArr']->value['process'];?>
</textarea></dd>
				</dl>
			</div>
<!-- 			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div> -->
		</form>
	</div>
</div>
<!-- 				<dl>
					<dt>案例图片：</dt>
					<dd><input type="file" name="case_img" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					<p id="preview">
					        
					</p>
					
					</dd>
				</dl> --><?php }} ?>