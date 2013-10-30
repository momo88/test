<?php
    header("Content-type:text/html;charset=utf-8");
	$conn=mysql_connect("localhost","admin","admin");
	if(!$conn){
		die("Can not connect:".mysql_error());
	}
	$dbconn=mysql_select_db("pj");
	if(!$dbconn){
		die("Can not select this database:".mysql_error($conn));
	}
	@session_start();//启动session会话
	mysql_query("SET NAMES 'utf8'");//设置字符集和页面代码统一
	require_once("function.php");//加载函数库
	require_once("config.php");//加载配置信息
?>