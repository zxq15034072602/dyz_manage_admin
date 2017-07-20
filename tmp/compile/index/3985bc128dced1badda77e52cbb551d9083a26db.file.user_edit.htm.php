<?php /* Smarty version Smarty-3.1.12, created on 2017-04-27 18:03:17
         compiled from ".\tpl\index\user_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:37758afd67f6788f2-73509558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3985bc128dced1badda77e52cbb551d9083a26db' => 
    array (
      0 => '.\\tpl\\index\\user_edit.htm',
      1 => 1493287378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37758afd67f6788f2-73509558',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58afd67f6aa276_41057488',
  'variables' => 
  array (
    'row' => 0,
    'list_role' => 0,
    'aaa' => 0,
    'zb_list' => 0,
    'zbrow' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58afd67f6aa276_41057488')) {function content_58afd67f6aa276_41057488($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?action=user&do=updata" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>用户名：</dt>
					<dd><input type="text" name="username" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" readonly /></dd>
				</dl>
				<dl>
					<dt>手机号：</dt>
					<dd><input type="text" name="mobile" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mobile'];?>
"  /></dd>
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
						<option value="0">总部</option>
						<?php  $_smarty_tpl->tpl_vars['zbrow'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['zbrow']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['zb_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['zbrow']->key => $_smarty_tpl->tpl_vars['zbrow']->value){
$_smarty_tpl->tpl_vars['zbrow']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['zbrow']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['zbrow']->value['name'];?>
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