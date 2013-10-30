<html>
<head>
<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once('conn.php');
 head();
 check();
?>
<title>【<?php echo $cfg->getwebname();?>学生评教系统】后台管理</title>
</head>

<?php

$stuquery = mysql_query("select * from class order by class_num asc",$conn);
 ?>

<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	  <table width="100%" id="table2" cellspacing="1">
	    <tr>
    <td id="TableTitle1">评教结果单项统计 -&gt;
  
	 </td>
     </tr>
	 </table>
      </td>
  </tr>
  <tr>
    <td>
	   <table border="1" width="100%" id="table2" bordercolor="#A9C9E2" cellspacing="1">
        
          <tr id="TableTitle2">
          
            <td width="5%" align="center">id</td>
            <td align="center">班级名称</td>
            <td align="center" width="18%"> 被评老师</td>
           
            <td width="20%" align="center">查看结果</td>
          </tr>
		 <?php
 while($sturow=mysql_fetch_array($stuquery))
 {
	 $query = mysql_query("select * from teacher",$conn);
	 while($row=mysql_fetch_array($query))
 {
	 ?>
    <?php
$i=$i+1;
 ?> 
          <tr id="TableTitle3" onmouseover='this.className="over_TableTitle3"' onmouseout='this.className="out_TableTitle3"' class="out_TableTitle3">
            
            <td width="5%" align="center"><?php echo $i; ?>　</td>
            <td align="center"><?php echo $sturow["class_name"]; ?></td>
            <td align="center" width="18%"><?php echo $row["teacher"]; ?>老师</td>
            <td width="20%" align="center"><a href="view3.php?sid=33&class=<?php echo $sturow["class_name"]; ?>&teacher=<?php echo $row["teacher"]; ?>">查看</a></td>
          </tr>
	   
       <?php
 }
 }
 ?>	         
           <tr id="TableTitle2">
          
            <td width="5%" align="center">id</td>
            <td align="center">班级名称</td>
            <td align="center" width="18%"> 被评老师</td>
           
            <td width="20%" align="center">查看结果</td>
          </tr>

      </table>
    </td>
  </tr>
</table>
</body>
</html>

 <?php
 mysql_close($conn);
?>