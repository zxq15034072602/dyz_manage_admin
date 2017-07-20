<?php
if(!defined('CORE'))exit("error!"); 
//分公司用户列表	
if($do=="fgs_user"){
	If_rabc(); //检测权限
	$type=$_REQUEST[type]??0;
	$sqlcount ="SELECT count(*) FROM rv_user where 1=1 and status!=2 and roleid in (2,4)";
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
	$sql2="SELECT * FROM rv_user where 1=1 and status!=2  and type in ($type ,3) and roleid in (2,4) order by id desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();	
	foreach($list as &$k){
		$sql="select name from rv_fengongsi where 1=1 and id=?";
		$db->p_e($sql,array($k['zz']));
		$k['fgsname']=$db->fetch_count();
	}
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('role',$role);
	$smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
	$smt->assign('pageNum',$_POST[pageNum]); //当前页数
	$smt->assign('title',"用户列表");
	$smt->assign('type',$type);
	$smt->display('fgs_user_list.htm');
	exit;
	
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
	
	$sql="select * from rv_fengongsi where 1=1 and status=1";
	$db->p_e($sql,array());
	$fgs=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('select_role_cn',select($role_cn,"roleid","","选择角色","required"));
	$smt->assign('title',"新建用户");
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
	//所属部门
	$sql="select * from rv_fengongsi where 1=1 and id=?";
	$db->p_e($sql,array($row['zz']));
	$fgs=$db->fetchRow();
	
	$sql="select * from rv_fengongsi where 1=1 and status=1";
	$db->p_e($sql,array());
	$fgs_list=$db->fetchAll();

	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('select_role_cn',select($role_cn,"roleid",$row[roleid],"选择角色","required"));
	$smt->assign('row',$row);
	$smt->assign('role',$role);
	$smt->assign('fgs',$fgs);
	$smt->assign('fgs_list',$fgs_list);
	$smt->assign('title',"编辑用户");
	$smt->display('fgs_user_edit.htm');
	exit;
}

//写入
if($do=="add"){
	If_rabc(); //检测权限
	$password=md5($_POST[password]);
	//查询
	$sql="SELECT * FROM rv_user where username =? and mobile=? LIMIT 1";
	$arr=array($_POST[username],$_POST[mobile]);
	$db->p_e($sql,$arr);
	if($db->fetchRow()){echo  error("错误!用户已存在!");exit();}
	$sql="insert into rv_user (username,password,zz,roleid,created_at,userid,name,mobile,type) VALUES (?,?,?,?,now(),?,?,?,?)";
	$arr1=array($_POST[username],$password,$_POST['fgs'],$_POST[roleid],$_SESSION['dys']['userid'],$_POST[name],$_POST['mobile'],3);
	if($db->p_e($sql,$arr1)){
	    echo close($msg,"fgsuser");
	}else{echo  error($msg);}
	exit;
}

//更新
if($do=="updata"){
	If_rabc(); //检测权限
	$id=$_POST['id'];
	if($_POST[password]){
		$password=md5($_POST[password]);
		$pasql="password=?,";
		$arr=array($password,$_POST['username'],$_POST['zz'],$_POST[mobile],$_POST['roleid'],$_SESSION['dys']['userid'],$_POST['name'],$id);
	}else{
	    $arr=array($_POST['username'],$_POST['zz'],$_POST[mobile],$_POST['roleid'],$_SESSION['dys']['userid'],$_POST['name'],$id);
	}
	$sql="UPDATE rv_user SET ".$pasql." username=?,zz=?,mobile=?,roleid=?,updated_at=now(),userid=?,name=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){echo close($msg,"fgsuser");}else{echo  error($msg);}
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