<?php
if(!defined('CORE'))exit("error!"); 
//列表	
if($do==""){
	If_rabc(); //检测权限
	$type=$_REQUEST[type]??0;
	$search='';
	$arr=array();
	$sqlcount ="SELECT count(id) FROM rv_type where 1=1 and type=$type ";
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
	$sql2="SELECT * FROM rv_type where 1=1 and type=$type ". $search." order by id desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('type',$type);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('pp_list.htm');
	exit;
	
}
if($do == "new"){
    $type=$_REQUEST[type];
    $smt = new smarty();smarty_cfg($smt);
    //模版
    $smt->assign('type',$type);
    $smt->display('pp_new.htm');
    exit;
}
if($do == "add"){
    $type=$_REQUEST[type];
    $arr=array($_REQUEST['name'],$type);
    $sql="insert into rv_type (name,type) VALUES(?,?)";
    if($db->p_e($sql, $arr)){
        echo close($msg,"pp_list");
    }else{echo  error($msg);}
    exit;
}
//编辑	
if($do=="edit"){	
	If_rabc(); //检测权限
	$type=$_REQUEST[type];
	//查询
	$sql="SELECT * from rv_type where 1=1 and id=? and type=?";
	$db->p_e($sql,array($id,$type));
	$row=$db->fetchRow();
	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('row',$row);
	$smt->assign('type',$type);
	$smt->display('pp_edit.htm');
	exit;
}

//更新
if($do=="updata"){
	If_rabc(); //检测权限
	$type=$_REQUEST[type];
	$id=$_POST['id'];
	$arr=array($_POST['name'],$type,$id);
	$sql="UPDATE rv_type set name=?,type=? WHERE id=?";
	if($db->p_e($sql,$arr)){echo close($msg,"pp_list");}else{echo  error($msg);}
	exit;
}
?>