<?php /* Smarty version Smarty-3.1.12, created on 2017-08-30 15:03:08
         compiled from ".\tpl\admin\xslr_md_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:2095359a616e608a711-52332643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aa09b4e6b849172e22add41ee64303c701e04e8' => 
    array (
      0 => '.\\tpl\\admin\\xslr_md_list.htm',
      1 => 1504076478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2095359a616e608a711-52332643',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59a616e611df21_26348597',
  'variables' => 
  array (
    'username' => 0,
    'year_list' => 0,
    'key' => 0,
    'day' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59a616e611df21_26348597')) {function content_59a616e611df21_26348597($_smarty_tpl) {?><div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=xslr" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
						门店名:<input type="text" name="name" size="10" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
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
				<li><a class="icon" href="?dir=admin&action=xslr&do=daochu" target="dwzExport" title="实要导出这些记录吗?"><span>导出</span></a></li> 
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
					<th align="center">总销售额</th>
				</tr>
			</thead>
			<tbody>		
			<?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['year_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value){
$_smarty_tpl->tpl_vars['day']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['day']->key;
?>
				<tr>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['day']->value['mdname'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['day']->value['sum'];?>
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