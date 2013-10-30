<?php 
 require_once('conn.php'); 
?>
<html>
<head>
<?php head()?>
<title>【<?php echo $cfg->getwebname();?>学生评教系统】后台管理</title>
</head>
<script language="javascript" type="text/javascript">
function check(){
	if(form1.username.value=="")
	{
		lbluser.innerHTML = "用户名不能为空！";
		form1.username.focus();
		return false;
	}
	else
	{
		lbluser.innerHTML = "";
	}
			
	if(form1.password.value=="")
	{
		lblpass.innerHTML = "密码不能为空！";
		form1.password.focus();
		return false;
	}
	else
	{
		lblpass.innerHTML = "";
	}
			
	if(form1.yz.value=="")
	{
		lblyz.innerHTML = "验证码不能为空！";
		form1.yz.focus();
		return false;
	}	
	else
	{
		lblyz.innerHTML = "";
	}		
	return true;
}
window.onload=function()
{
	form1.username.focus();
}
</script>
<body>
<?php
	$action = isset($_GET["act"]) ? $_GET["act"] : "";	
	if($action=="login"){	 
	 $sql = "select * from xh_config where username='".trim($_POST["username"])."' and password='".md5($_POST["password"])."'";
	 $query = mysql_query($sql,$conn);
	 if($_SESSION["code"]!=$_POST["yz"]){
		 mysql_close($conn);
		 failmsgbox('验证码输入不正确');
	 }
	 if(mysql_num_rows($query)<=0){
		 mysql_close($conn);
		 failmsgbox('用户名或密码错误!');
	 }else{
		 $row=mysql_fetch_array($query);
		 $_SESSION["admin"]=$row["username"];
		 mysql_free_result($query);
		 mysql_close($conn);
		 redirect("admin_index.php");
	 }	 
	}
	else if($action=="logout"){	
		logout();
	}
 
?>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="table1" style="border-collapse: collapse">
		<tr>
			<td valign="top">
				<table width="40%" border="1" align="center" cellpadding="5" cellspacing="1" bgcolor="#BFDFFF" id="table2" style="border-collapse: collapse; margin-top:50px;">
					<form action='?act=login' method="post" name="form1" onSubmit="return check()">
					<tr id="TableTitle2">
						<th colspan="2">【<?php echo $cfg->getwebname();?>学生评教系统】后台管理登录</th>
					</tr>
					<tr>
						<td width="40%" align="right" bgcolor="#ECF5FF"><b>用户名：</b></td>
						<td bgcolor="#ECF5FF"><input type="text" name="username"><label id="lbluser"></label></td>
					</tr>
					<tr>
						<td width="40%" align="right" bgcolor="#ECF5FF"><b>密&nbsp; 码：</b></td>
						<td bgcolor="#ECF5FF"><input type="password" name="password"><label id="lblpass"></label></td>
					</tr>
					<tr>
						<td align="right" bgcolor="#ECF5FF"><b>验证码：</b></td>
						<td bgcolor="#ECF5FF"><input type="text" name="yz" size="8">&nbsp;<img src="getcode.php" onClick="this.src='getcode.php'">&nbsp;<label id="lblyz">只支持大写字母</label></td>
					</tr>
					<tr>
					  <td height="30" colspan="2" align="center" bgcolor="#ECF5FF"><input class="btn" type="submit" name="submit" value="登 陆"> <input class="btn" type="reset" name="reset" value="取 消"></td>
					</tr>
                     <tr >
						<th colspan="2">程序设计：<a href="http://www.0717sh.com" target="_blank">枝江生活热线</a>   技术支持：<a href="http://www.168oo.com" target="_blank">枝江赛腾网络科技</a></th>
					</tr>
					</form>
			  </table>
		  </td>
		</tr>
</table>
</body>
</html>
<?php mysql_close($conn);?>