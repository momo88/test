<?php
	  require_once('conn.php'); 
	  $action = isset($_GET["act"]) ? $_GET["act"] : "";
	  if($action=="save"){		  
		  $sql = "update xh_config set webname='".$_POST["WebName"]."',weburl='".$_POST["WebUrl"]."',systemurl='".$_POST["SystemUrl"]."'";
		  $qry = mysql_query($sql,$conn);		  
		  if(mysql_errno($conn)==0){
			  successmsg('修改系统配置成功!');
		  }else{
			  errormsg("系统配置修改未成功!");
		  }
		  exit();
	  }
?>
<html>
<head>
<?php
  head();
  check();
?>
<title>【<?php echo $cfg->getwebname();?>评教系统】后台管理中心</title>
</head>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
		  <table width="100%" id="table2" cellspacing="1">
	    <tr>
    <td id="TableTitle1"> 修改系统配置-&gt;
	</td>
	</tr>
	</table>
	</td>
  </tr>
  <tr>
    <td><table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#BFDFFF" id="table2">
        <form action="?act=save" method="post" name="form1">
          <tr>
            <td width="20%" align="right">单位名称：</td>
            <td><input type="text" name="WebName" size="40" value="<?php echo $cfg->getwebname();?>">
              <br>
              <span>您单位的名称
              （如：枝江赛腾网络）</span></td>
          </tr>
          <tr>
            <td width="20%" align="right">站点地址：</td>
            <td><input type="text" name="WebUrl" size="40" value="<?php echo $cfg->getweburl();?>">
              <br>
              <span>请输入完整地址(如：<a href="http://www.168oo.com">http://www.168oo.com/</a>)返回贵站主页时设置的</span></td>
          </tr>
          <tr>
            <td width="20%" align="right">评教系统地址：</td>
            <td><input type="text" name="SystemUrl" size="40" value="<?php echo $cfg->getsystemurl();?>">
              <br>
              <span>请输入完整地址（如：http://www.zzyx8.com/pj/)此项是为了调用评教数据，输入的是投票系统的访问地址。例如在本地测试时的访问地址为http://localhost/pj，那么将该地址输入。</span></td>
          </tr>
         
         
          
         
		 
          <tr>
            <td colspan="2" align="center" bgcolor="#BFDFFF"><input class="btn" type="submit" name="submit" value=" 修 改 "></td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php mysql_close($conn);?>