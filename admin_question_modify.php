<?php
  require_once('conn.php');
  $id = isset($_GET["id"]) ? $_GET["id"] : "";
  if(empty($id) || !is_numeric($id)){
	  mysql_close($conn);
	  die("<script language='javascript' type='text/javascript'>alert('问题参数id不能为空且只能是数字!');history.back(1);</script>");
  }
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  if($action=="save"){
	  $tid = $_POST["tid"];
	  if(empty($tid) || !is_numeric($tid)){
		  mysql_close($conn);
		  errormsg("问题参数id不能为空且只能是数字");
		  exit();
	  }
	  $question=$_POST["question"];
	  echo $question;
	  if($question==""){
		  mysql_close($conn);
		  errormsg("投票答案名称不能为空!");
		  exit();
	  }
	
	  
	  $qry = mysql_query("select * from xh_title where id=".$tid,$conn);
	   
	  
	  $query = mysql_query("select * from xh_question where id=".$id,$conn);
	  if($row=mysql_fetch_array($query)){
		  if($imgurl!=$row["imgurl"]){
			  if(file_exists($row["imgurl"])){
				  @unlink($row["imgurl"]);
			  }
		  }
	  }
	  mysql_query("update xh_question set question='".$question."',tid=".$tid." where id=".$id,$conn);
	 
	 
	  mysql_close($conn);
	  successmsg("投票问题信息修改成功!");
	  exit();
  }  
  $qry = mysql_query("select * from xh_question where id=".$id,$conn);
  $tid="";$question="";$tps="";$imgurl="";$linkurl="";
  if($row=mysql_fetch_array($qry)){
	  $tid=$row["tid"];
	  $question=$row["question"];
	  
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
	 if(form3.tid.selectedIndex==-1)
	 {
		 document.getElementById("lbltid").innerHTML = "<font color='red'>标题选择不能为空</font>";
		 form3.tid.focus();
		 return false;
	 }
	 else
	 {
		 document.getElementById("lbltid").innerHTML = "";
	 }
     if(form3.question.value=="")
	 {
		 document.getElementById("lblquestion").innerHTML = "<font color='red'>答案名称不能为空</font>";
		 form3.question.focus();
		 return false;
	 }
	 else
	 {
		 document.getElementById("lblquestion").innerHTML = "";
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
          <td id="TableTitle1"> 修改投票答案-&gt;</td>
		 </tr>
	   </table>
	 </td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="?act=save&id=<?php echo $id; ?>" name="form1" id="form1" method="post" onSubmit="return check();">
          <tr id="TableTitle2">
            <td align="center" colspan="2" bgcolor="#BFDFFF"><b>设置投票答案</b></td>
          </tr>
          <tr>
            <td align="right">选择投票问题：</td>
            <td><select name="tid" id="tid">               
			  
					
                    <?php
					$tqry = mysql_query("select * from xh_title",$conn);
					while($trow=mysql_fetch_array($tqry)){					
						?>
                        <option value="<?php echo $trow["id"];?>" <?php echo $tid==$trow["id"] ? "selected" : ""; ?>><?php echo $trow["title"]; ?></option>
                        <?php                        
					}
					mysql_free_result($tqry);
					?>
					
				
              </select><label id="lbltid" name="lbltid"></label></td>
          </tr>
          <tr>
            <td width="20%" align="right">投票答案名称：</td>
            <td><input type="text" name="question" size="25" value="<?php echo $question;?>"><label id="lblquestion" name="lblquestion"></label></td>
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