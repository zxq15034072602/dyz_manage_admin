<?php /* Smarty version Smarty-3.1.12, created on 2017-08-16 18:03:19
         compiled from ".\tpl\admin\product_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:194735991856c917e92-21419787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33fb419996441c0519f17c74bf89deb7dd890b6d' => 
    array (
      0 => '.\\tpl\\admin\\product_list.htm',
      1 => 1502877419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194735991856c917e92-21419787',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5991856c917e97_46781758',
  'variables' => 
  array (
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5991856c917e97_46781758')) {function content_5991856c917e97_46781758($_smarty_tpl) {?>

<div class="page">
	<div class="pageHeader">
		
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">				
 				<li><a class="add" href="?dir=admin&action=product&do=new" target="dialog" mask="true"><span>添加</span></a></li> 
				<li><a class="edit" href="?dir=admin&action=product&do=edit&id={id}" target="dialog" mask="true"><span>修改</span></a></li>
					<li><a class="delete" href="?dir=admin&action=product&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li> 
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">商品名称</th>
					<th align="center">上传时间</th>
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
<?php }} ?>