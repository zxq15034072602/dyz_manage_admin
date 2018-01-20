<?php
if(!defined('CORE'))exit("error!");

if($do=='list'){//案例一级分类列表页
  //  If_rabc(); //检测权限
    $arr=array();
    $sqlcount ="select count(*) from rv_case_class";
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
    $sql2="select * from rv_case_class where 1=1 order by id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('case_class.htm');
    exit;
}

if($do=='new'){//新建一级分类
    //If_rabc(); //检测权限
	$smt = new smarty();smarty_cfg($smt);
	$smt->display('case_class_new.htm');
	exit;
}

if($do=='add'){//一级分类添加
    //查询
    $sql="SELECT * FROM rv_case_class where name =? LIMIT 1";
    $arr=array($_POST['name']);
    $db->p_e($sql,$arr);
    if($db->fetchRow()){echo  error("错误!用户已存在!");exit();}
    //插入
    $sql="insert into rv_case_class (name,iconfont) VALUES (?,?)";
    $arr1=array($_POST['name'],$_POST['img']);
    if($db->p_e($sql,$arr1)){echo close($msg,"case_class");}else{echo  error($msg);}
    exit;
}

if($do=='edit'){//修改一级分类名称
  //  If_rabc(); //检测权限
    //查询
    $sql="SELECT * FROM rv_case_class where id=? LIMIT 1";
    $db->p_e($sql,array($id));
    $row=$db->fetchRow();
    $smt = new smarty();smarty_cfg($smt);
    //模版
    $smt->assign('row',$row);
    $smt->display('case_class_edit.htm');
    exit;
}

if($do=='update'){//更新一级分类
   // If_rabc(); //检测权限
	$id=$_POST['id'];
	$arr=array($_POST['name'],$_POST['img'],$id);
	$sql="UPDATE rv_case_class SET name=?,iconfont=? WHERE id=? LIMIT 1";
	if($db->p_e($sql,$arr)){echo close($msg,"case_class");}else{echo  error($msg);}
	exit;
}

if($do=='del'){//删除一级分类
    //If_rabc(); //检测权限
    $sql="delete from rv_case_class where id=?";
    if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}
    exit;
}

if($do=='son_list'){//病症分类
    //If_rabc(); //检测权限
    $arr=array();
    $sqlcount="select count(*) from rv_case_disease_class as a left join rv_case_class as b on a.fatherid=b.id where b.id=$id";
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
    
    //获取父级分类名称
    $sql="select name from rv_case_class where id=$id";
    $db->p_e($sql, array());
    $name=$db->fetch_count();
    
    //查询
    $sql2="select a.*,b.name as cname from rv_case_disease_class as a left join rv_case_class as b on a.fatherid=b.id where 1=1 and b.id=$id order by a.id desc limit ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('id',$id);
    $smt->assign('list',$list);
    $smt->assign('name',$name);
    $smt->assign('total',$total);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('case_class_son_list.htm');
    exit;
}

if($do=='son_class_new'){//新建病症分类页
    //If_rabc(); //检测权限
    $sql="select * from rv_case_class where id=$id";
    $db->p_e($sql, array());
    $name=$db->fetchRow();
    $smt = new smarty();smarty_cfg($smt);
    $smt->assign('name',$name);
    $smt->display('case_son_class_new.htm');
    exit;
}

if($do=='son_add'){//添加病症分类
    //If_rabc(); //检测权限
    $fatherid=$_POST['fatherid'];
    $name=$_POST['name'];
    $sql="select * from rv_case_disease_class where fatherid=? and name=?";
    $db->p_e($sql, array($fatherid,$name));
    if($db->fetchRow()){echo  error("错误!用户已存在!");exit();}
    $sql="insert into rv_case_disease_class(name,fatherid)values(?,?)";
    $arr=array($name,$fatherid);
    if($db->p_e($sql, $arr)){echo close($msg,"class_list");}else{echo  error($msg);}
        exit;
}

if($do=='son_class_edit'){//病症分类修改
    //If_rabc(); //检测权限
    //查询
    $sql="SELECT a.*,b.name as cname FROM rv_case_disease_class as a left join rv_case_class as b on a.fatherid=b.id where a.id=? LIMIT 1";
    $db->p_e($sql,array($id));
    $row=$db->fetchRow();
    $smt = new smarty();smarty_cfg($smt);
    //模版
    $smt->assign('row',$row);
    $smt->display('case_class_son_edit.htm');
    exit;
}

if($do=='son_update'){//病症分类更新
    //If_rabc(); //检测权限
    $id=$_POST['id'];
    $arr=array($_POST['name'],$id);
    $sql="UPDATE rv_case_disease_class SET name=? WHERE id=? LIMIT 1";
    if($db->p_e($sql,$arr)){echo close($msg,"class_list");}else{echo  error($msg);}
    exit;
}

if($do=='son_class_del'){//删除病症分类
    //If_rabc(); //检测权限
    $sql="delete from rv_case_disease_class where id=?";
    if($db->p_e($sql,array($id))){echo success($msg);}else{echo  error($msg);}
    exit;
}

if($do=='yes'){//推荐
    $id=$_REQUEST['id'];
    $status=$_REQUEST['status'];
    $sql="update rv_case_disease_class set status=? where id=?";
    if($db->p_e($sql, array($status,$id))){
        echo success($msg);
    }else{
        echo error($msg);
    }
}










