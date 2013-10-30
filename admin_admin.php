<?php 	require_once('conn.php');
		$action = isset($_GET["act"]) ? $_GET["act"] : "";
		if($action=="save"){		  
		  $sql="update `xh_config` set `username`='".trim(htmlspecialchars($_POST["username"],ENT_QUOTES))."',`password`='".md5($_POST["password"])."'";
		  mysql_query($sql,$conn);
		  if(mysql_errno($conn)==0){
			  successmsg("管理员信息修改成功!");
		  }else{
			  errormsg('管理员信息修改未成功');
		  }
		  exit();
		}
?>
<html>
<head>
<?php  
  head();
  check();
?>
<title>【枝江英杰学校学生评教系统】后台管理中心</title>
</head>
<script language="javascript" type="text/javascript">
function checkfrm(){
	if(form1.username.value==""){
		lbluser.innerHTML = "登录名不能为空！";
		form1.username.focus();
		return false;}
	else{
		lbluser.innerHTML = "";}	
	if(form1.password.value==""){
		lblpass.innerHTML = "密码不能为空！";
		form1.password.focus();
		return false;}
	else{
		lblpass.innerHTML = "";}	
	if(form1.password1.value!=form1.password.value){
		lblpass1.innerHTML = "两次密码不一致！";
		form1.password1.focus();
		return false;}
	else{
		lblpass1.innerHTML = "";}	
	return true;
	}		
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	<table width="100%" id="table2" cellspacing="1">
	 <tr>
      <td id="TableTitle1"> 修改管理员信息-&gt;</td>
     </tr>
	 </table>
	 </td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="?act=save" method="post" name="form1" onSubmit="return checkfrm()">
          <tr>
            <td width="20%" align="right">管理员名称：</td>
            <td><input type="text" name="username" value="<?php echo $_SESSION["admin"] ?>"><label id="lbluser" name="lbluser"></label></td>
          </tr>
          <tr>
            <td width="20%" align="right">管理员密码：</td>
            <td><input type="password" name="password"><label id="lblpass" name="lblpass"></label></td>
          </tr>
          <tr>
            <td width="20%" align="right">重复密码：</td>
            <td><input type="password" name="password1"><label id="lblpass1" name="lblpass1"></label></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#BFDFFF"><input class="btn" type="submit" name="submit" value=" 修 改 "></td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($conn);?>