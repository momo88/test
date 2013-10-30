<?php 
  require_once('conn.php');
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  if($action=="save"){
	
	$title = $_POST["title"];
	if(empty($title)){
		mysql_close($conn);
		errormsg("标题不能为空!");
		exit();
	}else{		
		$query = mysql_query("select * from xh_title where title='".$title."' ",$conn);
		if(mysql_num_rows($query)>0){
			mysql_free_result($query);
			mysql_close($conn);
			errormsg('该标题名称已经存在!');			
			exit();
		}
		mysql_free_result($query);		
	}	
	$cmd = "insert into xh_title(title) values('".$_POST["title"]."')";	
	$ins = mysql_query($cmd,$conn);
	mysql_close($conn);
	successmsg('添加投票问题成功!');
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
<script language="javascript" type='text/javascript'>
function check(){
	
	if(form1.title.value==""){
		lbltitle.innerHTML = "投票问题不能为空！";
		form1.title.focus();
		return false;}	
	else{
		lbltitle.innerHTML = "";}	
	return true;
	}
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
      <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 添加投票问题-&gt;</td>
		 </tr>
	   </table>
  </tr>
  <tr>
    <td>
	   <table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="?act=save" method="post" name="form1" onSubmit="return check()">
         
          <tr>
            <td width="20%" align="right">投票问题名称：</td>
            <td><input type="text" name="title" size="25"><label id="lbltitle"></label></td>
          </tr>
       	  
          <tr>
            <td colspan="2" align="center" bgcolor="#BFDFFF"><input class="btn" type="submit" name="submit" value=" 添 加 "></td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($conn);?>