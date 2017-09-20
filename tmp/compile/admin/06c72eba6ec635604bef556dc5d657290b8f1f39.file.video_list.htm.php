<?php /* Smarty version Smarty-3.1.12, created on 2017-08-16 11:54:48
         compiled from ".\tpl\admin\video_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:1211598fb59de84db1-18645998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06c72eba6ec635604bef556dc5d657290b8f1f39' => 
    array (
      0 => '.\\tpl\\admin\\video_list.htm',
      1 => 1502855670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1211598fb59de84db1-18645998',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_598fb59dee1498_93212644',
  'variables' => 
  array (
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_598fb59dee1498_93212644')) {function content_598fb59dee1498_93212644($_smarty_tpl) {?>

<div class="page">
	<div class="pageHeader">
		
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">	
						<li><a class="edit" href="?dir=admin&action=video&do=editvideolist&id={id}" target="dialog" mask="true"><span>修改</span></a></li>			
 				<!-- <li><a class="add" href="?dir=admin&action=video&do=video_list_new&id={id}" target="dialog" mask="true"><span>添加</span></a></li>  -->
			<li><a class="delete" href="?dir=admin&action=video&do=delvideo&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li>			
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
					<th align="center">视频名称</th>
					<th align="center">主讲人</th>
					<th align="center">视频url</th>				
					<!-- <th align="center">操作商品情详</th> -->
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
</td>
<!-- 					<td align="center"><a class="add" href="?dir=admin&action=video&do=edit_videol&id={id}" target="dialog" mask="true"><span>编辑</span></a> / <a class="edit" href="?dir=admin&action=video&do=video_detail&id={id}" target="dialog" mask="true"><span>查看</span></a></td>					
 -->				</tr>			
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