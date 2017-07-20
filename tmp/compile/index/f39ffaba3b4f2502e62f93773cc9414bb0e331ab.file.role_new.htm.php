<?php /* Smarty version Smarty-3.1.12, created on 2017-02-10 09:46:53
         compiled from ".\tpl\index\role_new.htm" */ ?>
<?php /*%%SmartyHeaderCode:16292589d1b8d1b5821-26770012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f39ffaba3b4f2502e62f93773cc9414bb0e331ab' => 
    array (
      0 => '.\\tpl\\index\\role_new.htm',
      1 => 1475909416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16292589d1b8d1b5821-26770012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'checkbox_role_action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_589d1b8d1dc921_89154339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_589d1b8d1dc921_89154339')) {function content_589d1b8d1dc921_89154339($_smarty_tpl) {?><script type="text/javascript" > 
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
		<form method="post" action="?action=role&do=add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">		
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>角色名称：</dt>
					<dd><input type="text" name="title" class="required" size="30" value=""/></dd>
				</dl>
				<dl>
					<dt>页面权限：</dt>
					<dd><input type="checkbox" id="action_all"><span id="btn1">全选</span></dd>
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