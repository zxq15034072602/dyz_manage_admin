<?php
if(!defined('CORE'))exit("error!");

if($do=='list'){
    If_rabc(); //检测权限
    $arr=array();
    if($_POST['mobile']){
        $search .= " and mobile like ? ";
        $arr[]="%".$_POST['mobile']."%";
    }
    $sqlcount ="select count(*) from rv_order ";
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
    //查询订单
    $sql="select * from rv_order where 1=1 ".$search." order by id desc limit ".$pageNum.",".$numPerPage;
    $db->p_e($sql, $arr);
    $order_info=$db->fetchAll();
    foreach($order_info as &$v){
        //开始时间
        $v['starttime']=date('Y-m-d H:i:s',$v['starttime']);
        //身份判断
        if($v['roleid']==2){
            $v['identity']='经销商';
        }elseif($v['roleid']==4){
            $v['identity']='加盟商';
        }
        //操作员
        if($v['userid']){
            $sql="select name from rv_user where id=?";
            $db->p_e($sql, array($v['userid']));
            $v['operator']=$db->fetchRow()['name'];
        }else{
            $v['operator']='';
        }
        //状态判断
        if(empty($v['voucher_image'])){
            $v['order_status']='未上传付款凭证';
        }elseif(!empty($v['voucher_image']) && $v['status']==0){
            $v['order_status']='未完成';
        }elseif(!empty($v['voucher_image']) && $v['status']==2){
            $v['order_status']='已发货';
        }elseif($v['status']==1){
            $v['order_status']='已完成';
        }
        //结束时间
        if(empty($v['endtime'])){
            $v['endtime']='订单未完成';
        }else{
            $v['endtime']=date('Y-m-d H:i:s',$v['endtime']);
        }
        //订单号
        if(empty($v['order_number'])){
            $v['order_number']='还未发货';
        }
    }
    
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('order_info',$order_info);
    $smt->assign('mobile',$_POST['mobile']);
    $smt->display('order_list.html');
    exit();
}

if($do=='edit'){//添加物流单号
    If_rabc(); //检测权限
    $id=$_REQUEST[id];
    //查询订单详情
    $sql="select * from rv_order where id=?";
    $db->p_e($sql, array($id));
    $order_info=$db->fetchRow();
    $order_info['starttime']=date('Y-m-d H:i:s',$order_info['starttime']);
    //查询门店信息以及产品信息
    $sql="select a.id,a.mid,b.name from rv_order_stores as a left join rv_mendian as b on a.mid=b.id where a.fid=?";
    $db->p_e($sql, array($order_info['id']));
    $order_info['store']=$db->fetchAll();
    
    foreach($order_info['store'] as &$v){
        $sql="select a.*,b.name,b.money from rv_order_goods as a left join rv_goods as b on a.goods_id=b.id  where a.fid=?";
        $db->p_e($sql, array($v['id']));
        $v['goods_info']=$db->fetchAll();
    }

    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('order_info',$order_info);
    $smt->display('order_edit.html');
    exit();
}

//查看订单
if($do=='show_order'){
    If_rabc(); //检测权限
    $id=$_REQUEST[id];
    //查询订单详情
    $sql="select * from rv_order where id=?";
    $db->p_e($sql, array($id));
    $order_info=$db->fetchRow();
    
    //订单开始时间
    $order_info['starttime']=date('Y-m-d H:i:s',$order_info['starttime']);
    
    //订单凭证
    if(empty($order_info['voucher_image'])){
        $order_info['voucher_image']='未上传付款凭证';
    }
    
    //订单状态
    if(empty($order_info['voucher_image'])){
        $order_info['status']='未上传付款凭证';
    }elseif(!empty($order_info['voucher_image']) && $order_info['status']==0){
        $order_info['status']='未完成';
    }elseif(!empty($order_info['voucher_image']) && $order_info['status']==2){
        $order_info['status']='已发货';
    }elseif($order_info['status']==1){
        $order_info['status']='已完成';
    }
    //身份
    if($order_info['roleid']==2){
        $order_info['roleid']='经销商';
    }elseif($order_info['roleid']==4){
        $order_info['roleid']='加盟商';
    }
    //订单结束时间
    if(empty($order_info['endtime'])){
        $order_info['endtime']='还未确认收货';
    }else{
        $order_info['endtime']=date('Y/m/d H:i:s',$order_info['endtime']);
    }
    
    //操作人
    if($order_info['userid']){
        $sql="select name from rv_user where id=?";
        $db->p_e($sql, array($order_info['userid']));
        $order_info['userid']=$db->fetchRow()['name'];
    }else{
        $order_info['userid']='无';
    }
    
    //物流单号
    if(empty($order_info['order_number'])){
        $order_info['order_number']='还未发货';
    }
    
    //查询门店信息以及产品信息
    $sql="select a.id,a.mid,b.name from rv_order_stores as a left join rv_mendian as b on a.mid=b.id where a.fid=?";
    $db->p_e($sql, array($order_info['id']));
    $order_info['store']=$db->fetchAll();
    
    foreach($order_info['store'] as &$v){
        $sql="select a.*,b.name,b.money from rv_order_goods as a left join rv_goods as b on a.goods_id=b.id  where a.fid=?";
        $db->p_e($sql, array($v['id']));
        $v['goods_info']=$db->fetchAll();
    }
    
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('order_info',$order_info);
    $smt->display('order_show.html');
    exit();
}

if($do=='updata'){
    If_rabc(); //检测权限
    $id=$_REQUEST['id'];
    $uid=$_SESSION['dys']['userid'];
    if($db->update(0, 1, "rv_order", array(
        "order_number='$_REQUEST[order_number]'",
        "price='$_REQUEST[price]'",
        "userid='$uid'",
        "status=2"
    ),array(
        "id='$id'"
    ))){
//         $cont=array("time"=>date('m月d日 H:i'),"msg"=>"你好，你的订单已发货","order_number"=>$_REQUEST['order_number']);
//         $cont=json_encode($cont);
//         to_msg(array('type'=>'verify_to_user','cont'=>$cont,'to'=>$_REQUEST[uid]));
        echo close($msg, 'order');
    }else{
        echo  error($msg);
    }
    exit;
}

if($do=='daochu'){//导出
    If_rabc(); //检测权限
    $sql2="SELECT * FROM rv_order where 1=1 order by id desc";
    $db->p_e($sql2,array());
    $list=$db->fetchAll();
    foreach($list as &$k){
        //判断身份
        if($k['roleid']==2){
            $k['roleid']='经销商';
        }elseif($k['roleid']==4){
            $k['roleid']='加盟商';
        }
        //订单结束时间判断
        if(empty($k['endtime'])){
            $k['endtime']='还未确认收货';
        }else{
            $k['endtime']=date('Y/m/d H:i:s',$k['endtime']);
        }
        //订单开始时间
       $k['starttime']=date('Y/m/d H:i:s',$k['starttime']);
       //查询操作人姓名
       if($k['userid']){
           $sql="select name from rv_user where id=?";
           $db->p_e($sql, array($k['userid']));
           $k['userid']=$db->fetchRow()['name'];
       }else{
           $k['userid']='无';
       }
       //判断订单状态
       if(empty($k['voucher_image'])){
           $k['status']='还未上传转账凭证';
       }elseif(!empty($k['voucher_image']) && $k['status']==0){
           $k['status']='订单未完成';
       }elseif($k['status']==2){
           $k['status']='已发货';
       }elseif($k['status']==1){
           $k['status']='已完成';
       }
       $sql="select a.*,b.name from rv_order_stores as a left join rv_mendian as b on a.mid=b.id where a.fid=?";
       $db->p_e($sql, array($k['id']));
       $k['store']=$db->fetchAll();
       foreach($k['store'] as &$val){
           $sql="select a.*,b.name from rv_order_goods as a left join rv_goods as b on a.goods_id=b.id where a.fid=?";
           $db->p_e($sql, array($val['id']));
           $val['goods']=$db->fetchAll();
       }
    }
    //exit();
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th width='30' align='center'>ID</th>";
    echo "<th width='80' align='center'>用户id</th>";
    echo "<th width='120' align='center'>姓名</th>";
    echo "<th width='120' align='center'>电话</th>";
    echo "<th width='80' align='center'>身份</th>";
    echo "<th width='80' align='center'>收货地址</th>";
    echo "<th width='80' align='center'>总价</th>";
    echo "<th width='200' align='center'>物流单号</th>";
    echo "<th width='80' align='center'>订单状态</th>";
    echo "<th width='200' align='center'>订单生成时间</th>";
    echo "<th width='200' align='center'>订单结束时间</th>";
    echo "<th width='80' align='center'>操作人</th>";
    echo "<th width='350' align='center'>进货详情</th>";
    echo "</tr>";
    foreach($list as $v){
        $str='';
        echo "<tr>";
        echo "<td width='30' align='center'>".$v['id']."</td>";
        echo "<td width='80' align='center'>".$v['uid']."</td>";
        echo "<td width='120' align='center'>".$v['name']."</td>";
        echo "<td width='120' align='center'>".$v['mobile']."</td>";
        echo "<td width='80' align='center'>".$v['roleid']."</td>";
        echo "<td width='80' align='center'>".$v['address']."</td>";
        echo "<td width='80' align='center'>".$v['price']."（元）</td>";
        echo "<td width='200' align='center'>".$v['order_number']."</td>";
        echo "<td width='80' align='center'>".$v['status']."</td>";
        echo "<td width='200' align='center'>".$v['starttime']."</td>";
        echo "<td width='200' align='center'>".$v['endtime']."</td>";
        echo "<td width='80' align='center'>".$v['userid']."</td>";
        foreach($v['store'] as $vv){
            $str2='';
            $str.="<h3>".$vv[name]."</h3>";
            
            foreach($vv['goods'] as $vvv){
                        $str2.="
                        <tr>
                            <td align='center'>".$vvv[name]."</td>
                            <td align='center'>".$vvv[count]."</td>
                            <td align='center'>".$vvv[goods_price]."</td>
                        </tr>";
                        
            }
            $str.="<table border='1'>
                        <tr>
                        <th align='center'>产品名称</th>
                        <th align='center'>产品数量</th>
                        <th align='center'>金额</th>
                        </tr>
                            ".$str2."
                    </table>";
        }
        echo "<td width='350' align='center'>".$str."</td>";
        echo "</tr>";
    }
    echo "</table>";
    exit;
}


if($do=='del'){//删除订单
    If_rabc(); //检测权限
    $id=$_REQUEST[id];
    if(empty($id)){echo error("id为空！");exit;}
    if($db->delete(0, 1, "rv_order",array("id=$id"))){
        echo success("删除成功");exit;
    }
    echo error("删除失败！");exit;
}
















