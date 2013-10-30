
<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

 require_once('conn.php'); 
 
 {
	
	if(!isset($_SESSION["stu"]) || $_SESSION["stu"]=="")
	{
		echo "<script language='javascript' type='text/javascript'>alert('登陆失败或超时,请重新登陆!');
		      if(!window.top)		          
		      {
				  location.href='index.php';
	          }
			  else
		      {
				  window.top.location.href='index.php';
	          }
		      </script>";
	}
} 
 $stu=$_SESSION["stu"];
 $class = isset($_GET["class"]) ? $_GET["class"] : "";
 $teacher = isset($_GET["teacher"]) ? $_GET["teacher"] : "";


	 ?>

<script language="javascript">
function checkform(){
	
  if(checkVote("qid1") == 0){
    alert("题目1还未选择请选择");
 document.getElementsByName("qid1")[0].focus();
 return false;
  }
  if(checkVote("qid2") == 0){
    alert("题目2还未选择请选择");
 document.getElementsByName("qid2")[0].focus();
 return false;
  }
  if(checkVote("qid3") == 0){
    alert("题目3还未选择请选择");
 document.getElementsByName("qid3")[0].focus();
 return false;
  }
  if(checkVote("qid4") == 0){
    alert("题目4还未选择请选择");
 document.getElementsByName("qid4")[0].focus();
 return false;
  }
  if(checkVote("qid5") == 0){
    alert("题目5还未选择请选择");
 document.getElementsByName("qid5")[0].focus();
 return false;
  }
    if(checkVote("qid6") == 0){
    alert("题目6还未选择请选择");
 document.getElementsByName("qid6")[0].focus();
 return false;
  }
    if(checkVote("qid7") == 0){
    alert("题目7还未选择请选择");
 document.getElementsByName("qid7")[0].focus();
 return false;
  }
    if(checkVote("qid8") == 0){
    alert("题目8还未选择请选择");
 document.getElementsByName("qid8")[0].focus();
 return false;
  }
    if(checkVote("qid9") == 0){
    alert("题目9还未选择请选择");
 document.getElementsByName("qid9")[0].focus();
 return false;
  }
    if(checkVote("qid10") == 0){
    alert("题目10还未选择请选择");
 document.getElementsByName("qid10")[0].focus();
 return false;
  }
    if(checkVote("qid11") == 0){
    alert("题目11还未选择请选择");
 document.getElementsByName("qid11")[0].focus();
 return false;
  }
    if(checkVote("qid12") == 0){
    alert("题目12还未选择请选择");
 document.getElementsByName("qid12")[0].focus();
 return false;
  }
    if(checkVote("qid13") == 0){
    alert("题目13还未选择请选择");
 document.getElementsByName("qid13")[0].focus();
 return false;
  }
    if(checkVote("qid14") == 0){
    alert("题目14还未选择请选择");
 document.getElementsByName("qid14")[0].focus();
 return false;
  }
    if(checkVote("qid15") == 0){
    alert("题目15还未选择请选择");
 document.getElementsByName("qid15")[0].focus();
 return false;
  }
    if(checkVote("qid16") == 0){
    alert("题目16还未选择请选择");
 document.getElementsByName("qid16")[0].focus();
 return false;
  }
    if(checkVote("qid17") == 0){
    alert("题目17还未选择请选择");
 document.getElementsByName("qid17")[0].focus();
 return false;
  }
    if(checkVote("qid18") == 0){
    alert("题目18还未选择请选择");
 document.getElementsByName("qid18")[0].focus();
 return false;
  }
    if(checkVote("qid19") == 0){
    alert("题目19还未选择请选择");
 document.getElementsByName("qid19")[0].focus();
 return false;
  }
    if(checkVote("qid20") == 0){
    alert("题目20还未选择请选择");
 document.getElementsByName("qid20")[0].focus();
 return false;
  }
  return true;
}

function checkVote(n){
  var check_flg = 0 ;
  for(i=0;i< document.getElementsByName(n).length;i++){
     if(document.getElementsByName(n)[i].checked==true){ 
       check_flg = 1; 
       break; 
     }
  }
  return check_flg;
}
</script>

<title><?php echo $cfg->getwebname();?>学生评教系统</title>

</head>

<body>

<?php
 
 echo "<div width='90%' align='center'>";
echo "<form name='frmxhvote' id='frmxhvote' method='post' action='".$cfg->getsystemurl()."votesu.php?act=vote' onsubmit='return checkform();'>";
 

$query = mysql_query("select * from xh_title order by id asc",$conn);
echo "<div align='center'>";
 echo "<table width='40%' id='table1' cellspacing='1' cellpadding='4' style='font-size:14px;'>";



$stuquery = mysql_query("select * from students where number='$stu'",$conn);
 while($sturow=mysql_fetch_array($stuquery))
 {	
 ?> 
	<!--在行中写下标题-->
    
    <tr>

			<td colspan="4" align="center" bgcolor="#FFFFCC" style="font-size:14px;">亲爱的　<font color=red><b><?php echo $sturow["name"]; ?>同学</b></font>，你现在正在给 
            <font color=red><b><?php echo $class ?></b></font> 的 <font color=red><b><?php echo $teacher ?>老师</b></font>　评分，请认真评分。</td>
            <input type="hidden" name='stu_num' id='stu_num' value='<?php echo $_SESSION["stu"]; ?>'>
 <input type="hidden" name='stu_name' id='stu_name' value='<?php echo $sturow["name"]; ?>'>
 <input type="hidden" name='class' id='class' value='<?php echo $class ?>'>
 <input type="hidden" name='teacher' id='teacher' value='<?php echo $teacher ?>'>
		</tr>          
 <?php
	 }
	 ?>        
 <?php
 while($row=mysql_fetch_array($query))
 {	

 $strstr++;

?>	
		<tr>
			<th colspan="4" bgcolor="#D1E3FE" style="font-size:14px;">选项<?php echo $strstr ?>、<?php echo $row["title"] ?> </th>
		</tr>
	<?php
	 $qry = mysql_query("select * from xh_question where tid=".$row["id"]." order by id asc",$conn);
	 $recordcount = max(mysql_num_rows($qry),0);
	 
	 echo "<tr>"; 
	 while($qrow=mysql_fetch_array($qry))
	 {
		     echo "<td align='left' style='font-size:14px;'>";
			 echo "<input type='radio' id='".$qrow["id"]."' name='qid".$strstr."' value='".$qrow["id"]."'/>";
			 
			 
			 echo "".$qrow["question"]."";
			 
			 
			 
			 echo "</td>";
		
		 /*echo "document.write(\"<script language='javascript'>alert('".$i.$row["listrows"].$recordcount."')</script>\");\r\n";*/
	
			 /*补齐td标签
			 echo "document.write(\"<script language='javascript'>alert('".$i%$row["listrows"].$recordcount."')</script>\");\r\n";*/
			
				
			 
		 
		
		 
	 }
 echo "</tr>"; 
 }
 mysql_free_result($query); 
 

	 ?>

	 </table>

	 </div>
     <?php

 

 ?>
 <div align='center'>
 
<input type='submit' name='submit' id='submit' value='点击评分'/>&nbsp; 





 </div>
 </form>
 <div align='center'>
 <table width="40%" id="table2" cellspacing="1" style="font-size:14px;">
 <tr >
<td colspan=5 align="center" height=50 bgcolor="#D1E3FE">程序设计：<a href="http://www.0717sh.com" target="_blank">枝江生活热线</a>   技术支持：<a href="http://www.168oo.com" target="_blank">枝江赛腾网络科技</a></td>
</tr>
</table>

 
 </div>

 

 </div>

 <?php
 mysql_close($conn);
?>
