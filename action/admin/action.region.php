<?php
if(!defined('CORE'))exit("error!");
if($do=="ajax_region"){
    $type=$_REQUEST['type']??2;
    $id=$_REQUEST['id']??0;
    if($type == 2){//获取省份对应的市区
        $cities=$db->select(0,0,"rv_city","*","and fatherid=$id","id asc");
        if($cities){
            echo '{"code":200,"cities":'.json_encode($cities).'}';
        }else{
            echo '{"code":500}';
        }
    }elseif($type ==3){//获取市区对应的城区
        $areas=$db->select(0,0, "rv_area","*","and fatherid=$id and status=0","id asc");
        if($areas){
            echo '{"code":200,"areas":'.json_encode($areas).'}';
        }else{
            echo '{"code":500}';
        }
    }
}

if($do=='ajax_case'){
    $id=$_REQUEST['id']??0;
    $case=$db->select(0, 0, "rv_case_disease_class","*","and fatherid=$id","id asc");
    if($case){
        echo '{"code":"200","cases":'.json_encode($case).'}'; 
    }else{
        echo '{"code":"500"}';
    }
}