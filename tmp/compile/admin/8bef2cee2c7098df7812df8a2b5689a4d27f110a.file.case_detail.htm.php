<?php /* Smarty version Smarty-3.1.12, created on 2017-12-05 11:44:40
         compiled from ".\tpl\admin\case_detail.htm" */ ?>
<?php /*%%SmartyHeaderCode:203295a221f743b7ef4-28224503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bef2cee2c7098df7812df8a2b5689a4d27f110a' => 
    array (
      0 => '.\\tpl\\admin\\case_detail.htm',
      1 => 1512445474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203295a221f743b7ef4-28224503',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a221f74446ed6_56971899',
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
<?php if ($_valid && !is_callable('content_5a221f74446ed6_56971899')) {function content_5a221f74446ed6_56971899($_smarty_tpl) {?>
<div class="page">
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
" src="http://192.168.1.138/dyz.duyiwang.cn/img/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
" style="width:70px;height:70px;padding-right:15px"/>
					     	<!-- <img id="img_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" src="./img/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
" style="width:70px;height:70px;padding-right:15px"/> -->
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
					<dd><script id="container" name="content" type="text/plain" style="width:512px;height:500px;">
        				</script></dd>
				</dl>
			<dl>
					<dt>调理过程：</dt>
					<dd><script id="container1" name="process" type="text/plain" style="width:512px;height:500px;">
        				</script></dd>
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
 <!-- 配置文件 -->
    <script type="text/javascript" src="http://192.168.1.106/dyz_manage_admin/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="http://192.168.1.106/dyz_manage_admin/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var editor = UE.getEditor('container');
        var editor1 = UE.getEditor('container1');
    </script><?php }} ?>