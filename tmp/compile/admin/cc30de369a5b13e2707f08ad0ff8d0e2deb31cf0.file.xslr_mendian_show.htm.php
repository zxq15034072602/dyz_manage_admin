<?php /* Smarty version Smarty-3.1.12, created on 2017-09-01 17:27:06
         compiled from ".\tpl\admin\xslr_mendian_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:2348659a67cc931fcf7-43971689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc30de369a5b13e2707f08ad0ff8d0e2deb31cf0' => 
    array (
      0 => '.\\tpl\\admin\\xslr_mendian_show.htm',
      1 => 1504257848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2348659a67cc931fcf7-43971689',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59a67cc9375127_50604369',
  'variables' => 
  array (
    'username' => 0,
    'province' => 0,
    'p' => 0,
    'list' => 0,
    'pageNum' => 0,
    'key' => 0,
    'row' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59a67cc9375127_50604369')) {function content_59a67cc9375127_50604369($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=xslr&do=mendian">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
    <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" />
</form>

<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=xslr&do=mendian" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						<select name="province">
							<option value="-1">选择地区进行检索</option>
							<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['p']->value['provinceid'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['province'];?>
</option>
							<?php } ?>
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
				<li><a class="icon" href="?dir=admin&action=xslr&do=daochu_mendian" target="dwzExport" title="是要导出这些记录吗?"><span>导出</span></a></li> 
				<li class=""><a class="edit" href="?&dir=admin&action=xslr&do=md_day_show" target="dialog" mask="true"><span>查看今天</span></a></li>
				<li class=""><a class="edit" href="?&dir=admin&action=xslr&do=md_week_show" target="dialog" mask="true"><span>查看本周</span></a></li>
				<li class=""><a class="edit" href="?&dir=admin&action=xslr&do=md_month_show" target="dialog" mask="true"><span>查看本月</span></a></li>
				<li class=""><a class="edit" href="?&dir=admin&action=xslr&do=md_year_show" target="dialog" mask="true"><span>查看今年</span></a></li>
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center">排名</th>
					<th align="center">门店名</th>
					<th align="center">总销售额（元）</th>
				</tr>
			</thead>
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
				<tr>
					<td align="center"><?php if ($_smarty_tpl->tpl_vars['pageNum']->value>1){?> <?php echo ($_smarty_tpl->tpl_vars['pageNum']->value-1)*20+$_smarty_tpl->tpl_vars['key']->value+1;?>
 <?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
<?php }?></td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['mdname'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['sum'];?>
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