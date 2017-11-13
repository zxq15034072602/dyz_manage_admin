<?php /* Smarty version Smarty-3.1.12, created on 2017-10-07 11:34:21
         compiled from ".\tpl\index\all_user_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:21859d83b6505d0f4-10440714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39669f90506ed7159ff6ff173718cea3812c9858' => 
    array (
      0 => '.\\tpl\\index\\all_user_list.htm',
      1 => 1507347256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21859d83b6505d0f4-10440714',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59d83b65132bd9_15863885',
  'variables' => 
  array (
    'role' => 0,
    'type' => 0,
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d83b65132bd9_15863885')) {function content_59d83b65132bd9_15863885($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?action=mduser&do=dc_user">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
	<input type="hidden" name="mdusername" value="<?php echo $_REQUEST['mdusername'];?>
"/>
	<input type="hidden" name="role" value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
"/>
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?action=mduser&do=dc_user" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
					    门店所属：<select name="type" >
								<option value='0' <?php if ($_smarty_tpl->tpl_vars['type']->value==0){?>selected<?php }?>>独一张</option>
								<option value='1' <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>selected<?php }?>>食维健</option>
						</select>
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
				<li><a class="icon" href="?action=mduser&do=daochu" target="dwzExport" title="实要导出这些记录吗?"><span>导出所有用户信息</span></a></li>
				<li><a class="icon" href="?action=mduser&do=md_daochu" target="dwzExport" title="实要导出这些记录吗?"><span>导出没有店长门店</span></a></li>
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1400px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">用户名</th>
					<th align="center">手机号</th>
					<th align="center">密码</th>
					<th align="center">所属门店</th>
					<th align="center">职位</th>
					<th align="center">创建时间</th>
					<th align="center">更新时间</th>
					<th align="center">状态</th>
					<th align="center">姓名</th>
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
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['mobile'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['password'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['mdname'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['row']->value['roleid']==3){?>店长<?php }elseif($_smarty_tpl->tpl_vars['row']->value['roleid']==5){?>店员<?php }elseif($_smarty_tpl->tpl_vars['row']->value['roleid']==1){?>总部人员<?php }elseif($_smarty_tpl->tpl_vars['row']->value['roleid']==2){?>经销商<?php }elseif($_smarty_tpl->tpl_vars['row']->value['roleid']==4){?>加盟商<?php }elseif($_smarty_tpl->tpl_vars['row']->value['roleid']==6){?>董事长<?php }elseif($_smarty_tpl->tpl_vars['row']->value['roleid']==7){?>总经理<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['created_at'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['updated_at'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['row']->value['status']==1){?><a href="index.php?action=mduser&do=qy&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" target="ajaxTodo">启用</a><?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==0){?><a href="index.php?action=mduser&do=jy&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" target="ajaxTodo" title="确定要起用帐户吗?">停用</a><?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
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