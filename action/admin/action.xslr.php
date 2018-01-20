<?php
if(!defined('CORE'))exit("error!"); 
//列表	
if($do==""){
	If_rabc(); //检测权限
	$search='';
	$arr=array();
	$sqlcount ="SELECT count(*) FROM rv_buy where 1=1 ";
	if($_POST['name']){
	    $sql="select id from rv_user where name='$_POST[name]'";
	    $db->p_e($sql, array());
	    $uid=$db->fetchRow()['id'];
		$search .= "and uid = ? ";
		$arr[]=$uid;
		}	
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
	$sql1=$sqlcount.$search;
	$db->p_e($sql1,$arr);
	$total=$db->fetch_count();//总条数
	
	//查询
	$sql2="SELECT * FROM rv_buy where 1=1 ".$search."order by id desc LIMIT ".$pageNum.",".$numPerPage;

	
	$db->p_e($sql2,$arr);
	$list=$db->fetchAll();
	foreach($list as &$k){
        
		$sql="select * from rv_user where 1=1 and id=?";
		$db->p_e($sql,array($k['uid']));
		$k['user']=$db->fetchRow();

		$sql="select * from rv_mendian where 1=1 and id=?";
		$db->p_e($sql, array($k['mid']));
		$k["store"] = $db->fetchRow();	
		
		$sql="select * from rv_buy_goods where buy_id=?";
		$db->p_e($sql, array($k['id']));
		$k['goods']=$db->fetchAll();
		foreach($k['goods'] as $kk=>$vv){
		    $k['count']+=$vv['count'];	    
		    $sql="select * from rv_goods where 1=1 and id=?";
		    $db->p_e($sql,array($vv['goods_id']));
		    $k['goods']=$db->fetchRow();
		}
	}

	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('username',$_POST['name']);
	$smt->assign('pageNum',$_POST['pageNum']);
	$smt->display('xslr_list.htm');
	exit;
	
}if($do=="daochu"){	
	If_rabc(); //检测权限
	$sql2="SELECT * FROM rv_buy where 1=1 order by id desc";
	$db->p_e($sql2,array());
	$list=$db->fetchAll();
	foreach($list as &$k){
		if($k['sex']==1){
			$k['sex1']='男';
		}elseif($k['sex']==2){
			$k['sex1']='女';
		}else{
			$k['sex1']='保密';
		}
		$sql="select * from rv_user where 1=1 and id=?";
		$db->p_e($sql,array($k['uid']));
		$k['user']=$db->fetchRow();
		
	    $sql="select * from rv_buy_goods where buy_id=?";
		$db->p_e($sql, array($k['id']));
		$k['goods']=$db->fetchAll();
		foreach($k['goods'] as $kk=>$vv){
		    $k['count']+=$vv['count'];	    
		    $sql="select * from rv_goods where 1=1 and id=?";
		    $db->p_e($sql,array($vv['goods_id']));
		    $k['goods']=$db->fetchRow();
		}
		$sql="select name from rv_mendian where id=?";
		$db->p_e($sql, array($k['mid']));
		$k['mbname']=$db->fetchRow()['name'];
	}
	$time=date(time());
	header("Content-Type: application/vnd.ms-excel;charset=gbk");   
	header("Content-Disposition: attachment; filename=".$time.".xls");
	echo "<table border='1'>";
			echo "<tr>";
			echo "<th width='30'>ID</th>";
			echo "<th width='80'>销售人姓名</th>";
			echo "<th width='120'>所属门店</th>";
			echo "<th width='120'>销售商品</th>";
			echo "<th width='80'>姓名</th>";
			echo "<th width='80'>姓别</th>";
			echo "<th width='80'>年龄</th>";
			echo "<th width='200'>电话</th>";
			echo "<th width='80'>数量</th>";
			echo "<th width='80'>单价</th>";
			echo "<th width='80'>自定实际金额</th>";
			echo "<th width='80'>总价</th>";
			echo "<th width='160'>时间</th>";
			echo "</tr>";
		foreach($list as $v){
			echo "<tr>";
			echo "<td width='30'>".$v['id']."</td>";
			echo "<td width='80'>".$v['user']['name']."</td>";
			echo "<td width='80'>".$v['mdname']."</td>";
			echo "<td width='120'>".$v['goods']['name']."</td>";
			echo "<td width='80'>".$v['username']."</td>";
			echo "<td width='80'>".$v['sex1']."</td>";
			echo "<td width='80'>".$v['age']."</td>";
			echo "<td width='200'>".$v['tel']."</td>";
			echo "<td width='80'>".$v['count']."</td>";
			echo "<td width='80'>".$v['goods']['money']."/".$v['goods']['dw']."</td>";
			echo "<td width='80'>".$v['sale_price']."（元）</td>";
			echo "<td width='80'>".$v['total_price']."（元）</td>";
			echo "<td width='160'>".$v['addtime']."</td>";
			echo "</tr>";
		}
	echo "</table>";
	exit;
}elseif ($do == "show_i_verify") { // 查看录入审核信息
    
    $vid = $_REQUEST['vid'];
    $sql ="select b.id,b.uid,b.mid,b.addtime,b.endtime,u.name,b.status,b.total_price,b.sale_price,GROUP_CONCAT(bg.goods_id) as goods_id from rv_buy as b,rv_buy_goods as bg,rv_user as u where b.id=bg.buy_id and b.uid=u.id and b.id=$vid";    
    $db->p_e($sql,array());
    $verify_info = $db->fetchRow();
    if($verify_info){
        $sql="select * from rv_buy_goods as bg, rv_goods as g where bg.goods_id=g.id and bg.goods_id and buy_id=?";
        $db->p_e($sql, array($verify_info[id]));
        $verify_info['goods']=$db->fetchAll();
    }
    $smt = new Smarty();
    smarty_cfg($smt);
    $smt->assign("verify_info", $verify_info);
    $smt->assign("flag", "show_i_verify");
    $smt->display('xslr_show.htm');
    exit();
}
//修改销售录入
if($do=='edit'){
    $vid=$_REQUEST['vid'];
    $sql="select * from rv_buy where id=$vid";
    $db->p_e($sql, array());
    $sales=$db->fetchRow();
    $sql="select name from rv_user where id=?";
    $db->p_e($sql, array($sales['uid']));
    $sales['uname']=$db->fetchRow()['name'];
    $sql="select name from rv_mendian where id=?";
    $db->p_e($sql, array($sales['mid']));
    $sales['mdname']=$db->fetchRow()['name'];
    $sql="select a.*,b.name,b.money from rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id where a.buy_id=? and a.goods_type=0";
    $db->p_e($sql, array($sales['id']));
    $sales['goods']=$db->fetchAll();  
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('sales',$sales);
    $smt->display('sales_edit.htm');
    exit();
}elseif($do=='update'){
    $id=$_POST['id'];
    $time=date("Y-m-d H:i:s",time());
    if($_POST){
        foreach($_POST['id'] as $key=>$val){
            $goods[$key]['id']=$_POST['id'][$key];
            $goods[$key]['goods_id']=$_POST['goods_id'][$key];
            $goods[$key]['count']=$_POST['count'][$key];
        }
        $arr=array($_POST['username'],$_POST['sex'],$_POST['age'],$_POST['tel'],$time,$_POST['address'],$_POST['sale_price'],$_POST['total_price'],$_POST['vid'],$_POST['uid'],$_POST['mid']);
        $sql="update rv_buy set username=?,sex=?,age=?,tel=?,addtime=?,address=?,sale_price=?,total_price=? where 1=1 and id=? and uid=? and mid=? limit 1";
        if($db->p_e($sql, $arr)){
            foreach($goods as $k=>$v){
                $arr=array($v['goods_id'],$v['count'],$v['id']);
                $sql="update rv_buy_goods set goods_id=?,count=? where id=? limit 1";
                $list.=$db->p_e($sql, $arr);
            }
            if($list){
                echo close($msg,"xslr_update");
            }else{
                echo  error($msg);
            }
        }     
    }   
}

if($do=='mendian'){
    If_rabc(); //检测权限
    $search='';
    $arr=array();   
    if($_POST['province']){
        $search .= "and b.provinceid like ? ";
        $arr[]="%".$_POST['province']."%";
    }
    
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
    $sqlcount="select count(*) from rv_buy as a left join rv_mendian as  b on a.mid=b.id where 1=1 ".$search." group by a.mid ";
    $db->p_e($sqlcount, $arr);
    $total=$db->rowCount();

    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id where 1=1 ".$search." group by a.mid order by sum desc LIMIT ".$pageNum.",".$numPerPage;
    $db->p_e($sql, $arr);
    $list=$db->fetchAll();  
    $sql="select * from rv_province";
    $db->p_e($sql, array());
    $province=$db->fetchAll();
    $smt=new Smarty();smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('province',$province);
    $smt->assign('pageNum',$_POST['pageNum']);
    $smt->assign('total',$total);
    $smt->display('xslr_mendian_show.htm');
    exit();
}

if($do=='daochu_mendian'){
    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id group by a.mid order by sum desc";
    $db->p_e($sql, array());
    $list=$db->fetchAll();
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
        echo "<tr>";
        echo "<th colspan='3'>所有门店销售额排行榜</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>排名</th>";
        echo "<th>门店名称</th>";
        echo "<th>总销售额（元）</th>";
        echo "</tr>";
        foreach($list as $k=>$v){
            echo "<tr>";
            echo "<td>".($k+1)."</td>";
            echo "<td>".$v['mdname']."</td>";
            echo "<td>".$v['sum']."</td>";
            echo "</tr>";
        }
    echo "</table>";
}

if($do=='md_day_show'){
    //门店按天排行
    $todaystart = strtotime(date('Y-m-d' . '00:00:00', time())); // 获取今天00:00
    $todayend = strtotime(date('Y-m-d' . '00:00:00', time() + 3600 * 24)); // 今日结束时间
    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id where UNIX_TIMESTAMP(a.addtime) BETWEEN ? AND ? group by a.mid order by sum desc";
    $db->p_e($sql, array(
        $todaystart,
        $todayend
    ));
    $day_list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('day_list',$day_list);
    $smt->display('xslr_md_day_show.htm');
    exit();
}

if($do=='daochu_mendian_day'){
    $todaystart = strtotime(date('Y-m-d' . '00:00:00', time())); // 获取今天00:00
    $todayend = strtotime(date('Y-m-d' . '00:00:00', time() + 3600 * 24)); // 今日结束时间
    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id where UNIX_TIMESTAMP(a.addtime) BETWEEN ? AND ? group by a.mid order by sum desc";
    $db->p_e($sql, array(
        $todaystart,
        $todayend
    ));
    $day_list=$db->fetchAll();
    $time=date(time());
    $todaystart=date("Y年m月d日",$todaystart);
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='3'>".$todaystart."所有门店销售额排行榜</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>排名</th>";
    echo "<th>门店名称</th>";
    echo "<th>总销售额（元）</th>";
    echo "</tr>";
    foreach($day_list as $k=>$v){
        echo "<tr>";
        echo "<td>".($k+1)."</td>";
        echo "<td>".$v['mdname']."</td>";
        echo "<td>".$v['sum']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if($do=='md_week_show'){
    //门店按周排行
    $sdefaultDate = date("Y-m-d"); // 当前日期
    $first = 1; // $first =1 表示每周星期一为开始日期 0表示每周日为开始日期
    $w = date('w', strtotime($sdefaultDate)); // 获取当前周的第几天 周日是 0 周一到周六是 1 - 6
    $week_s = date('Y-m-d', strtotime("$sdefaultDate -" . ($w ? $w - $first : 6) . ' days')); // 获取本周开始日期，如果$w是0，则表示周日，减去 6 天
    $week_start = strtotime("$sdefaultDate -" . ($w ? $w - $first : 6) . ' days');
    $week_end = strtotime("$week_s +6 days"); // 本周结束日期
    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id where UNIX_TIMESTAMP(a.addtime) BETWEEN ? AND ? group by a.mid order by sum desc";
    $db->p_e($sql, array(
        $week_start,
        $week_end
    ));
    $week_list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('week_list',$week_list);
    $smt->display('xslr_md_week_show.htm');
    exit();
}

if($do=='daochu_mendian_week'){
    $sdefaultDate = date("Y-m-d"); // 当前日期
    $first = 1; // $first =1 表示每周星期一为开始日期 0表示每周日为开始日期
    $w = date('w', strtotime($sdefaultDate)); // 获取当前周的第几天 周日是 0 周一到周六是 1 - 6
    $week_s = date('Y-m-d', strtotime("$sdefaultDate -" . ($w ? $w - $first : 6) . ' days')); // 获取本周开始日期，如果$w是0，则表示周日，减去 6 天
    $week_start = strtotime("$sdefaultDate -" . ($w ? $w - $first : 6) . ' days');
    $week_end = strtotime("$week_s +6 days"); // 本周结束日期
    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id where UNIX_TIMESTAMP(a.addtime) BETWEEN ? AND ? group by a.mid order by sum desc";
    $db->p_e($sql, array(
        $week_start,
        $week_end
    ));
    $week_list=$db->fetchAll();
    $week_start=date("Y年m月d日",$week_start);
    $week_end=date("Y年m月d日",$week_end);
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='3'>".$week_start."--".$week_end."所有门店销售额排行榜</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>排名</th>";
    echo "<th>门店名称</th>";
    echo "<th>销售额（元）</th>";
    echo "</tr>";
    foreach($week_list as $k=>$v){
        echo "<tr>";
        echo "<td>".($k+1)."</td>";
        echo "<td>".$v['mdname']."</td>";
        echo "<td>".$v['sum']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if($do=='md_month_show'){
    //门店按月排行
    $beginThismonth = mktime(0, 0, 0, date('m'), 1, date('Y')); // 本月开始时间
    $endThismonth = mktime(23, 59, 59, date('m'), date('t'), date('Y')); // 本月结束时间
    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id where UNIX_TIMESTAMP(a.addtime) BETWEEN ? AND ? group by a.mid order by sum desc";
    $db->p_e($sql, array(
        $beginThismonth,
        $endThismonth
    ));
    $month_list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('month_list',$month_list);
    $smt->display('xslr_md_month_show.htm');
    exit();
}

if($do=='daochu_mendian_month'){
    $beginThismonth = mktime(0, 0, 0, date('m'), 1, date('Y')); // 本月开始时间
    $endThismonth = mktime(23, 59, 59, date('m'), date('t'), date('Y')); // 本月结束时间
    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id where UNIX_TIMESTAMP(a.addtime) BETWEEN ? AND ? group by a.mid order by sum desc";
    $db->p_e($sql, array(
        $beginThismonth,
        $endThismonth
    ));
    $month_list=$db->fetchAll();
    $beginThismonth=date("Y年m月d日",$beginThismonth);
    $endThismonth=date("Y年m月d日",$endThismonth);
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='3'>".$beginThismonth."--".$beginThismonth."所有门店销售额排行榜</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>排名</th>";
    echo "<th>门店名称</th>";
    echo "<th>销售额（元）</th>";
    echo "</tr>";
    foreach($month_list as $k=>$v){
        echo "<tr>";
        echo "<td>".($k+1)."</td>";
        echo "<td>".$v['mdname']."</td>";
        echo "<td>".$v['sum']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if($do=='md_year_show'){
    //门店按年排行
    $year_start = strtotime(date("Y", time()) . "-1" . "-1"); // 本年开始
    $year_end = strtotime(date("Y", time()) . "-12" . "-31"); // 本年结束
    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id where UNIX_TIMESTAMP(a.addtime) BETWEEN ? AND ? group by a.mid order by sum desc";
    $db->p_e($sql, array(
        $year_start,
        $year_end
    ));
    $year_list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('year_list',$year_list);
    $smt->display('xslr_md_year_show.htm');
    exit();
}

if($do=='daochu_mendian_year'){
    $year_start = strtotime(date("Y", time()) . "-1" . "-1"); // 本年开始
    $year_end = strtotime(date("Y", time()) . "-12" . "-31"); // 本年结束
    $sql="select sum(a.total_price) as sum,b.name as mdname from rv_buy as a left join rv_mendian as b on a.mid=b.id where UNIX_TIMESTAMP(a.addtime) BETWEEN ? AND ? group by a.mid order by sum desc";
    $db->p_e($sql, array(
        $year_start,
        $year_end
    ));
    $year_list=$db->fetchAll();
    $year_start=date("Y年",$year_start);
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='3'>".$year_start."所有门店销售额排行榜</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>排名</th>";
    echo "<th>门店名称</th>";
    echo "<th>销售额（元）</th>";
    echo "</tr>";
    foreach($year_list as $k=>$v){
        echo "<tr>";
        echo "<td>".($k+1)."</td>";
        echo "<td>".$v['mdname']."</td>";
        echo "<td>".$v['sum']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if($do=='goods'){//按照产品排行排序
    If_rabc(); //检测权限
    $search='';
    $arr=array();
    if($_POST['name']){
        $search .= "and c.mid like ? ";
        $arr[]="%".$_POST['name']."%";
    }
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
    $sqlcount="select count(*) from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where 1=1 ".$search." group by a.goods_id";
    $db->p_e($sqlcount, $arr);
    $total=$db->rowCount();
    
    $sql="select sum(a.count) as sum,b.name as gname,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where 1=1 ".$search." group by a.goods_id order by total desc";
    $db->p_e($sql, $arr);
    $list=$db->fetchAll();
    
    if($_POST['name']){
        $sql="select name from rv_mendian where status=1 and type=0 and id=?";
        $db->p_e($sql, array($_POST['name']));
        $name=$db->fetchRow()['name'];
    }
   
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('list',$list);
    $smt->assign('total',$total);
    $smt->assign('name',$name);
    $smt->assign('pageNum',$pageNum);
    $smt->display('xslr_goods_show.htm');
    exit();
}

if($do=='search'){
    $name=$_POST['name'];
    $arr[]="%".$_POST['name']."%";
    $sql="select id,name from rv_mendian where status=1 and type=0 and name like ?";
    $db->p_e($sql, $arr);
    $name=$db->fetchAll();
    
    echo '{"code":"200","name":'.json_encode($name).'}';
    exit();
}

if($do=='daochu_goods'){
    $sql="select sum(a.count) as sum,b.name as gname,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id group by a.goods_id order by total desc";
    $db->p_e($sql, array());
    $list=$db->fetchAll();
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='5'>所有产品销售额排行榜</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>排名</th>";
    echo "<th>产品名称</th>";
    echo "<th>销售数量</th>";
    echo "<th>产品单价（元）</th>";
    echo "<th>销售额（元）</th>";
    echo "</tr>";
    foreach($list as $k=>$v){
        echo "<tr>";
        echo "<td>".($k+1)."</td>";
        echo "<td>".$v['gname']."</td>";
        echo "<td>".$v['sum']."(".$v['dw'].")</td>";
        echo "<td>".$v['money']."</td>";
        echo "<td>".$v['total']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if($do=='goods_day_show'){
    //产品按天排行
    $todaystart = strtotime(date('Y-m-d' . '00:00:00', time())); // 获取今天00:00
    $todayend = strtotime(date('Y-m-d' . '00:00:00', time() + 3600 * 24)); // 今日结束时间
    $sql="select sum(a.count) as sum,b.name as gname,b.money,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where UNIX_TIMESTAMP(c.addtime) BETWEEN ? AND ? group by a.goods_id order by total desc;";
    $db->p_e($sql, array(
        $todaystart,
        $todayend
    ));
    $g_day_list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('g_day_list',$g_day_list);
    $smt->display('xslr_goods_day_show.htm');
    exit();
}

if($do=='daochu_goods_day'){
    $todaystart = strtotime(date('Y-m-d' . '00:00:00', time())); // 获取今天00:00
    $todayend = strtotime(date('Y-m-d' . '00:00:00', time() + 3600 * 24)); // 今日结束时间
    $sql="select sum(a.count) as sum,b.name as gname,b.money,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where UNIX_TIMESTAMP(c.addtime) BETWEEN ? AND ? group by a.goods_id order by total desc;";
    $db->p_e($sql, array(
        $todaystart,
        $todayend
    ));
    $g_day_list=$db->fetchAll();
    $todaystart=date("Y年m月d日",$todaystart);
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='5'>".$todaystart."产品销售额排行榜</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>排名</th>";
    echo "<th>产品名称</th>";
    echo "<th>销售数量</th>";
    echo "<th>产品单价（元）</th>";
    echo "<th>销售额（元）</th>";
    echo "</tr>";
    foreach($g_day_list as $k=>$v){
        echo "<tr>";
        echo "<td>".($k+1)."</td>";
        echo "<td>".$v['gname']."</td>";
        echo "<td>".$v['sum']."(".$v['dw'].")</td>";
        echo "<td>".$v['money']."</td>";
        echo "<td>".$v['total']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if($do=='goods_week_show'){
    //产品按周排行
    $sdefaultDate = date("Y-m-d"); // 当前日期
    $first = 1; // $first =1 表示每周星期一为开始日期 0表示每周日为开始日期
    $w = date('w', strtotime($sdefaultDate)); // 获取当前周的第几天 周日是 0 周一到周六是 1 - 6
    $week_s = date('Y-m-d', strtotime("$sdefaultDate -" . ($w ? $w - $first : 6) . ' days')); // 获取本周开始日期，如果$w是0，则表示周日，减去 6 天
    $week_start = strtotime("$sdefaultDate -" . ($w ? $w - $first : 6) . ' days');
    $week_end = strtotime("$week_s +6 days"); // 本周结束日期
    $sql="select sum(a.count) as sum,b.name as gname,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where UNIX_TIMESTAMP(c.addtime) BETWEEN ? AND ? group by a.goods_id order by total desc;";
    $db->p_e($sql, array(
        $week_start,
        $week_end
    ));
    $g_week_list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('g_week_list',$g_week_list);
    $smt->display('xslr_goods_week_show.htm');
    exit();
}

if($do=='daochu_goods_week'){
    $sdefaultDate = date("Y-m-d"); // 当前日期
    $first = 1; // $first =1 表示每周星期一为开始日期 0表示每周日为开始日期
    $w = date('w', strtotime($sdefaultDate)); // 获取当前周的第几天 周日是 0 周一到周六是 1 - 6
    $week_s = date('Y-m-d', strtotime("$sdefaultDate -" . ($w ? $w - $first : 6) . ' days')); // 获取本周开始日期，如果$w是0，则表示周日，减去 6 天
    $week_start = strtotime("$sdefaultDate -" . ($w ? $w - $first : 6) . ' days');
    $week_end = strtotime("$week_s +6 days"); // 本周结束日期
    $sql="select sum(a.count) as sum,b.name as gname,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where UNIX_TIMESTAMP(c.addtime) BETWEEN ? AND ? group by a.goods_id order by total desc;";
    $db->p_e($sql, array(
        $week_start,
        $week_end
    ));
    $g_week_list=$db->fetchAll();
    $week_start=date("Y年m月d日",$week_start);
    $week_end=date("Y年m月d日",$week_end);
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='5'>".$week_start."--".$week_end."产品销售额排行榜</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>排名</th>";
    echo "<th>产品名称</th>";
    echo "<th>销售数量</th>";
    echo "<th>产品单价（元）</th>";
    echo "<th>销售额（元）</th>";
    echo "</tr>";
    foreach($g_week_list as $k=>$v){
        echo "<tr>";
        echo "<td>".($k+1)."</td>";
        echo "<td>".$v['gname']."</td>";
        echo "<td>".$v['sum']."(".$v['dw'].")</td>";
        echo "<td>".$v['money']."</td>";
        echo "<td>".$v['total']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if($do=='goods_month_show'){
    //产品按月排行
    $beginThismonth = mktime(0, 0, 0, date('m'), 1, date('Y')); // 本月开始时间
    $endThismonth = mktime(23, 59, 59, date('m'), date('t'), date('Y')); // 本月结束时间
    $sql="select sum(a.count) as sum,b.name as gname,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where UNIX_TIMESTAMP(c.addtime) BETWEEN ? AND ? group by a.goods_id order by total desc;";
    $db->p_e($sql, array(
        $beginThismonth,
        $endThismonth
    ));
    $g_month_list=$db->fetchAll();
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign('g_month_list',$g_month_list);
    $smt->display('xslr_goods_month_show.htm');
    exit();
}

if($do=='daochu_goods_month'){
    $beginThismonth = mktime(0, 0, 0, date('m'), 1, date('Y')); // 本月开始时间
    $endThismonth = mktime(23, 59, 59, date('m'), date('t'), date('Y')); // 本月结束时间
    $sql="select sum(a.count) as sum,b.name as gname,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where UNIX_TIMESTAMP(c.addtime) BETWEEN ? AND ? group by a.goods_id order by total desc;";
    $db->p_e($sql, array(
        $beginThismonth,
        $endThismonth
    ));
    $g_month_list=$db->fetchAll();
    $beginThismonth=date("Y年m月",$beginThismonth);
    $endThismonth=date("Y年m月",$endThismonth);
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='5'>".$beginThismonth."--".$endThismonth."产品销售额排行榜</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>排名</th>";
    echo "<th>产品名称</th>";
    echo "<th>销售数量</th>";
    echo "<th>产品单价（元）</th>";
    echo "<th>销售额（元）</th>";
    echo "</tr>";
    foreach($g_month_list as $k=>$v){
        echo "<tr>";
        echo "<td>".($k+1)."</td>";
        echo "<td>".$v['gname']."</td>";
        echo "<td>".$v['sum']."(".$v['dw'].")</td>";
        echo "<td>".$v['money']."</td>";
        echo "<td>".$v['total']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

if($do=='goods_year_show'){
    //产品按年排行
    $year_start = strtotime(date("Y", time()) . "-1" . "-1"); // 本年开始
    $year_end = strtotime(date("Y", time()) . "-12" . "-31"); // 本年结束
    $sql="select sum(a.count) as sum,b.name as gname,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where UNIX_TIMESTAMP(c.addtime) BETWEEN ? AND ? group by a.goods_id order by total desc;";
    $db->p_e($sql, array(
        $year_start,
        $year_end
    ));
    $g_year_list=$db->fetchAll();
    
    $smt=new Smarty();
    smarty_cfg($smt);
    $smt->assign("g_year_list", $g_year_list);
    $smt->display('xslr_goods_year_show.htm');
    exit();
}

if($do=='daochu_goods_year'){
    $year_start = strtotime(date("Y", time()) . "-1" . "-1"); // 本年开始
    $year_end = strtotime(date("Y", time()) . "-12" . "-31"); // 本年结束
    $sql="select sum(a.count) as sum,b.name as gname,b.money,(sum(a.count)*b.money) as total,b.dw from (rv_buy_goods as a left join rv_goods as b on a.goods_id=b.id)left join rv_buy as c on a.buy_id=c.id where UNIX_TIMESTAMP(c.addtime) BETWEEN ? AND ? group by a.goods_id order by total desc;";
    $db->p_e($sql, array(
        $year_start,
        $year_end
    ));
    $g_year_list=$db->fetchAll();
    $year_start=date("Y年",$year_start);
    $time=date(time());
    header("Content-Type: application/vnd.ms-excel;charset=gbk");
    header("Content-Disposition: attachment; filename=".$time.".xls");
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th colspan='5'>".$year_start."产品销售额排行榜</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>排名</th>";
    echo "<th>产品名称</th>";
    echo "<th>销售数量</th>";
    echo "<th>产品单价（元）</th>";
    echo "<th>销售额（元）</th>";
    echo "</tr>";
    foreach($g_year_list as $k=>$v){
        echo "<tr>";
        echo "<td>".($k+1)."</td>";
        echo "<td>".$v['gname']."</td>";
        echo "<td>".$v['sum']."(".$v['dw'].")</td>";
        echo "<td>".$v['money']."</td>";
        echo "<td>".$v['total']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>