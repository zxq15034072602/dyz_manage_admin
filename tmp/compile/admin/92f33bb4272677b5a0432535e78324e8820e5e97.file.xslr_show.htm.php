<?php /* Smarty version Smarty-3.1.12, created on 2017-10-06 14:42:59
         compiled from ".\tpl\admin\xslr_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:92059d6f7a412b2f6-61209704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92f33bb4272677b5a0432535e78324e8820e5e97' => 
    array (
      0 => '.\\tpl\\admin\\xslr_show.htm',
      1 => 1507272166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92059d6f7a412b2f6-61209704',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59d6f7a4229a32_19441843',
  'variables' => 
  array (
    'verify_info' => 0,
    'good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d6f7a4229a32_19441843')) {function content_59d6f7a4229a32_19441843($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'F:\\wamp\\www\\dyz_manage_admin\\lib\\plugins\\modifier.truncate.php';
?><div class="page">
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=xslr&do=update" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>录入人员：</dt>
					<dd><?php echo $_smarty_tpl->tpl_vars['verify_info']->value['name'];?>
</dd>
				</dl>
				<dl>
					<dt>销售产品：</dt>
					<dd>
						<ul>
			               <?php  $_smarty_tpl->tpl_vars['good'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['good']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['verify_info']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['good']->key => $_smarty_tpl->tpl_vars['good']->value){
$_smarty_tpl->tpl_vars['good']->_loop = true;
?>
			                <?php if ($_smarty_tpl->tpl_vars['good']->value['goods_type']==0){?>
			               <li>
			                   <span><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['good']->value['name'],7,'');?>
</span><br/>
			                   <span>数量<?php echo $_smarty_tpl->tpl_vars['good']->value['count'];?>
</span><br/>
			                   <span>总价￥<?php echo $_smarty_tpl->tpl_vars['good']->value['count']*$_smarty_tpl->tpl_vars['good']->value['money'];?>
</span>
			                   <br/>
			               </li>
			               <br/>
			               <?php }?>
			               <?php } ?>
			               
			           	</ul>					
					</dd>
				</dl>
				<dl>
					<dt>赠品：</dt>
					<dd>
						 <ul>
			                <?php  $_smarty_tpl->tpl_vars['good'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['good']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['verify_info']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['good']->key => $_smarty_tpl->tpl_vars['good']->value){
$_smarty_tpl->tpl_vars['good']->_loop = true;
?>			                 
		                 	<?php if ($_smarty_tpl->tpl_vars['good']->value['goods_type']==1){?>
				                <li>
				                    <span><?php echo $_smarty_tpl->tpl_vars['good']->value['name'];?>
</span>
				                    <span>数量<?php echo $_smarty_tpl->tpl_vars['good']->value['count'];?>
</span>
				                    <span></span>
				                </li>
				                <br/>
			                <?php }?>
			                <?php } ?>
			            </ul>				
					</dd>
				</dl>
				<dl>
					<dt>实际收款额：</dt>
					<dd>￥<?php echo $_smarty_tpl->tpl_vars['verify_info']->value['sale_price'];?>
</dd>
				</dl>
				<dl>
					<dt>录入时间：</dt>
					<dd><?php echo $_smarty_tpl->tpl_vars['verify_info']->value['addtime'];?>
</dd>
				</dl>					
			</div>
		</form>
	</div>
</div> <?php }} ?>