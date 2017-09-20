<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-17 11:22:46
         compiled from ".\tpl\admin\case_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:19427598c22b0d73a54-90421267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-28 09:13:41
         compiled from ".\tpl\admin\case_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:1850559918729b7a437-21302938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> upstream/master
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97a7b76b4fac79e0150a2fafdc2419f7288b8d90' => 
    array (
      0 => '.\\tpl\\admin\\case_new.htm',
<<<<<<< HEAD
      1 => 1502940038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19427598c22b0d73a54-90421267',
=======
      1 => 1503882817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1850559918729b7a437-21302938',
>>>>>>> upstream/master
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
<<<<<<< HEAD
  'unifunc' => 'content_598c22b0db7693_25939401',
=======
  'unifunc' => 'content_59918729bb74c3_23939233',
>>>>>>> upstream/master
  'variables' => 
  array (
    'md' => 0,
    'row' => 0,
    'sp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<<<<<<< HEAD
<?php if ($_valid && !is_callable('content_598c22b0db7693_25939401')) {function content_598c22b0db7693_25939401($_smarty_tpl) {?><div class="page">
=======
<?php if ($_valid && !is_callable('content_59918729bb74c3_23939233')) {function content_59918729bb74c3_23939233($_smarty_tpl) {?><div class="page">
>>>>>>> upstream/master
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=case&do=add" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>来自门店：</dt>
					<select name="mid">
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
				<dl>
					<dt>产品：</dt>
					<select name="gid">
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
						<?php } ?>
					</select>
				</dl>
			<dl>
					<dt>图片(第一张封面,第二张患者)：</dt>
					<dd><input type="file" name="img[]" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					<p id="preview">
					        
					</p>
					<br/><br/><br/><br/><br/>
					</dd>
				</dl>  
				
				<dl>				    
					<dt>患者：</dt>
					<dd><input type="text" name="name" class="required" size="30" value=""/></dd>
				</dl>
			
				<dl>
					<dt>年龄：</dt>
					<dd><input type="text" name="age" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>用药：</dt>
					<dd><input type="text" name="yongyao" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>周期：</dt>
					<dd><input type="text" name="date" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>如何知道独一张：</dt>
					<dd><input type="text" name="way" class="required" size="30" value=""/></dd>
				</dl>

				<dl>
					<dt>康复故事：</dt>
					<dd><textarea name="content" rows="30" cols="60"></textarea></dd>
				</dl>
				<dl>
					<dt>调理过程：</dt>
					<dd><textarea name="process" rows="30" cols="60"></textarea></dd>
				</dl>
				<dl>
 
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div><?php }} ?>