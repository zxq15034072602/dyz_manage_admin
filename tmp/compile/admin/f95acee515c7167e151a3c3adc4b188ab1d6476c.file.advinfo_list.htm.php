<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-29 12:02:33
         compiled from ".\tpl\admin\advinfo_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:18325972bc3bdd7843-97999220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-29 11:30:12
         compiled from ".\tpl\admin\advinfo_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:5158598a6be5008931-86105541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> upstream/master
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f95acee515c7167e151a3c3adc4b188ab1d6476c' => 
    array (
      0 => '.\\tpl\\admin\\advinfo_list.htm',
<<<<<<< HEAD
      1 => 1503977299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18325972bc3bdd7843-97999220',
=======
      1 => 1503977405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5158598a6be5008931-86105541',
>>>>>>> upstream/master
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
<<<<<<< HEAD
  'unifunc' => 'content_5972bc3be21ac5_03855666',
=======
  'unifunc' => 'content_598a6be5008934_13104427',
>>>>>>> upstream/master
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
<<<<<<< HEAD
<?php if ($_valid && !is_callable('content_5972bc3be21ac5_03855666')) {function content_5972bc3be21ac5_03855666($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=feedback">
=======
<?php if ($_valid && !is_callable('content_598a6be5008934_13104427')) {function content_598a6be5008934_13104427($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=feedback">
>>>>>>> upstream/master
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">				
 <li><a class="add" href="?dir=admin&action=menu&do=new" target="dialog" mask="true"><span>添加</span></a></li> 
				<li><a class="edit" href="?dir=admin&action=menu&do=edit&id={id}" target="dialog" mask="true"><span>修改</span></a></li>
				<li><a class="delete" href="?dir=admin&action=menu&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">标题</th>
					<th align="center">类型</th>
					<th align="center">时间</th>
					
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['type'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['addtime'];?>
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