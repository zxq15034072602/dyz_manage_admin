<?php /* Smarty version Smarty-3.1.12, created on 2017-09-20 16:40:51
         compiled from ".\tpl\admin\xslr_goods_month_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:2121659c229930fb805-73841285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e5bd4410a83002038fe18c352de2bfe36f22338' => 
    array (
      0 => '.\\tpl\\admin\\xslr_goods_month_show.htm',
      1 => 1505895234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2121659c229930fb805-73841285',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'g_month_list' => 0,
    'key' => 0,
    'month' => 0,
    'total' => 0,
    'pageNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c229930fb807_73913026',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c229930fb807_73913026')) {function content_59c229930fb807_73913026($_smarty_tpl) {?><div class="page">
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
				<li><a class="icon" href="?dir=admin&action=xslr&do=daochu_goods_month" target="dwzExport" title="是要导出这些记录吗?"><span>导出</span></a></li> 
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
			<?php  $_smarty_tpl->tpl_vars['month'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['month']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['g_month_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['month']->key => $_smarty_tpl->tpl_vars['month']->value){
$_smarty_tpl->tpl_vars['month']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['month']->key;
?>
				<tr>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['month']->value['gname'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['month']->value['sum'];?>
 (<?php echo $_smarty_tpl->tpl_vars['month']->value['dw'];?>
)</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['month']->value['money'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['month']->value['total'];?>
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