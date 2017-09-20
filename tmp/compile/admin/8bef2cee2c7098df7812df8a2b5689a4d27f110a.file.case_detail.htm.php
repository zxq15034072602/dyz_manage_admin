<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-17 12:00:54
         compiled from ".\tpl\admin\case_detail.htm" */ ?>
<?php /*%%SmartyHeaderCode:20185598c42d4025f92-74950004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-28 09:43:28
         compiled from ".\tpl\admin\case_detail.htm" */ ?>
<?php /*%%SmartyHeaderCode:22733599187377e6bc4-02980600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> upstream/master
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bef2cee2c7098df7812df8a2b5689a4d27f110a' => 
    array (
      0 => '.\\tpl\\admin\\case_detail.htm',
<<<<<<< HEAD
      1 => 1502942442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20185598c42d4025f92-74950004',
=======
      1 => 1503884593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22733599187377e6bc4-02980600',
>>>>>>> upstream/master
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
<<<<<<< HEAD
  'unifunc' => 'content_598c42d40610d5_71225100',
=======
  'unifunc' => 'content_599187377e6bc0_57590718',
>>>>>>> upstream/master
  'variables' => 
  array (
    'case' => 0,
    'md' => 0,
    'row' => 0,
    'sp' => 0,
    'img_names' => 0,
    'i' => 0,
    'img' => 0,
    'str_img_names' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<<<<<<< HEAD
<?php if ($_valid && !is_callable('content_598c42d40610d5_71225100')) {function content_598c42d40610d5_71225100($_smarty_tpl) {?><div class="page">
=======
<?php if ($_valid && !is_callable('content_599187377e6bc0_57590718')) {function content_599187377e6bc0_57590718($_smarty_tpl) {?><div class="page">
>>>>>>> upstream/master
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=case&do=update" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['id'];?>
" />
				<dl>
					<dt>来自门店：</dt>
					<select name="mid">
						<option value="<?php echo $_smarty_tpl->tpl_vars['case']->value['mid'];?>
"><?php echo $_smarty_tpl->tpl_vars['case']->value['mname'];?>
</option>					
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
						<option value="<?php echo $_smarty_tpl->tpl_vars['case']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['case']->value['gname'];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
						<?php } ?>
					</select>
				</dl>
			<dl style="width:100%">
					<dt>图片(第一张封面,第二张患者图片)：</dt>
					<dd>
					    <input type="file" name="img[]" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					     <p id="preview">
					     <?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['img_names']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value){
$_smarty_tpl->tpl_vars['img']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['img']->key;
?>
					     	<img id="img_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
<<<<<<< HEAD
" src="http://192.168.1.138/dyz.duyiwang.cn/img/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
=======
" src="./img/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
>>>>>>> upstream/master
" style="width:70px;height:70px;padding-right:15px"/>
					     	<input type="hidden" name="img_names[]" value="<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
"/>
					     <?php } ?>
					     </p>
					     <br/><br/><br/><br/><br/><br/>
					     <input type="hidden" name="old_img_names" value="<?php echo $_smarty_tpl->tpl_vars['str_img_names']->value;?>
"/>
					</dd>
				</dl>
				<dl>				    
					<dt>患者：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['name'];?>
"/></dd>
				</dl>
			
				<dl>
					<dt>年龄：</dt>
					<dd><input type="text" name="age" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['age'];?>
"/></dd>
				</dl>
				<dl>
					<dt>用药：</dt>
					<dd><input type="text" name="yongyao" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['yongyao'];?>
"/></dd>
				</dl>
				<dl>
					<dt>周期：</dt>
					<dd><input type="text" name="date" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['date'];?>
"/></dd>
				</dl>
				<dl>
					<dt>如何知道独一张：</dt>
					<dd><input type="text" name="way" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['way'];?>
"/></dd>
				</dl>

				<dl>
					<dt>康复故事：</dt>
					<dd><textarea name="content" rows="30" cols="60"><?php echo $_smarty_tpl->tpl_vars['case']->value['content'];?>
</textarea></dd>
				</dl>
				<dl>
					<dt>调理过程：</dt>
					<dd><textarea name="process" rows="30" cols="60"><?php echo $_smarty_tpl->tpl_vars['case']->value['process'];?>
</textarea></dd>
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