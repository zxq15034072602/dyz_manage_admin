<?php
//====================================================
//		FileName: func.class.php
//		Summary:  系统函数配置
//====================================================

if(!defined('CORE'))exit("error!"); 
//当前时区
date_default_timezone_set('asia/shanghai');

//初始化数据库连接
$db	= new pdo_mysql($Config);
$img= new dyz_image();
// /$file=new dyz_file();

//提示信息
$lang_cn =array(
	"rabc_error"=>"<script>alert(\"权限不足!\");window.location=\"index.php\";</script>",
	//	"rabc_error1"=>"exit;<script>alert(\"权限不足!\");window.location=\"index.php#".$actron."\";</script>",
	"rabc_is_login"=>"<script>window.location=\"index.php?action=user&do=login\";</script>",
	"rabc_login_ok"=>"<script>window.location=\"index.php\";</script>",
	"rabc_login_error"=>"<script>alert(\"用户密码错误!\");window.location=\"index.php?action=user&do=login\";</script>",
	"rabc_login_count"=>"<script>alert(\"帐户出现问,题请联系管理员!\");window.location=\"index.php?action=user&do=login\";</script>",
	"rabc_login_nouse"=>"<script>alert(\"该用户名已被禁用!\");window.location=\"index.php?action=user&do=login\";</script>",
	"rabc_logout"=>"<script>alert(\"安全退出!\");window.location=\"index.php?action=user&do=login\";</script>",
	"rabc_log_editpass"=>"<script>alert(\"密码修改成功!\");window.location=\"index.php?action=user&do=login\";</script>",
	"validate"=>"<script>alert(\"内容不全,返回填写!\");history.back(-1);</script>"
);


//安全验证
function smarty_cfg($self){
	global $dir;
	$self->setTemplateDir('./tpl/'.$dir.'/');
	$self->setCompileDir('./tmp/compile/'.$dir.'/');   
	$self->setCacheDir('./tmp/cache/'.$dir.'/');
}
//下拉菜单
function select($arr,$name,$self="",$cn_name="选择",$onchange,$class){
	$slt .= "<select name=\"".$name."\" class=\"input requiredcombox ".$class."\" title=\"此项目必填.\" onchange=\"".$onchange."\">";
	if($self==""){
		$slt .= "<option value=\"\" selected=\"selected\">".$cn_name."</option>";
	}else{
		$slt .= "<option value=\"\">".$cn_name."</option>";
	}
	foreach($arr as $key=>$val){
		if($key==$self){
			$slt .= "    <option value=\"".$key."\" selected=\"selected\">".$val."</option>";
		}else{
			$slt .= "    <option value=\"".$key."\">".$val."</option>";
		}
	}
    $slt .= "</select>";
	return $slt;
}

//dwz_ajax_succee
function success($msg){
	$msg = $msg ? $msg : "操作成功!";
	$json = "{\"statusCode\":\"200\",\"message\":\"".$msg."\",\"navTabId\":\"\",\"callbackType\":\"forward\"}";
	return $json;
}

//dwz_ajax_error
function error($msg){
	$msg = $msg ? $msg : "操作错误!";
	$json = "{\"statusCode\":\"300\",\"message\":\"".$msg."\",\"navTabId\":\"\",\"callbackType\":\"forward\"}";
	return $json;
}

function close($msg,$rel,$forwardUrl){
	$msg = $msg ? $msg : "操作成功!";
	//$rel = $rel ? $rel : "record";
	$json = "{\"statusCode\":\"200\",\"message\":\"".$msg."\",\"navTabId\":\"".$rel."\",\"callbackType\":\"closeCurrent\",\"rel\":\"\",\"forwardUrl\":\"".$forwardUrl."\"}";
	return $json;
}
//回掉方法
function forwardUrl($msg,$forwardUrl){
	$msg = $msg ? $msg : "操作成功!";
	$json = "{\"statusCode\":\"200\",\"message\":\"".$msg."\",\"navTabId\":\"\",\"callbackType\":\"forward\",	\"forwardUrl\":\"".$forwardUrl."\"}";
	return $json;
}

//权限
function error_aquanx($msg){
	$msg = $msg ? $msg : "没有权限!";
	$json = "{\"statusCode\":\"300\",\"message\":\"".$msg."\",\"navTabId\":\"\",\"callbackType\":\"closeCurrent\",\"rel\":\"\"}";
	return $json;
}
//	发送消息
function xiaoxi($uid=0,$xxid=0,$neirong,$type){
	global $db;
	$arr=array($uid,$xxid,$neirong,$type,1,0);
	$sql="insert into fth_xiaoxi (uid,upid,neirong_type,type,status,is_du) values(?,?,?,?,?,?)";
	$db->p_e($sql,$arr);
}
//  推送消息
function to_msg($post_data){
	$ch = curl_init('http://127.0.0.1:4002');
	curl_setopt_array($ch, array(
		CURLOPT_POST => TRUE,
		CURLOPT_HEADER=> 0,
		CURLOPT_SSL_VERIFYPEER=>FALSE,
		CURLOPT_SSL_VERIFYHOST=>FALSE,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
		CURLOPT_POSTFIELDS => http_build_query($post_data)
	));
	$aa=curl_exec($ch);
	curl_close($ch);
	return $aa=='ok'?true:false;	
}
//权限页面
$action_cn=array(
	'index'=>array(
		"index_user_"=>"用户列表",
		"index_user_new"=>"新建用户",
		"index_user_add"=>"写入用户",
		"index_user_edit"=>"编辑用户",
		"index_user_editpass"=>"修改密码",
		"index_user_updata"=>"更新用户",
		"index_user_updatapass"=>"更新密码",
		"index_user_del"=>"删除用户",
		"index_user_qy"=>"帐户启用",
		"index_user_jy"=>"帐户禁用",
		"index_role_"=>"角色列表",
		"index_role_new"=>"新建角色",
		"index_role_add"=>"写入角色",
		"index_role_edit"=>"编辑角色",
		"index_role_updata"=>"更新角色",
		"index_role_del"=>"删除角色",
		"index_log_"=>"操作日志"
	),
    'feedback'=>array(
        "admin_feedback_list" =>"app用户反馈列表",
    ),
	'zongbu'=>array(
		"admin_zongbu_"=>"总部部门列表",
		"admin_zongbu_new"=>"新建总部部门",
		"admin_zongbu_add"=>"写入总部部门",
		"admin_zongbu_edit"=>"编辑总部部门",
		"admin_zongbu_updata"=>"修改总部部门",
		"admin_zongbu_del"=>"删除总部部门"
	),
	
	'fgsuser'=>array(
		"index_fgsuser_fgs_user"=>"用户列表",
		"index_fgsuser_new"=>"新建用户",
		"index_fgsuser_add"=>"写入用户",
		"index_fgsuser_edit"=>"编辑用户",
		"index_fgsuser_updata"=>"更新用户",
		"index_fgsuser_del"=>"删除用户",
		"index_fgsuser_qy"=>"帐户启用",
		"index_fgsuser_jy"=>"帐户禁用"
	),
	
	'mduser'=>array(
		"index_mduser_md_user"=>"用户列表",
		"index_mduser_new"=>"新建用户",
		"index_mduser_add"=>"写入用户",
		"index_mduser_edit"=>"编辑用户",
		"index_mduser_updata"=>"更新用户",
		"index_mduser_del"=>"删除用户",
		"index_mduser_qy"=>"帐户启用",
		"index_mduser_jy"=>"帐户禁用"
	),
	
	'fgs'=>array(
		"admin_fgs_"=>"分公司列表",
		"admin_fgs_new"=>"新建分公司",
		"admin_fgs_add"=>"写入分公司",
		"admin_fgs_edit"=>"编辑分公司",
		"admin_fgs_updata"=>"修改分公司",
		"admin_fgs_del"=>"删除分公司",
		"admin_fgs_qy"=>"分公司启用",
		"admin_fgs_jy"=>"分公司禁用"
	),
	
	'md'=>array(
		"admin_md_"=>"门店列表",
		"admin_md_new"=>"新建门店",
		"admin_md_add"=>"写入门店",
		"admin_md_edit"=>"编辑门店",
		"admin_md_updata"=>"修改门店",
		"admin_md_del"=>"删除门店",
		"admin_md_qy"=>"门店启用",
		"admin_md_jy"=>"门店禁用"
	),
	
	'goods'=>array(
		"admin_goods_"=>"商品列表",
		"admin_goods_new"=>"新建商品",
		"admin_goods_new_kucun"=>"新建商品库存",
		"admin_goods_add"=>"写入商品",
		"admin_goods_add_kucun"=>"写入商品库存",
		"admin_goods_edit"=>"编辑商品",
		"admin_goods_edit1"=>"编辑商品信息",
		"admin_goods_edit_kucun"=>"编辑商品库存",
		"admin_goods_updata_kucun"=>"修改商品库存",
		"admin_goods_updata1"=>"编辑商品信息"
	),
	
	'url'=>array(
		"admin_pp_"=>"url列表",
		"admin_pp_edit"=>"编辑url",
		"admin_pp_updata"=>"修改url"
	),
	
	'xslr'=>array(
		"admin_xslr_"=>"销售录入列表",
		"admin_xslr_daochu"=>"销售录入导出"
	),
	
	'gg'=>array(
		"admin_gg_"=>"公告列表",
		"admin_gg_new"=>"新建公告",
		"admin_gg_add"=>"写入公告",
		"admin_gg_edit"=>"编辑公告",
		"admin_gg_updata"=>"修改公告",
		"admin_gg_del"=>"删除公告",
		"admin_gg_qy"=>"公告启用",
		"admin_gg_jy"=>"公告禁用"
	),
    'app' =>array(
        "sales_entry" =>"销售录入",
        "sales_record"=>"销售记录",
        "my_review"=>"我的审核",
        "people_manage"=>"人员管理",
        "view_inventory" =>"查看库存"
    ),
    "verify" =>array(
        "admin_verify_store_list"=>"店长申请审核",
    ),
    
);
	foreach(Array('_GET','_POST','_COOKIE') as $_request){
		foreach($$_request as $_k => $_v){
			if(!is_array($_v)){
				$$_request[$_k] = htmlspecialchars(trim($_v));
			}
		} 
	}
	@error_log(date("[Y-m-d H:i:s]")." -[uid:".$_SESSION['userid']."] -[URL:".$_SERVER['REQUEST_URI']."] -[POST:".json_encode($_POST,JSON_UNESCAPED_UNICODE)."]\n", 3, "D:/log/fth/".date("[Y-m-d]").".log");
	function send_sms1($tel,$sms,$smstpl){
		$pub_arr = array(
			'app_key' => '23274158',
			'format' => 'json',
			'method' => 'alibaba.aliqin.fc.sms.num.send',
			'rec_num' => $tel,
			'sign_method'=>'md5',
			'simplify' => 'true',			
			'sms_free_sign_name' => '房团惠',
			'sms_param' => $sms,
			'sms_template_code' => $smstpl,
			'sms_type' => 'normal',
			'timestamp' => date('Y-m-d H:i:s'),	
			'v' => '2.0'
		);
		
		ksort($pub_arr);
		$appSecret = '7f301f4577c08a9ffaf0563b7aeb32ff';
		$arrstr=''; 
		foreach ($pub_arr as $key => $val) {
			$arrstr .= $key.$val;
		}
		$sign = strtoupper(md5($appSecret.$arrstr.$appSecret)); 
		$strParam = http_build_query($pub_arr);
		$strParam .= '&sign='.$sign;
		$ch = curl_init();
		$url = 'http://gw.api.taobao.com/router/rest?'.$strParam;
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_IPRESOLVE , CURL_IPRESOLVE_V4);	
		curl_setopt($ch , CURLOPT_URL , $url);
		$res = json_decode(curl_exec($ch),true);
		if(!empty($res['result'])){
			if($res['result']['err_code'] == 0 && $res['result']['success'] == true){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}	
	}
//获取省份
function get_province(){
    global $db;
    return $db->select(0, 0, "rv_province","*","","id asc");
}

//获取案例一级分类
function get_case_class(){
    global $db;
    return $db->select(0,0,"rv_case_class","*","","id asc");
}