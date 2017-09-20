<?php
if(!defined('CORE'))exit("error!");
//列表

if($do=='list'){
    If_rabc(); //检测权限
    $arr=array();
    $sqlcount ="select count(*) from rv_goods as g left join rv_type as t on g.fatherid=t.id where t.type=0 ";
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
    $sql1=$sqlcount;
    $db->p_e($sql1,$arr);
    $total=$db->fetch_count();//总条数
    
    //查询
    $sql2="select g.* from rv_goods as g left join rv_type as t on g.fatherid=t.id where 1=1 and t.type=0 order by g.id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('product_list.htm');
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
    $time=date('Y-m-d',time());
    $sql="insert into rv_goods (name,fatherid,money,dw,is_recommend,good_url,good_img,description,addtime,content,title) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $arr1=array($_POST['name'],$_POST['pp'],$_POST['money'],$_POST['dw'],$_REQUEST['is_recommend'],$_REQUEST['good_url'],$good_img,$_REQUEST['description'],$time,$_POST['content'],$_POST['title']);
    if($db->p_e($sql,$arr1)){echo close($msg,"goods_list");}else{echo  error($msg);}
    exit;
}
//修改
if($do=='edit'){
    $id=$_REQUEST[id];
    $sql="SELECT a.id,a.name,a.money,a.dw,a.fatherid,b.id as ppid,a.is_recommend,a.good_img,a.description,a.good_url,a.title,a.content,b.name as ppname from rv_goods as a left join rv_type as b on a.fatherid=b.id where 1=1 and a.id=?";
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
    $smt->display('product_edit.htm');
    exit();
}
//更新
if($do=='update'){
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
    $arr=array($_POST['name'],$_POST['money'],$_POST['dw'],$_POST['pp'],$_REQUEST['is_recommend'],$_REQUEST['good_url'],$good_img,$_REQUEST['description'],$_POST['title'],$_POST['content'],$id);
    $sql="UPDATE rv_goods SET name=?,money=?,dw=?,fatherid=?,is_recommend=?,good_url=?,good_img=?,description=?,title=?,content=? WHERE id=? LIMIT 1";
    if($db->p_e($sql,$arr)){echo close($msg,"goods_list");}else{echo  error($msg);}
    exit;
}

if($do=='del'){
    $id=$_REQUEST[id];
    if(empty($id)){echo error("id为空！");exit;}
    if($db->delete(0, 1, "rv_goods",array("id=$id"))){
        echo success("删除成功");exit;
    }
    echo error("删除失败！");exit;
}

