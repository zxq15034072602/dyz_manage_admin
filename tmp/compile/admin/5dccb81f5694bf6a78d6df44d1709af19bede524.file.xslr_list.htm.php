<?php /* Smarty version Smarty-3.1.12, created on 2017-10-06 11:25:22
         compiled from ".\tpl\admin\xslr_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:785659d6f7a24f79b9-27041930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dccb81f5694bf6a78d6df44d1709af19bede524' => 
    array (
      0 => '.\\tpl\\admin\\xslr_list.htm',
      1 => 1506074970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '785659d6f7a24f79b9-27041930',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59d6f7a25896b8_79010055',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d6f7a25896b8_79010055')) {function content_59d6f7a25896b8_79010055($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=xslr">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=xslr" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						销售人姓名:<input type="text" name="name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
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
				<li><a class="icon" href="?dir=admin&action=xslr&do=daochu" target="dwzExport" title="实要导出这些记录吗?"><span>导出</span></a></li>
				<li class=""><a class="edit" href="?&dir=admin&action=xslr&do=show_i_verify&vid={id}" target="dialog" mask="true"><span>查看</span></a></li>
				<li><a class="edit" href="?dir=admin&action=xslr&do=edit&vid={id}" target="dialog" mask="true"><span>修改</span></a></li>
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">销售人姓名</th>
					<th align="center">所属门店</th>
					<th align="center">销售商品</th>
					<th align="center">姓名</th>
					<th align="center">性别</th>
					<th align="center">年龄</th>
					<th align="center">电话</th>
					<th align="center">住址</th>
					<th align="center">数量</th>
					<th align="center">单价</th>
					<th align="center">自定实际金额</th>
					<th align="center">总价</th>
					<th align="center">时间</th>
					<th align="center">状态</th>
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['user']['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['store']['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['goods']['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['sex1'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['age'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['address'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['count'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['goods']['money'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['goods']['dw'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['sale_price'];?>
元</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['total_price'];?>
元</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['addtime'];?>
</td>
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['row']->value['status']==1){?>已审核<?php }else{ ?>未审核<?php }?></td>
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