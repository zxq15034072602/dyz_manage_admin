<?php
if(!defined('CORE'))exit("error!");
if($do =='store_list'){ //所属门店审核
    If_rabc(); //检测权限

    $search='';
	$arr=array();

	if($_POST['name']){
		$search .= " and u.name like ? ";
		$arr[]="%".$_POST['name']."%";
	}	
	$sqlcount ="SELECT count(*) FROM rv_verify as v,rv_user as u where 1=1 and v.uid=u.id and v.type=1".$search ;
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

	if($_POST['name']){
		$search .= " and u.name like ? ";
		$arr[]="%".$_POST['name']."%";
	}
		$sqlcount ="SELECT count(*) FROM rv_verify as v,rv_user as u where 1=1 and v.uid=u.id and v.type=2".$search;	
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
	$sql2="select v.id,u.name,v.addtime,v.status,v.uid,v.mid,v.cityid,v.areaid from (rv_verify as v left join rv_user as u on v.uid=u.id)left join rv_mendian as m on v.mid=m.id where 1=1 and v.type=2 ".$search." order by v.addtime desc LIMIT ".$pageNum.",".$numPerPage;
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
	   if($v['areaid']){
	       $v['area']=explode(",", $v['areaid']);
	       foreach($v['area'] as $vvv){
	           $sql="select * from rv_area where areaid=?";
	           $db->p_e($sql, array($vvv));
	           $v['city']=$db->fetchRow();
	           $v['cities'].=$v['city']['area'].",";
	       }
	       
               $v['cities']=rtrim($v['cities'],",");
	           $sql="select b.province from rv_city as a left join rv_province as b on a.fatherid=b.provinceid where a.cityid=?";
	           $db->p_e($sql, array($v['city']['fatherid']));
	           $v['province']=$db->fetchRow();
	           $v['region']=$v['province']['province'].$v['cities'];
	      
	   }else{
	       $sql="select * from rv_city where cityid=?";
	       $db->p_e($sql, array($v['cityid']));
	       $v['city']=$db->fetchRow();
	       $sql="select * from rv_province where provinceid=?";
	       $db->p_e($sql, array($v['city']['fatherid']));
	       $v['province']=$db->fetchRow();
	       $v['region']=$v['province']['province'].$v['city']['city'];
	   }
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

	if($_POST['name']){
		$search .= " and u.name like ? ";
		$arr[]="%".$_POST['name']."%";
	}	
	$sqlcount ="SELECT count(*) FROM rv_verify as v,rv_user as u where 1=1 and v.uid=u.id and v.type=3".$search;
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
    $sql2="select v.id,u.name,v.addtime,v.status,v.uid,v.mid,v.cityid,v.areaid from (rv_verify as v left join rv_user as u on v.uid=u.id)left join rv_mendian as m on v.mid=m.id where 1=1 and v.type=3 ".$search." order by v.addtime desc LIMIT ".$pageNum.",".$numPerPage;
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
		if($v['areaid']){
	       $v['area']=explode(",", $v['areaid']);
	       foreach($v['area'] as $vvv){
	           $sql="select * from rv_area where areaid=?";
	           $db->p_e($sql, array($vvv));
	           $v['city']=$db->fetchRow();
	           $v['cities'].=$v['city']['area'].",";
	       }
	       
               $v['cities']=rtrim($v['cities'],",");
	           $sql="select b.province from rv_city as a left join rv_province as b on a.fatherid=b.provinceid where a.cityid=?";
	           $db->p_e($sql, array($v['city']['fatherid']));
	           $v['province']=$db->fetchRow();
	           $v['region']=$v['province']['province'].$v['cities'];
	      
	   }else{
	       $sql="select * from rv_city where cityid=?";
	       $db->p_e($sql, array($v['cityid']));
	       $v['city']=$db->fetchRow();
	       $sql="select * from rv_province where provinceid=?";
	       $db->p_e($sql, array($v['city']['fatherid']));
	       $v['province']=$db->fetchRow();
	       $v['region']=$v['province']['province'].$v['city']['city'];
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


	if($_POST['name']){
		$search .= " and u.name like ? ";
		$arr[]="%".$_POST['name']."%";
	}	
	$sqlcount ="SELECT count(*) FROM rv_verify as v,rv_user as u where 1=1 and v.uid=u.id and v.type=4".$search;
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
if($do =='store_list4'){ //店员所属门店审核
   
    $search='';
	$arr1=array();
	if($_POST['name']){
		$search .= " and u.name like ? ";
		$arr1[]="%".$_POST['name']."%";
	}	
	$sqlcount ="SELECT count(*) FROM rv_verify as v,rv_user as u where 1=1 and v.uid=u.id and v.type=0".$search;
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

	$db->p_e($sql1,$arr1);
	$total=$db->fetch_count();//总条数
	//查询
	
	$sql2="select v.id,u.name,v.addtime,v.status,v.uid,v.mid,m.name as mdname from (rv_verify as v left join rv_user as u on v.uid=u.id)left join rv_mendian as m on v.mid=m.id where 1=1 and v.type=0 ".$search." order by v.addtime desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr1);
	$list=$db->fetchAll();

	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('verify_list4.html');
	exit;
}

if($do == "tg"){
	//If_rabc(); //检测权限
	$sql="UPDATE rv_verify set status=1,updatetime=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){
	    $sql="select roleid,zz from rv_user where id=?";
	    $db->p_e($sql, array($_REQUEST[uid]));
	    $role=$db->fetchRow();
	    if($role['roleid'] == 2 || $role['roleid'] == 4){
	        $sql="delete from rv_user_jingxiao_jiameng where 1=1 and id=?";
	        $db->p_e($sql, array($role['zz']));
	    }
		$sql ="UPDATE rv_mendian set person_id=0 where person_id=?";
		$db->p_e($sql,array($_REQUEST[uid]));
        $sql="UPDATE rv_mendian set person_id=? where id=? ";
        if($db->p_e($sql,array($_REQUEST[uid],$_REQUEST[mid]))){
        	$sql="UPDATE rv_user set roleid=5,updated_at=now() where zz=? and id=?";
        	$db->p_e($sql,array($_REQUEST[mid],$_REQUEST[uid]));
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
if($do == "tg_dy"){//店员审核通过
	//If_rabc(); //检测权限
	$sql="UPDATE rv_verify set status=1,updatetime=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){
	    $sql="select roleid,zz from rv_user where id=?";
	    $db->p_e($sql, array($_REQUEST[uid]));
	    $role=$db->fetchRow();
	    if($role['roleid'] == 2 || $role['roleid'] == 4){
	        $sql="delete from rv_user_jingxiao_jiameng where 1=1 and id=?";
	        $db->p_e($sql, array($role['zz']));
	    }

    	$sql="UPDATE rv_user set zz=?,updated_at=now(),roleid=5 where id=? limit 1";
        if($db->p_e($sql,array($_REQUEST[mid],$_REQUEST[uid]))){
        	$cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>5);
        	$cont=json_encode($cont);
            to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
        	echo success($msg);
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
	                $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>1);
	                $cont=json_encode($cont);
	                to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
	                echo success($msg);
	            } 
	        }	        
	    }else{
	        $sql="UPDATE rv_user set zz=?,updated_at=now(),roleid=1 where id=? limit 1";
	        if($db->p_e($sql,array($_REQUEST[mid],$_REQUEST[uid]))){
	            $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>1);
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
                "mid='$_REQUEST[mid]'",
                "cityid='$_REQUEST[cityid]'",
                "areaid='$_REQUEST[areaid]'"
            ),array(
                "uid='$_REQUEST[uid]'"
            ))){
                $sql="update rv_user set zz=?,updated_at=now(),roleid=2 where id=? limit 1";
                if($db->p_e($sql,array($arr['id'],$_REQUEST[uid]))){
                    $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>2);
                    $cont=json_encode($cont);
                    to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
                    echo success($msg);
                    exit();
                } 
            }
        }else{
           $last_id=$db->insert(0, 2, "rv_user_jingxiao_jiameng", array(
                "uid='$_REQUEST[uid]'",
                "mid='$_REQUEST[mid]'",
                "cityid='$_REQUEST[cityid]'",
                "areaid='$_REQUEST[areaid]'"
           ));
           if($last_id){
               $sql="update rv_user set zz=?,updated_at=now(),roleid=2 where id=? limit 1";
               if($db->p_e($sql,array($last_id,$_REQUEST[uid]))){
                   $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>2);
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
                "mid='$_REQUEST[mid]'",
                "cityid='$_REQUEST[cityid]'",
                "areaid='$_REQUEST[areaid]'"
            ),array(
                "uid='$_REQUEST[uid]'"
            ))){
                $sql="update rv_user set zz=?,updated_at=now(),roleid=4 where id=? limit 1";
                if($db->p_e($sql,array($arr['id'],$_REQUEST[uid]))){
                    $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>4);
                    $cont=json_encode($cont);
                    to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
                    echo success($msg);
                    exit();
                } 
          }
        }else{
           $last_id=$db->insert(0, 2, "rv_user_jingxiao_jiameng", array(
                "uid='$_REQUEST[uid]'",
                "mid='$_REQUEST[mid]'",
                "cityid='$_REQUEST[cityid]'",
                "areaid='$_REQUEST[areaid]'"
           ));
           if($last_id){
               $sql="update rv_user set zz=?,updated_at=now(),roleid=4 where id=? limit 1";
               if($db->p_e($sql,array($last_id,$_REQUEST[uid]))){
                   $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的申请已被通过!","store_id"=>$_REQUEST[mid],"roleid"=>4);
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