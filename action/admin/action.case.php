<?php
if(!defined('CORE'))exit("error!");
//列表

if($do=='list'){
    If_rabc(); //检测权限
    $arr=array();
    $sqlcount ="select count(*) from rv_case ";
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
    $sql2="select a.*,b.name as gname,c.name as mname,d.content from ((rv_case as a left join rv_goods as b on a.gid=b.id)left join rv_mendian as c on a.mid=c.id)left join rv_case_detail as d on a.id=d.cid where 1=1 order by id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('case_list.htm');
    exit;
}

//新建
if($do=="new"){ 
    If_rabc(); //检测权限
    //门店
    $sql="select * from rv_mendian";
    $db->p_e($sql, array());
    $md=$db->fetchAll();
    //产品
    $sql="select g.* from rv_goods as g left join rv_type as t on g.fatherid=t.id where 1=1 and t.type=0 ";
    $db->p_e($sql, array());
    $sp=$db->fetchAll();
  
    $smt = new smarty();
    smarty_cfg($smt);
    $smt->assign('md',$md);
    $smt->assign('sp',$sp);
    $smt->display('case_new.htm');
    exit;

}

if($do=="add"){
    //查询
    If_rabc(); //检测权限
    $img_names=array();

	foreach($_FILES['img']['tmp_name'] as $k=>$v){
	    if(is_uploaded_file($_FILES['img']['tmp_name'][$k])){
    	    $save=$img->root_path.$img->images_dir."/".$img->random_filename().$img->get_filetype($_FILES['img']['name'][$k]);
        	    if(!$img->check_img_type($_FILES['img']['type'][$k])){
        	        echo error("请上传正确的图片");
        	        exit();
        	    }
        	    if(move_uploaded_file($_FILES['img']['tmp_name'][$k],$save)){
        	        $img_names[]=str_replace($img->root_path.$img->images_dir."/", '', $save);
        	    }else{
        	        echo error("上传图片失败");
        	        exit();
        	    }
	    }
	}
	$imgs=implode(",", $img_names);
    $time=date("Y-m-d",time());
    $sql="insert into rv_case(mid,gid,case_img,addtime,name,age,yongyao,date,way,content,process) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $arr=array($_POST['mid'],$_POST['gid'],$imgs,$time,$_POST['name'],$_POST['age'],$_POST['yongyao'],$_POST['date'],$_POST['way'],$_POST['content'],$_POST['process']);
    if($db->p_e($sql,$arr)){echo close($msg,"case_list");}else{echo  error($msg);}
    exit;
}

if($do=='edit'){//编辑案例详情页
   // If_rabc(); //检测权限
    $cid=$_REQUEST['id'];
    $sql="select a.*,b.name as gname,c.name as mname from (rv_case as a left join rv_goods as b on a.gid=b.id)left join rv_mendian as c on a.mid=c.id where a.id=? ";
    $db->p_e($sql, array(
        $cid
    ));
    $case=$db->fetchRow();
    if($case['case_img']){
        $img_names=explode(",", $case['case_img']);//获取图片数组
    }
    //门店
    $sql="select * from rv_mendian";
    $db->p_e($sql, array());
    $md=$db->fetchAll();
    //商品
    $sql="select g.* from rv_goods as g left join rv_type as t on g.fatherid=t.id where 1=1 and t.type=0 ";
    $db->p_e($sql, array());
    $sp=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('case',$case);
    $smt->assign("img_names",$img_names);
    $smt->assign("str_img_names",$case['case_img']);
    $smt->assign('md',$md);
    $smt->assign('sp',$sp);
    $smt->display('case_detail.htm');
    exit();
}

if($do=='update'){//
    $id=$_REQUEST['id'];

	$img_names=$_REQUEST['img_names'];
	if(!$img_names){//如果更改了图片
	    $old_img_names=$_REQUEST['old_img_names'];
	    $old_img_names=explode(",", $old_img_names);
	    foreach ($old_img_names as $v){
	        unlink($img->root_path.$img->images_dir."/".$v);
	    }
    	$img_names=array();
	    foreach($_FILES['img']['tmp_name'] as $k=>$v){
	        if(is_uploaded_file($_FILES['img']['tmp_name'][$k])){
    	        $save=$img->root_path.$img->images_dir."/".$img->random_filename().$img->get_filetype($_FILES['img']['name'][$k]);
    	        if(!$img->check_img_type($_FILES['img']['type'][$k])){
    	            echo error("请上传正确的图片");
    	            exit();
    	        }
    	        if(move_uploaded_file($_FILES['img']['tmp_name'][$k],$save)){
    	            $img_names[]=str_replace($img->root_path.$img->images_dir."/", '', $save);
    	        }else{
    	            echo error("上传图片失败");
    	            exit();
    	        }
	        }
	    }   
	}
	$imgs=implode(",", $img_names);
	$time=date("Y-m-d",time());
    $arr=array($_POST['mid'],$_POST['gid'],$imgs,$time,$_POST['name'],$_POST['age'],$_POST['yongyao'],$_POST['date'],$_POST['way'],$_POST['content'],$_POST['process'],$id);
    $sql="UPDATE rv_case SET mid=?,gid=?,case_img=?,addtime=?,name=?,age=?,yongyao=?,date=?,way=?,content=?,process=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){
	    echo close($msg,"adv_list");
	}else{echo  error($msg);}
	exit;
}

if($do=='addcdetail'){//添加案例详情
    If_rabc(); //检测权限
    if(is_uploaded_file($_FILES["hz_img"]['tmp_name'])){
        if(!$img->check_img_type($_FILES['hz_img']['type'])){
            echo error("请上传正确的图片");
            exit();
        }
      
        $hz_img=$img->upload_image($_FILES['hz_img']);

        if(!$hz_img){
            echo error("上传失败");
            exit();
        }

    }       
        $sql="insert into rv_case_detail(cid,name,age,yongyao,date,way,content,process,hz_img)value(?,?,?,?,?,?,?,?,?)";
        $arr=array($_POST['cid'],$_POST['name'],$_POST['age'],$_POST['yongyao'],$_POST['date'],$_POST['way'],$_POST['content'],$_POST['process'],$hz_img);
        if($db->p_e($sql, $arr)){echo close($msg,"case_list");}else{echo error($msg);}
        exit();
  
}
if($do=='detail'){//查看案例详情页
    If_rabc(); //检测权限
    $cid=$_REQUEST['id'];
    $sql="select a.*,b.*,c.name as mname from (rv_case_detail as a left join rv_case as b on a.cid=b.id)left join rv_mendian as c on b.mid=c.id where cid=?";
    $db->p_e($sql, array(
        $cid
    ));
    $cArr=$db->fetchRow();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('cArr',$cArr);
    $smt->display('case_detail_show.htm');
    exit();
}

if($do=='del'){
    $id=$_REQUEST[id];
    if(empty($id)){echo error("id为空！");exit;}
    if($db->delete(0, 1, "rv_case",array("id=$id"))){
        echo success("删除成功");exit;
    }
    echo error("删除失败！");exit;
}
