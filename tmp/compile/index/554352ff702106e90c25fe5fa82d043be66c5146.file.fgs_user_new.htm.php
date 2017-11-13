<?php /* Smarty version Smarty-3.1.12, created on 2017-10-31 10:26:50
         compiled from ".\tpl\index\fgs_user_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:3120559d7336e8ca513-78525860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '554352ff702106e90c25fe5fa82d043be66c5146' => 
    array (
      0 => '.\\tpl\\index\\fgs_user_new.htm',
      1 => 1509416781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3120559d7336e8ca513-78525860',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59d7336e905f39_80739901',
  'variables' => 
  array (
    'type' => 0,
    'select_role_cn' => 0,
    'provinces' => 0,
    'row' => 0,
    'fgs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d7336e905f39_80739901')) {function content_59d7336e905f39_80739901($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?action=fgsuser&do=add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
				    <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
					<dt>用户名：</dt>
					<dd><input type="text" name="username" class="required" size="30" value=""/></dd>
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
					<dt>手机号：</dt>
					<dd><input type="text" name="mobile" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>角 色：</dt>
					<dd><?php echo $_smarty_tpl->tpl_vars['select_role_cn']->value;?>
</dd>
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
				</dl>
				<dl>
					<dt>所有门店：</dt>
					<br/><br/>
					<ul>
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
						<li><input type="checkbox" name="mid[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" /><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</li>
						<?php } ?>
					</ul>
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