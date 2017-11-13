<?php /* Smarty version Smarty-3.1.12, created on 2017-10-31 10:41:43
         compiled from ".\tpl\index\fgs_user_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1382759d71e770ed5c9-26061316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e8186789534f071f4c58c2f882f6786382dc6b5' => 
    array (
      0 => '.\\tpl\\index\\fgs_user_edit.htm',
      1 => 1509417471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1382759d71e770ed5c9-26061316',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59d71e771557b4_39163762',
  'variables' => 
  array (
    'row' => 0,
    'select_role_cn' => 0,
    'provinces' => 0,
    'rows' => 0,
    'fgs' => 0,
    'md' => 0,
    'fgs_list' => 0,
    'fgsrow' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d71e771557b4_39163762')) {function content_59d71e771557b4_39163762($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?action=fgsuser&do=updata" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<input type="hidden" name="zz" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['zz'];?>
" />			
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>用户名：</dt>
					<dd><input type="text" name="username" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" readonly/></dd>
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
					<dt>手机号：</dt>
					<dd><input type="text" name="mobile" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mobile'];?>
"/></dd>
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
						<?php  $_smarty_tpl->tpl_vars['rows'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rows']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['provinces']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->key => $_smarty_tpl->tpl_vars['rows']->value){
$_smarty_tpl->tpl_vars['rows']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['provinceid'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['provinceid']==$_smarty_tpl->tpl_vars['rows']->value['provinceid']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['rows']->value['province'];?>
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
					<?php  $_smarty_tpl->tpl_vars['md'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['md']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['md']->key => $_smarty_tpl->tpl_vars['md']->value){
$_smarty_tpl->tpl_vars['md']->_loop = true;
?>
					<li><input type="checkbox" name="mid[]" value="<?php echo $_smarty_tpl->tpl_vars['md']->value['id'];?>
" checked="checked"/><?php echo $_smarty_tpl->tpl_vars['md']->value['name'];?>
</li>
					<?php } ?>
					<?php  $_smarty_tpl->tpl_vars['fgsrow'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fgsrow']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fgs_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fgsrow']->key => $_smarty_tpl->tpl_vars['fgsrow']->value){
$_smarty_tpl->tpl_vars['fgsrow']->_loop = true;
?>
					<li><input type="checkbox" name="mid[]" value="<?php echo $_smarty_tpl->tpl_vars['fgsrow']->value['id'];?>
" /><?php echo $_smarty_tpl->tpl_vars['fgsrow']->value['name'];?>
</li>
					<?php } ?>
				</ul>
					
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