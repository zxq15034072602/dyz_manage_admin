<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:44:09
         compiled from ".\tpl\index\user_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:2795659c22a5982d577-82026859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd19b6526e50c472096f596a2eb26e05f1150436d' => 
    array (
      0 => '.\\tpl\\index\\user_list.htm',
      1 => 1500600483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2795659c22a5982d577-82026859',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'role' => 0,
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c22a598c0940_95197542',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c22a598c0940_95197542')) {function content_59c22a598c0940_95197542($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?action=user">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
	<input type="hidden" name="username" value="<?php echo $_REQUEST['username'];?>
"/>
	<input type="hidden" name="role" value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
"/>
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?action=user" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						用户名:<input type="text" name="username" size="10" value="<?php echo $_REQUEST['username'];?>
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
				<li><a class="add" href="?action=user&do=new" target="dialog" mask="true"><span>添加</span></a></li>
				<li><a class="edit" href="?action=user&do=edit&id={id}" target="dialog" mask="true"><span>修改</span></a></li>
				<li><a class="delete" href="?action=user&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li>
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1000px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">用户名</th>
					<th align="center">手机号</th>
					<th align="center">密码</th>
					<th align="center">所属部门</th>
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
					<td><?php if ($_smarty_tpl->tpl_vars['row']->value['zb']['id']==0){?>总部<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['row']->value['zb']['name'];?>
<?php }?></td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['created_at'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['updated_at'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['row']->value['status']==1){?><a href="index.php?action=user&do=qy&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" target="ajaxTodo">启用</a><?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==0){?><a href="index.php?action=user&do=jy&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
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