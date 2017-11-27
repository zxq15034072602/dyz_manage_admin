<?php /* Smarty version Smarty-3.1.12, created on 2017-11-14 15:54:57
         compiled from ".\tpl\admin\gg_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:201059dee45a364252-96631497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e7e0f521c1d7da51a67ac360f8250e3883643ae' => 
    array (
      0 => '.\\tpl\\admin\\gg_list.htm',
      1 => 1510640881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201059dee45a364252-96631497',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59dee45a3a12e7_12736099',
  'variables' => 
  array (
    'name' => 0,
    'tel' => 0,
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59dee45a3a12e7_12736099')) {function content_59dee45a3a12e7_12736099($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=gg">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" />
    <input type="hidden" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['tel']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=gg" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						公告名称:<input type="text" name="name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
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
				 <li><a class="add" href="?dir=admin&action=gg&do=new" target="dialog" mask="true"><span>添加</span></a></li> 
				<li><a class="edit" href="?dir=admin&action=gg&do=edit&id={id}" target="dialog" mask="true"><span>修改</span></a></li>
				<li><a class="delete" href="?dir=admin&action=gg&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li>
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">公告标题</th>
					<th align="center">是否推荐</th>
					<th align="center">创建时间</th>
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['row']->value['is_tuijian']==1){?>是<?php }else{ ?>否<?php }?></td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['addtime'];?>
</td>
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['row']->value['status']==0){?><a href="index.php?dir=admin&action=gg&do=qy&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" target="ajaxTodo">启用</a><?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==1){?><a href="index.php?dir=admin&action=gg&do=jy&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" target="ajaxTodo" title="确定要起用帐户吗?">停用</a><?php }?></td>
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