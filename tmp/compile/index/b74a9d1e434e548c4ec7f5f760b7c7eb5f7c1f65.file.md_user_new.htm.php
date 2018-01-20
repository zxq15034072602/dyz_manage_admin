<?php /* Smarty version Smarty-3.1.12, created on 2018-01-18 11:38:30
         compiled from ".\tpl\index\md_user_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:128175a6016b6273045-66811447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b74a9d1e434e548c4ec7f5f760b7c7eb5f7c1f65' => 
    array (
      0 => '.\\tpl\\index\\md_user_new.htm',
      1 => 1498285340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128175a6016b6273045-66811447',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'select_role_cn' => 0,
    'md' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a6016b6273047_76469820',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6016b6273047_76469820')) {function content_5a6016b6273047_76469820($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?action=mduser&do=add" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
				<dl>
					<dt>用户名：</dt>
					<dd><input type="text" name="username" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>手机号:</dt>
					<dd><input type="text" name="mobile" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>姓名：</dt>
					<dd><input type="text" name="name" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>密 码：</dt>
					<dd><input name="password" class="required" type="password" size="30"/></dd>
				</dl>
				<dl>
					<dt>职位：</dt>
					<dd><?php echo $_smarty_tpl->tpl_vars['select_role_cn']->value;?>
</dd>
				</dl>
				<dl>
					<dt>所属门店：</dt>
					<select name="md">
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['md']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
						<?php } ?>
					</select>
				</dl>
				<dl style="width:100%">
					<dt>头像：</dt>
					<dd>
					    <input type="file" name="head_img" class=""  id="files" onchange="javascript:setImagePreviews();"/>
					    <p id="preview"> 
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
</div><?php }} ?>