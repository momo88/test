<?php
	  require_once('conn.php');
	  error_reporting(E_ALL & ~E_NOTICE);
	  header("content-type:text/html;charset=utf-8");
	   $class = isset($_GET["class"]) ? $_GET["class"] : "";
 $teacher = isset($_GET["teacher"]) ? $_GET["teacher"] : "";	  
		  
?>
<html>

<head>
<?php 
  head();
?>
<title>枝江英杰学校学生评教系统</title>
<style>
.v_XHList{
background-color: #E1F0FF}
.v_XHList2{
background-color: #8EC7FF}
</style>
</head>

<body>

<div align="center">
	<?php	

	  $query = mysql_query("select count(*) as total from xh_userinfo where class='$class' and teacher='$teacher' order by id asc",$conn);
	  if(mysql_num_rows($query)<=0){
		  mysql_close($conn);
		  die("<script language='javascript' type='text/javascript'>alert('没有投票数据!');window.close();</script>");		  
	  }
	  while($row=mysql_fetch_array($query))
	  {
		  ?>
<table width="40%" id="table1" cellspacing="1" cellpadding="4" bgcolor="#E1F0FF">
    	<tr>

			<td colspan="4" align="center" bgcolor="#BFDFFF"><?php echo $class;?>共有 <b><?php echo $row["total"];?></b> 个学生参加了对　<b><?php echo $teacher;?>老师</b>　的评教投票</td>
		</tr>          
          <?
		$xuery = mysql_query("select * from xh_title order by id asc",$conn);
		while($xrow=mysql_fetch_array($xuery))
	  {
		  $strstr=$strstr+1;
	?>
	
		<tr>
			<th colspan="4" bgcolor="#8EC7FF"><?php echo $strstr ?>、<?php echo $xrow["title"] ?> </th>
		</tr>
	
		<?php
		  $total=0;
		  $qry = mysql_query("select count(*) as ps from xh_userinfo where class='$class' and teacher='$teacher'",$conn);
		  if($trow=mysql_fetch_array($qry)){
			  $total=$trow["ps"];
		  }
		  mysql_free_result($qry);
		  $qry = mysql_query("select * from xh_question where tid=".$xrow["id"]." order by id asc",$conn);
	      $i=0;
	      while($qrow=mysql_fetch_array($qry))
		  {
			  $i++;
	    ?>
		<tr onMouseOver="this.className='v_XHList2';" onMouseOut="this.className='v_XHList';">
			<td align="center"><?php echo trim($qrow["question"]);?></td>
          <?  

            $puery = mysql_query("select count(*) as total from xh_userinfo where (qid1=".$qrow["id"]." or qid2=".$qrow["id"]." or qid3=".$qrow["id"]." or qid4=".$qrow["id"]." or qid5=".$qrow["id"]." or qid6=".$qrow["id"]." or qid7=".$qrow["id"]." or qid8=".$qrow["id"]." or qid9=".$qrow["id"]." or qid10=".$qrow["id"]." or qid11=".$qrow["id"]." or qid12=".$qrow["id"]." or qid13=".$qrow["id"]." or qid14=".$qrow["id"]." or qid15=".$qrow["id"]." or qid16=".$qrow["id"]." or qid17=".$qrow["id"]." or qid18=".$qrow["id"]." or qid19=".$qrow["id"]." or qid20=".$qrow["id"].")  and class='$class' and teacher='$teacher' order by id asc",$conn);
		while($prow=mysql_fetch_array($puery))
	  {
	?>
			<td width="10%" nowrap><b><?php echo $prow["total"];?></b>票</td>
            
			<td width="80">
			<table border="0" width="<?php if($total!=0) {echo 80*$prow['total']/$row['total']."";} else {echo "0";}?>" cellspacing="0" cellpadding="0" height="5" bgcolor="<?php echo showColor($i);?>">
				<tr>
					<td></td>
				</tr>
			</table>
			</td>
			<td width="18%" nowrap>占<b><?php if($total!=0) {echo number_format($prow['total']/$row['total']*100,2,".","")."%";} else {echo "0.00%";}?></b></td>
            <?php
	  }
	  ?>
		</tr>
		<?php
	  
		  }
		  }
		mysql_free_result($qry);
			?>
	</table><br>
	<?php
	 
	  }
	mysql_free_result($query);	
	?>
</div>
<div align="center">
	<input class="btn" type="button" name="button" value="关闭" onClick="javascript:window.close()">
</div>

</body>

</html>
<?php mysql_close($conn);?>