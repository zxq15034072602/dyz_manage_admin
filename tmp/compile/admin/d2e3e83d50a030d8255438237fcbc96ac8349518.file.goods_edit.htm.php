<?php /* Smarty version Smarty-3.1.12, created on 2017-11-13 11:41:34
         compiled from ".\tpl\admin\goods_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:230065a09146e46dd40-19552336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2e3e83d50a030d8255438237fcbc96ac8349518' => 
    array (
      0 => '.\\tpl\\admin\\goods_edit.htm',
      1 => 1498316182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '230065a09146e46dd40-19552336',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'gid' => 0,
    'list' => 0,
    'row' => 0,
    'goods' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a09146e4aadd2_37808988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a09146e4aadd2_37808988')) {function content_5a09146e4aadd2_37808988($_smarty_tpl) {?><div class="page">
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">	
				<li><a class="add" href="?dir=admin&action=goods&do=new_kucun&id=<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
" target="dialog" mask="true"><span>添加</span></a></li>
				<li><a class="edit" href="?dir=admin&action=goods&do=edit_kucun&id={id}" target="dialog" mask="true"><span>修改</span></a></li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:900px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">门店名称</th>
					<th align="center">库存量</th>
					<th align="center">商品名称</th>
					<th align="center">所属品牌</th>
					<th align="center">单价</th>
				</tr>
			</thead>
			<tbody>			
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<tr target="id" rel="<?php echo $_smarty_tpl->tpl_vars['row']->value['kid'];?>
" >
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['kid'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['mdname'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['kucun'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['goods']->value['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['goods']->value['pp'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['goods']->value['money'];?>
</td>
				</tr>			
			<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>