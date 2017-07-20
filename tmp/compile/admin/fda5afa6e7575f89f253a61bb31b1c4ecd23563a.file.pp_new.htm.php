<?php /* Smarty version Smarty-3.1.12, created on 2017-06-24 18:11:22
         compiled from ".\tpl\admin\pp_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:4638594e3aca193c08-51964517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fda5afa6e7575f89f253a61bb31b1c4ecd23563a' => 
    array (
      0 => '.\\tpl\\admin\\pp_new.htm',
      1 => 1498298356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4638594e3aca193c08-51964517',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_594e3aca1d0c97_13886139',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_594e3aca1d0c97_13886139')) {function content_594e3aca1d0c97_13886139($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<form method="post" action="?dir=admin&action=pp&do=add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" name="id" value="" />
			<div class="pageFormContent" layoutH="56">
				<dl>
				    <input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" />
					<dt>品牌名称：</dt>
					<dd><input type="text" name="name" class="required" size="30" value=""/></dd>
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