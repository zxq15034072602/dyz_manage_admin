<?php
if(!defined('CORE'))exit("error!"); 
//经销商用户列表	
if($do=="fgs_user"){	
	If_rabc(); //检测权限
	$type=$_REQUEST[type]??0;
	$roleid=$_REQUEST[roleid]??0;
	$sqlcount ="SELECT count(*) FROM rv_user where 1=1 and status!=2 and roleid=2";
	if($_POST['username']){
		$search .= "and username like ? ";
		$arr[]="%".$_POST['username']."%";
		}	
	//设置分页
	if($_POST[numPerPage]==""){
		$numPerPage="20";
	}else{	
		$numPerPage=$_POST[numPerPage];
	}
	if($_POST[pageNum]==""||$_POST[pageNum]=="0" ){$pageNum="0";}else{$pageNum=($_POST[pageNum]-1)*$numPerPage;}
	$sql1=$sqlcount;
	$db->p_e($sql1,$arr);
	$total=$db->fetch_count();//总条数
	
	//查询
    $sql2="SELECT * FROM rv_user where 1=1 ".$search." and status!=2  and type in ($type ,3) and roleid=2 order by id desc LIMIT ".$pageNum.",".$numPerPage;	     
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();	
	foreach($list as &$k){
	    $sql="select mid,cityid from rv_user_jingxiao_jiameng where 1=1 and id=?";
	    $db->p_e($sql, array($k['zz']));
	    $k['md']=$db->fetchRow();
	    $sql="select * from rv_city where cityid=?";
	    $db->p_e($sql, array($k['md']['cityid']));
	    $k['city_name']=$db->fetchRow()['city'];
	    
	    $k['midArr']=explode(",", $k['md']['mid']);
	    foreach($k['midArr'] as $kk=>$vv){
	        $sql="select name from rv_mendian where id=$vv";
	        $db->p_e($sql, array());
	        $name=$db->fetchRow();
	        $k['mdname'].=$name['name']."，";
	    }
	    $k['mdname']=rtrim($k['mdname'],"，");
	    $k['mdname']=explode("，", $k['mdname']);
	}
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('role',$role);
	$smt->assign('roleid',$roleid);
	$smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
	$smt->assign('pageNum',$_POST[pageNum]); //当前页数
	$smt->assign('title',"用户列表");
	$smt->assign('type',$type);
	$smt->display('fgs_user_list.htm');
	exit;
	
}

//导出经销商
if($do=='daochu_jingxiao'){
    //查询
    $sql2="SELECT * FROM rv_user where 1=1  and status=1 and roleid=2 order by id desc ";
    $db->p_e($sql2,array());
    $list=$db->fetchAll();
    foreach($list as &$k){
        $sql="select mid,cityid from rv_user_jingxiao_jiameng where 1=1 and id=?";
        $db->p_e($sql, array($k['zz']));
        $k['md']=$db->fetchRow();
        $sql="select * from rv_city where cityid=?";
        $db->p_e($sql, array($k['md']['cityid']));
        $k['city_name']=$db->fetchRow()['city'];
         
        $k['midArr']=explode(",", $k['md']['mid']);
        foreach($k['midArr'] as $kk=>$vv){
            $sql="select name from rv_mendian where id=$vv";
            $db->p_e($sql, array());
            $name=$db->fetchRow();
            $k['mdname'].=$name['name']."，";
        }
        $k['mdname']=rtrim($k['mdname'],"，");
        $k['mdname']=explode("，", $k['mdname']);
    }
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='7'>经销商信息表</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th width='50'>序号</th>";
    echo "<th width='80'>用户ID</th>";
    echo "<th width='120'>用户名</th>";
    echo "<th width='120'>姓名</th>";
    echo "<th width='120'>电话</th>";
    echo "<th width='300'>所有门店</th>";
    echo "<th width='120'>所属区域</th>";
    echo "</tr>";
    foreach($list as $key=>$val){
            echo "<tr>";
            echo "<td width='50'>".($key+1)."</td>";
            echo "<td width='80'>".$val['id']."</td>";
            echo "<td width='120'>".$val['username']."</td>";
            echo "<td width='120'>".$val['name']."</td>";
            echo "<td width='120'>".$val['mobile']."</td>";
            echo "<td width='300'><ul>";
               foreach ($val['mdname'] as $keys=>$vals){
               	echo   "<li style='line-height: 31px;height:21px'>".($keys+1)."、 &nbsp;".$vals."</li>";
                }
           echo "</ul></td>";
           echo "<td width='120'>".$val['city_name']."</td>";
           echo "</tr>";
    }
    echo "</table>";
}

//加盟商用户列表
if($do=='jms_user'){
	If_rabc(); //检测权限
    $type=$_REQUEST[type]??0;
    $roleid=$_REQUEST[roleid]??0;
    $sqlcount ="SELECT count(*) FROM rv_user where 1=1 and status!=2 and roleid=4";
    if($_POST['username']){
        $search .= "and username like ? ";
        $arr[]="%".$_POST['username']."%";
    }
    //设置分页
    if($_POST[numPerPage]==""){
        $numPerPage="20";
    }else{
        $numPerPage=$_POST[numPerPage];
    }
    if($_POST[pageNum]==""||$_POST[pageNum]=="0" ){$pageNum="0";}else{$pageNum=($_POST[pageNum]-1)*$numPerPage;}
    $sql1=$sqlcount;
    $db->p_e($sql1,$arr);
    $total=$db->fetch_count();//总条数
    
    //查询
    $sql2="SELECT * FROM rv_user where 1=1 ".$search." and status!=2  and type in ($type ,3) and roleid=4 order by id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    foreach($list as &$k){
        $sql="select mid,cityid from rv_user_jingxiao_jiameng where 1=1 and id=?";
        $db->p_e($sql, array($k['zz']));
        $k['md']=$db->fetchRow();
        $sql="select * from rv_city where cityid=?";
        $db->p_e($sql, array($k['md']['cityid']));
        $k['city_name']=$db->fetchRow()['city'];
        
        $k['midArr']=explode(",", $k['md']['mid']);
    
        foreach($k['midArr'] as $kk=>$vv){
            $sql="select name from rv_mendian where id=$vv";
            $db->p_e($sql, array());
            $name=$db->fetchRow();
            $k['mdname'].=$name['name']."，";
        }
        $k['mdname']=rtrim($k['mdname'],"，");
        $k['mdname']=explode("，", $k['mdname']);
    }
    //模版
    $smt = new smarty();smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('role',$role);
    $smt->assign('roleid',$roleid);
    $smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
    $smt->assign('pageNum',$_POST[pageNum]); //当前页数
    $smt->assign('title',"用户列表");
    $smt->assign('type',$type);
    $smt->display('fgs_user_list1.htm');
    exit;
}

//导出加盟商
if($do=='daochu_jiameng'){
      //查询
    $sql2="SELECT * FROM rv_user where 1=1  and status=1 and roleid=4 order by id desc ";
    $db->p_e($sql2,array());
    $list=$db->fetchAll();
    foreach($list as &$k){
        $sql="select mid,cityid from rv_user_jingxiao_jiameng where 1=1 and id=?";
        $db->p_e($sql, array($k['zz']));
        $k['md']=$db->fetchRow();
        $sql="select * from rv_city where cityid=?";
        $db->p_e($sql, array($k['md']['cityid']));
        $k['city_name']=$db->fetchRow()['city'];
         
        $k['midArr']=explode(",", $k['md']['mid']);
        foreach($k['midArr'] as $kk=>$vv){
            $sql="select name from rv_mendian where id=$vv";
            $db->p_e($sql, array());
            $name=$db->fetchRow();
            $k['mdname'].=$name['name']."，";
        }
        $k['mdname']=rtrim($k['mdname'],"，");
        $k['mdname']=explode("，", $k['mdname']);
    }
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='7'>经销商信息表</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th width='50'>序号</th>";
    echo "<th width='80'>用户ID</th>";
    echo "<th width='120'>用户名</th>";
    echo "<th width='120'>姓名</th>";
    echo "<th width='120'>电话</th>";
    echo "<th width='300'>所有门店</th>";
    echo "<th width='120'>所属区域</th>";
    echo "</tr>";
    foreach($list as $key=>$val){
            echo "<tr>";
            echo "<td width='50'>".($key+1)."</td>";
            echo "<td width='80'>".$val['id']."</td>";
            echo "<td width='120'>".$val['username']."</td>";
            echo "<td width='120'>".$val['name']."</td>";
            echo "<td width='120'>".$val['mobile']."</td>";
            echo "<td width='300'><ul>";
               foreach ($val['mdname'] as $keys=>$vals){
               	echo   "<li style='line-height: 31px;height:21px'>".($keys+1)."、 &nbsp;".$vals."</li>";
                }
           echo "</ul></td>";
           echo "<td width='120'>".$val['city_name']."</td>";
           echo "</tr>";
    }
    echo "</table>";
}

//新建	
if($do=="new"){	
	If_rabc(); //检测权限
	$type=$_REQUEST[type];
	//角色数组
	$sql="SELECT id,title FROM rv_role where 1=1 and id in(2,4)";
	$db->query($sql);
	$list=$db->fetchAll();
	
	//格式化角色数据
	foreach($list as $key=>$val){
		$role_cn[$list[$key][id]]=$list[$key][title];		
	}
	
	$sql="select * from rv_mendian";
	$db->p_e($sql, array());
	$fgs=$db->fetchAll();
	
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('select_role_cn',select($role_cn,"roleid","","选择角色","required"));
	$smt->assign('title',"新建用户");
	$provinces=get_province();
	$smt->assign("provinces",$provinces);//获取省份
	$smt->assign('fgs',$fgs);
	$smt->assign('type',$type);
	$smt->display('fgs_user_new.htm');
	exit;
}

//编辑	
if($do=="edit"){	
	If_rabc(); //检测权限
	//查询
	$sql="SELECT * FROM rv_user where id=? LIMIT 1";
	$db->p_e($sql,array($id));
	$row=$db->fetchRow();
	//角色数组
	$sql="SELECT id,title FROM rv_role where id in (2,4)";
	$db->query($sql);
	$list=$db->fetchAll();
	
	//格式化角色数据
	foreach($list as $key=>$val){
	    $role_cn[$list[$key][id]]=$list[$key][title];
	}
	
	$sql="select a.*,b.fatherid from rv_user_jingxiao_jiameng as a left join rv_city as b on a.cityid=b.cityid where 1=1 and a.id=?";
	$db->p_e($sql, array($row['zz']));
	$fgs=$db->fetchRow();
	$provinceid=$fgs['fatherid'];
	$cityid=$fgs['cityid'];
	$arr=explode(",", $fgs['mid']);
	$fgs=array();
	foreach($arr as $k=>$v){
	    $sql="select id,name from rv_mendian where id=?";
	    $db->p_e($sql, array($v));
	    $arr2=$db->fetchRow();
	    $fgs[$k]=$arr2;
	}

	$sql="select id,name from rv_mendian ";
	$db->p_e($sql, array());
	$fgs_list=$db->fetchAll();
    
	foreach($fgs_list as $k=>$v){
	    if(!in_array($v, $fgs)){
	       $arr3[]=$v; 
	    }
	}
	$fgs_list=$arr3;

	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('select_role_cn',select($role_cn,"roleid",$row[roleid],"选择角色","required"));
	$smt->assign('row',$row);
	$smt->assign('role',$role);
	$smt->assign('fgs',$fgs);
	$smt->assign("provinceid",$provinceid);
	$provinces=get_province();
	$smt->assign("provinces",$provinces);//获取省份
	$smt->assign("cityid",$cityid);
	$smt->assign('fgs_list',$fgs_list);
	$smt->assign('title',"编辑用户");
	$smt->display('fgs_user_edit.htm');
	exit;
}

//写入
if($do=="add"){
	If_rabc(); //检测权限
	$password=md5($_POST[password]);
	$_POST['mid']=implode(",", $_POST['mid']);
	//查询
	$sql="SELECT * FROM rv_user where username =? and mobile=? LIMIT 1";
	$arr=array($_POST[username],$_POST[mobile]);
	$db->p_e($sql,$arr);
	if($db->fetchRow()){echo  error("错误!用户已存在!");exit();}
	$time=date("Y-m-d H:i:s",time());
	$userid=$_SESSION[dys][userid];
	$last_id=$db->insert(0, 2, "rv_user", array(
	    "username='$_POST[username]'",
	    "password='$password'",
	    "roleid='$_POST[roleid]'",
	    "created_at='$time'",
	    "userid='$userid'",
	    "name='$_POST[name]'",
	    "mobile='$_POST[mobile]'",
	    "type='$_POST[type]'"
	));
	if($last_id){
	    $zz=$db->insert(0, 2, "rv_user_jingxiao_jiameng", array(
	        "uid='$last_id'",
	        "mid='$_POST[mid]'",
	        "cityid='$_REQUEST[selCities]'"
	    ));
	    if($zz){
	        $db->update(0, 1, "rv_user", array(
	            "zz='$zz'"
	        ),array(
	            "id='$last_id'"
	        ));
	        echo close($msg,"fgsuser");
	    }
	}else{echo  error($msg);}
	exit();
}

//更新
if($do=="updata"){
	If_rabc(); //检测权限
	$_POST['mid']=implode(",", $_POST['mid']);
	$id=$_POST['id'];
	if($_POST[password]){
		$password=md5($_POST[password]);
		$pasql="password=?,";
		$arr=array($password,$_POST['username'],$_POST['zz'],$_POST[mobile],$_POST['roleid'],$_SESSION['dys']['userid'],$_POST['name'],$id);
	}else{
	    $arr=array($_POST['username'],$_POST['zz'],$_POST[mobile],$_POST['roleid'],$_SESSION['dys']['userid'],$_POST['name'],$id);
	}
	$sql="UPDATE rv_user SET ".$pasql." username=?,zz=?,mobile=?,roleid=?,updated_at=now(),userid=?,name=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){
	    $lastid=$db->update(0, 1, "rv_user_jingxiao_jiameng", array(
	        "mid='$_POST[mid]'",
	        "cityid='$_REQUEST[selCities]'"
	    ),array(
	        "uid='$id'"
	    ));
	    echo close($msg,"fgsuser");
	}else{
	    echo  error($msg);
	}
	exit;
}


//删除
if($do=="del"){
	If_rabc(); //检测权限	
	$sql="UPDATE rv_user set status=2,updated_at=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
//启用
if($do=="qy"){
	If_rabc(); //检测权限
	$sql="UPDATE rv_user set status=1,updated_at=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
//禁用
if($do=="jy"){
	If_rabc(); //检测权限	
	$sql="UPDATE rv_user set status=0,updated_at=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
?>