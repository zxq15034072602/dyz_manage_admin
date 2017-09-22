<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:40:53
         compiled from ".\tpl\admin\xslr_goods_year_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:2922559c229959cdbc5-36581224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ea53f36a881d04503f4ee9ff3c79133fa4e2670' => 
    array (
      0 => '.\\tpl\\admin\\xslr_goods_year_show.htm',
      1 => 1505895234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2922559c229959cdbc5-36581224',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'g_year_list' => 0,
    'key' => 0,
    'year' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c22995a0ac57_51628694',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c22995a0ac57_51628694')) {function content_59c22995a0ac57_51628694($_smarty_tpl) {?><div class="page">
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
				<li><a class="icon" href="?dir=admin&action=xslr&do=daochu_goods_year" target="dwzExport" title="是要导出这些记录吗?"><span>导出</span></a></li> 
				<li class="line">line</li>
			</ul>
		</div>
		<table class="list" layouth="90" style="width:1200px">
			<thead>
				<tr>
					<th align="center">排名</th>
					<th align="center">产品名</th>
					<th align="center">销售数量</th>
					<th align="center">单价（元）</th>
					<th align="center">销售额（元）</th>
				</tr>
			</thead>
			<tbody>		
			<?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['year']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['g_year_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value){
$_smarty_tpl->tpl_vars['year']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['year']->key;
?>
				<tr>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['year']->value['gname'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['year']->value['sum'];?>
 (<?php echo $_smarty_tpl->tpl_vars['year']->value['dw'];?>
)</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['year']->value['money'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['year']->value['total'];?>
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