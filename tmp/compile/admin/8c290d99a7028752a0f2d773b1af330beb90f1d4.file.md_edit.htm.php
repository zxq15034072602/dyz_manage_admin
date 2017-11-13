<?php /* Smarty version Smarty-3.1.12, created on 2017-10-16 16:00:17
         compiled from ".\tpl\admin\md_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1982059e467115ceec7-19008318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c290d99a7028752a0f2d773b1af330beb90f1d4' => 
    array (
      0 => '.\\tpl\\admin\\md_edit.htm',
      1 => 1498279178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1982059e467115ceec7-19008318',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'type' => 0,
    'bef_person' => 0,
    'store_user' => 0,
    'user' => 0,
    'fgs' => 0,
    'roww' => 0,
    'provinces' => 0,
    'rows' => 0,
    'img_names' => 0,
    'i' => 0,
    'img' => 0,
    'str_img_names' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59e46711648fe5_27581797',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59e46711648fe5_27581797')) {function content_59e46711648fe5_27581797($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data" action="?dir=admin&action=md&do=updata" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>门店名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
"/></dd>
				</dl>
				<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
				<dl>
					<dt>原店长：</dt>
					<dd>
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['bef_person']->value['name'];?>
" readonly>
					<input type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['bef_person']->value['id']){?><?php echo $_smarty_tpl->tpl_vars['bef_person']->value['id'];?>
<?php }else{ ?>0<?php }?>" name="bef_person">
					</dd>
				</dl>
				<dl>
					<dt>店长：</dt>
					<dd>
					<input type="hidden" name="old_person" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['person_id'];?>
">
					<select name="person_id">
					<option value="0">请选择</option>
					<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['store_user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['person_id']==$_smarty_tpl->tpl_vars['user']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</option>
					<?php } ?>
					</select>
					</dd>
				</dl>
				<dl>
					<dt>电话：</dt>
					<dd><input type="text" name="tel" class="required phone" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
"/></dd>
				</dl>
				<dl>
					<dt>所属分公司：</dt>
					<select name="fid">
						<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['fid'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fgsname'];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['roww'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['roww']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['roww']->key => $_smarty_tpl->tpl_vars['roww']->value){
$_smarty_tpl->tpl_vars['roww']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['roww']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['roww']->value['name'];?>
</option>
						<?php } ?>
					</select>
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
					<select name="selarea" id="selarea"  style="width:100px;margin-left: 5px">
					    <option value="0">请选择</option>
						
					</select>
				</dl>
				<dl style="width:100%">
					<dt>地址：</dt>
					<dd>
						<input type="text" name="address" class="required" size="60" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
"/>
					</dd>
				</dl>
				<dl style="width:100%">
					<dt>门店简介：</dt>
					<dd>
					    <textarea rows="3" cols="62" name="introduction" class="required"><?php echo $_smarty_tpl->tpl_vars['row']->value['introduction'];?>
</textarea>
					</dd>
				</dl>
				<dl style="width:100%">
					<dt>店铺展示(可多选上传)：</dt>
					<dd>
					    <input type="file" name="mendian_img[]" class="" multiple id="files" onchange="javascript:setImagePreviews();"/>
					     <p id="preview">
					     <?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['img_names']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value){
$_smarty_tpl->tpl_vars['img']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['img']->key;
?>
					     	<img id="img_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" src="img/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
" style="width:70px;height:70px;padding-right:15px"/>
					     	<input type="hidden" name="img_names[]" value="<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
"/>
					     <?php } ?>
					     </p>
					     <input type="hidden" name="old_img_names" value="<?php echo $_smarty_tpl->tpl_vars['str_img_names']->value;?>
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
$(function(){
	var province=$("#province").val();
	if(province){
		region.loadCities(province,"selCities",<?php echo $_smarty_tpl->tpl_vars['row']->value['cityid'];?>
);
		region.loadarea(<?php echo $_smarty_tpl->tpl_vars['row']->value['cityid'];?>
,"selarea",<?php echo $_smarty_tpl->tpl_vars['row']->value['areaid'];?>
)
	}
});



</script><?php }} ?>