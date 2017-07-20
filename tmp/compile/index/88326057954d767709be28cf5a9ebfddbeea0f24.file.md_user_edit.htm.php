<?php /* Smarty version Smarty-3.1.12, created on 2017-07-05 18:02:51
         compiled from ".\tpl\index\md_user_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1518958afd78ce45ed2-57088701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88326057954d767709be28cf5a9ebfddbeea0f24' => 
    array (
      0 => '.\\tpl\\index\\md_user_edit.htm',
      1 => 1499248967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1518958afd78ce45ed2-57088701',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58afd78ce73b43_73996327',
  'variables' => 
  array (
    'row' => 0,
    'type' => 0,
    'select_role_cn' => 0,
    'md' => 0,
    'md_list' => 0,
    'bbbb' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58afd78ce73b43_73996327')) {function content_58afd78ce73b43_73996327($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?action=mduser&do=updata" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
			<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
				<dl>
					<dt>用户名：</dt>
					<dd><input type="text" name="username" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
" readonly /></dd>
				</dl>
				<dl>
					<dt>手机号:</dt>
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
					<dt>职位：</dt>
					<dd><?php if ($_smarty_tpl->tpl_vars['row']->value['roleid']==3){?>
					<span style="color:red">更换店长请到门店管理中操作</span>
					<input type="hidden" name="roleid" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['roleid'];?>
">
					<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['select_role_cn']->value;?>
<?php }?></dd>

				</dl>
				<dl>
					<dt>所属门店：</dt>
					<dd>
					<select name="zz" id="zz"> 
						<option value="<?php echo $_smarty_tpl->tpl_vars['md']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['md']->value['name'];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['bbbb'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bbbb']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['md_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bbbb']->key => $_smarty_tpl->tpl_vars['bbbb']->value){
$_smarty_tpl->tpl_vars['bbbb']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['bbbb']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['bbbb']->value['name'];?>
</option>
						<?php } ?>
					</select>
					</dd>
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
				<dl style="width:100%">
					<dt>头像：</dt>
					<dd>
					    <input type="file" name="head_img" class=""  id="files" onchange="javascript:setImagePreviews();"/>
					     <p id="preview">
					        <?php if ($_smarty_tpl->tpl_vars['row']->value['head_img']){?>
					     	<img id="img" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['head_img'];?>
" style="width:70px;height:70px;padding-right:15px"/>
					     	<input type="hidden" name="head_img" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['head_img'];?>
"/>
					        <?php }?>
					     </p>
					     <input type="hidden" name="old_head_img" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['head_img'];?>
"/>
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