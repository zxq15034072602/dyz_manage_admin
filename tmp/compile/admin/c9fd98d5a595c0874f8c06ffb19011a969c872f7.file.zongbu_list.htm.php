<?php /* Smarty version Smarty-3.1.12, created on 2017-03-06 14:38:19
         compiled from ".\tpl\admin\zongbu_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:1519958bd0360e0d950-54561614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9fd98d5a595c0874f8c06ffb19011a969c872f7' => 
    array (
      0 => '.\\tpl\\admin\\zongbu_list.htm',
      1 => 1488782296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1519958bd0360e0d950-54561614',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_58bd0360e42fe0_32365141',
  'variables' => 
  array (
    'name' => 0,
    'list' => 0,
    'row' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58bd0360e42fe0_32365141')) {function content_58bd0360e42fe0_32365141($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=zongbu">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=zongbu" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						分公司名称:<input type="text" name="name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
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
				<li><a class="add" href="?dir=admin&action=zongbu&do=new" target="dialog" mask="true"><span>添加</span></a></li>
				<li><a class="edit" href="?dir=admin&action=zongbu&do=edit&id={id}" target="dialog" mask="true"><span>修改</span></a></li>
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:800px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">部门名称</th>
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