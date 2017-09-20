<?php
if(!defined('CORE'))exit("error!");

if($do=='list'){//文件上传列表页
    If_rabc(); //检测权限
    $arr=array();
    $sqlcount ="SELECT count(*) FROM rv_file where 1=1 ";
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
    $sql2="SELECT * FROM rv_file where 1=1 order by id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('file_list.htm');
    exit;
}

//新建
if($do=="new"){
    If_rabc(); //检测权限
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->display('file_new.htm');
    exit;
}

//写入
if($do=="add"){
    If_rabc(); //检测权限
    //上传文件
    function delEmpty($v){
        return $v!="";
    }
    $upfilename=array_filter($_FILES['filename']['name'],delEmpty);
    //配置上传目录
    
    $dirname="E:/dyz_manage_admin/file/".date("Y-m");
    //$dirname="F:/wamp/www/dyz_manage_admin/file/".date("Y-m");
    $path="/file/".date("Y-m")."/";
    if(!is_dir($dirname)){
        mkdir($dirname);
    }
    $time=date("Y-m-d",time());
    foreach($upfilename as $k=>$v){
        
        //判断文件是否存在
        $sql="SELECT * FROM rv_file where filename =? LIMIT 1";
        $arr=array($_FILES['filename']['name'][$k]);
        $db->p_e($sql,$arr);
        if($db->fetchRow()){echo  error("错误!文件已存在!");exit();}
        //文件路径
        $newfilepath=$dirname."/".$v;
        if(is_uploaded_file($_FILES['filename']['tmp_name'][$k])){
            if(!move_uploaded_file($_FILES['filename']['tmp_name'][$k], $newfilepath)){
                echo "<script>alert(’上传文件失败‘)</script>";
                exit();
            }
        }else{
            echo "<script>alert('非法文件')</script>";
        }
        //插入数据库
        $sql="insert into rv_file(filename,file_url,size,addtime)VALUES(?,?,?,?)";
        $arr=array($v,$path.$v,$_FILES['filename']['size'][$k],$time);
        $upfile=$db->p_e($sql, $arr);
    }
    if($upfile){echo close($msg,"file_upload");}else{echo error($msg);}
}

//删除文件
if($do=='del'){
    $id=$_REQUEST[id];
    if(empty($id)){echo error("id为空！");exit;}
    if($db->delete(0, 1, "rv_file",array("id=$id"))){
        echo success("删除成功");exit;
    }
    echo error("删除失败！");exit;
}

