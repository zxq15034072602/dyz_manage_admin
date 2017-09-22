<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:38:13
         compiled from ".\tpl\admin\goods_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:1356559c228f54fb5b0-43585653%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05e8acad5f9e8de8d6b47190bdb10e8ffc35c38d' => 
    array (
      0 => '.\\tpl\\admin\\goods_list.htm',
      1 => 1500600483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1356559c228f54fb5b0-43585653',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c228f5590af9_65587515',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c228f5590af9_65587515')) {function content_59c228f5590af9_65587515($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=goods">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=goods" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						商品名称:<input type="text" name="name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"/>
					</td>
					<td>
						<div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div>
					</td>
				</tr>
			</table>
		</div>
		</form>
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">	
				<li><a class="add" href="?dir=admin&action=goods&do=new" target="dialog" mask="true"><span>添加</span></a></li>
				<li><a class="edit" href="?dir=admin&action=goods&do=edit&id={id}" target="navTab" rel="goods_list"><span>修改库存</span></a></li>
				<li><a class="edit" href="?dir=admin&action=goods&do=edit1&id={id}" target="dialog" rel="goods_list"><span>修改</span></a></li>
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:900px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">商品名称</th>
					<th align="center">所属品牌</th>
					<th align="center">单价</th>
					<th align="center">是否推荐</th>
					
				</tr>
			</thead>
			<tbody>			
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
				<tr target="id" rel="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" >
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['pp'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['money'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['dw'];?>
</td>
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['row']->value['is_recommend']==0){?>否<?php }else{ ?>是<?php }?></td>
					
				</tr>			
			<?php } ?>
			</tbody>
		</table>
		<div class="panelBar">
			<div class="pages">
				<span>共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
条</span>
			</div>
			
			<div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
" numPerPage="20" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['pageNum']->value;?>
"></div>

		</div>
	</div>
</div><form id="pagerForm" method="post" action="index.php?dir=admin&action=goods">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=goods" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						商品名称:<input type="text" name="name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"/>
					</td>
					<td>
						<div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div>
					</td>
				</tr>
			</table>
		</div>
		</form>
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">	
				<li><a class="add" href="?dir=admin&action=goods&do=new" target="dialog" mask="true"><span>添加</span></a></li>
				<li><a class="edit" href="?dir=admin&action=goods&do=edit&id={id}" target="navTab" rel="goods_list"><span>修改库存</span></a></li>
				<li><a class="edit" href="?dir=admin&action=goods&do=edit1&id={id}" target="dialog" rel="goods_list"><span>修改</span></a></li>
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:900px">
			<thead>
				<tr>
					<th align="center">ID</th>
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
				<tr target="id" rel="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" >
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['pp'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['money'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['dw'];?>
</td>
				</tr>			
			<?php } ?>
			</tbody>
		</table>
		<div class="panelBar">
			<div class="pages">
				<span>共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
条</span>
			</div>
			
			<div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
" numPerPage="20" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['pageNum']->value;?>
"></div>

		</div>
	</div>
</div><?php }} ?>