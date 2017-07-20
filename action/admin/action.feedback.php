<?php
if(!defined('CORE'))exit("error!");
if($do == "list"){//用户反馈列表
    If_rabc(); //检测权限
    $arr=array();
    $sqlcount ="SELECT count(*) FROM rv_feedback where 1=1 ";
    
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
    $sql2="SELECT * FROM rv_feedback where 1=1 order by id desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql2,$arr);
    $list=$db->fetchAll();
    foreach($list as &$k){
        $sql="select * from rv_user where 1=1 and id=?";
        $db->p_e($sql,array($k['uid']));
        $k['user']=$db->fetchRow(); 
    }
    
    //模版
    $smt = new smarty();smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('name',$_POST['name']);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->display('feedback_list.html');
    exit;
}elseif($do == "show"){ //查看反馈
    $id=$_REQUEST[id];
    //if(empty($id)){echo error("id为空！");exit;}
    $sql="select * from rv_feedback where id=?";
    $db->p_e($sql,array($id));
    $feedbackinfo=$db->fetchRow();
    if($feedbackinfo){
        $sql="select * from rv_user where 1=1 and id=?";
        $db->p_e($sql, array($feedbackinfo[uid]));
        $feedbackinfo[user]=$db->fetchRow();
    }
    //模版
    $smt = new smarty();smarty_cfg($smt);
    $smt->assign('feedbackinfo',$feedbackinfo);
    $smt->display('feedback_show.htm');
    exit;
}elseif($do=="delete"){//删除
    $id=$_REQUEST[id];
    if(empty($id)){echo error("id为空！");exit;}
    if($db->delete(0, 1, "rv_feedback",array("id=$id"))){
        echo success("删除成功");exit;
    }
    echo error("删除失败！");exit;
}