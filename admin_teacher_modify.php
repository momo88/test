<?php
  require_once('conn.php');
  $id = isset($_GET["id"]) ? $_GET["id"] : "";
  if(empty($id) || !is_numeric($id)){
	  mysql_close($conn);
	  die("<script>alert('id不能为空，且只能为数字!');</script>");
  }
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  //修改投票问题
 if($action=="save"){
	
	 $title = $_POST["teacher"];
	 
	 if(empty($teacher)){
		 errormsg('科目老师不能为空!');
		 exit();
	 }else{		 
		 $query= mysql_query("select * from teacher where teacher='".$teacher."' ",$conn);
		 if(mysql_num_rows($query)>0){
			 mysql_free_result($query);
		     mysql_close($conn);
			 errormsg('已经存在此老师!');			 
			 exit();
		 }
		 mysql_free_result($query);		 
	 }	 
	 $query = mysql_query("update teacher set teacher='".$teacher."' where id=".$id,$conn);
	 mysql_close($conn);
	 successmsg('修改科目老师信息成功!');
	 exit();
 }
 $sid="";
 $title="";
 $ms="";
 $listtype="";
 $listrows="";
 $query= mysql_query("select * from teacher where id=".$id,$conn);
 while($row=mysql_fetch_array($query))
 {
	 
	 $teacher=$row["teacher"];
	 
 }
 mysql_free_result($query); 
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

	if(form1.teacher.value==""){
		lblteacher.innerHTML = "科目老师不能为空！";
		form1.teacher.focus();
		return false;}	
	else{
		lblteacher.innerHTML = "";}	
	return true;
	}
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	   <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 修改科目老师-&gt;</td>
		 </tr>
	   </table>
	</td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="?act=save&id=<?php echo $id;?>" method="post" name="form1" onSubmit="return check()">
       
          <tr>
            <td width="20%" align="right">科目名称：</td>
            <td><input type="text" name="teacher" size="25" value="<?php echo $teacher;?>"></td>
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
<?php mysql_close($conn); ?>