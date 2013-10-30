<?php
  require_once('conn.php');
  $id = isset($_GET["id"]) ? $_GET["id"] : "";
  if(empty($id) || !is_numeric($id)){
	  mysql_close($conn);
	  die("<script>alert('标题参数不能为空且只能是数字!');</script>");
  }
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  //修改投票问题
 if($action=="save"){
	
	 $title = $_POST["title"];
	 
	 if(empty($title)){
		 errormsg('标题名称不能为空!');
		 exit();
	 }else{		 
		 $query= mysql_query("select * from xh_title where id<>".$id." and title='".$title."' ",$conn);
		 if(mysql_num_rows($query)>0){
			 mysql_free_result($query);
		     mysql_close($conn);
			 errormsg('在同一主题下该标题名称已经存在!');			 
			 exit();
		 }
		 mysql_free_result($query);		 
	 }	 
	 $query = mysql_query("update xh_title set title='".$title."' where id=".$id,$conn);
	 mysql_close($conn);
	 successmsg('修改投票信息成功!');
	 exit();
 }
 $sid="";
 $title="";
 $ms="";
 $listtype="";
 $listrows="";
 $query= mysql_query("select * from xh_title where id=".$id,$conn);
 while($row=mysql_fetch_array($query))
 {
	 
	 $title=$row["title"];
	 
 }
 mysql_free_result($query); 
?>
<html>
<head>
<?php
 head();
 check();
?>
<title>【枝江英杰学校学生评教系统】后台管理中心</title>
</head>
<script language="javascript" type='text/javascript'>
function check(){

	if(form1.title.value==""){
		lbltitle.innerHTML = "投票问题不能为空！";
		form1.title.focus();
		return false;}	
	else{
		lbltitle.innerHTML = "";}	
	return true;
	}
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	   <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 修改投票问题-&gt;</td>
		 </tr>
	   </table>
	</td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="?act=save&id=<?php echo $id;?>" method="post" name="form1" onSubmit="return check()">
       
          <tr>
            <td width="20%" align="right">投票问题名称：</td>
            <td><input type="text" name="title" size="25" value="<?php echo $title;?>"></td>
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
<?php mysql_close($conn); ?>