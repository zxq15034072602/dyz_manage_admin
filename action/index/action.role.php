<?php
if(!defined('CORE'))exit("error!"); 
//角色页面权限
function checkbox_role_action($row_action){
	global $action_cn;	
	$action=explode(',',$row_action);
	$i=1;
	foreach($action_cn as $key=>$val){
		if($key!="0"){
			$cbox .='<div style="margin-bottom:10px;width:100%;border:solid 1px #ccc;padding:10px;line-height;16px;position:relative;">';
			$cbox .='<i style="position:absolute;left:20px;top:-10px;background-color:#fff;font-style:normal"><input type="checkbox" onclick="qx(this,\''.$key.'\')"><span>全选</span></i>';
			foreach($val as $k=>$v){
				if(in_array($k,$action)){
					$cbox .='<span style="display:inline-block;width:30%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis"><input name="action[]" tt="'.$key.'" type="checkbox" value="'.$k.'" checked="checked">'.$v.'</span>';
				}else{
					$cbox .='<span style="display:inline-block;width:30%;overflow:hidden;white-space:nowrap;text-overflow:ellipsis"><input name="action[]" tt="'.$key.'" type="checkbox" value="'.$k.'">'.$v.'</span>';
				}
			}
			$cbox .='</div>';
		}
	}
	return $cbox;
}
//列表	
if($do==""){
	If_rabc(); //检测权限
	$sqlcount ="SELECT count(*) FROM `rv_role` where 1=1 ";
	if($_POST['title']){
		$search .= "and title like ? ";
		$arr[]="%".$_POST['title']."%";
	}
	//设置分页
	if($_POST[numPerPage]==""){
		$numPerPage="20";
	}else{	
		$numPerPage=$_POST[numPerPage];
	}
	if($_POST[pageNum]==""||$_POST[pageNum]=="0" ){$pageNum="0";}else{$pageNum=($_POST[pageNum]-1)*$numPerPage;}
	$sql1=$sqlcount.$search;
	$db->p_e($sql1,$arr);
	$total=$db->fetch_count();//总条数
	
	//查询
	$sql="SELECT * FROM `rv_role` where 1=1 ".$search." LIMIT ".$pageNum.",".$numPerPage;
	$db->p_e($sql,$arr);
	$list=$db->fetchAll();
	
	//格式化输出数据
	foreach($list as $key=>$val){
		if($key%2==0){
			$list[$key][rowcss]="listOdd";
		}else{
			$list[$key][rowcss]="listEven";
		}
		$list[$key][role_cn]=$role_cn[$list[$key][role_id]];		
	}
	
	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('total',$total);
	$smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
	$smt->assign('pageNum',$_POST[pageNum]); //当前页数
	$smt->assign('title',"角色列表");
	$smt->display('role_list.htm');
	exit;
	
}


//面板	
if($do=="new"){	
	If_rabc(); //检测权限
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('checkbox_role_action',checkbox_role_action());
	$smt->assign('title',"新建角色");
	$smt->display('role_new.htm');
	exit;
}

//编辑	
if($do=="edit"){
	If_rabc(); //检测权限	
	//查询
	$sql="SELECT * FROM `rv_role` where id=? LIMIT 1";
	$db->p_e($sql,array($id));
	$row=$db->fetchRow();
	$smt = new smarty();smarty_cfg($smt);
	//模版
	$smt->assign('checkbox_role_action',checkbox_role_action($row[action]));
	$smt->assign('row',$row);
	$smt->assign('title',"编辑角色");
	$smt->display('role_edit.htm');
	exit;
}

//写入
if($do=="add"){
	If_rabc(); //检测权限
	$action=implode(',',$_POST[action]);
	$sql="INSERT INTO `rv_role` (`title` ,`action`)	VALUES ( ?,?)";
	$arr=array($_POST[title],$action);
	if($db->p_e($sql,$arr)){echo close($msg,"role");}else{echo  error($msg);}
	exit;
}

//更新
if($do=="updata"){
	If_rabc(); //检测权限
	$id=$_POST['id'];
	$action=implode(',',$_POST[action]);
	$sql="UPDATE `rv_role` SET `title` = ?,`action` = ? WHERE `rv_role`.`id` =? LIMIT 1 ;";
	$arr=array($_POST[title],$action,$id);
	if($db->p_e($sql,$arr)){echo close($msg,"role");}else{echo  error($msg);}	
	exit;
}
?>