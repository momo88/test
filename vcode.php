<?php
  require_once('conn.php');
?>
<html>

<head>
<?php
 head();
 check();
 ?>
<title>调用代码</title>
</head>

<body>
<div align="center">
<textarea rows="4" cols="38" name="code"><script src="<?php echo $cfg->getsystemurl();?>vote.php?sid=<?php echo $_GET["sid"];?>"></script></textarea><br>
<input class="btn" type="button" name="button" value="关闭" onClick="javascript:window.close()">
</div>

</body>

</html>
<?php mysql_close($conn);?>