<?php
	require_once('conn.php');
	$sid = isset($_GET["sid"]) ? $_GET["sid"] : "";
	$action = isset($_GET["act"]) ? $_GET["act"] : "";
	$id = isset($_GET["id"]) ? $_GET["id"] : "";
	$key = (isset($_POST["k"]) ? $_POST["k"] : (isset($_GET["k"]) ? $_GET["k"] : ""));
	$page = isset($_GET["page"]) ? $_GET["page"] : "1";
	if(!empty($sid)){
	  if(!is_numeric($sid)){
		  mysql_close($conn);
		  die("<script>alert('参数只能为数字!');history.back(1);</script>");
	  }
	}
	$subject=""; 
	$selectcmd = "select * from xh_subject where id=".$sid;
	$query=mysql_query($selectcmd,$conn);
	while($row=mysql_fetch_array($query))
	{
	 $subject=$row["subject"];
	}
	if($action=="del"){
	 if(is_numeric($id)){		 
		 $query= mysql_query("delete from xh_userinfo where id=".$id,$conn);		 
	 }
	}else if(isset($_POST["operate"]) && $_POST["operate"]=="delUser")
	{
	 if(isset($_POST["XHID"]) && is_array($_POST["XHID"]) && count($_POST["XHID"])>0){
		 $ids = implode(",",$_POST["XHID"]);
		 mysql_query("delete from xh_userinfo where id in (".$ids.")",$conn);		 
	 }
	 mysql_close($conn);
	 die("<script>location.href='admin_user.php?page=".$page."&k=".$key."&sid=".$sid."';</script>");
	}else if(isset($_POST["operate"]) && $_POST["operate"]=="search"){
	 mysql_close($conn);
	 die("<script>location.href='admin_user.php?page=".$page."&k=".$key."&sid=".$sid."';</script>");
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
<script language="javascript" type="text/javascript">
function XH() {
	for (var i=0;i<document.XHH.XHID.length;i++) {
		var e=document.XHH.XHID[i];
		e.checked=!e.checked;
	}
}
function frmsubmit(value){
	document.getElementById("operate").value=value;
	document.getElementById("XHH").submit();
}
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	   <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 管理主题<?php echo $subject!=""?"($subject)":"&nbsp;";?>用户-&gt;
		   <?php
		     if(!empty($key))
			 {
				 echo "搜索用户(".$key.")";
			 }
			 else
			 {
				 echo "所有用户";
			 }
		   ?>
		  </td>
		 </tr>
	   </table>
     </td>
  </tr>
  <tr>
    <td>
      <table border="1" width="100%" id="table2" bordercolor="#BFDFFF" cellspacing="1">
        <form action="admin_user.php?k=<?php echo $k;?>&sid=<?php echo $sid;?>" method="post" name="XHH" id="XHH">
          <tr id="TableTitle2">
            <td width="5%" align="center">ID</td>
            <td width="5%" align="center"><a href="javascript:XH()">选择</a></td>
            <td align="center">姓名</td>
            <td align="center"> 性别</td>
            <td width="15%" align="center"> 身份证号码</td>
            <td width="15%" align="center"> 邮箱</td>
            <td width="10%" align="center">单项操作</td>
          </tr>
          <?php
		    $selectcmd = "select * from xh_userinfo ";			
			if(!empty($key)){
				$selectcmd .= "where name like '%".$key."%' and sid=".$sid;
			}else{
				$selectcmd .= " where sid=".$sid;
			}
			$pagesize=10; //每页记录数
			$curpage=$page;   //当前页面号									
			$query=mysql_query($selectcmd,$conn);
			$recordcount = mysql_num_rows($query); //结果集中的行数
			pager($recordcount,$pagesize,$curpage,10,$key."&sid=".$sid,"admin_user.php");
			$selectcmd.=" limit ".$firstcount.",".$pagesize;
			$query=mysql_query($selectcmd,$conn);
			while($row=mysql_fetch_array($query))
			{				
		  ?>
          <tr id="TableTitle3" onmouseover='this.className="over_TableTitle3"' onmouseout='this.className="out_TableTitle3"' class="out_TableTitle3">
            <td width="5%" align="center"><?php echo $row["id"];?></td>
            <td width="5%" align="center"><input type="checkbox" name="XHID[]" id="XHID" value="<?php echo $row["id"];?>"></td>
            <td align="center"><a href="admin_userinfo.php?id=<?php echo $row["id"];?>&page=<?php echo $page;?>&sid=<?php echo $sid;?>"><?php echo $row["name"];?></a></td>
            <td align="center"><?php echo $row["sex"];?></td>
            <td width="15%" align="center"><?php echo $row["idcard"];?></td>
            <td width="15%" align="center"><?php echo $row["email"];?></td>
            <td width="10%" align="center"><a href="admin_user.php?act=del&sid=<?php echo $row["sid"];?>&id=<?php echo $row["id"];?>&k=<?php echo $key;?>&page=<?php echo $curpage;?>">删除</a></td>
          </tr>
          <?php
			}
		  	mysql_free_result($query);		  
		  ?>
          <tr id="TableTitle2">
            <td width="5%" align="center">ID</td>
            <td width="5%" align="center"><a href="javascript:XH()">选择</a></td>
            <td align="center">姓名</td>
            <td align="center">性别</td>
            <td width="15%" align="center">身份证号码</td>
            <td width="15%" align="center">邮箱</td>
            <td width="20%" align="center">单项操作</td>
          </tr>
          <tr>
            <td colspan="8"><input class="btn" type="button" name="delUser" value="删除所选用户" onClick="if (confirm('确定删除?')) {frmsubmit('delUser');}" />
              |
              <input type="hidden" name="operate" id="operate" value="" />
              <input type="text" name="k">
              <input class="btn" type="button" name="search" value="搜索用户" onClick="frmsubmit('search');"></td>
          </tr>
          <tr>
            <td colspan="8"><?php echo $outhtml;?></td>
          </tr>
        </form>
      </table>
      
    </td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($conn);?>