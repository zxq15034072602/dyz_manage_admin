<?php /* Smarty version Smarty-3.1.12, created on 2017-11-23 09:21:08
         compiled from ".\tpl\admin\md_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:1516459decc9a064c11-78384051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb9a56fc883ea8fa2a2a4fe7def5aefbb52b9d31' => 
    array (
      0 => '.\\tpl\\admin\\md_list.htm',
      1 => 1511400062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1516459decc9a064c11-78384051',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59decc9a0a1ca8_19696470',
  'variables' => 
  array (
    'name' => 0,
    'tel' => 0,
    'type' => 0,
    'provinces' => 0,
    'row' => 0,
    'list' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59decc9a0a1ca8_19696470')) {function content_59decc9a0a1ca8_19696470($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=md">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" />
    <input type="hidden" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['tel']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=md" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						门店名称:<input type="text" name="name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"/>
						门店所属：<select name="type" >
								<option value='0' <?php if ($_smarty_tpl->tpl_vars['type']->value==0){?>selected<?php }?>>独一张</option>
								<option value='1' <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>selected<?php }?>>食维健</option>
						</select>
						&nbsp;
						区域检索：<select name="province" id="province" onchange="region.changed(this,'selCities1',2)">
							    <option value="0">请选择</option>
								<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['provinces']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['provinceid'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['province'];?>
</option>
								<?php } ?>
							</select>
							<select name="selCities" id="selCities1" onchange="region.changed(this,'selarea1',3)" style="width:100px;margin-left: 5px">
							    <option value="0">请选择</option>							
							</select>
							<select name="selarea" id="selarea1"  style="width:100px;margin-left: 5px">
							    <option value="0">请选择</option>						
							</select>
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
				<li><a class="add" href="?dir=admin&action=md&do=new&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" target="dialog" mask="true"><span>添加</span></a></li>
				<li><a class="edit" href="?dir=admin&action=md&do=edit&id={id}&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" target="dialog" mask="true"><span>修改</span></a></li>
				<li><a class="delete" href="?dir=admin&action=md&do=del&id={id}" target="ajaxTodo"  title="确定要删除吗?"><span>删除</span></a></li>
				<li class="line">line</li>
				<li><a class="icon" href="?dir=admin&action=md&do=md_daochu" target="dwzExport" title="实要导出这些记录吗?"><span>导出有销售录入的门店</span></a></li>
				<li><a class="icon" href="?dir=admin&action=md&do=md_daochu1" target="dwzExport" title="实要导出这些记录吗?"><span>导出没有销售录入的门店</span></a></li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">门店名称</th>
				    <th align="center">店长</th>
					<th align="center">所属分公司</th>
					<th align="center">电话</th>
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['person'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['fgs'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['addtime'];?>
</td>
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['row']->value['status']==0){?><a href="index.php?dir=admin&action=md&do=qy&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" target="ajaxTodo">启用</a><?php }elseif($_smarty_tpl->tpl_vars['row']->value['status']==1){?><a href="index.php?dir=admin&action=md&do=jy&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
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