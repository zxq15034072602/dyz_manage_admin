<?php
if(!defined('CORE'))exit("error!"); 
//列表	
if($do==""){
	If_rabc(); //检测权限
	$search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_buy where 1=1 ";
	if($_POST['name']){
		$search .= "and username like ? ";
		$arr[]="%".$_POST['name']."%";
		}	
	//设置分页
	if($_POST['numPerPage']==""){
		$numPerPage="20";
	}else{	
		$numPerPage=$_POST['numPerPage'];
	}
	if($_POST['pageNum']==""||$_POST['pageNum']=="0" ){
		$pageNum="0";
	}else{
		$pageNum=($_POST['pageNum']-1)*$numPerPage;
	}
	$sql1=$sqlcount.$search;
	$db->p_e($sql1,$arr);
	$total=$db->fetch_count();//总条数
	
	//查询
	$sql2="SELECT * FROM rv_buy where 1=1 ".$search."order by id desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	foreach($list as &$k){
		$sql="select * from rv_user where 1=1 and id=?";
		$db->p_e($sql,array($k['uid']));
		$k['user']=$db->fetchRow();
		
		$sql="select * from rv_goods where 1=1 and id=?";
		$db->p_e($sql,array($k['gid']));
		$k['goods']=$db->fetchRow();

		$sql="select * from rv_mendian where 1=1 and id=?";
		$db->p_e($sql, array($k['mid']));
		$k["store"] = $db->fetchRow();	
	}
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('xslr_list.htm');
	exit;
	
}

//导出
if($do=="daochu"){	
	If_rabc(); //检测权限
	$sql2="SELECT * FROM rv_buy where 1=1 order by id desc";
	$db->p_e($sql2,array());
	$list=$db->fetchAll();
	foreach($list as &$k){
		if($k['sex']==1){
			$k['sex1']='男';
		}elseif($k['sex']==2){
			$k['sex1']='女';
		}else{
			$k['sex1']='保密';
		}
		$sql="select * from rv_user where 1=1 and id=?";
		$db->p_e($sql,array($k['uid']));
		$k['user']=$db->fetchRow();
		
		$sql="select * from rv_goods where 1=1 and id=?";
		$db->p_e($sql,array($k['gid']));
		$k['goods']=$db->fetchRow();	
	}
	$time=date(time());
	header("Content-Type: application/vnd.ms-excel;charset=gbk");   
	header("Content-Disposition: attachment; filename=".$time.".xls");
	echo "<table border='1'>";
			echo "<tr>";
			echo "<th width='30'>ID</th>";
			echo "<th width='80'>销售人姓名</th>";
			echo "<th width='120'>销售商品</th>";
			echo "<th width='80'>姓名</th>";
			echo "<th width='80'>姓别</th>";
			echo "<th width='80'>年龄</th>";
			echo "<th width='200'>电话</th>";
			echo "<th width='80'>数量</th>";
			echo "<th width='80'>单价</th>";
			echo "<th width='80'>总价</th>";
			echo "<th width='160'>时间</th>";
			echo "</tr>";
		foreach($list as $v){
			echo "<tr>";
			echo "<td width='30'>".$v['id']."</td>";
			echo "<td width='80'>".$v['user']['name']."</td>";
			echo "<td width='120'>".$v['goods']['name']."</td>";
			echo "<td width='80'>".$v['username']."</td>";
			echo "<td width='80'>".$v['sex1']."</td>";
			echo "<td width='80'>".$v['age']."</td>";
			echo "<td width='200'>".$v['tel']."</td>";
			echo "<td width='80'>".$v['shuliang']."</td>";
			echo "<td width='80'>".$v['goods']['money']."/".$v['goods']['dw']."</td>";
			echo "<td width='80'>".$v['goods']['money']*$v['shuliang']."</td>";
			echo "<td width='160'>".$v['addtime']."</td>";
			echo "</tr>";
		}
	echo "</table>";
	exit;
}
?>