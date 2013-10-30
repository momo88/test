<html>

<head>
<?php 
 require_once('conn.php');
  head();
   $class = isset($_GET["class"]) ? $_GET["class"] : "";
 $teacher = isset($_GET["teacher"]) ? $_GET["teacher"] : "";
?>
<title>枝江英杰学校学生评教系统后台管理</title>
<style>
.v_XHList{
background-color: #E1F0FF}
.v_XHList2{
background-color: #8EC7FF}
</style>
</head>

<body>
<table cellspacing="4" cellpadding="0" height=30>
<tr><td align="left">

</td><td align="right"></td></tr></table>


 

<div align="center">
	<?php	

	  $query = mysql_query("select count(*) as total,
sum(case when qid1 = '233' then 1 else 0 end+case when qid2 = '236' then 1 else 0 end+case when qid3 = '239' then 1 else 0 end+case when qid4 = '242' then 1 else 0 end+case when qid5 = '245' then 1 else 0 end+case when qid6 = '248' then 1 else 0 end+case when qid7 = '251' then 1 else 0 end+case when qid8 = '254' then 1 else 0 end+case when qid9 = '257' then 1 else 0 end+case when qid10 = '260' then 1 else 0 end+case when qid11 = '263' then 1 else 0 end+case when qid12 = '266' then 1 else 0 end+case when qid13 = '269' then 1 else 0 end+case when qid14 = '272' then 1 else 0 end+case when qid15 = '275' then 1 else 0 end+case when qid16 = '278' then 1 else 0 end+case when qid17 = '281' then 1 else 0 end+case when qid18 = '284' then 1 else 0 end+case when qid19 = '287' then 1 else 0 end+case when qid20 = '290' then 1 else 0 end)   as 'A',
sum(case when qid1 = '234' then 1 else 0 end+case when qid2 = '237' then 1 else 0 end+case when qid3 = '240' then 1 else 0 end+case when qid4 = '243' then 1 else 0 end+case when qid5 = '246' then 1 else 0 end+case when qid6 = '249' then 1 else 0 end+case when qid7 = '252' then 1 else 0 end+case when qid8 = '255' then 1 else 0 end+case when qid9 = '258' then 1 else 0 end+case when qid10 = '261' then 1 else 0 end+case when qid11 = '264' then 1 else 0 end+case when qid12 = '267' then 1 else 0 end+case when qid13 = '270' then 1 else 0 end+case when qid14 = '273' then 1 else 0 end+case when qid15 = '276' then 1 else 0 end+case when qid16 = '279' then 1 else 0 end+case when qid17 = '282' then 1 else 0 end+case when qid18 = '285' then 1 else 0 end+case when qid19 = '288' then 1 else 0 end+case when qid20 = '291' then 1 else 0 end)   as 'B',
sum(case when qid1 = '235' then 1 else 0 end+case when qid2 = '238' then 1 else 0 end+case when qid3 = '241' then 1 else 0 end+case when qid4 = '244' then 1 else 0 end+case when qid5 = '247' then 1 else 0 end+case when qid6 = '250' then 1 else 0 end+case when qid7 = '253' then 1 else 0 end+case when qid8 = '256' then 1 else 0 end+case when qid9 = '259' then 1 else 0 end+case when qid10 = '262' then 1 else 0 end+case when qid11 = '265' then 1 else 0 end+case when qid12 = '268' then 1 else 0 end+case when qid13 = '271' then 1 else 0 end+case when qid14 = '274' then 1 else 0 end+case when qid15 = '277' then 1 else 0 end+case when qid16 = '280' then 1 else 0 end+case when qid17 = '283' then 1 else 0 end+case when qid18 = '286' then 1 else 0 end+case when qid19 = '289' then 1 else 0 end+case when qid20 = '292' then 1 else 0 end)   as 'C',	   
round(sum(case when qid1 = '233' then 1 else 0 end+case when qid2 = '236' then 1 else 0 end+case when qid3 = '239' then 1 else 0 end+case when qid4 = '242' then 1 else 0 end+case when qid5 = '245' then 1 else 0 end+case when qid6 = '248' then 1 else 0 end+case when qid7 = '251' then 1 else 0 end+case when qid8 = '254' then 1 else 0 end+case when qid9 = '257' then 1 else 0 end+case when qid10 = '260' then 1 else 0 end+case when qid11 = '263' then 1 else 0 end+case when qid12 = '266' then 1 else 0 end+case when qid13 = '269' then 1 else 0 end+case when qid14 = '272' then 1 else 0 end+case when qid15 = '275' then 1 else 0 end+case when qid16 = '278' then 1 else 0 end+case when qid17 = '281' then 1 else 0 end+case when qid18 = '284' then 1 else 0 end+case when qid19 = '287' then 1 else 0 end+case when qid20 = '290' then 1 else 0 end) / (20*count(*))*100,2) + '%' as 'totalA',
round(sum(case when qid1 = '234' then 1 else 0 end+case when qid2 = '237' then 1 else 0 end+case when qid3 = '240' then 1 else 0 end+case when qid4 = '243' then 1 else 0 end+case when qid5 = '246' then 1 else 0 end+case when qid6 = '249' then 1 else 0 end+case when qid7 = '252' then 1 else 0 end+case when qid8 = '255' then 1 else 0 end+case when qid9 = '258' then 1 else 0 end+case when qid10 = '261' then 1 else 0 end+case when qid11 = '264' then 1 else 0 end+case when qid12 = '267' then 1 else 0 end+case when qid13 = '270' then 1 else 0 end+case when qid14 = '273' then 1 else 0 end+case when qid15 = '276' then 1 else 0 end+case when qid16 = '279' then 1 else 0 end+case when qid17 = '282' then 1 else 0 end+case when qid18 = '285' then 1 else 0 end+case when qid19 = '288' then 1 else 0 end+case when qid20 = '291' then 1 else 0 end) / (20*count(*))*100,2) + '%' as 'totalB',
round(sum(case when qid1 = '235' then 1 else 0 end+case when qid2 = '238' then 1 else 0 end+case when qid3 = '241' then 1 else 0 end+case when qid4 = '244' then 1 else 0 end+case when qid5 = '247' then 1 else 0 end+case when qid6 = '250' then 1 else 0 end+case when qid7 = '253' then 1 else 0 end+case when qid8 = '256' then 1 else 0 end+case when qid9 = '259' then 1 else 0 end+case when qid10 = '262' then 1 else 0 end+case when qid11 = '265' then 1 else 0 end+case when qid12 = '268' then 1 else 0 end+case when qid13 = '271' then 1 else 0 end+case when qid14 = '274' then 1 else 0 end+case when qid15 = '277' then 1 else 0 end+case when qid16 = '280' then 1 else 0 end+case when qid17 = '283' then 1 else 0 end+case when qid18 = '286' then 1 else 0 end+case when qid19 = '289' then 1 else 0 end+case when qid20 = '292' then 1 else 0 end) / (20*count(*))*100,2) + '%' as 'totalC'
from xh_userinfo where class='$class' and teacher='$teacher' order by id asc",$conn);
	  
	  if(mysql_num_rows($query)<=0){
		  mysql_close($conn);
		  die("<script language='javascript' type='text/javascript'>alert('没有投票数据!');window.close();</script>");		  
	  }
	  while($row=mysql_fetch_array($query))
	  {
		  
		  ?>
<table width="40%" id="table1" cellspacing="1" cellpadding="4" bgcolor="#E1F0FF" style="padding:20px;font-size:14px;">
    	<tr>

			<td colspan="4" align="center" bgcolor="#BFDFFF"><?php echo $class;?>共有 <b><?php echo $row["total"];?></b> 个学生参加了对　<b><?php echo $teacher;?>老师</b>　的评教投票</td>
		</tr>          
        
	
		<tr>
			<th colspan="4" bgcolor="#8EC7FF"　style="padding:20px;font-size:14px;">统计结果如下</th>
		</tr>
	
    
    
    
    
		
		<tr onMouseOver="this.className='v_XHList2';" onMouseOut="this.className='v_XHList';">
			
  
			<td width="10%" nowrap>共获得 <b><?php echo $row["A"];?></b> 个Ａ</td>
            
			<td width="100%">
			<table border="0" width="<?php echo $row["totalA"];?>%" cellspacing="0" cellpadding="0" height="5" bgcolor="#CC99FF">
				<tr>
					<td></td>
				</tr>
			</table>
			</td>
			<td width="18%" nowrap>占总投票数的 <b><?php echo $row["totalA"];?>%</b></td>
		</tr>
<tr onMouseOver="this.className='v_XHList2';" onMouseOut="this.className='v_XHList';">
			
  
			<td width="10%" nowrap>共获得 <b><?php echo $row["B"];?></b> 个Ｂ</td>
            
			<td width="100%">
			<table border="0" width="<?php echo $row["totalB"];?>%" cellspacing="0" cellpadding="0" height="5" bgcolor="#99CC00">
				<tr>
					<td></td>
				</tr>
			</table>
			</td>
			<td width="18%" nowrap>占总投票数的 <b><?php echo $row["totalB"];?>%</b></td>
		</tr>

<tr onMouseOver="this.className='v_XHList2';" onMouseOut="this.className='v_XHList';">
			
  
			<td width="10%" nowrap>共获得 <b><?php echo $row["C"];?></b> 个Ｃ</td>
            
			<td width="100%">
			<table border="0" width="<?php echo $row["totalC"];?>%" cellspacing="0" cellpadding="0" height="5" bgcolor="#FF00FF">
				<tr>
					<td></td>
				</tr>
			</table>
			</td>
			<td width="18%" nowrap>占总投票数的 <b><?php echo $row["totalC"];?>%</b></td>
		</tr>

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