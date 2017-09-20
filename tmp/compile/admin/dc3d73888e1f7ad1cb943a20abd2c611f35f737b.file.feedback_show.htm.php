<?php /* Smarty version Smarty-3.1.12, created on 2017-08-10 16:11:20
         compiled from ".\tpl\admin\feedback_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:29909594cb295df9946-38852851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc3d73888e1f7ad1cb943a20abd2c611f35f737b' => 
    array (
      0 => '.\\tpl\\admin\\feedback_show.htm',
      1 => 1500600483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29909594cb295df9946-38852851',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_594cb295e369d4_19985380',
  'variables' => 
  array (
    'feedbackinfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_594cb295e369d4_19985380')) {function content_594cb295e369d4_19985380($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>反馈人：</dt>
					<dd><span><?php echo $_smarty_tpl->tpl_vars['feedbackinfo']->value['user']['name'];?>
</span></dd>
				</dl>
				<dl>
					<dt>反馈内容：</dt>
					<dd><textarea name="content" rows="20" cols="50"><?php echo $_smarty_tpl->tpl_vars['feedbackinfo']->value['content'];?>
</textarea></dd>
				</dl>
			</div>
	</div>
</div><?php }} ?>