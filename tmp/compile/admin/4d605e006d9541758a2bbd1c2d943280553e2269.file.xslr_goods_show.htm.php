<?php /* Smarty version Smarty-3.1.12, created on 2018-01-02 10:25:48
         compiled from ".\tpl\admin\xslr_goods_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:1807359dde81ec080b3-32586044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d605e006d9541758a2bbd1c2d943280553e2269' => 
    array (
      0 => '.\\tpl\\admin\\xslr_goods_show.htm',
      1 => 1514859945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1807359dde81ec080b3-32586044',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_59dde81ec45141_84537377',
  'variables' => 
  array (
    'name' => 0,
    'n' => 0,
    'list' => 0,
    'pageNum' => 0,
    'key' => 0,
    'row' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59dde81ec45141_84537377')) {function content_59dde81ec45141_84537377($_smarty_tpl) {?><form id="pagerForm" method="post" action="index.php?dir=admin&action=xslr&do=goods">
	<input type="hidden" name="pageNum" value="1" />
    <input type="hidden" name="numPerPage" value="20" />
</form>
<style>
    .test{
        width: 152px;
        height: auto;
        overflow: hidden;
    }
    .test label{
        width: 150px;
        display: flex;
    	padding: 0;
    	align-items:flex-end;
    	line-height:30px;
    }
    .test label span{
        width: 130px;
        display: block;
    }
    .test #input{
        width: 150px;
    }
    #box{
        width: 150px;
        height: auto;
        overflow: hidden;
    	background:#fff;
    }
</style>
<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="index.php?dir=admin&action=xslr&do=goods" method="post">
		<div class="searchBar">
			<table class="searchContent">
				<tr>
					<td>
					<section class="test">
					    <input type='text' name='name' id='input' value='<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
'/>
					    <div id="box"></div>
					</section>	
						<!-- <select name="name">
							<option value="-1">选择门店进行检索</option>
							<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['name']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['name'];?>
</option>
							<?php } ?>
						</select> -->
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
				<li><a class="icon" href="?dir=admin&action=xslr&do=daochu_goods" target="dwzExport" title="是要导出这些记录吗?"><span>导出</span></a></li> 
				<li class=""><a class="edit" href="?&dir=admin&action=xslr&do=goods_day_show" target="dialog" mask="true"><span>查看今天</span></a></li>
				<li class=""><a class="edit" href="?&dir=admin&action=xslr&do=goods_week_show" target="dialog" mask="true"><span>查看本周</span></a></li>
				<li class=""><a class="edit" href="?&dir=admin&action=xslr&do=goods_month_show" target="dialog" mask="true"><span>查看本月</span></a></li>
				<li class=""><a class="edit" href="?&dir=admin&action=xslr&do=goods_year_show" target="dialog" mask="true"><span>查看今年</span></a></li>
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
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['gname'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['sum'];?>
 (<?php echo $_smarty_tpl->tpl_vars['row']->value['dw'];?>
)</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['money'];?>
</td>
					<td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['total'];?>
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
</div>
<script>
	$('#input').bind('blur', function() {
		var name=$(this).val();
		if(name){
			 $.ajax({
	             type: "post",
	             url: "index.php?action=xslr&dir=admin&do=search",
	             data: {name:name},
	             dataType: "json",
	             success: function(data){
	                var html='';
					for(var i=0;i<data.name.length;i++){ 
						html+="<label><span>"+data.name[i].name+"</span> <input type='radio' name='name' value="+data.name[i].id+" /></label>";
					}
					$('#box').html(html);
			        $("input[type='radio']").change( function() {
			            let val=$('input:radio:checked').val();
			            let html=$('input:radio:checked').parent().find('span').html();
			            $('#input').val(html);
			            $('#box').hide();
			        });
	             }
	         });
		}
	});
</script><?php }} ?>