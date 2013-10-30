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
	
	 $class_name = $_POST["class_name"];
	 
	 $class_num=$_POST["class_num"];
	 if(empty($class_name)){
		 errormsg('班级名称不能为空!');
		 exit();
	 }else{		 
		 $query= mysql_query("select * from class where class_name='".$class_name."' and class_num='".$class_num."'",$conn);
		 if(mysql_num_rows($query)>0){
			 mysql_free_result($query);
		     mysql_close($conn);
			 errormsg('已经存在此班级!');			 
			 exit();
		 }
		 mysql_free_result($query);		 
	 }	 
	 $query = mysql_query("update class set class_name='".$class_name."', class_num='".$class_num."' where id=".$id,$conn);
	 mysql_close($conn);
	 successmsg('修改班级信息成功!');
	 exit();
 }
 
 $class_name="";
 $class_num="";
 
 $query= mysql_query("select * from class where id=".$id,$conn);
 while($row=mysql_fetch_array($query))
 {
	 
	 $class_name=$row["class_name"];
	 $class_num=$row["class_num"];
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
		lblteacher.innerHTML = "班级名称不能为空！";
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
          <td id="TableTitle1"> 修改班级-&gt;</td>
		 </tr>
	   </table>
	</td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="?act=save&id=<?php echo $id;?>" method="post" name="form1" onSubmit="return check()">
       
          <tr>
            <td width="20%" align="right">班级名称：</td>
            <td><input type="text" name="class_name" size="25" value="<?php echo $class_name;?>"></td>
          </tr>
          
           <tr>
            <td width="20%" align="right">班级编号：</td>
            <td><input type="text" name="class_num" size="25" value="<?php echo $class_num;?>"></td>
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