<?php /* Smarty version Smarty-3.1.12, created on 2017-11-04 17:11:28
         compiled from ".\tpl\index\user_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:1235759fd8440ec4da6-94405029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83d069c3dbd8577d94d49b45c1b1937b407f76ca' => 
    array (
      0 => '.\\tpl\\index\\user_new.htm',
      1 => 1492141881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1235759fd8440ec4da6-94405029',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'select_role_cn' => 0,
    'zb' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59fd8440f01e33_84119442',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fd8440f01e33_84119442')) {function content_59fd8440f01e33_84119442($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?action=user&do=add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
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
					<dt>角 色：</dt>
					<dd><?php echo $_smarty_tpl->tpl_vars['select_role_cn']->value;?>
</dd>
				</dl>
				<dl>
					<dt>所属部门：</dt>
					<select name="zz" > 
						<option value="0">总 部</option>
						<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['zb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</option>
						<?php } ?>
					</select>
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