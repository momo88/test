<?php 
 require_once('conn.php'); 
?>
<html>
<head>
<?php 
  head();
  check();
?>
<title>【<?php echo $cfg->getwebname();?>学生评教系统】后台管理</title>
</head>
<frameset name=topwin  framespacing="0" border="0" cols="151,0,*" frameborder="0">
	<frame name="XH_w1" src="left.php" target="XH_w3" scrolling="yes">
	<frame name="XH_w2" noresize scrolling="no" src="winco.php">
	<frame name="XH_w3" src="main.php">
	<noframes>
		<body>
			<p>此网页使用了框架，但您的浏览器不支持框架。</p>
		</body>
	</noframes>
<frame src="UntitledFrame-2"></frameset>
</html>
<?php mysql_close($conn);?>