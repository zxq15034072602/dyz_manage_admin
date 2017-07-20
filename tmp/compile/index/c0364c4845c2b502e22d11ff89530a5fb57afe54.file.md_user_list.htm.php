<?php /* Smarty version Smarty-3.1.12, created on 2017-07-19 11:14:46
         compiled from ".\tpl\index\md_user_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:863458afa20a040db3-85419403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0364c4845c2b502e22d11ff89530a5fb57afe54' => 
    array (
      0 => '.\\tpl\\index\\md_user_list.htm',
      1 => 1500434084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '863458afa20a040db3-85419403',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58afa20a085868_01146557',
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
<?php if ($_valid && !is_callable('content_58afa20a085868_01146557')) {function content_58afa20a085868_01146557($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?action=mduser&do=md_user">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
	<input type="hidden" name="mdusername" value="<?php echo $_REQUEST['mdusername'];?>
"/>
	<input type="hidden" name="role" value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
"/>
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?action=mduser&do=md_user" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						姓名: <input type="text" name="mdusername" size="10" value="<?php echo $_REQUEST['mdusername'];?>
"/>
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
				<li><a class="add" href="?action=mduser&do=new&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" target="dialog" mask="true"><span>添加</span></a></li>
				<li><a class="edit" href="?action=mduser&do=edit&id={id}&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" target="dialog" mask="true"><span>修改</span></a></li>
				<li><a class="delete" href="?action=mduser&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li>
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
					<td><?php if ($_smarty_tpl->tpl_vars['row']->value['roleid']==3){?>店长<?php }elseif($_smarty_tpl->tpl_vars['row']->value['roleid']==5){?>店员<?php }?></td>
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