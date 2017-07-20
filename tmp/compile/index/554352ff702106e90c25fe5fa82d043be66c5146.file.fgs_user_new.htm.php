<?php /* Smarty version Smarty-3.1.12, created on 2017-06-24 15:18:38
         compiled from ".\tpl\index\fgs_user_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:2384258b4cfbd390435-68399442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '554352ff702106e90c25fe5fa82d043be66c5146' => 
    array (
      0 => '.\\tpl\\index\\fgs_user_new.htm',
      1 => 1498286570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2384258b4cfbd390435-68399442',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58b4cfbd3be0a4_53313194',
  'variables' => 
  array (
    'type' => 0,
    'select_role_cn' => 0,
    'fgs' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b4cfbd3be0a4_53313194')) {function content_58b4cfbd3be0a4_53313194($_smarty_tpl) {?><div class="page">
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
				<dl>
					<dt>所属分公司：</dt>
					<select name="fgs">
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
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				</ul>
			</div>
		</form>
	</div>
</div><?php }} ?>