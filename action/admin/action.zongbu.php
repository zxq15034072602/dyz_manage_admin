<?php
if(!defined('CORE'))exit("error!"); 
//总部部门列表	
if($do==""){
	//If_rabc(); //检测权限
	$search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_zongbu where 1=1 ";
	if($_POST['name']){
		$search .= "and name like ? ";
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
	$sql2="SELECT * FROM rv_zongbu where 1=1 ".$search."order by id desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('zongbu_list.htm');
	exit;
	
}


//新建	
if($do=="new"){	
	If_rabc(); //检测权限
	$smt = new smarty();smarty_cfg($smt);
	$smt->display('zongbu_new.htm');
	exit;
}

//编辑	
if($do=="edit"){	
	If_rabc(); //检测权限
	//查询
	$sql="SELECT * FROM rv_zongbu where id=? LIMIT 1";
	$db->p_e($sql,array($id));
	$row=$db->fetchRow();
	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('row',$row);
	$smt->display('zongbu_edit.htm');
	exit;
}

//写入
if($do=="add"){
	If_rabc(); //检测权限
	//查询
	$sql="SELECT * FROM rv_zongbu where name =? LIMIT 1";
	$arr=array($_POST['name']);
	$db->p_e($sql,$arr);
	if($db->fetchRow()){echo  error("错误!部门已存在!");exit();}
	$sql="insert into rv_zongbu (name) VALUES (?)";
	$arr1=array($_POST['name']);
	if($db->p_e($sql,$arr1)){echo close($msg,"zongbu_list");}else{echo  error($msg);}
	exit;
}

//更新
if($do=="updata"){
	If_rabc(); //检测权限
	$id=$_POST['id'];
	$arr=array($_POST['name'],$id);
	$sql="UPDATE rv_zongbu SET name=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){echo close($msg,"zongbu_list");}else{echo  error($msg);}
	exit;
}


//删除
if($do=="del"){
	If_rabc(); //检测权限	
	$sql="UPDATE rv_fengongsi set status=2 where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
?>