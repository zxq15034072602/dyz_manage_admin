<?php /* Smarty version Smarty-3.1.12, created on 2017-11-04 10:16:57
         compiled from ".\tpl\admin\xslr_md_year_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:1647659fd23196f1888-24947032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82f9e271f707d89b292d7d8f6220ef86ab05a78c' => 
    array (
      0 => '.\\tpl\\admin\\xslr_md_year_show.htm',
      1 => 1505895234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1647659fd23196f1888-24947032',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59fd231972e914_97703309',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fd231972e914_97703309')) {function content_59fd231972e914_97703309($_smarty_tpl) {?><div class="page">
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
				<li><a class="icon" href="?dir=admin&action=xslr&do=daochu_mendian_year" target="dwzExport" title="是要导出这些记录吗?"><span>导出</span></a></li> 
			
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