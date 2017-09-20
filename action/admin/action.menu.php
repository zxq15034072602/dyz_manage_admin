<?php
if(!defined('CORE'))exit("error!");
if($do=="list"){//广告管理
    If_rabc(); //检测权限  
    $arr=array();
    $sqlcount ="SELECT count(*) FROM rv_advinfo where 1=1 ";
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
    $sql2="SELECT * FROM rv_advinfo where 1=1 order by id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('advinfo_list.htm');
    exit;
}

//新建
if($do=="new"){
    If_rabc(); //检测权限
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->display('advinfo_new.htm');
    exit;
}

//写入
if($do=="add"){
    If_rabc(); //检测权限
    //查询
    $sql="SELECT * FROM rv_advinfo where title =? LIMIT 1";
    $arr=array($_POST['title']);
    $db->p_e($sql,$arr);
    if($db->fetchRow()){echo  error("错误!广告已存在!");exit();}
    $sql="SELECT * FROM rv_advinfo where type =? LIMIT 1";
    $arr=array($_POST['type']);
    $db->p_e($sql, $arr);
    if($db->fetchRow()){echo error("错误!类型已存在");exit();}
    $img_names=array();   
    foreach($_FILES['adv_img']['tmp_name'] as $k=>$v){
        if(is_uploaded_file($_FILES['adv_img']['tmp_name'][$k])){    
            $save=$img->root_path.$img->images_dir."/".$img->random_filename().$img->get_filetype($_FILES['adv_img']['name'][$k]);
            if(!$img->check_img_type($_FILES['adv_img']['type'][$k])){
                echo error("请上传正确的图片");
                exit();
            }
            if(move_uploaded_file($_FILES['adv_img']['tmp_name'][$k],$save)){
                $img_names[]=str_replace($img->root_path.$img->images_dir."/", '', $save);
            }else{
                echo error("上传图片失败");
                exit();
            }
        }
    }
    $imgs=implode(",", $img_names);
    $insert_id=$db->insert(0, 2, "rv_advinfo",array("title='$_POST[title]'","url='$_POST[url]'","img='$imgs'","type='$_POST[type]'"));
    if($insert_id){
        echo close($msg,"menu_list");
    }else{echo  error($msg);}
    exit;
}

//编辑
if($do=="edit"){
    If_rabc(); //检测权限
    $id=$_REQUEST['id'];
    //查询
    $sql="select * from rv_advinfo where 1=1 and id=?";
    $db->p_e($sql, array(
        $id
    ));
    $row=$db->fetchRow(); 
    if($row['img']){
        $img_names=explode(",", $row['img']);//获取图片数组
    }
    $smt = new smarty();
    smarty_cfg($smt);
    //模版
    $smt->assign('row',$row);
    $smt->assign("str_img_names",$row['img']);   
    $smt->assign("img_names",$img_names);
    $smt->display('advinfo_edit.htm');
    exit;
}

//更新
if($do=="updata"){
  If_rabc(); //检测权限
    $id=$_REQUEST['id'];
	$img_names=$_REQUEST['img_names'];
	if(!$img_names){//如果更改了图片
	    $old_img_names=$_REQUEST['old_img_names'];
	    $old_img_names=explode(",", $old_img_names);
	    foreach ($old_img_names as $v){
	        unlink($img->root_path.$img->images_dir."/".$v);
	    }
    	$img_names=array();
	    foreach($_FILES['adv_img']['tmp_name'] as $k=>$v){
	        if(is_uploaded_file($_FILES['adv_img']['tmp_name'][$k])){
    	        $save=$img->root_path.$img->images_dir."/".$img->random_filename().$img->get_filetype($_FILES['adv_img']['name'][$k]);
    	        if(!$img->check_img_type($_FILES['adv_img']['type'][$k])){
    	            echo error("请上传正确的图片");
    	            exit();
    	        }
    	        if(move_uploaded_file($_FILES['adv_img']['tmp_name'][$k],$save)){
    	            $img_names[]=str_replace($img->root_path.$img->images_dir."/", '', $save);
    	        }else{
    	            echo error("上传图片失败");
    	            exit();
    	        }
	        }
	    }
	   
	}
	$arr=array($_POST['title'],$_POST['url'],implode(',',$img_names),$_POST['type'],$id);
	$sql="UPDATE rv_advinfo SET title=?,url=?,img=?,type=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){
	    echo close($msg,"adv_list");
	}else{echo  error($msg);}
	exit;
}

//删除
if($do=="del"){//删除
    $id=$_REQUEST[id];
    if(empty($id)){echo error("id为空！");exit;}
    if($db->delete(0, 1, "rv_advinfo",array("id=$id"))){
        echo success("删除成功");exit;
    }
    echo error("删除失败！");exit;
}

