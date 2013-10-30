<?php 
  require_once('conn.php');  
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  if($action=="save"){
	  $tid=$_POST["tid"];
	  
	  $question=$_POST["question"];
	 
	 if(empty($tid) || !is_numeric($tid)){
		 mysql_close($conn);
		 errormsg("标题参数不能为空且只能是数字!");
		 exit;
	 }

	 if($question==""){
		 mysql_close($conn);
		 errormsg("投票问题不能为空!");
		 exit();
	 }else{
		 $qry = mysql_query("select * from xh_question where question='".$question."' and tid=".$tid,$conn);
		 if(mysql_num_rows($qry)>0){
			 mysql_free_result($qry);
			 mysql_close($conn);
			 errormsg("在同一标题该投票问题已经存在!");			 
			 exit();
		 }
		 mysql_free_result($qry);		 
	 }	 
	 $qry = mysql_query("select * from xh_title where id=".$tid,$conn);
    

	
	 $cmd="insert into xh_question(question,tid) values('".$question."',".$tid.")";
	 $ins = mysql_query($cmd,$conn);
	
	 mysql_free_result($qry);
	 mysql_close($conn);
	 successmsg("添加投票问题成功!");
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
<script language="javascript" type="text/javascript">
function isnum(sText)
{
	var validChars="0123456789";
	var isnumber = true;
	for(i=0;(i<sText.length) &&(isnumber);i++)
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
		document.getElementById("lbltid").innerHTML = "<font color='red'>投票问题不能为空</font>";
		form3.tid.focus();
		return false;
	}
	else
	{
		document.getElementById("lbltid").innerHTML = "";
	}
	if(form3.question.value=="")
	{
		
		document.getElementById("lblquestion").innerHTML = "<font color='red'>投票答案名称不能为空</font>";
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
</head>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td><table width="100%" id="table2" cellspacing="1">
        <tr>
          <td id="TableTitle1"> 添加投票答案-&gt;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="?act=save" name="form1" id="form1" method="post" onSubmit="return check();">
          <tr id="TableTitle2">
            <td align="center" colspan="2" bgcolor="#BFDFFF"><b>设置投票答案</b></td>
          </tr>
          <tr>
            <td align="right">选择投票问题：</td>
            <td><select name="tid" id="tid">
              <?php			   
			  
				   $tqry = mysql_query("select * from xh_title order by id asc",$conn);
				   while($trow=mysql_fetch_array($tqry))
				   {
					   echo "<option value='".$trow["id"]."'>".$trow["title"]."</option>";
				   }
				   mysql_free_result($tqry);
				   echo "</optgroup>";
			  
			   mysql_free_result($sqry);			   
			  ?>
              </select>
			  <label id="lbltid" name="lbltid"></label>
            </td>
          </tr>
          <tr>
            <td width="20%" align="right">投票答案名称：</td>
            <td><input type="text" name="question" id="question" size="25"><label id="lblquestion" name="lblquestion"></label>
            </td>
          </tr>
       
          <tr>
            <td colspan="2" align="center"><input class="btn" type="submit" name="submit" value=" 添 加 "></td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($conn);?>