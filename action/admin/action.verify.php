<?php
if(!defined('CORE'))exit("error!");
if($do =='store_list'){ //所属门店审核
    If_rabc(); //检测权限

    $search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_verify as v,rv_user as u where 1=1 and v.uid=u.id and v.type=1";

	if($_POST['name']){
		$search .= " and u.name like ? ";
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
	$sql1=$sqlcount ;

	$db->p_e($sql1,$arr);
	$total=$db->fetch_count();//总条数
	//查询
	$sql2="SELECT v.id,u.name,m.name as mdname,v.addtime,v.status,v.uid,v.mid FROM rv_verify as v,rv_user as u,rv_mendian as m where 1=1 and v.mid =m.id and u.id=v.uid and v.type=1  ".$search." order by v.addtime desc LIMIT ".$pageNum.",".$numPerPage;

	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('verify_list.html');
	exit;
}
if($do == "tg"){
	//If_rabc(); //检测权限
	$sql="UPDATE rv_verify set status=1,updatetime=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){
		$sql ="UPDATE rv_mendian set person_id=0 where person_id=? ";
		$db->p_e($sql,array($_REQUEST[uid]));
        $sql="UPDATE rv_mendian set person_id=? where id=? ";
        if($db->p_e($sql,array($_REQUEST[uid],$_REQUEST[mid]))){
        	$sql="UPDATE rv_user set roleid=5,updated_at=now() where zz=?";
        	$db->p_e($sql,array($_REQUEST[mid]));
        	$sql="UPDATE rv_user set zz=?,updated_at=now(),roleid=3 where id=? limit 1";
	        if($db->p_e($sql,array($_REQUEST[mid],$_REQUEST[uid]))){
	        	$cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!重新进入app即可","store_id"=>$_REQUEST[mid],"roleid"=>3);
	        	$cont=json_encode($cont);
	            to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
	        	echo success($msg);
	        }
        }
        
	}else{
		echo  error($msg);
	}	
	exit;
}
if($do == "jj"){
	//If_rabc(); //检测权限
	$sql="UPDATE rv_verify set status=2,updatetime=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){
        echo success($msg);
	}else{
		echo  error($msg);
	}	
	exit;
}