<?php
	//====================================================
	//		FileName: index.php
	//		Summary:  程序入口文件
	//====================================================
	header("Content-type: text/html; charset=utf-8");
	session_start();

	ini_set("display_error","on");

	error_reporting(0);

	//配置数据库
	$Config['dsn']="mysql:dbname=dyz;host=127.0.0.1;charset=utf8";     //数据库主机名
	$Config['name']="root";		    //数据库用户名
	$Config['password']="root"; 				//数据库密码
	//$Config['db']="mysql:dbname=test;";   			//数据库名称
	//引入类库及公共方法
	define("CORE",true); 	    //根目录    dirname(string path)返回路径中的目录部分
    define('IS_POST', $_SERVER['REQUEST_METHOD'] =='POST' ? true : false);
	define('IS_GET', $_SERVER['REQUEST_METHOD'] =='GET' ? true : false);

	require("lib/db.class.php"); 
	require("lib/image.class.php"); 
	require("lib/smarty.class.php"); 
	require("lib/func.class.php");
	require("lib/func_sql.class.php");
	require("lib/rabc.class.php");
	require("lib/phpqrcode.php");

	//操作值
	$dir=$_GET['dir']??'index';
	$action=$_GET['action']??'index'; 	 //get action值     判断action的get传值是否为空，如果为空则返回空，否则返回action的Get传值
	$do=$_GET['do']??'';			 	 //get do值
	$id=$_GET['id']??'';			 	 //get id值

    
	//执行页面
	if(file_exists('action/'.$dir.'/action.'.$action.'.php')){
		include('action/'.$dir.'/action.'.$action.'.php'); 
	}else{
		echo "404!";
	}
	exit;
	