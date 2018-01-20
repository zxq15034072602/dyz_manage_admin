<?php
if(!defined('CORE'))exit("error!"); 
$time=time();
//验证登录
if($do=="loginok"){
	$name=$_POST[username];
	$pwd=$_POST[password];
	$arr=array($name,md5($pwd));
	$sql = "SELECT id,username,roleid from rv_user WHERE username = ? AND password = ? AND status=1 limit 1";
	$db->p_e($sql,$arr);
	if ($db->rowCount()==1){	//登录成功
		$record = $db->fetchRow();
		$_SESSION['dys']['isLogin'] 	= true;
		$_SESSION['dys']['userid']		= $record['id'];
		$_SESSION['dys']['username']	= $record['username'];
		$_SESSION['dys']['roleid']	= $record['roleid'];

		exit($lang_cn['rabc_login_ok']);
	}elseif($db->rowCount()>1){
		exit($lang_cn['rabc_login_count']);
	}else{
		exit($lang_cn['rabc_login_error']);
	}	
	exit;
}

//登录	
if($do=="login"){
	$smt = new smarty();smarty_cfg($smt);
	//$smt->assign('web_name',$web_name);
	$smt->assign('title',"登录");
	$smt->display('user_login.htm');
	exit;
}
//退出	
if($do=="logout"){
	$_SESSION = array();
	session_destroy();
	exit($lang_cn['rabc_logout']);
}
//列表	
if($do==""){
	If_rabc(); //检测权限
	$sqlcount ="SELECT count(*) FROM rv_user where 1=1 and status!=2 and roleid=1";
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
	$sql2="SELECT * FROM rv_user where 1=1 and status!=2 ".$search." and roleid=1 order by id desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();	
	foreach($list as &$k){
		$k['created_at']=date('Y-m-d H:i:s',$k['created_at1']);
		if($k['updated_at']){
			$k['updated_at']=date('Y-m-d H:i:s',$k['updated_at1']);
		}
		$sql="select * from rv_zongbu where 1=1 and id=?";
		$db->p_e($sql,array($k['zz']));
		$k['zb']=$db->fetchRow();
	}
		
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('role',$role);
	$smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
	$smt->assign('pageNum',$_POST[pageNum]); //当前页数
	$smt->assign('title',"用户列表");
	$smt->display('user_list.htm');
	exit;
	
}

//新建	
if($do=="new"){	
	If_rabc(); //检测权限
	
	//角色数组
	$sql="SELECT id,title FROM rv_role where id in(1,6,7)";
	$db->query($sql);
	$list=$db->fetchAll();
	
	//格式化角色数据
	foreach($list as $key=>$val){
		$role_cn[$list[$key][id]]=$list[$key][title];		
	}
	$sql="select * from rv_zongbu where 1=1";
	$db->p_e($sql,array());
	$zb=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('select_role_cn',select($role_cn,"roleid","","选择角色","required"));
	$smt->assign('title',"新建用户");
	$smt->assign('zb',$zb);
	$smt->display('user_new.htm');
	exit;
}

//编辑	
if($do=="edit"){	
	If_rabc(); //检测权限
	//查询
	$sql="SELECT * FROM rv_user where id=? LIMIT 1";
	$db->p_e($sql,array($id));
	$row=$db->fetchRow();
	$row['updated_at']=date('Y-m-d H:i:s',$row['updated_at1']);
	$row['created_at']=date('Y-m-d H:i:s',$row['created_at1']);
	
	$sql="select * from rv_zongbu where 1=1 and id=?";
	$db->p_e($sql,array($row['zongbu']));
	$zb=$db->fetchRow();
	//角色数组
	$sql_role="SELECT id,title FROM rv_role";
	$db->query($sql_role);
	$list_role=$db->fetchAll();

	$sql="select * from rv_zongbu where 1=1";
	$db->p_e($sql,array());
	$zb_list=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('list_role',$list_role);
	$smt->assign('row',$row);
	$smt->assign('zb',$zb);
	$smt->assign('zb_list',$zb_list);
	$smt->assign('title',"编辑用户");
	$smt->display('user_edit.htm');
	exit;
}


//修改密码	
if($do=="editpass"){	
	If_rabc(); //检测权限
	$smt = new smarty();smarty_cfg($smt);
	//查询
	$sql="SELECT * FROM rv_user where id=? LIMIT 1";
	$db->p_e($sql,array($id));
	$row=$db->fetchRow();
	//模版
	$smt->assign('row',$row);
	$smt->assign('title',"修改密码");
	$smt->display('user_edit_pass.htm');
	exit;
}

//写入
if($do=="add"){
	If_rabc(); //检测权限
	$password=md5($_POST[password]);
	//查询
	$sql="SELECT * FROM rv_user where username =? LIMIT 1";
	$arr=array($_POST[username]);
	$db->p_e($sql,$arr);
	if($db->fetchRow()){echo  error("错误!用户已存在!");exit();}
	//防止手机号重复 2017 04 14
	$sql2="SELECT * FROM rv_user where mobile =? LIMIT 1";
	$arr2=array($_POST[mobile]);
	$db->p_e($sql2,$arr2);
	if($db->fetchRow()){echo  error("错误!手机号已存在!");exit();}
	
	$sql4="insert into rv_user (username,password,zz,roleid,created_at,userid,name,mobile) VALUES (?,?,?,?,?,?,?,?)";
	$arr1=array($_POST[username],$password,$_POST['zz'],$_POST[roleid],$time,$_SESSION['dys']['userid'],$_POST[name],$_POST[mobile]);
	$db->p_e($sql4,$arr1);
	//exit;
	//增加用户时添加到独易网商城 20170417
	$sql3="insert into yao_member set member_name = ".$_POST[mobile].",member_passwd = '".$password."',member_mobile = ".$_POST[mobile].",member_time = ".time().",member_login_time = ".time().",member_old_login_time = ".time();
	
	if($db->query($sql3)){
		echo  error("同步到独易网失败");
	}else{
		echo close("同步到独易网成功","user");
	};
	
	
}

//更新密码
if($do=="updatapass"){
	If_rabc(); //检测权限
	$updated_at=date("Y-m-d H:i:s", time());
	$id=$_SESSION['dys']['userid'];
	if($_POST[password]){
		$password=md5($_POST[password]);
		$pasql="password=?,";
		$arr=array($password,$updated_at,$_SESSION['dys']['userid'],$id);
	}else{
		$arr=array($updated_at,$_SESSION['dys']['userid'],$id);
	}
	$sql="UPDATE rv_user SET ".$pasql." updated_at=".$time.",userid=? WHERE id =? LIMIT 1";
	if($db->p_e($sql,$arr)){echo forwardUrl("操作成功!","?action=user&do=logout");}else{echo  forwardUrl("操作失败!","?action=user&do=logout");}	
	exit;
}

//更新
if($do=="updata"){
	If_rabc(); //检测权限
	$id=$_POST['id'];
	if($_POST[password]){
		$password=md5($_POST[password]);
		$pasql="password=?,";
		$arr=array($password,$_POST['username'],$_POST['mobile'],$_POST['roleid'],$_POST['zz'],$_SESSION['dys']['userid'],$_POST['name'],$id);
	}else{
		$arr=array($_POST['username'],$_POST['mobile'],$_POST['roleid'],$_POST['zz'],$_SESSION['dys']['userid'],$_POST['name'],$id);
	}
	$sql="UPDATE rv_user SET ".$pasql." username=?,mobile=?,roleid=?,zz=?,updated_at=".$time.",userid=?,name=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){echo close($msg,"user");}else{echo  error($msg);}
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
	$sql="UPDATE rv_user set status=0,updated_at=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
//禁用
if($do=="jy"){
	If_rabc(); //检测权限	
	$sql="UPDATE rv_user set status=1,updated_at=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
//分公司列表	
if($do=="cha_list"){
	$smt = new smarty();smarty_cfg($smt);
	if($_POST['roleid']==1){
		//查询
		$sql="SELECT * FROM rv_zongbu where 1=1";
		$db->p_e($sql,array());
		$zb=$db->fetchAll();
		//模版
		$smt->assign('zb',$zb);
		$smt->display('zb.htm');
		exit;
	}elseif($_POST['roleid']==2 || $_POST['roleid']==4){
		//查询
		$sql="SELECT * FROM rv_fengongsi where 1=1 and status=1";
		$db->p_e($sql,array());
		$fgs=$db->fetchAll();
		//模版
		$smt->assign('fgs',$fgs);
		$smt->display('fgs.htm');
		exit;
	}elseif($_POST['roleid']==3 || $_POST['roleid']==5){
		//查询
		$sql="SELECT * FROM rv_mendian where 1=1 and status=1";
		$db->p_e($sql,array());
		$md=$db->fetchAll();
		//模版
		$smt->assign('md',$md);
		$smt->display('md.htm');
		exit;
	}	
}
?>