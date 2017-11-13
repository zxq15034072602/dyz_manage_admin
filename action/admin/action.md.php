<?php
if(!defined('CORE'))exit("error!"); 
//列表	

if($do==""){
	If_rabc(); //检测权限
	$type=$_REQUEST[type]??0;
	$search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_mendian where 1=1 and status!=2  and type=$type";
	if($_POST['name']){
		$search .= " and name like ? ";
		$arr[]="%".$_POST['name']."%";
	}	
	if($_REQUEST[selCities]){
	    $search.=" and cityid=? ";
	    $arr[]=$_REQUEST[selCities];
	}
	if($_REQUEST[selarea]){
	    $search.=" and areaid=? ";
	    $arr[]=$_REQUEST[selarea];
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
	$sql2="SELECT * FROM rv_mendian where 1=1 and status!=2 and type=$type ".$search."order by id desc LIMIT ".$pageNum.",".$numPerPage;
	
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	foreach($list as &$k){
		$sql="select name from rv_fengongsi where 1=1 and id=?";
		$db->p_e($sql,array($k['fid']));
		$k['fgs']=$db->fetch_count();
		
		$sql="select name from rv_user where 1=1 and id=?";
		$db->p_e($sql,array($k['person_id']));
		$k['person']=$db->fetch_count();
	}
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$provinces=get_province();
	$smt->assign("provinces",$provinces);//获取省份
	$smt->assign('type',$type);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('md_list.htm');
	exit;
	
}

//新建	
if($do=="new"){	
	If_rabc(); //检测权限
	$type=$_REQUEST['type'];
	$sql="select * from rv_fengongsi where 1=1 and status=1";
	$db->p_e($sql,array());
	$fgs=$db->fetchAll();
	$sql="select * from rv_user where 1=1 and roleid in (5) and status=1 and name!='' and type=? ";
	$db->p_e($sql, array($type));
	$store_user=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('fgs',$fgs);
	$smt->assign('store_user',$store_user);
	$provinces=get_province();
	$smt->assign("provinces",$provinces);//获取省份
	$smt->assign("type",$type);
	$smt->display('md_new.htm');
	exit;
}

//编辑	
if($do=="edit"){	
	If_rabc(); //检测权限
	$type=$_REQUEST[type];
	//查询
	$sql="SELECT *,a.id as id,a.name as name,a.tel as tel,b.name as fgsname,a.provinceid,a.cityid,a.areaid,a.address,a.introduction,a.img_names,a.person FROM rv_mendian as a left join rv_fengongsi as b on a.fid=b.id where a.id=? LIMIT 1";
	$db->p_e($sql,array($id));
	$row=$db->fetchRow();
	$sql="select * from rv_fengongsi where 1=1 and status=1";
	$db->p_e($sql,array());
	$fgs=$db->fetchAll();
	$sql="select * from rv_user where 1=1 and status=1 and id=?";
	$db->p_e($sql,array($row['person_id']));
	$bef_person=$db->fetchRow();
	if($row['img_names']){
	   $img_names=explode(",", $row['img_names']);//获取图片数组
	}
	$sql="select * from rv_user where 1=1 and roleid in (5) and status=1 and name!='' and type=? ";
	$db->p_e($sql, array($type));
	$store_user=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('row',$row);
	$smt->assign('fgs',$fgs);
	$smt->assign("img_names",$img_names);
	$smt->assign('store_user',$store_user);
	$smt->assign('bef_person',$bef_person);
	$smt->assign("str_img_names",$row['img_names']);
	$smt->assign("type",$type);
	$provinces=get_province();
	$smt->assign("provinces",$provinces);//获取省份
	$smt->display('md_edit.htm');
	exit;
}

//写入
if($do=="add"){
	If_rabc(); //检测权限
	$type=$_REQUEST[type];
	//查询
	$sql="SELECT * FROM rv_mendian where name =? and type=? LIMIT 1";
	$arr=array($_POST['name'],$type);
	$db->p_e($sql,$arr);
	if($db->fetchRow()){echo  error("错误!门店已存在!");exit();}
    $img_names=array();
	foreach($_FILES['mendian_img']['tmp_name'] as $k=>$v){
	    if(is_uploaded_file($_FILES['mendian_img']['tmp_name'][$k])){
    	    $save=$img->root_path.$img->images_dir."/".$img->random_filename().$img->get_filetype($_FILES['mendian_img']['name'][$k]);
        	    if(!$img->check_img_type($_FILES['mendian_img']['type'][$k])){
        	        echo error("请上传正确的图片");
        	        exit();
        	    }
        	    if(move_uploaded_file($_FILES['mendian_img']['tmp_name'][$k],$save)){
        	        $img_names[]=str_replace($img->root_path.$img->images_dir."/", '', $save);
        	    }else{
        	        echo error("上传图片失败");
        	        exit();
        	    }
	    }
	}
	

	$imgs=implode(",", $img_names);
	$iuid=$_SESSION['dys'][userid];
	$insert_id=$db->insert(0, 2, "rv_mendian",array("fid=$_POST[fid]","name='$_POST[name]'","uid=$iuid","tel=$_POST[tel]","provinceid=$_REQUEST[province]","cityid=$_REQUEST[selCities]","areaid=$_REQUEST[selarea]","address='$_REQUEST[address]'","introduction='$_REQUEST[introduction]'","img_names='$imgs'","person_id=$_REQUEST[person_id]","type=$type"));
	if($insert_id){
	    $sql="update rv_user set zz=?,roleid=3 where 1=1 and id=?";//添加门店后将用户所属门店以及身份更新为店长身份
	    $db->p_e($sql, array($insert_id,$_REQUEST[person_id]));
	    echo close($msg,"md_list");
	}else{echo  error($msg);}
	exit;
}

//更新
if($do=="updata"){
	If_rabc(); //检测权限
	$type=$_REQUEST[type];
	$id=$_REQUEST['id'];
	$img_names=$_REQUEST['img_names'];
	if(!$img_names){//如果更改了图片
	    $old_img_names=$_REQUEST['old_img_names'];
	    $old_img_names=explode(",", $old_img_names);
	    foreach ($old_img_names as $v){
	        unlink($img->root_path.$img->images_dir."/".$v);
	    }
    	$img_names=array();
	    foreach($_FILES['mendian_img']['tmp_name'] as $k=>$v){
	        if(is_uploaded_file($_FILES['mendian_img']['tmp_name'][$k])){
    	        $save=$img->root_path.$img->images_dir."/".$img->random_filename().$img->get_filetype($_FILES['mendian_img']['name'][$k]);
    	        if(!$img->check_img_type($_FILES['mendian_img']['type'][$k])){
    	            echo error("请上传正确的图片");
    	            exit();
    	        }
    	        if(move_uploaded_file($_FILES['mendian_img']['tmp_name'][$k],$save)){
    	            $img_names[]=str_replace($img->root_path.$img->images_dir."/", '', $save);
    	        }else{
    	            echo error("上传图片失败");
    	            exit();
    	        }
	        }
	    }
	   
	}
	if(empty($_REQUEST['person_id'])){
	    $_REQUEST['person_id']=$_REQUEST['bef_person'];  
	}
	$arr=array($_POST['fid'],$_POST['name'],$_SESSION['dys']['userid'],$_POST['tel'],$_REQUEST['province'],$_REQUEST['selCities'],$_REQUEST['selarea'],$_REQUEST['address'],$_REQUEST['introduction'],implode(',',$img_names),$_REQUEST['person_id'],$type,$id);
	$sql="UPDATE rv_mendian SET fid=?,name=?,upuid=?,tel=?,provinceid=?,cityid=?,areaid=?,address=?,introduction=?,img_names=?,person_id=?,type=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){
	    $sql="update rv_user set roleid=5 where 1=1 and id=?";
	    $db->p_e($sql, array($_REQUEST['old_person']));
	    $sql="update rv_user set zz=?,roleid=3 where 1=1 and id=?";
	    $db->p_e($sql, array($id,$_REQUEST['person_id']));
	    echo close($msg,"md_list");
	}else{echo  error($msg);}
	exit;
}

//导出有销售录入的门店
if($do=='md_daochu'){
    $sql="select b.* from rv_buy as a left join rv_mendian as b on a.mid=b.id where b.status=1 GROUP BY b.id";
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
//导出没有销售录入的门店
if($do=='md_daochu1'){
    $sql="select * from rv_mendian where status=1 and type=0";
    $db->p_e($sql, array());
    $md=$db->fetchAll();
    
    $sql="select b.* from rv_buy as a left join rv_mendian as b on a.mid=b.id where b.status=1 GROUP BY b.id";
    $db->p_e($sql, array());
    $list=$db->fetchAll();
    
    foreach($md as $k=>$v){
        if(!in_array($v, $list)){
            $row[]=$v;
        }
    }
    $result =   array();
    foreach($row as $k=>$v){
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



//删除
if($do=="del"){
	If_rabc(); //检测权限	
	$sql="UPDATE rv_mendian set status=2 where id=? limit 1";
	if($db->p_e($sql,array($id))){
	    $sql="select img_names,person_id from rv_mendian where id=? limit 1";
	    $db->p_e($sql,array($id));
	    $row=$db->fetchRow();
	    $old_img_names=explode(",", $row['img_names']);
	    foreach ($old_img_names as $v){
	        unlink($img->root_path.$img->images_dir."/".$v);
	    }
	    $sql="update rv_user set zz=0,roleid=5 where 1=1 and id=?";
	    $db->p_e($sql, array($row[person_id]));
	    echo success($msg);
	}else{echo  error($msg);}	
	exit;
}
//启用
if($do=="qy"){
	If_rabc(); //检测权限
	$sql="UPDATE rv_mendian set status=1 where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
//禁用
if($do=="jy"){
	If_rabc(); //检测权限	
	$sql="UPDATE rv_mendian set status=0 where id=? limit 1";
	if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}	
	exit;
}
?>