<?php /* Smarty version Smarty-3.1.12, created on 2018-01-13 14:47:15
         compiled from ".\tpl\admin\case_class_son_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:11985a59aa6417ee06-78211949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '562684f79cddc86af6b8cb926159acafd44f4b57' => 
    array (
      0 => '.\\tpl\\admin\\case_class_son_list.htm',
      1 => 1515826026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11985a59aa6417ee06-78211949',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5a59aa641bbe99_87901419',
  'variables' => 
  array (
    'id' => 0,
    'name' => 0,
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a59aa641bbe99_87901419')) {function content_5a59aa641bbe99_87901419($_smarty_tpl) {?>

<div class="page">
	<div class="pageHeader">
		
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">	
			<li><a class="add" href="?dir=admin&action=case_class&do=son_class_new&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" target="dialog" mask="true"><span>添加</span></a></li>
			<li><a class="edit" href="?dir=admin&action=case_class&do=son_class_edit&id={id}" target="dialog" mask="true"><span>修改</span></a></li>			
 				<!-- <li><a class="add" href="?dir=admin&action=video&do=video_list_new&id={id}" target="dialog" mask="true"><span>添加</span></a></li>  -->
			<li><a class="delete" href="?dir=admin&action=case_class&do=son_class_del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li>			
			</ul>
		</div>
		<table class="list" layouth="90" style="width:800px">
			<thead>
				<tr>
					<th align="center" colspan="4"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</th>
				</tr>
				<tr>
					<th align="center">ID</th>
					<th align="center">病症名称</th>	
					<th align="center">是否推荐</th>		
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
					<td align="center">
					    <?php if ($_smarty_tpl->tpl_vars['row']->value['status']==0){?>
							<a href="index.php?dir=admin&action=case_class&do=yes&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
&status=1" target="ajaxTodo"><img src="http://static.duyiwang.cn/iconfont/no.png" width="20px" height="20px"/></a>
						<?php }else{ ?>
							<a href="index.php?dir=admin&action=case_class&do=yes&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
&status=0" target="ajaxTodo"><img src="http://static.duyiwang.cn/iconfont/yes.png" width="22px" height="22px"/></a>
						<?php }?>
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