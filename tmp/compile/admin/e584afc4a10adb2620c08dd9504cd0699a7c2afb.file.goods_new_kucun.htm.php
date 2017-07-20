<?php /* Smarty version Smarty-3.1.12, created on 2017-03-02 15:24:21
         compiled from ".\tpl\admin\goods_new_kucun.htm" */ ?>
<?php /*%%SmartyHeaderCode:2883858b7c48185ca91-01994830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e584afc4a10adb2620c08dd9504cd0699a7c2afb' => 
    array (
      0 => '.\\tpl\\admin\\goods_new_kucun.htm',
      1 => 1488439457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2883858b7c48185ca91-01994830',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58b7c48188a6f8_75171572',
  'variables' => 
  array (
    'gid' => 0,
    'goods' => 0,
    'md' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b7c48188a6f8_75171572')) {function content_58b7c48188a6f8_75171572($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=goods&do=add_kucun&id=<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>商品名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['name'];?>
" readonly /></dd>
				</dl>
				<dl>
					<dt>所属门店：</dt>
					<select name="md">
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
					<dt>库存：</dt>
					<dd><input type="number" name="kucun" class="required" size="30" value=""/></dd>
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