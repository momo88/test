<?php
  require_once('conn.php');
  $id = isset($_GET["id"]) ? $_GET["id"] : "";
  if(empty($id) || !is_numeric($id)){
	  mysql_close($conn);
	  die("<script language='javascript' type='text/javascript'>alert('参数id不能为空且只能是数字!');history.back(1);</script>");
  }
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  if($action=="save"){
	  $class_num = $_POST["class_num"];
	  if(empty($class_num) || !is_numeric($class_num)){
		  mysql_close($conn);
		  errormsg("参数id不能为空且只能是数字");
		  exit();
	  }
	  $name=$_POST["name"];
	  $number=$_POST["number"];
	  echo $name;
	  if($name==""){
		  mysql_close($conn);
		  errormsg("学生姓名不能为空!");
		  exit();
	  }else if($number==""){
		  mysql_close($conn);
		  errormsg("学号不能为空!");
		  exit();
	  }else{		 
		 $query= mysql_query("select * from students where number='".$number."' and class_num='".$class_num."'",$conn);
		 if(mysql_num_rows($query)>0){
			 mysql_free_result($query);
		     mysql_close($conn);
			 errormsg('已经存在此学生!');			 
			 exit();
		 }
		 mysql_free_result($query);		 
	 }	 

	  $query = mysql_query("select * from students where id=".$id,$conn);
	 
	  mysql_query("update students set name='".$name."',class_num=".$class_num.", number=".$number." where id=".$id,$conn);
	 
	 
	  mysql_close($conn);
	  successmsg("投票问题信息修改成功!");
	  exit();
  }  
  $qry = mysql_query("select * from students where id=".$id,$conn);
  $class_num="";$name="";
  if($row=mysql_fetch_array($qry)){
	  $class_num=$row["class_num"];
	  $name=$row["name"];
	  $number=$row["number"];
  }else{
	  mysql_free_result($qry);
	  mysql_close($conn);
	  errormsg("该问题答案不存在或被删除!");	  
	  exit();
  }
  mysql_free_result($qry);  
?>
<html>
<head>
<?php
 head();
 check();
?>
<title>【雪晖投票系统】后台管理中心</title>
</head>
<script language="javascript" type="text/javascript">
 function isnum(sText)
 {
	 var validChars = "0123456789";
	 var isnumber = true;
	 for(i=0;(i<sText.length) && isnumber;i++)
	 {
		 ch = sText.charAt(i);
		 if(validChars.indexOf(ch)==-1)
		 {
			 isnumber=false;
		 }
	 }
	 return isnumber;
 }
 function check()
 {
	 if(form3.number.selectedIndex==-1)
	 {
		 document.getElementById("lblnumber").innerHTML = "<font color='red'>学号不能为空</font>";
		 form3.number.focus();
		 return false;
	 }
	 else
	 {
		 document.getElementById("lblnumber").innerHTML = "";
	 }
     if(form3.name.value=="")
	 {
		 document.getElementById("lblname").innerHTML = "<font color='red'>姓名不能为空</font>";
		 form3.name.focus();
		 return false;
	 }
	 else
	 {
		 document.getElementById("lblname").innerHTML = "";
	 }
	
	 return true;
 }

</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	   <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 修改学生信息-&gt;</td>
		 </tr>
	   </table>
	 </td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="?act=save&id=<?php echo $id; ?>" name="form1" id="form1" method="post" onSubmit="return check();">
          <tr id="TableTitle2">
            <td align="center" colspan="2" bgcolor="#BFDFFF"><b>设置学生信息</b></td>
          </tr>
          <tr>
            <td align="right">选择班级：</td>
            <td><select name="class_num" id="class_num">               
			  
					
                    <?php
					$tqry = mysql_query("select * from class",$conn);
					while($trow=mysql_fetch_array($tqry)){					
						?>
                        <option value="<?php echo $trow["class_num"];?>" <?php echo $class_num==$trow["class_num"] ? "selected" : ""; ?>><?php echo $trow["class_name"]; ?></option>
                        <?php                        
					}
					mysql_free_result($tqry);
					?>
					
				
              </select><label id="lblclass_num" name="lblclass_num"></label></td>
          </tr>
           <tr>
            <td width="20%" align="right">学号：</td>
            <td><input type="text" name="number" size="25" value="<?php echo $number;?>"><label id="lblnumber" name="lblnumber"></label></td>
          </tr>
          <tr>
            <td width="20%" align="right">学生姓名：</td>
            <td><input type="text" name="name" size="25" value="<?php echo $name;?>"><label id="lblname" name="lblname"></label></td>
          </tr>
          
          <tr>
            <td colspan="2" align="center"><input class="btn" type="submit" name="submit" value=" 修 改 "></td>
          </tr>
        </form>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($conn); ?>