<?php /* Smarty version Smarty-3.1.12, created on 2017-04-14 14:29:19
         compiled from ".\tpl\index\fgs_user_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:2294658afd6b2a418d6-52348835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e8186789534f071f4c58c2f882f6786382dc6b5' => 
    array (
      0 => '.\\tpl\\index\\fgs_user_edit.htm',
      1 => 1492151357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2294658afd6b2a418d6-52348835',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58afd6b2a73251_78226980',
  'variables' => 
  array (
    'row' => 0,
    'role' => 0,
    'list_role' => 0,
    'aaa' => 0,
    'fgs' => 0,
    'fgs_list' => 0,
    'fgsrow' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58afd6b2a73251_78226980')) {function content_58afd6b2a73251_78226980($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?action=fgsuser&do=updata" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>用户名：</dt>
					<dd><input type="text" name="username" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" readonly/></dd>
				</dl>
				<dl>
					<dt>手机号:</dt>
					<dd><input type="text" name="mobile" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mobile'];?>
"/></dd>
				</dl>
				<dl>
					<dt>姓名：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
"/></dd>
				</dl>
				<dl>
					<dt>密 码：</dt>
					<dd><input name="password" class="" type="password" size="30"/></dd>
				</dl>
				<dl>
					<dt>角 色：</dt>
					<select name="roleid" id="role"> 
						<option value="<?php echo $_smarty_tpl->tpl_vars['role']->value['id'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['role']->value['title'];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['aaa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aaa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_role']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aaa']->key => $_smarty_tpl->tpl_vars['aaa']->value){
$_smarty_tpl->tpl_vars['aaa']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['aaa']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['aaa']->value['title'];?>
</option>
						<?php } ?>
					</select>
				</dl>
				<dl>
					<dt>所属部门：</dt>
					<select name="zz" id="zz"> 
						<option value="<?php echo $_smarty_tpl->tpl_vars['fgs']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['fgs']->value['name'];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['fgsrow'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fgsrow']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fgs_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fgsrow']->key => $_smarty_tpl->tpl_vars['fgsrow']->value){
$_smarty_tpl->tpl_vars['fgsrow']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['fgsrow']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['fgsrow']->value['name'];?>
</option>
						<?php } ?>
					</select>
				</dl>
				<dl>
					<dt>发 布：</dt>
					<dd><input type="text" name="" class="input" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['created_at'];?>
" readonly/></dd>
				</dl>
				
				<dl>
					<dt>更 新：</dt>
					<dd><input type="text" name="" class="input" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['updated_at'];?>
" readonly/></dd>
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
<script>
$('#role').change(function(){
	var roleid = $(this).children('option:selected').val(); 
	$.ajax({
		type:"POST",
		url:'http://dyz.duyiwang.cn/index.php?dir=index&action=user&do=cha_list',
		data:{"roleid":roleid},
		dataType:"html",
		success: function(msg){
			$("#zz").html(msg);	
		}
	});	
});
</script><?php }} ?>