<?php /* Smarty version Smarty-3.1.12, created on 2017-09-22 10:01:03
         compiled from ".\tpl\admin\sales_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:3061159c38437aab0b2-71945761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7033f9c300cd9b10ed319b33ee5b8633d1707db3' => 
    array (
      0 => '.\\tpl\\admin\\sales_edit.htm',
      1 => 1506045648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3061159c38437aab0b2-71945761',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c38437aca238_59738888',
  'variables' => 
  array (
    'sales' => 0,
    'good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c38437aca238_59738888')) {function content_59c38437aca238_59738888($_smarty_tpl) {?>
<div class="page">
	<div class="pageContent">
		<form method="post" enctype="multipart/form-data"  action="?dir=admin&action=xslr&do=update" class="pageForm required-validate" onsubmit="return iframeCallback(this, dialogAjaxDone);">		
			<input type="hidden" name="vid" value="<?php echo $_smarty_tpl->tpl_vars['sales']->value['id'];?>
" />
			<div class="pageFormContent" layoutH="56">
				<dl>
					<dt>门店</dt>
					<dd><?php echo $_smarty_tpl->tpl_vars['sales']->value['mdname'];?>

					<input type="hidden" name="mid" value="<?php echo $_smarty_tpl->tpl_vars['sales']->value['mid'];?>
" />
					</dd>
				</dl>
				<dl>
					<dt>录入人员</dt>
					<dd><?php echo $_smarty_tpl->tpl_vars['sales']->value['uname'];?>

					<input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['sales']->value['uid'];?>
" />
					</dd>
				</dl>
				<dl>
					<dt>顾客姓名</dt>
					<dd><input type="text" name="username" size="30" value="<?php echo $_smarty_tpl->tpl_vars['sales']->value['username'];?>
"/></dd>
				</dl>
				<dl>
					<dt>性别</dt>
					<dd>
					<?php if ($_smarty_tpl->tpl_vars['sales']->value['sex']==1){?>
					<input type="radio" name="sex" value="1" checked="checked"/>男
					<input type="radio" name="sex" value="2"/>女			
					<?php }else{ ?>
					<input type="radio" name="sex" value="1"/>男
					<input type="radio" name="sex" value="2" checked="checked"/>女		
					<?php }?>
					</dd>
				</dl>
				<dl>
					<dt>年龄</dt>
					<dd><input type="text" name="age" size="30"  value="<?php echo $_smarty_tpl->tpl_vars['sales']->value['age'];?>
"/></dd>
				</dl>
				<dl>
					<dt>电话</dt>
					<dd><input type="text" name="tel" size="30"  value="<?php echo $_smarty_tpl->tpl_vars['sales']->value['tel'];?>
"/></dd>
				</dl>
				<dl>
					<dt>住址</dt>
					<dd><input type="text" name="address" size="30"  value="<?php echo $_smarty_tpl->tpl_vars['sales']->value['address'];?>
"/></dd>
				</dl>
			 <?php  $_smarty_tpl->tpl_vars['good'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['good']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sales']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['good']->key => $_smarty_tpl->tpl_vars['good']->value){
$_smarty_tpl->tpl_vars['good']->_loop = true;
?>
				 <input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['good']->value['id'];?>
" />
				<dl>
					<dt>产品名称</dt>
					<dd>
						<input type="hidden" name="goods_id[]" value="<?php echo $_smarty_tpl->tpl_vars['good']->value['goods_id'];?>
" />
						<?php echo $_smarty_tpl->tpl_vars['good']->value['name'];?>

					</dd>
				</dl>
				<dl>
					<dt>产品价格</dt>
					<dd class="money">
						<?php echo $_smarty_tpl->tpl_vars['good']->value['money'];?>

					</dd>
				</dl>
				<dl>
					<dt>销售数量</dt>
					<dd class="count">
						<input type="text" name="count[]" size="30" class="count"   value="<?php echo $_smarty_tpl->tpl_vars['good']->value['count'];?>
"/>			
					</dd>
				</dl>
			<?php } ?>
			
				<dl>
					<dt>合计</dt>					
					<dd >
					<input type="text" name="total_price" class="total" size="30" value="<?php echo $_smarty_tpl->tpl_vars['sales']->value['total_price'];?>
" readonly/>
					<!-- <?php echo $_smarty_tpl->tpl_vars['sales']->value['total_price'];?>
 -->
					</dd>
				</dl>
				<dl>
					<dt>自定实际收款额</dt>
					<dd><input type="text" name="sale_price" size="30" value="<?php echo $_smarty_tpl->tpl_vars['sales']->value['sale_price'];?>
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
</div>
<script>
	var a=0;
	var b=0;
	var sum=0;
	function total(){
		$('.money').each(function(){
			a=parseInt($(this).html());
			b=$(this).parent().next().children('dd').children('.count').val();
			sum+=a*b;
		})
		$('.total').val(sum);
		//parseInt($('.total').html(sum));
	}
	total();
	
	$('.count').change(function(){
		sum=0;
		total();
	})
</script>

















<?php }} ?>