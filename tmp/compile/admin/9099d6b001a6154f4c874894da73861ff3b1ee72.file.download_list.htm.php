<?php /* Smarty version Smarty-3.1.12, created on 2017-09-23 17:56:55
         compiled from ".\tpl\admin\download_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:2603159c62fe7223348-83567542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9099d6b001a6154f4c874894da73861ff3b1ee72' => 
    array (
      0 => '.\\tpl\\admin\\download_list.htm',
      1 => 1494907869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2603159c62fe7223348-83567542',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59c62fe7223343_77420128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59c62fe7223343_77420128')) {function content_59c62fe7223343_77420128($_smarty_tpl) {?>
<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=goods" method="post">
		
		</form>
	</div>
	<div class="pageContent">
		<div class="panelBar">
			<!--  <ul class="toolBar">	
				<li><a class="add" href="?dir=admin&action=goods&do=new" target="dialog" mask="true"><span>添加</span></a></li>
				<li><a class="edit" href="?dir=admin&action=goods&do=edit&id={id}" target="navTab" rel="goods_list"><span>修改库存</span></a></li>
				<li><a class="edit" href="?dir=admin&action=goods&do=edit1&id={id}" target="dialog" rel="goods_list"><span>修改</span></a></li>
				<li class="line">line</li>
			</ul>-->
		</div>
		<table class="list" layouth="90" style="width:1000px">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">大区名称</th>
					<th align="center">下载数</th>
					<th align="center">二维码</th>
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['partiton_name'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['count'];?>
</td>
					<td align="center"style="width: 500px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['qode'];?>
</td>
				</tr>			
			<?php } ?>
			</tbody>
		</table>
		
	</div>
</div><?php }} ?>