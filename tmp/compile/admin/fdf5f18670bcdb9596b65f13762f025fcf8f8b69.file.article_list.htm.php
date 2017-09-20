<?php /* Smarty version Smarty-3.1.12, created on 2017-08-14 19:18:13
         compiled from ".\tpl\admin\article_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:31585599186f5991fb8-43774632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdf5f18670bcdb9596b65f13762f025fcf8f8b69' => 
    array (
      0 => '.\\tpl\\admin\\article_list.htm',
      1 => 1502704280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31585599186f5991fb8-43774632',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_599186f59cf045_22252952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599186f59cf045_22252952')) {function content_599186f59cf045_22252952($_smarty_tpl) {?>

<div class="page">
	<div class="pageHeader">
		
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">				
 				<!-- <li><a class="add" href="?dir=admin&action=video&do=article_new&id={id}" target="dialog" mask="true"><span>添加</span></a></li>  -->
				<!-- <li><a class="delete" href="?dir=admin&action=product&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li> -->
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center" colspan="4"><?php echo $_smarty_tpl->tpl_vars['list']->value[0]['name'];?>
</th>
				</tr>
				<tr>
					<th align="center">ID</th>
					<th align="center">图文标题</th>
					<th align="center">主讲人</th>			
					<th align="center">图文内容</th>			
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['teacher'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</td>
					<!-- <td align="center">
					<a class="add" href="?dir=admin&action=video&do=article_new&id={id}" target="dialog" mask="true"><span>编辑</span></a> / <a class="edit" href="?dir=admin&action=video&do=article_list&id={id}" target="dialog" mask="true"><span>查看</span></a>
					</td>	 -->			
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