<?php /* Smarty version Smarty-3.1.12, created on 2017-11-13 11:41:49
         compiled from ".\tpl\admin\goods_edit_kucun.htm" */ ?>
<?php /*%%SmartyHeaderCode:66865a09147ddb9cf4-46543723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fe6b7db1f7c97ef037244278c79255c64cda09f' => 
    array (
      0 => '.\\tpl\\admin\\goods_edit_kucun.htm',
      1 => 1488444093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66865a09147ddb9cf4-46543723',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'kucun' => 0,
    'goods' => 0,
    'md' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a09147ddf6d89_40649530',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a09147ddf6d89_40649530')) {function content_5a09147ddf6d89_40649530($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=goods&do=updata_kucun&id=<?php echo $_smarty_tpl->tpl_vars['kucun']->value['id'];?>
" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>商品名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['name'];?>
" readonly /></dd>
				</dl>
				<dl>
					<dt>门店名称：</dt>
					<dd><input type="text" name="md" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['md']->value['name'];?>
" readonly /></dd>
				</dl>
				<dl>
					<dt>库存：</dt>
					<dd><input type="number" name="kucun" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['kucun']->value['kucun'];?>
"/></dd>
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