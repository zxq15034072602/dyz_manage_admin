<?php /* Smarty version Smarty-3.1.12, created on 2017-08-10 20:14:03
         compiled from ".\tpl\admin\cheats_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:17228598c4de84cfc07-41327244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '041586dda82574e998a6b47188ca41f24156fa1c' => 
    array (
      0 => '.\\tpl\\admin\\cheats_list.htm',
      1 => 1502367239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17228598c4de84cfc07-41327244',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598c4de8521b90_67449901',
  'variables' => 
  array (
    'username' => 0,
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598c4de8521b90_67449901')) {function content_598c4de8521b90_67449901($_smarty_tpl) {?>
<div class="page">
	<div class="pageHeader">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" />
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">				
 				<li><a class="add" href="?dir=admin&action=cheats&do=new" target="dialog" mask="true"><span>添加</span></a></li> 
				<!-- <li><a class="delete" href="?dir=admin&action=product&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li> -->
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">类别</th>
					<th align="center">主讲人</th>
					<th align="center">url</th>
					<th align="center">操作详情</th>
				</tr>
			</thead>
			<tbody>			
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
					<tr target="id" rel="<?php echo $_smarty_tpl->tpl_vars['row']->value['sonid'];?>
" >
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['sonid'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['teacher'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
</td>
					<td align="center"><a class="add" href="?dir=admin&action=cheats&do=editdetail&id={id}" target="dialog" mask="true"><span>编辑</span></a> / <a class="edit" href="?dir=admin&action=cheats&do=detail&id={id}" target="dialog" mask="true"><span>查看</span></a></td>					
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
<?php }} ?>