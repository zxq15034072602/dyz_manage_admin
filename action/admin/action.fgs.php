<?php
if(!defined('CORE'))exit("error!"); 
//分公司列表	
if($do==""){
	If_rabc(); //检测权限
	$search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_fengongsi where 1=1 and status!=2 ";
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
	$sql2="SELECT * FROM rv_fengongsi where 1=1 and status!=2 ".$search."order by id desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	foreach($list as &$v){
			$v['addtime']=date('Y-m-d H:i:s',$v['addtime']);
	}
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('fgs_list.htm');
	exit;
	
}


//新建	
if($do=="new"){	
	If_rabc(); //检测权限
	$smt = new smarty();smarty_cfg($smt);
	$smt->display('fgs_new.htm');
	exit;
}

//编辑	
if($do=="edit"){	
	If_rabc(); //检测权限
	//查询
	$sql="SELECT * FROM rv_fengongsi where id=? LIMIT 1";
	$db->p_e($sql,array($id));
	$row=$db->fetchRow();
	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('row',$row);
	$smt->display('fgs_edit.htm');
	exit;
}

//写入
if($do=="add"){
	If_rabc(); //检测权限
	//查询
	$sql="SELECT * FROM rv_fengongsi where name =? LIMIT 1";
	$arr=array($_POST['name']);
	$db->p_e($sql,$arr);
	if($db->fetchRow()){echo  error("错误!用户已存在!");exit();}
	$time=time();
	$sql="insert into rv_fengongsi (name,tel,uid,addtime) VALUES (?,?,?,?)";
	$arr1=array($_POST['name'],$_POST['tel'],$_SESSION['dys']['userid'],$time);
	if($db->p_e($sql,$arr1)){echo close($msg,"fgs_list");}else{echo  error($msg);}
	exit;
}

//更新
if($do=="updata"){
	If_rabc(); //检测权限
	$id=$_POST['id'];
	$arr=array($_POST['name'],$_SESSION['dys']['userid'],$_POST['tel'],$id);
	$sql="UPDATE rv_fengongsi SET name=?,upuid=?,tel=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){echo close($msg,"fgs_list");}else{echo  error($msg);}
	exit;
}


//删除
if($do=="del"){
	If_rabc(); //检测权限	
	$sql="UPDATE rv_fengongsi set status=2 where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
//启用
if($do=="qy"){
	If_rabc(); //检测权限
	$sql="UPDATE rv_fengongsi set status=1 where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
//禁用
if($do=="jy"){
	If_rabc(); //检测权限	
	$sql="UPDATE rv_fengongsi set status=0 where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
?>