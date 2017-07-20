<?php
if(!defined('CORE'))exit("error!");
if($do == "list"){
    $list=$db->select(0, 0, "rv_partition_download_count","*","","id asc");
    foreach ($list as &$partiton){
        $qrcode=new QRcode();
        $urlaz="http://app.duyiwang.cn/index.php?action=download&dir=admin&do=download&mobile=az&type=".$partiton[id];
        QRcode::png($urlaz, "qrcodeaz_$partiton[id].png");
        $partiton['urlaz']=$urlaz;
        $urlios="http://app.duyiwang.cn/index.php?action=download&dir=admin&do=download&mobile=ios&type=".$partiton[id];
        QRcode::png($urlios, "qrcodeios_$partiton[id].png");
        $partiton['urlios']=$urlios;
        $partiton['qode']='<div style="width: 250px;float: left;"><span style="height: 40px;line-height: 60px;display: block;">'.$partiton[partiton_name].'Android</span><img src="qrcodeaz_'.$partiton[id].'.png"></div><div style="width: 250px;float: left;"><span style="height: 40px;line-height: 60px;display: block;">ios</span><img src="qrcodeios_'.$partiton[id].'.png"></div>';
    }
    //模版
    $smt = new smarty();smarty_cfg($smt);
    $smt->assign("list",$list);
    $smt->display('download_list.htm');
    exit;
}else if($do =="download"){//下载判断各大区
    $type=$_REQUEST[type];//区分大区
    $mobile=$_REQUEST[mobile];//区分设备
    if($type){//根据各个大区做相应的操作
        $smt = new smarty();smarty_cfg($smt);
        if (!strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {//判断是否为微信内置浏览器
            if($type !="user"){
                $list=$db->select(0, 1,"rv_partition_download_count","*","and id='$type'","id asc");
                $count=$list['count']+1;//累加下载次数
                $db->update(0, 1, "rv_partition_download_count", "count=$count","and id =$list[id]");
            }
            if($mobile =="az"){//根据设备安卓还是ios赋值所对应的下载链接
                @header("Location:http://app.duyiwang.cn/android/app.apk");exit;
            }else{
                $download_url="http://192.168.2.143/dyz/android/app.apk";
                $mobile="iosdown";
                $smt->assign("mobile",$mobile);
                $smt->assign("load_url",$download_url);
            }

        }else{

            $smt->assign("mobile",$mobile);
        }
        $smt->display('download_show.htm');
        exit;
    }else {
        echo "网络错误！请重试";
    }

}else if($do == "appdownload"){
     $smt = new smarty();smarty_cfg($smt);
     if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {//判断是否为微信内置浏览器
            $smt->display('appdownload_show.htm');
        }else{
           @header("Location:http://app.duyiwang.cn/android/app.apk");exit;
        }
        exit;
}