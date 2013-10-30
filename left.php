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
<script language="javascript" type="text/javascript">
function XHShowList(id)
{
	whichEl = eval("XHList"+id);
	if (whichEl.style.display == "none")
	{eval("XHList"+id+".style.display=\"\";");}
	else
	{eval("XHList"+id+".style.display=\"none\";");}
}
</script>
</head>

<base target="XH_w3">
<body>

<table border="0" cellspacing="1" width="135" cellpadding="2" bgcolor="#E1F0FF">
	<tr id="MenuTitleTop">
		<td width="100%" align="center">
		<strong>管理菜单</strong></font></td>
	</tr>
	<tr>
		<td width="100%" align="center" class="MenuTitle1"><a target="_top" href="admin_index.php">
		管理首页</a>｜<a target="_top" href="admin_login.php?act=logout">退出管理</a></td>
	</tr>
	<tr>
		<td width="100%" class="XHList" onClick="XHShowList(7)" onMouseOver="this.className='XHList2';" onMouseOut="this.className='XHList';">
		评教管理</td>
	</tr>
	<tr style="display:none" id="XHList7" class="MenuTitle1">
		<td width="100%">
        
		<a href="admin_title.php">管理投票问题</a><br>
        
		<a href="admin_question.php">管理投票答案</a>
        </td>
	</tr>
    <tr>
		<td width="100%" class="XHList" onClick="XHShowList(3)" onMouseOver="this.className='XHList2';" onMouseOut="this.className='XHList';">
		评教结果</td>
	</tr>
	<tr style="display:none" id="XHList3" class="MenuTitle1">
		<td width="100%"><a href="aview.php?sid=33">单项统计</a><br>
		<a href="sview.php?sid=33">综合统计</a></td>
	</tr>	
	<tr>
		<td width="100%" class="XHList" onClick="XHShowList(8)" onMouseOver="this.className='XHList2';" onMouseOut="this.className='XHList';">
		科目管理</td>
	</tr>
	<tr style="display:none" id="XHList8" class="MenuTitle1">
		<td width="100%"><a href="admin_teacher_add.php">添加科目信息</a><br>
		<a href="admin_teacher.php">管理科目信息</a></td>
	</tr>
        	<tr>
		<td width="100%" class="XHList" onClick="XHShowList(5)" onMouseOver="this.className='XHList2';" onMouseOut="this.className='XHList';">
		班级管理</td>
	</tr>
	<tr style="display:none" id="XHList5" class="MenuTitle1">
		<td width="100%"><a href="admin_class_add.php">添加班级信息</a><br>
		<a href="admin_class.php">管理班级信息</a></td>
	</tr>
    	<tr>
		<td width="100%" class="XHList" onClick="XHShowList(1)" onMouseOver="this.className='XHList2';" onMouseOut="this.className='XHList';">
		学生管理</td>
	</tr>
	<tr style="display:none" id="XHList1" class="MenuTitle1">
		<td width="100%"><a href="admin_students_add.php">添加学生信息</a><br>
		<a href="admin_students.php">管理学生信息</a></td>
	</tr>	
	<tr>
		<td width="100%" class="XHList" onClick="XHShowList(4)" onMouseOver="this.className='XHList2';" onMouseOut="this.className='XHList';">
		系统设置</td>
	</tr>
	<tr style="display:none" id="XHList4" class="MenuTitle1">
		<td width="100%"><a href="admin_system.php">修改系统信息</a><br>
		<a href="admin_admin.php">修改管理员信息</a></td>
	</tr>
	<tr>
		<td width="100%" class="XHList">
		系统版权</td>
	</tr>
	<tr id="XHList6">
		<td width="100%">程序设计：<br><a href="http://www.0717sh.com" target="_blank" class="blue">枝江生活热线</a><br>技术支持:：<br><a href="http://www.168oo.com" target="_blank" class="blue">枝江赛腾网络科技</a></td>
	</tr>		
	</tr>
	</tr>
</table>

</body>

</html>