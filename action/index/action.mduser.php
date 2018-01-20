<?php
if(!defined('CORE'))exit("error!"); 
//门店用户列表	
if($do=="md_user"){
	If_rabc(); //检测权限
	$type=$_REQUEST[type]??0;
	$sqlcount ="SELECT count(*) FROM rv_user where 1=1 and status!=2 and roleid in (3,5)";
	if($_POST['mdusername']){
		$search .= "and name like ? ";
		$arr[]="%".$_POST['mdusername']."%";
		}	
    if($_POST['mduser_name']){
		$search .= "and username like ? ";
		$arr[]="%".$_POST['mduser_name']."%";
		}	
	//设置分页
	if($_POST[numPerPage]==""){
		$numPerPage="20";
	}else{	
		$numPerPage=$_POST[numPerPage];
	}
	if($_POST[pageNum]==""||$_POST[pageNum]=="0" ){$pageNum="0";}else{$pageNum=($_POST[pageNum]-1)*$numPerPage;}
	$sql1=$sqlcount.$search;
	$db->p_e($sql1,$arr);
	$total=$db->fetch_count();//总条数
	
	//查询
	$sql2="SELECT * FROM rv_user where 1=1 and status!=2 and type=$type ".$search."and roleid in (3,5) order by id desc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();	
	foreach($list as &$k){
		$k['created_at']=date('Y-m-d H:i:s',$k['created_at1']);
		if($k['updated_at1']){
			$k['updated_at']=date('Y-m-d H:i:s',$k['updated_at1']);
		}
		$sql="select name from rv_mendian where 1=1 and id=?";
		$db->p_e($sql,array($k['zz']));
		$k['mdname']=$db->fetch_count();
	}
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('role',$role);
	$smt->assign('type',$type);
	$smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
	$smt->assign('pageNum',$_POST[pageNum]); //当前页数
	$smt->assign('title',"用户列表");
	$smt->display('md_user_list.htm');
	exit;
	
}

//所有用户列表
if($do=='dc_user'){
	If_rabc(); //检测权限
    $type=$_REQUEST[type]??0;
    $sqlcount ="SELECT count(*) FROM rv_user where 1=1 and status!=2";
    if($_POST['mdusername']){
        $search .= "and name like ? ";
        $arr[]="%".$_POST['mdusername']."%";
    }
    if($_POST['mduser_name']){
        $search .= "and username like ? ";
        $arr[]="%".$_POST['mduser_name']."%";
    }
    //设置分页
    if($_POST[numPerPage]==""){
        $numPerPage="20";
    }else{
        $numPerPage=$_POST[numPerPage];
    }
    if($_POST[pageNum]==""||$_POST[pageNum]=="0" ){$pageNum="0";}else{$pageNum=($_POST[pageNum]-1)*$numPerPage;}
    $sql1=$sqlcount.$search;
    $db->p_e($sql1,$arr);
    $total=$db->fetch_count();//总条数
    
    $sql="select u.*,m.name as mdname from rv_user as u left join rv_mendian as m on u.zz=m.id where u.id>200 and u.type=$type order by id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql, array());
    $list=$db->fetchAll();
    foreach($list as &$v){
    	$v['created_at']=date('Y-m-d H:i:s',$v['created_at1']);
		if($v['updated_at1']){
			$v['updated_at']=date('Y-m-d H:i:s',$v['updated_at1']);
		}
    }
    
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('type',$type);
    $smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
    $smt->assign('pageNum',$_POST[pageNum]); //当前页数
    $smt->display('all_user_list.htm');
    exit();
}

//导出所有用户
if($do=='daochu'){  
    $sql="select u.*,m.name as mdname from rv_user as u left join rv_mendian as m on u.zz=m.id where u.id>200 order by id desc";
    $db->p_e($sql, array());
    $list=$db->fetchAll();   
    foreach($list as &$k){
        if($k['sex']==1){
            $k['sex1']='男';
        }elseif($k['sex']==2){
            $k['sex1']='女';
        }else{
            $k['sex1']='保密';
        }
        if($k['roleid']==1){
            $k['roleid1']='总部人员';
        }elseif($k['roleid']==2){
            $k['roleid1']='经销商';
        }elseif($k['roleid']==3){
            $k['roleid1']='店长';
        }elseif($k['roleid']==4){
            $k['roleid1']='加盟商';
        }elseif($k['roleid']==5){
            $k['roleid1']='店员';
        }elseif($k['roleid']==6){
            $k['roleid1']='董事长';
        }elseif($k['roleid']==7){
            $k['roleid1']='总经理';
        }
    }
    
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='8'>所有注册用户信息表</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th width='50'>序号</th>";
    echo "<th width='80'>用户ID</th>";
    echo "<th width='100'>用户名</th>";
    echo "<th width='80'>姓名</th>";
    echo "<th width='80'>性别</th>";
    echo "<th width='80'>职位</th>";
    echo "<th width='120'>手机号</th>";
    echo "<th width='200'>所属门店</th>";  
    echo "</tr>";
    foreach($list as $k=>$v){
        echo "<tr>";       
        echo "<td width='50'>".($k+1)."</td>";
        echo "<td width='80'>".$v['id']."</td>";
        echo "<td width='80'>".$v['username']."</td>";
        echo "<td width='80'>".$v['name']."</td>";
        echo "<td width='80'>".$v['sex1']."</td>";
        echo "<td width='80'>".$v['roleid1']."</td>";
        echo "<td width='120'>".$v['mobile']."</td>";
        echo "<td width='200'>".$v['mdname']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    exit;   
}

//导出没有店长信息
if($do=='md_daochu'){
    $sql="select a.*,b.name as fgsname from rv_mendian as a left join rv_fengongsi as b on a.fid=b.id where a.person_id=0 and a.status=1";
    $db->p_e($sql, array());
    $list=$db->fetchAll();
    $result =   array();
    foreach($list as $k=>$v){
        $result[$v['fgsname']][]    =   $v;
    }
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='5'>没有店长门店信息表</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th width='50'>序号</th>";
    echo "<th width='80'>门店ID</th>";
    echo "<th width='200'>门店名</th>";
    echo "<th width='120'>电话</th>";
    echo "<th width='300'>地址</th>";
    echo "</tr>";
    foreach($result as $k=>$v){
        echo "<tr>";
        echo "<th colspan='5'>$k</th>";
        echo "</tr>";
        foreach ($v as $kk=>$vv){
        echo "<tr>";        
        echo "<td width='50'>".($kk+1)."</td>";
        echo "<td width='80'>".$vv['id']."</td>";
        echo "<td width='200'>".$vv['name']."</td>";
        echo "<td width='120'>".$vv['tel']."</td>";
        echo "<td width='300'>".$vv['address']."</td>";
        echo "</tr>";
        }
    }
    echo "</table>";
    exit;
}

//新建	
if($do=="new"){	
	If_rabc(); //检测权限
	$type=$_REQUEST[type];
	//角色数组
	$sql="SELECT id,title FROM rv_role where id in (5)";
	$db->query($sql);
	$list=$db->fetchAll();
	
	//格式化角色数据
	foreach($list as $key=>$val){
		$role_cn[$list[$key][id]]=$list[$key][title];		
	}
	
	$sql="select * from rv_mendian where 1=1 and status=1 and type=?";
	$db->p_e($sql,array($type));
	$md=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('select_role_cn',select($role_cn,"roleid","","选择角色","required"));
	$smt->assign('title',"新建用户");
	$smt->assign('md',$md);
	$smt->assign('type',$type);
	$smt->display('md_user_new.htm');
	exit;
}

//编辑	
if($do=="edit"){	
	If_rabc(); //检测权限
	$type=$_REQUEST['type'];
	//查询
	$sql="SELECT * FROM rv_user where id=? LIMIT 1";
	$db->p_e($sql,array($id));
	$row=$db->fetchRow();
	$row['created_at']=date('Y-m-d H:i:s',$row['created_at1']);
	$row['updated_at']=date('Y-m-d H:i:s',$row['updated_at1']);
	//角色数组
	$sql="SELECT id,title FROM rv_role where id in (5)";
	$db->query($sql);
	$list=$db->fetchAll();
	
	//格式化角色数据
	foreach($list as $key=>$val){
	    $role_cn[$list[$key][id]]=$list[$key][title];
	}
	//所属门店
	$sql="select * from rv_mendian where 1=1 and id=? and type=?";
	$db->p_e($sql,array($row['zz'],$type));
	$md=$db->fetchRow();
	
	$sql="select * from rv_mendian where 1=1 and status=1 and type=?";
	$db->p_e($sql,array($type));
	$md_list=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('select_role_cn',select($role_cn,"roleid",$row[roleid],"选择角色","required"));
	$smt->assign('list_role',$list_role);
	$smt->assign('row',$row);
	$smt->assign('role',$role);
	$smt->assign('md',$md);
	$smt->assign('type',$type);
	$smt->assign('md_list',$md_list);
	$smt->assign('title',"编辑用户");
	$smt->display('md_user_edit.htm');
	exit;
}

//写入
if($do=="add"){
	If_rabc(); //检测权限
	$type=$_REQUEST[type];
	$password=md5($_POST[password]);
	//查询
	$sql="SELECT * FROM rv_user where username =?  and type=? LIMIT 1";
	$arr=array($_POST[username],$type);
	$db->p_e($sql,$arr);
	if($db->fetchRow()){echo  error("错误!用户已存在!");exit();}
	//防止手机号重复 2017 04 14
	$sql2="SELECT * FROM rv_user where mobile =?  and type=? LIMIT 1";
	$arr2=array($_POST[mobile],$type);
	$db->p_e($sql2,$arr2);
	if($db->fetchRow()){echo  error("错误!手机号已存在!");exit();}
	if(is_uploaded_file($_FILES['head_img']['tmp_name'])){
	    if(!$img->check_img_type($_FILES['head_img']['type'])){
	        echo error("请上传正确的图片");
	        exit();
	    }
	    $head_img=$img->upload_image($_FILES['head_img']);
	    if(!$head_img){
	        echo  error("头像上传失败");
	        exit;
	    }   
	}
	
	$sql="insert into rv_user (username,password,zz,roleid,created_at,userid,name,mobile,head_img,type) VALUES (?,?,?,?,?,?,?,?,?,?)";
	$arr1=array($_POST[username],$password,$_POST['md'],$_POST[roleid],$time,$_SESSION['dys']['userid'],$_POST[name],$_POST[mobile],$head_img,$type);
	if($db->p_e($sql,$arr1)){
	    echo close("添加成功！","user");
	}else{
	    echo  error("添加失败");
	}
	
	/*$sql3="insert into yao_member set member_name = ".$_POST[mobile].",member_passwd = '".$password."',member_mobile = ".$_POST[mobile].",member_time = ".time().",member_login_time = ".time().",member_old_login_time = ".time();
	
	if($db->query($sql3)){
		echo  error("同步到独易网失败");
	}else{
		echo close("同步到独易网成功","user");
	};*/
}

//更新
if($do=="updata"){
	If_rabc(); //检测权限
	$id=$_POST['id'];
	$type=$_REQUEST[type];
	$head_img=$_REQUEST['head_img'];
	$zz=$_POST['zz']??0;
	if(!$head_img){//如果更新图片
	    $old_head_img=$_REQUEST['old_head_img'];
	    if($old_head_img){
	        unlink($img->root_path.$old_head_img);
	    }
	    if(is_uploaded_file($_FILES['head_img']['tmp_name'])){
            if(!$img->check_img_type($_FILES['head_img']['type'])){
                echo error("请上传正确的图片");
                exit();
            }
        	$head_img=$img->upload_image($_FILES['head_img']);
        	if(!$head_img){
        	    echo  error("头像上传失败");
        	    exit;
        	}
	    }
	}
	if($_POST[password]){
		$password=md5($_POST[password]);
		$pasql="password=?,";
		$arr=array($password,$_POST['username'],$_POST[mobile],$zz,$_POST['roleid'],$_SESSION['dys']['userid'],$_POST['name'],$head_img,$id);
	}else{
		$arr=array($_POST['username'],$_POST[mobile],$zz,$_POST['roleid'],$time,$_SESSION['dys']['userid'],$_POST['name'],$head_img,$id);
	}
	file_put_contents("e://error.txt",$zz);
	$sql="UPDATE rv_user SET ".$pasql." username=?,mobile=?,zz=?,roleid=?,updated_at=?,userid=?,name=?,head_img=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){
	    echo close($msg,"mduser");
	}else{echo  error($msg);}
	exit;
}


//删除
if($do=="del"){
	If_rabc(); //检测权限	
	$sql="select roleid,zz from rv_user where 1=1 and id=?";
	$db->p_e($sql, array($id));
	$user_roleid=$db->fetchRow();
	$sql="UPDATE rv_user set status=2,updated_at=now() where id=? limit 1";
	if($db->p_e($sql,array($id))){
	    if($user_roleid[roleid] ==3){//如果删除的用户是店长，则更新相应门店店长id
	       $sql="update rv_mendian set person_id=0 where id=?";
	       $db->p_e($sql, array($user_roleid[zz]));
	    }
	    echo success($msg);
	}else{echo  error($msg);}	
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