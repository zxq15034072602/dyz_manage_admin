<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-16 11:53:10
         compiled from ".\tpl\admin\video_type.htm" */ ?>
<?php /*%%SmartyHeaderCode:16357598fabae7b5260-96034697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.12, created on 2017-08-17 11:10:32
         compiled from ".\tpl\admin\video_type.htm" */ ?>
<?php /*%%SmartyHeaderCode:252525991856dce8792-76499514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> upstream/master
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e80047a77d0177c3e779a02558aaf529b590a474' => 
    array (
      0 => '.\\tpl\\admin\\video_type.htm',
<<<<<<< HEAD
      1 => 1502855584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16357598fabae7b5260-96034697',
=======
      1 => 1502939354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '252525991856dce8792-76499514',
>>>>>>> upstream/master
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
<<<<<<< HEAD
  'unifunc' => 'content_598fabae850cb5_42848674',
=======
  'unifunc' => 'content_5991856dd25820_91206190',
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
<?php if ($_valid && !is_callable('content_598fabae850cb5_42848674')) {function content_598fabae850cb5_42848674($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=feedback">
=======
<?php if ($_valid && !is_callable('content_5991856dd25820_91206190')) {function content_5991856dd25820_91206190($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=feedback">
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
 			<li><a class="add" href="?dir=admin&action=video&do=video_new" target="dialog" mask="true"><span>添加</span></a></li> 			
			<li><a class="edit" href="?dir=admin&action=video&do=editvideo&id={id}" target="dialog" mask="true"><span>修改</span></a></li>
			<li><a class="delete" href="?dir=admin&action=video&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li>			
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">名称</th>
					<th align="center">类型</th>					
					<th align="center">操作</th>					
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
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['row']->value['type']==0){?>视频<?php }else{ ?>图文<?php }?></td>				
					<td align="center">
					<?php if ($_smarty_tpl->tpl_vars['row']->value['type']==0){?>
					<a class="add" href="?dir=admin&action=video&do=video_list_new&id={id}" target="dialog" mask="true"><span>编辑</span></a>  / <a class="edit" href="?dir=admin&action=video&do=video_list&id={id}" target="dialog" mask="true"><span>查看</span></a> 
					<?php }else{ ?>
					<a class="add" href="?dir=admin&action=video&do=article_new&id={id}" target="dialog" mask="true"><span>编辑</span></a>  / <a class="edit" href="?dir=admin&action=video&do=article_list&id={id}" target="dialog" mask="true"><span>查看</span></a>	 				
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
</div><?php }} ?>