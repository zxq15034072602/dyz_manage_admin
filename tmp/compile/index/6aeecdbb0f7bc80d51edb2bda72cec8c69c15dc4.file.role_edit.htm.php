<?php /* Smarty version Smarty-3.1.12, created on 2017-02-10 10:22:04
         compiled from ".\tpl\index\role_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:18634589d23cc927de2-75108671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aeecdbb0f7bc80d51edb2bda72cec8c69c15dc4' => 
    array (
      0 => '.\\tpl\\index\\role_edit.htm',
      1 => 1475909433,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18634589d23cc927de2-75108671',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'checkbox_role_action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_589d23cc961174_87142750',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589d23cc961174_87142750')) {function content_589d23cc961174_87142750($_smarty_tpl) {?><script type="text/javascript" > 
$("document").ready(function(){     
     $("#action_all").click(function(){   
		if(this.checked){   
			$("input[type='checkbox']").each(function(){this.checked=true;});
		}else{   
			$("input[type='checkbox']").each(function(){this.checked=false;}); 
		}   
	 });  
});
function qx(obj,tt){
	if(obj.checked){   
		$("input[tt='"+tt+"']").each(function(){this.checked=true;});
	}else{   
		$("input[tt='"+tt+"']").each(function(){this.checked=false;});  
	}  
}
</script>

<div class="page">
	<div class="pageContent">
		<form method="post" action="?action=role&do=updata" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
			<input type="hidden" style="display:none;" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>角色名称：</dt>
					<dd><input type="text" name="title" class="required" size="30" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" readonly/></dd>
				</dl>
				<dl>
					<dt>页面权限：</dt>
					<dd><input type="checkbox" id="action_all"><span>全选</span></dd>
				</dl>
				<dl style="width:450px">
					<?php echo $_smarty_tpl->tpl_vars['checkbox_role_action']->value;?>

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