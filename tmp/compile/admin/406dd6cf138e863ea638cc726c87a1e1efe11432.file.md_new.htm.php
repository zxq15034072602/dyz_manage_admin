<?php /* Smarty version Smarty-3.1.12, created on 2017-10-14 14:47:55
         compiled from ".\tpl\admin\md_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:1742459e1b31baaf693-17721932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '406dd6cf138e863ea638cc726c87a1e1efe11432' => 
    array (
      0 => '.\\tpl\\admin\\md_new.htm',
      1 => 1505895234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1742459e1b31baaf693-17721932',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'store_user' => 0,
    'user' => 0,
    'fgs' => 0,
    'row' => 0,
    'provinces' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59e1b31baec728_21976501',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e1b31baec728_21976501')) {function content_59e1b31baec728_21976501($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=md&do=add" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>门店名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value=""/></dd>
					<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
				</dl>
				
				<dl>
					<dt>店长：</dt>
					<dd>
					<select name="person_id">
					<option value=0>请选择</option>
					<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['store_user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</option>
					<?php } ?>
					</select>
					</dd>
				</dl>
				<dl>
					<dt>所属分公司：</dt>
					<select name="fid">
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
					<dt>所属地区：</dt>
					<select name="province" id="province" onchange="region.changed(this,'selCities',2)">
					    <option value="0">请选择</option>
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['provinces']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['provinceid'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['province'];?>
</option>
						<?php } ?>
					</select>
					<select name="selCities" id="selCities" onchange="region.changed(this,'selarea',3)" style="width:100px;margin-left: 5px">
					    <option value="0">请选择</option>
						
					</select>
					<select name="selarea" id="selarea"  style="width:100px;margin-left: 5px">
					    <option value="0">请选择</option>
						
					</select>
				</dl>
				
				<dl>
					<dt>电话：</dt>
					<dd><input type="text" name="tel" class="required phone" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>地址：</dt>
					<dd>
						<input type="text" name="address" class="required" size="60" value=""/>
					</dd>
				</dl>
				<dl style="width:100%">
					<dt>门店简介：</dt>
					<dd>
					    <textarea rows="3" cols="62" name="introduction" class="required"></textarea>
					</dd>
				</dl>
				<dl style="width:100%">
					<dt>店铺展示(可多选上传)：</dt>
					<dd>
					    <input type="file" name="mendian_img[]" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					     <p id="preview"> 
					     </p>
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
</div>
<?php }} ?>