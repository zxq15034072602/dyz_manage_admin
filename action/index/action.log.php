<?php
if(!defined('CORE'))exit("error!"); 

//列表	
if($do==""){
	If_rabc(); //检测权限
	$sqlcount ="SELECT count(*) FROM `V_log` where 1=1 ";
	if($_POST['shijian']){
		$search .= "and shijian like ?";
		$arr[]="%".$_POST['shijian']."%";
	}
	//设置分页
	if($_POST[numPerPage]==""){
		$numPerPage="20";
	}else{	
		$numPerPage=$_POST[numPerPage];
	}
	if($_POST[pageNum]==""||$_POST[pageNum]=="0" ){$pageNum="0";}else{$pageNum=($_POST[pageNum]-1)*$numPerPage;}
	$sql1=$sqlcount.$search;
	$db->p_e($sql1,$arr);
	$total=$db->fetch_count();//总条数
	
	//查询
	$sql="SELECT * FROM `V_log` where 1=1 ".$search." order by id desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql,$arr);
	$list=$db->fetchAll();
	
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
	$smt->assign('pageNum',$_POST[pageNum]); //当前页数
	$smt->assign('title',"操作日志");
	$smt->display('log.htm');
	exit;
}
?>