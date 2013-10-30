

<?php
session_start();

 require_once('conn.php'); 

 head();
 
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
 ?>
<title><?php echo $cfg->getwebname();?>学生评教系统</title>
<div align='center'>
<table width="100%" id="table2" cellspacing="1">
 <tr >
          
            <td colspan=5 align="center" height=50></td>
            
          </tr>
          </table>
<table border="0" cellpadding="1" cellspacing="2" width="800" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	  <table width="100%" id="table2" cellspacing="1">
	   
        <tr>
        
        <?php
		 $query = mysql_query("select * from students where number='$stu'" ,$conn);
 while($row=mysql_fetch_array($query))
 {
	 ?>
    <td bgcolor="#FFFFCC" style="font-size:14px;">你好 <font color=red><b><?php echo $row["name"]; ?>同学</b></font> 请选择对应学科的老师参加评教投票！
   <?php
 }

 ?>
	 </td><td bgcolor="#FFFFCC" style="font-size:14px;"><a target="_top" href="index.php?act=logout">注销退出</a></td>
     </tr>
	 </table>
      </td>
  </tr>
  <tr>
    <td>
	   <table border="1" width="100%" id="table2" bordercolor="#A9C9E2" cellspacing="1">
        
          <tr id="TableTitle2">
          
            <td width="center" align="center">你的学号</td>
            
            <td align="center">所在班级</td>
            <td align="center" width="18%"> 参评老师</td>
           
            <td width="20%" align="center">选择评教</td>
          </tr>
<?php

	 $stuquery = mysql_query("select students.*,class.*,teacher.* from students,teacher,class where number='$stu' and students.class_num=class.class_num",$conn);
 while($sturow=mysql_fetch_array($stuquery))
 {
	 ?>

          <tr id="TableTitle3" onmouseover='this.className="over_TableTitle3"' onmouseout='this.className="out_TableTitle3"' class="out_TableTitle3">
            
            <td width="center" align="center"><?php echo $stu; ?>　</td>
            <td align="center"><?php echo $sturow["class_name"]; ?></td>
            
            <td align="center" width="18%"><?php echo $sturow["teacher"]; ?>老师</td>
            <td width="20%" align="center"><a href="vote.php?&class=<?php echo $sturow["class_name"]; ?>&teacher=<?php echo $sturow["teacher"]; ?>">点击开始评教</a></td>
          </tr>
 <?php
 
 }
 ?>	   
        
          <tr id="TableTitle2">
          
            <td colspan=5 align="center">程序设计：<a href="http://www.0717sh.com" target="_blank">枝江生活热线</a>   技术支持：<a href="http://www.168oo.com" target="_blank">枝江赛腾网络科技</a></td>
            
          </tr>

      </table>
    </td>
  </tr>
</table>
</div>
</body>
</html>


 <?php
 mysql_close($conn);
?>