<?php /* Smarty version Smarty-3.1.12, created on 2018-01-13 14:42:06
         compiled from ".\tpl\admin\case_class.htm" */ ?>
<?php /*%%SmartyHeaderCode:210665a59aa3ebbf637-45863839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5b09838c35091979c28f74391210fd51af238ba' => 
    array (
      0 => '.\\tpl\\admin\\case_class.htm',
      1 => 1515720411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210665a59aa3ebbf637-45863839',
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
  'unifunc' => 'content_5a59aa3ebfc6c3_17997784',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a59aa3ebfc6c3_17997784')) {function content_5a59aa3ebfc6c3_17997784($_smarty_tpl) {?><div class="page">
	<div class="pageHeader">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" />
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">				
 			 <li><a class="add" href="?dir=admin&action=case_class&do=new" target="dialog" mask="true"><span>添加</span></a></li> 
			 <li><a class="edit" href="?dir=admin&action=case_class&do=edit&id={id}" target="dialog" mask="true"><span>修改</span></a></li>			 
			 <li><a class="delete" href="?dir=admin&action=case_class&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li> 
			</ul>
		</div>
		<table class="list" layouth="90" style="width:800px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">分类名称</th>
					<th align="center">图标url</th>
					<th align="center">进入子分类</th>
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['iconfont'];?>
</td>
					<td align="center">
						<a class="edit" href="?dir=admin&action=case_class&do=son_list&id={id}" target="navTab" rel="class_list" mask="true"><span>查看子分类</span></a> 
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
<?php }} ?>