<?php /* Smarty version Smarty-3.1.12, created on 2017-09-23 08:37:47
         compiled from ".\tpl\admin\verify_list1.html" */ ?>
<?php /*%%SmartyHeaderCode:1109859c5acdbd75e25-70878046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b0ea8a290edece80a5bacd54a4125d8a8f1b91e' => 
    array (
      0 => '.\\tpl\\admin\\verify_list1.html',
      1 => 1505895234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1109859c5acdbd75e25-70878046',
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
  'unifunc' => 'content_59c5acdbdb2eb9_82268051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c5acdbdb2eb9_82268051')) {function content_59c5acdbdb2eb9_82268051($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=verify&do=store_list1">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=verify&do=store_list1" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						申请人:<input type="text" name="name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
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
			
		</div>
		<table class="list" layouth="90" style="width:900px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">申请人</th>
					<th align="center">所选门店</th>
					<th align="center">申请时间</th>
					<th align="center">是否通过</th>
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['mdname'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['addtime'];?>
</td>
					<td align="center">
					    <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==0){?>
						<a href="index.php?dir=admin&action=verify&do=tg_jx&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['row']->value['uid'];?>
&mid=<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
" target="ajaxTodo">通过</a>
						<a href="index.php?dir=admin&action=verify&do=jj&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['row']->value['uid'];?>
&mid=<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
" target="ajaxTodo">拒绝</a>
						<?php }else{ ?>
						<?php if ($_smarty_tpl->tpl_vars['row']->value['status']==0){?>未审核<?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==1){?>已审核<?php }else{ ?>已拒绝<?php }?>
						<?php }?>
					</td>
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['row']->value['status']==0){?>未审核<?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==1){?>已审核<?php }else{ ?>已拒绝<?php }?></td>
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