<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//学生登录验证程序　@created on 2006-05-09 18:28
session_start();
include("head.php");
include("conn.php");
if(session_is_registered(student_num))
{
	echo "<script language=javascript>";
	echo "location.href='teacher_list.php'";
	echo "</script>";
	exit;
}
else
{	
	$query="select * from students where number='$number' and name='$name'";
	$result=mysql_query($query,$link);
	if(mysql_num_rows($result)==1)
	{
		session_register(student_num);
		$student_num=$number;
		echo "<script language=javascript>";
	    echo "location.href='teacher_list.php'";
	    echo "</script>";
		exit;
	}
	else
	{
		echo "<p>&nbsp;</p><p>&nbsp;</p>";
		echo "<center><font size=4 color=red>学号或密码错误！请重新<a href=stu_login.php>登录</a>！";
		echo "</center>";
	}
}
?>