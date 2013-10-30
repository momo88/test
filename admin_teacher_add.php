<?php  
	  require_once('conn.php');
	  $action = isset($_GET["act"]) ? $_GET["act"] : "";
	  if($action=="save"){
		 
		 $query = mysql_query("select * from teacher where teacher='".$_POST["course"]."'",$conn);
		 if(mysql_num_rows($query)>0){
			 mysql_free_result($query);
			 mysql_close($conn);
			 errormsg("该科目老师已经存在!");			 
			 exit();
		 }		
		 $query = mysql_query("insert into teacher(teacher) values('".$_POST["teacher"]."')",$conn);
		 successmsg("添加科目老师成功!");
		 mysql_close($conn);		 
		 exit();
	 }
?>
<html>
<head>
<?php 
  head();
  check();
?>
<title>枝江英杰学校学生评教系统</title>
</head>
<script language="javascript" type="text/javascript">
function checkfrm(){
	if(form1.teacher.value==""){
		lblteacher.innerHTML = "科目老师不能为空！";
		form1.teacher.focus();
		return false;}

	return true;
}
</script>
<?php

?>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	   <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 添加科目老师信息-&gt;</td>
		 </tr>
	   </table>
	 </td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="?act=save" method="post" name="form1" onSubmit="return checkfrm()">
          <tr>
            <td width="20%" align="right">科目名称：</td>
            <td><input type="text" name="teacher" size="25"><label id="lblteacher"></label></td>
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