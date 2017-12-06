<?php /* Smarty version Smarty-3.1.12, created on 2017-11-28 09:03:26
         compiled from ".\tpl\admin\order_list.html" */ ?>
<?php /*%%SmartyHeaderCode:243485a1cb56ab26976-87816425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4b76eacaa93e56c98ab149ddf661c36d45adcf6' => 
    array (
      0 => '.\\tpl\\admin\\order_list.html',
      1 => 1511830970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243485a1cb56ab26976-87816425',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a1cb56aba6dc1_11730186',
  'variables' => 
  array (
    'username' => 0,
    'mobile' => 0,
    'order_info' => 0,
    'order' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1cb56aba6dc1_11730186')) {function content_5a1cb56aba6dc1_11730186($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=order&do=list">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=order&do=list" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						手机号:<input type="text" name="mobile" size="10" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
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
				<li><a class="icon" href="?dir=admin&action=order&do=daochu" target="dwzExport" title="实要导出这些记录吗?"><span>导出</span></a></li>
				 <li class=""><a class="edit" href="?&dir=admin&action=order&do=show_order&id={id}" target="dialog" mask="true"><span>查看</span></a></li>
				 <li><a class="edit" href="?dir=admin&action=order&do=edit&id={id}" target="dialog" mask="true"><span>添加订单号</span></a></li>
				 <li><a class="delete" href="?dir=admin&action=order&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li>
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1600px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">用户id</th>
					<th align="center">姓名</th>
					<th align="center">电话</th>
					<th align="center">身份</th>
					<th align="center">收货地址</th>
					<th align="center">总价</th>
					<th align="center">物流单号</th>
					<th align="center">订单状态</th>
					<th align="center">订单生成时间</th>
					<th align="center">订单完成时间</th>
					<th align="center">操作人</th>
					<th align="center">是否发货</th>
				</tr>
			</thead>
			<tbody>			
			<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
				<tr target="id" rel="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" >
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['uid'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['mobile'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['identity'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['address'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['price'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['order_number'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['order_status'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['starttime'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['endtime'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value['operator'];?>
</td>
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['order']->value['status']==2){?>已发货<?php }elseif($_smarty_tpl->tpl_vars['order']->value['status']==1){?>已完成<?php }else{ ?>未发货<?php }?></td>
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