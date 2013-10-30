<?php
//学生登录验证程序　@created on 2006-05-09 18:28
session_start();
$connect=mysql_connect("localhost","root","123456") or die("could not connect to database");

mysql_select_db("000",$connect) or die (mysql_error());
mysql_query("set names gbk");
if(session_is_registered(stu))
{
	echo "<script language=javascript>";
	echo "location.href='cjcx.php'";
	echo "</script>";
	exit;
}
else
{	
	$query="select * from cj where num='$num' and name='$name'";
	$result=mysql_query($query,$link);
	if(mysql_num_rows($result)==1)
	{
		session_register(student_num);
		$student_num=$number;
		echo "<script language=javascript>";
	    echo "location.href='cjcx.php'";
	    echo "</script>";
		exit;
	}
	else
	{
		echo "<p>&nbsp;</p><p>&nbsp;</p>";
		echo "<center><font size=4 color=red>学号或姓名错误！请重新<a href=stu_login.php>登录</a>！";
		echo "</center>";
	}
}
?>