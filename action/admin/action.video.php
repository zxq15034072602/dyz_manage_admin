<?php
if(!defined('CORE'))exit("error!");

if($do=='list'){
    If_rabc(); //检测权限
    $arr=array();
    $sqlcount ="select count(*) from rv_video_type";
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
    $sql2="select * from rv_video_type order by id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('video_type.htm');
    exit;
}
if($do=='video_new'){//添加
    If_rabc(); //检测权限
    $smt = new smarty();
    smarty_cfg($smt);
    $smt->display('video_new.htm');
    exit;
}

if($do=='video_add'){//添加视频图文
    If_rabc(); //检测权限
    $sql="SELECT * FROM rv_video_type where name =? LIMIT 1";
    $arr=array($_POST['name']);
    $db->p_e($sql,$arr);
    if($db->fetchRow()){echo  error("错误!视频或图文已存在!");exit();}
    if(is_uploaded_file($_FILES["video_img"]['tmp_name'])){
        if(!$img->check_img_type($_FILES['video_img']['type'])){
            echo error("请上传正确的图片");
            exit();
        }
        $good_img=$img->upload_image($_FILES['video_img']);
        if(!$good_img){
            echo error("上传失败");
            exit();
        }
    }
    $sql="insert into rv_video_type (name,content,video_img,type) VALUES (?,?,?,?)";
    $arr1=array($_POST['name'],$_POST['content'],$good_img,$_POST['type']);
    if($db->p_e($sql,$arr1)){echo close($msg,"video_list");}else{echo  error($msg);}
    exit;
}
//修改视频图文
if($do=='editvideo'){
    $id=$_REQUEST[id];
    //查询
    $sql="select * from rv_video_type where 1=1 and id=?";
    $db->p_e($sql, array(
        $id
    ));
    $row=$db->fetchRow();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('row',$row);
    $smt->display("video_edit.htm");
    exit();
}

//修改
if($do=='updatevideo'){
   	If_rabc(); //检测权限
	$id=$_POST['id'];
	$video_img=$_REQUEST['video_img'];
	if(!$video_img){//修改图片
	    $old_img_names=$_REQUEST['old_img_names'];//获取旧的图片
	    if(old_img_names){
	        unlink($img->root_path.old_img_names);//删除旧图片
	    }
	    if(is_uploaded_file($_FILES['video_img']['tmp_name'])){//判断是否上传
	        if(!$img->check_img_type($_FILES['video_img']['type'])){
	            echo error("请上传正确的图片");
	            exit();
	        }
	        $video_img=$img->upload_image($_FILES['video_img']);
	        if(!$video_img){
	            echo error('上传失败');
	            exit();
	        }
	    }
	}
	$arr=array($_POST['name'],$_POST['content'],$_POST['type'],$video_img,$id);
    $sql="UPDATE rv_video_type SET name=?,content=?,type=?,video_img=? WHERE id=? LIMIT 1";
    if($db->p_e($sql,$arr)){echo close($msg,"video_type");}else{echo  error($msg);}
    exit;
}
//删除视频图文
if($do=='del'){
    $id=$_REQUEST[id];
    if(empty($id)){echo error("id为空！");exit;}
    if($db->delete(0, 1, "rv_video_type",array("id=$id"))){
        echo success("删除成功");exit;
    }
    echo error("删除失败！");exit;
}


//////////////////////////////////////////////////////////
//////////////////////   视频     //////////////////////////
//////////////////////////////////////////////////////////

if($do=='video_list_new'){
    If_rabc(); //检测权限
    $id=$_REQUEST['id'];
    $sql="select id from rv_video_type where id=?";
    $db->p_e($sql, array($id));
    $vid=$db->fetchRow();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('vid',$vid);
    $smt->display('video_list_new.htm');
    exit();
}
if($do=='video_list_add'){
    If_rabc(); //检测权限
    $sql="insert into rv_video_list (vid,title,teacher,url) VALUES (?,?,?,?)";
    $arr1=array($_POST['vid'],$_POST['title'],$_POST['teacher'],$_POST['url']);
    if($db->p_e($sql,$arr1)){echo close($msg,"video_list");}else{echo  error($msg);}
    exit;
}

if($do=='video_list'){//视频列表页
    If_rabc(); //检测权限
    $id=$_REQUEST[id];
    $arr=array();
    $sqlcount ="select count(*) from rv_video_list as a left join rv_video_type as b on a.vid=b.id where vid=$id and b.type=0";
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
    $sql2="select a.*,b.name from rv_video_list as a left join rv_video_type as b on a.vid=b.id where 1=1 and vid=$id and b.type=0 order by a.id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('video_list.htm');
    exit;
}
//修改视频列表页
if($do=='editvideolist'){
    $id=$_REQUEST[id];
    $sql="select * from rv_video_list where id=?";
    $db->p_e($sql, array(
        $id
    ));
    $row=$db->fetchRow();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('row',$row);
    $smt->display('video_edit_list.htm');
    exit();
}
//更新
if($do=='updatevideo'){
    $id=$_POST['id'];
    $arr=array($_POST['vid'],$_POST['title'],$_POST['teacher'],$_POST['url'],$id);
    $sql="update rv_video_list set vid=?,title=?,teacher=?,url=? where id=? limit 1";
    if($db->p_e($sql, $arr)){echo close($msg,"video_list");}else{echo  error($msg);}
}
//删除视频
if($do=='delvideo'){
    $id=$_REQUEST[id];
    if(empty($id)){echo error("id为空！");exit;}
    if($db->delete(0, 1, "rv_video_list",array("id=$id"))){
        echo success("删除成功");exit;
    }
    echo error("删除失败！");exit;
}


//////////////////////////////////////////////////////////
//////////////////////   图文     //////////////////////////
//////////////////////////////////////////////////////////
if($do=='article_new'){
    If_rabc(); //检测权限
    $id=$_REQUEST['id'];
    $sql="select id from rv_video_type where id=?";
    $db->p_e($sql, array($id));
    $vid=$db->fetchRow();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('vid',$vid);
    $smt->display('article_new.htm');
    exit();
}

if($do=='article_add'){//添加图文
    If_rabc(); //检测权限
    $sql="insert into rv_article_list (vid,title,teacher,content) VALUES (?,?,?,?)";
    $arr1=array($_POST['vid'],$_POST['title'],$_POST['teacher'],$_POST['content']);
    if($db->p_e($sql,$arr1)){echo close($msg,"article_list");}else{echo  error($msg);}
    exit;
}

if($do=='article_list'){//图文列表页
    If_rabc(); //检测权限
    $id=$_REQUEST['id'];
    $arr=array();
    $sqlcount ="select count(*) from rv_article_list as a left join rv_video_type as b on a.vid=b.id where vid=$id and b.type=1";
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
    $sql2="select a.*,b.name from rv_article_list as a left join rv_video_type as b on a.vid=b.id where 1=1 and vid=$id and b.type=1 order by a.id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('article_list.htm');
    exit;
}

if($do=='article_detail'){//查看图文详情页
    If_rabc(); //检测权限
    $aid=$_REQUEST['id'];
    $sql="select * from rv_article_list where vid=?";
    $db->p_e($sql, array(
        $aid
    ));
    $aArr=$db->fetchRow();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('aArr',$aArr);
    $smt->display('article_detail_show.htm');
    exit();
}
//修改图文
if($do=='editarticlelist'){
    $id=$_REQUEST['id'];
    $sql="select * from rv_article_list where id=?";
    $db->p_e($sql, array(
        $id
    ));
    $row=$db->fetchRow();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('row',$row);
    $smt->display('article_edit.htm');
    exit();
}
if($do=='updatearticle'){
    $id=$_POST['id']; 
    $arr=array($_POST['vid'],$_POST['title'],$_POST['teacher'],$_POST['content'],$id);
    $sql="update rv_video_list set vid=?,title=?,teacher=?,content=? where id=? limit 1";
    if($db->p_e($sql, $arr)){echo close($msg,"video_list");}else{echo  error($msg);}
}
//删除图文
if($do=='delarticle'){
    $id=$_REQUEST[id];
    if(empty($id)){echo error("id为空！");exit;}
    if($db->delete(0, 1, "rv_article_list",array("id=$id"))){
        echo success("删除成功");exit;
    }
    echo error("删除失败！");exit;
}