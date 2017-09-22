<?php
if(!defined('CORE'))exit("error!"); 

//首页	
if($do==""){

	$win=array("xitong"=>PHP_OS,"yuming"=>$_SERVER['SERVER_NAME'],"PHP"=>PHP_VERSION,"mysql"=>0,"yinqing"=>$_SERVER['SERVER_SOFTWARE'],"duankou"=>$_SERVER['SERVER_PORT'],"time"=>date('Y-m-d h:i:s',time()));
	$ipInfos = GetIpLookup($_SERVER["REMOTE_ADDR"]);
	if(!isLogin()){exit($lang_cn['rabc_is_login']);} //判断是否登录
	$sql="select * from rv_user where 1=1 and id=?";
	$db->p_e($sql,array($_SESSION['dys']['userid']));
	$user=$db->fetchRow();
	
	$sql="select action from rv_role where 1=1 and id=?";
	$db->p_e($sql,array($user['roleid']));
	$role=$db->fetchRow();
	$role1=explode(',',$role['action']);
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign("ip",$ipInfos);
	$smt->assign("win",$win);
	$smt->assign("role1",$role1);
	$smt->display('index.htm');
	exit;
}
?>
