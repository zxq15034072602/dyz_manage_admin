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
if($do =='store_list1'){ //经销商所属门店审核
    If_rabc(); //检测权限

    $search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_verify as v,rv_user as u where 1=1 and v.uid=u.id and v.type=2";

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
	$sql2="select v.id,u.name,v.addtime,v.status,v.uid,v.mid from (rv_verify as v left join rv_user as u on v.uid=u.id)left join rv_mendian as m on v.mid=m.id where 1=1 and v.type=2 ".$search." order by v.addtime desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	foreach($list as $k=>&$v){
	    $v['midArr']=explode(",", $v['mid']);
	    foreach($v['midArr'] as $kk=>$vv){
	        $sql="select name from rv_mendian where id=$vv";
	        $db->p_e($sql, array());
	        $name=$db->fetchRow();
	        $v['mdname'].=$name['name']."，";
	    }
	   $v['mdname']=rtrim($v['mdname'],"，");
	}
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('verify_list1.html');
	exit;
}
if($do =='store_list2'){ //加盟商所属门店审核
    If_rabc(); //检测权限

    $search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_verify as v,rv_user as u where 1=1 and v.uid=u.id and v.type=3";

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
    $sql2="select v.id,u.name,v.addtime,v.status,v.uid,v.mid from (rv_verify as v left join rv_user as u on v.uid=u.id)left join rv_mendian as m on v.mid=m.id where 1=1 and v.type=3 ".$search." order by v.addtime desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	foreach($list as $k=>&$v){
	    if($v['mid']){
	        $v['midArr']=explode(",", $v['mid']);
	        foreach($v['midArr'] as $kk=>$vv){
	            $sql="select name from rv_mendian where id=$vv";
	            $db->p_e($sql, array());
	            $name=$db->fetchRow();
	            $v['mdname'].=$name['name']."，";
	        }
	        $v['mdname']=rtrim($v['mdname'],"，");
	    }else{
	        $v['mdname']="该用户未选择门店";
	    }
	}
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('verify_list2.html');
	exit;
}
if($do =='store_list3'){ //总部人员所属门店审核
    If_rabc(); //检测权限
    $search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_verify as v,rv_user as u where 1=1 and v.uid=u.id and v.type=4";

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
	
	$sql2="select v.id,u.name,v.addtime,v.status,v.uid,v.mid,m.name as mdname from (rv_verify as v left join rv_user as u on v.uid=u.id)left join rv_mendian as m on v.mid=m.id where 1=1 and v.type=4 ".$search." order by v.addtime desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();

	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('verify_list3.html');
	exit;
}
if($do == "tg"){
	//If_rabc(); //检测权限
	$sql="UPDATE rv_verify set status=1,updatetime=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){
		$sql ="UPDATE rv_mendian set person_id=0 where person_id=?";
		$db->p_e($sql,array($_REQUEST[uid]));
        $sql="UPDATE rv_mendian set person_id=? where id=? ";
        if($db->p_e($sql,array($_REQUEST[uid],$_REQUEST[mid]))){
        	$sql="UPDATE rv_user set roleid=5,updated_at=now() where zz=?";
        	$db->p_e($sql,array($_REQUEST[mid]));
        	$sql="UPDATE rv_user set zz=?,updated_at=now(),roleid=3 where id=? limit 1";
	        if($db->p_e($sql,array($_REQUEST[mid],$_REQUEST[uid]))){
	        	$cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>3);
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
if($do == "tg_zb"){//总部人员审核
	//If_rabc(); //检测权限
	$sql="UPDATE rv_verify set status=1,updatetime=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){
	    $sql="select * from rv_user_jingxiao_jiameng where uid=?";
	    $db->p_e($sql, array($_REQUEST[uid]));
	    $arr=$db->fetchRow();
	    if($arr){
	        $sql="delete from rv_user_jingxiao_jiameng where uid=?";
	        if($db->p_e($sql, array($_REQUEST[uid]))){
	            $sql="UPDATE rv_user set zz=?,updated_at=now(),roleid=1 where id=? limit 1";
	            if($db->p_e($sql,array($_REQUEST[mid],$_REQUEST[uid]))){
	                $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过","store_id"=>$_REQUEST[mid],"roleid"=>3);
	                $cont=json_encode($cont);
	                to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
	                echo success($msg);
	            } 
	        }	        
	    }else{
	        $sql="UPDATE rv_user set zz=?,updated_at=now(),roleid=1 where id=? limit 1";
	        if($db->p_e($sql,array($_REQUEST[mid],$_REQUEST[uid]))){
	            $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>3);
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

if($do=='tg_jx'){//经销商审核通过操作
    $sql="UPDATE rv_verify set status=1,updatetime=now() where id=? limit 1";
    if($db->p_e($sql, array($id))){
        $sql="select * from rv_user_jingxiao_jiameng where 1=1 and uid=?";
        $db->p_e($sql, array($_REQUEST['uid']));
        $arr=$db->fetchRow();
        if($arr){
            if($db->update(0, 1, "rv_user_jingxiao_jiameng", array(
                "mid='$_REQUEST[mid]'"
            ),array(
                "uid='$_REQUEST[uid]'"
            ))){
                $sql="update rv_user set zz=?,updated_at=now(),roleid=2 where id=? limit 1";
                if($db->p_e($sql,array($arr['id'],$_REQUEST[uid]))){
                    $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>3);
                    $cont=json_encode($cont);
                    to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
                    echo success($msg);
                    exit();
                } 
            }
        }else{
           $last_id=$db->insert(0, 2, "rv_user_jingxiao_jiameng", array(
                "uid='$_REQUEST[uid]'",
                "mid='$_REQUEST[mid]'"
           ));
           if($last_id){
               $sql="update rv_user set zz=?,updated_at=now(),roleid=2 where id=? limit 1";
               if($db->p_e($sql,array($last_id,$_REQUEST[uid]))){
                   $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>3);
                   $cont=json_encode($cont);
                   to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
                   echo success($msg);
                   exit();
               } 
           }
        }
    }else{
        echo error($msg);
    }
    exit();
}
if($do=='tg_jm'){//加盟商审核通过操作
    $sql="UPDATE rv_verify set status=1,updatetime=now() where id=? limit 1";
    if($db->p_e($sql, array($id))){
        $sql="select * from rv_user_jingxiao_jiameng where 1=1 and uid=?";
        $db->p_e($sql, array($_REQUEST['uid']));
        $arr=$db->fetchRow();
        if($arr){
          if($db->update(0, 1, "rv_user_jingxiao_jiameng", array(
                "mid='$_REQUEST[mid]'"
            ),array(
                "uid='$_REQUEST[uid]'"
            ))){
                $sql="update rv_user set zz=?,updated_at=now(),roleid=4 where id=? limit 1";
                if($db->p_e($sql,array($arr['id'],$_REQUEST[uid]))){
                    $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>3);
                    $cont=json_encode($cont);
                    to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
                    echo success($msg);
                    exit();
                } 
          }
        }else{
           $last_id=$db->insert(0, 2, "rv_user_jingxiao_jiameng", array(
                "uid='$_REQUEST[uid]'",
                "mid='$_REQUEST[mid]'"
           ));
           if($last_id){
               $sql="update rv_user set zz=?,updated_at=now(),roleid=4 where id=? limit 1";
               if($db->p_e($sql,array($last_id,$_REQUEST[uid]))){
                   $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>3);
                   $cont=json_encode($cont);
                   to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
                   echo success($msg);
                   exit();
               } 
           }
        }
    }else{
        echo error($msg);
    }
    exit();
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