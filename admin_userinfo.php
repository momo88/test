<?php
	require_once('conn.php');
	$id=isset($_GET["id"]) ? $_GET["id"] : ""; 
	$page = isset($_GET["page"]) ? $_GET["page"] : "";
	$sid=isset($_GET["sid"]) ? $_GET["sid"] : "";
	if(empty($id) || !is_numeric($id)){
		mysql_close($conn);
		die("<script language='javascript' type='text/javascript'>alert('用户参数id不能为空且只能是数字!');history.back(1);</script>");
	}
	$name="";
	$sex="";
	$idcard="";
	$tel="";
	$address="";
	$email="";
	$content="";
	$query=mysql_query("select * from xh_userinfo where id=".$id,$conn);
	if(mysql_num_rows($query)<=0)
	{
		mysql_free_result($query);
		mysql_close($conn);
		die("<script language='javascript' type='text/javascript'>alert('该用户信息不存在或被删除!');history.back(1);</script>");
	}else if ($row=mysql_fetch_array($query))
	{
		$name=$row["name"];
		$sex=$row["sex"];
		$idcard=$row["idcard"];
		$tel=$row["tel"];
		$address=$row["address"];
		$email=$row["email"];
		$content=$row["content"];
	}
?>
<html>
<head>
<?php 
  head();
  check();
  ?>
<title>【雪晖投票系统】后台管理中心</title>
</head>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
		<table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 查看用户信息-&gt;
		  </td>
		 </tr>
	   </table>
     </td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
          <tr>
            <td width="20%" align="right">姓名：</td>
            <td><?php echo $name;?></td>
          </tr>
          <tr>
            <td width="20%" align="right">性别：</td>
            <td><?php echo $sex;?></td>
          </tr>
          <tr>
            <td width="20%" align="right">身份证号码：</td>
            <td><?php echo $idcard;?></td>
          </tr>
          <tr>
            <td width="40%" align="right">电话：</td>
            <td><?php echo $tel;?></td>
          </tr>
          <tr>
            <td width="20%" align="right">地址：</td>
            <td><?php echo $address;?></td>
          </tr>
          <tr>
            <td width="20%" align="right">邮箱：</td>
            <td><?php echo $email;?></td>
          </tr>
          <tr>
            <td width="20%" align="right">备注：</td>
            <td><?php echo $content;?></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#BFDFFF"><input class="btn" type="button" name="submit" value=" 返 回 " onClick="javascript:history.back(1);"></td>
          </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($conn);?>