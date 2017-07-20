<?php
if(!defined('CORE'))exit("error!"); 
//列表	

if($do==""){
	If_rabc(); //检测权限
	$search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_goods where 1=1 ";
	if($_POST['name']){
		$search .= "and name like ? ";
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
	$sql1=$sqlcount.$search;
	$db->p_e($sql1,$arr);
	$total=$db->fetch_count();//总条数
	
	//查询
	$sql2="SELECT * FROM rv_goods where 1=1 ".$search." order by id asc LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	foreach($list as &$k){
		$sql="select name from rv_type where 1=1 and id=?";
		$db->p_e($sql,array($k['fatherid']));
		$k['pp']=$db->fetch_count();
	}
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('name',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('goods_list.htm');
	exit;
	
}

//新建	
if($do=="new"){	
	If_rabc(); //检测权限
	$sql="select * from rv_type";
	$db->p_e($sql,array());
	$pp=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('pp',$pp);
	$smt->display('goods_new.htm');
	exit;
}
//新建库存
if($do=="new_kucun"){	
	If_rabc(); //检测权限
	$sql="select * from rv_goods where 1=1 and id=?";
	$db->p_e($sql,array($_GET['id']));
	$goods=$db->fetchRow();
    $sql="select type from rv_type where id=?";
    $db->p_e($sql,array($goods[fatherid]));
    $type=$db->fetch_count()??0;
	$sql="select * from rv_mendian where 1=1 and status in(0,1) and type=?";
	$db->p_e($sql,array($type));
	$md=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('kucun',$kucun);
	$smt->assign('md',$md);
	$smt->assign('goods',$goods);
	$smt->assign('gid',$_GET['id']);
	$smt->display('goods_new_kucun.htm');
	exit;
}

//编辑	
if($do=="edit"){	
	If_rabc(); //检测权限
	//查询
	$sql="SELECT *,b.name as mdname,a.id as kid from rv_kucun as a left join rv_mendian as b on a.mid=b.id where 1=1 and a.gid=? and b.status=1";
	$db->p_e($sql,array($id));
	$list=$db->fetchAll();
	//商品
	$sql="select a.id,a.name,a.money,b.name as pp from rv_goods as a left join rv_type as b on a.fatherid=b.id where 1=1 and a.id=?";
	$db->p_e($sql,array($id));
	$goods=$db->fetchRow();
	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('list',$list);
	$smt->assign('goods',$goods);
	$smt->assign('gid',$id);
	$smt->display('goods_edit.htm');
	exit;
}

//编辑库存
if($do=="edit_kucun"){	
	If_rabc(); //检测权限
	//查询
	$sql="SELECT * from rv_kucun where 1=1 and id=?";
	$db->p_e($sql,array($id));
	$kucun=$db->fetchRow();
	//门店
	$sql="select * from rv_mendian where 1=1 and id=?";
	$db->p_e($sql,array($kucun['mid']));
	$md=$db->fetchRow();
	$sql="select * from rv_goods where 1=1 and id=?";
	$db->p_e($sql,array($kucun['gid']));
	$goods=$db->fetchRow();
	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('kucun',$kucun);
	$smt->assign('md',$md);
	$smt->assign('goods',$goods);
	$smt->display('goods_edit_kucun.htm');
	exit;
}

//编辑商品信息	
if($do=="edit1"){	
	If_rabc(); //检测权限
	//查询
	$sql="SELECT a.id,a.name,a.money,a.dw,a.fatherid,b.id as ppid,a.is_recommend,a.good_img,a.description,a.good_url,b.name as ppname from rv_goods as a left join rv_type as b on a.fatherid=b.id where 1=1 and a.id=?";
	$db->p_e($sql,array($id));
	$row=$db->fetchRow();
	$sql="select * from rv_type where 1=1";
	$db->p_e($sql,array());
	$pp=$db->fetchAll();
	$smt = new smarty();smarty_cfg($smt);	
	//模版
	$smt->assign('list',$list);
	$smt->assign('row',$row);
	$smt->assign('pp',$pp);
	$smt->assign('id',$id);
	$smt->display('goods_edit1.htm');
	exit;
}
//写入
if($do=="add"){
	If_rabc(); //检测权限
	//查询
	$sql="SELECT * FROM rv_goods where name =? LIMIT 1";
	$arr=array($_POST['name']);
	$db->p_e($sql,$arr);
	if($db->fetchRow()){echo  error("错误!商品已存在!");exit();}
	if(is_uploaded_file($_FILES["good_img"]['tmp_name'])){
	    if(!$img->check_img_type($_FILES['good_img']['type'])){
	        echo error("请上传正确的图片");
	        exit();
	    }
	    $good_img=$img->upload_image($_FILES['good_img']);
	    if(!$good_img){
	        echo error("上传失败");
	        exit();
	    }
	}
	$sql="insert into rv_goods (name,fatherid,money,dw,is_recommend,good_url,good_img,description) VALUES (?,?,?,?,?,?,?,?)";
	$arr1=array($_POST['name'],$_POST['pp'],$_POST['money'],$_POST['dw'],$_REQUEST['is_recommend'],$_REQUEST['good_url'],$good_img,$_REQUEST['description']);
	if($db->p_e($sql,$arr1)){echo close($msg,"goods_list");}else{echo  error($msg);}
	exit;
}
//写入库存
if($do=="add_kucun"){
	If_rabc(); //检测权限
	//查询
	$sql="SELECT * FROM rv_kucun where gid =? and mid=? LIMIT 1";
	$arr=array($_GET['id'],$_POST['md']);
	$db->p_e($sql,$arr);
	if($db->fetchRow()){echo  error("错误!该门店商品已上架!");exit();}
	$sql="insert into rv_kucun (mid,gid,kucun) VALUES (?,?,?)";
	$arr1=array($_POST['md'],$_GET['id'],$_POST['kucun']);
	if($db->p_e($sql,$arr1)){echo close($msg,"goods_list");}else{echo  error($msg);}
	exit;
}
//更新库存
if($do=="updata_kucun"){
	If_rabc(); //检测权限
	$id=$_POST['id'];
	$arr=array($_POST['kucun'],$_GET['id']);
	$sql="UPDATE rv_kucun SET kucun=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){echo close($msg,"goods_list");}else{echo  error($msg);}
	exit;
}
//更新商品信息
if($do=="updata1"){
	If_rabc(); //检测权限
	$id=$_POST['id'];
	$good_img=$_REQUEST['good_img'];
	if(!$good_img){//修改图片
	    $old_good_img=$_REQUEST['old_good_img'];//获取旧的图片
	    if($old_good_img){
	        unlink($img->root_path.$old_good_img);//删除旧图片
	    }
	    if(is_uploaded_file($_FILES['good_img']['tmp_name'])){//判断是否上传
	        if(!$img->check_img_type($_FILES['good_img']['type'])){
	            echo error("请上传正确的图片");
	            exit();
	        }
	        $good_img=$img->upload_image($_FILES['good_img']);
	        if(!$good_img){
	            echo error('上传失败');
	            exit();
	        }
	    }
	}
	$arr=array($_POST['name'],$_POST['money'],$_POST['dw'],$_POST['pp'],$_REQUEST['is_recommend'],$_REQUEST['good_url'],$good_img,$_REQUEST['description'],$id);
	$sql="UPDATE rv_goods SET name=?,money=?,dw=?,fatherid=?,is_recommend=?,good_url=?,good_img=?,description=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){echo close($msg,"goods_list");}else{echo  error($msg);}
	exit;
}
?>