<?php  
	require_once('conn.php');
	$page = isset($_GET["page"]) ? $_GET["page"] : "1";
	$action = isset($_GET["act"]) ? $_GET["act"] : "";
	$key = (isset($_POST["k"]) ? $_POST["k"] : (isset($_GET["k"]) ? $_GET["k"] : ""));
	

	if($action=="del"){
	$id = $_GET["id"];	
		if(empty($id) || !is_numeric($id)){
		  mysql_close($conn);
		  die("<script>alert('参数id不能为空且只能为数字!');location.href='admin_class.php?k=".$key."&page=".$page."';</script>");
	  }else{		  
	      $query = mysql_query("select id from class where id=".$id,$conn);
		  
		  
		  mysql_free_result($query);
		  
		  mysql_query("delete from class where id=".$id,$conn);
		 
		  mysql_close($conn);		  
		  die("<script>alert('班级已删除!');location.href='admin_class.php?k=".$key."&page=".$page."';</script>");
	  }
	  
	 	
	 }else if(isset($_POST["operate"]) && trim($_POST["operate"])=="delvote"){//删除单条或多条记录
	  if(isset($_POST["XHID"]) && is_array($_POST["XHID"]) && count($_POST["XHID"])>0){
		  $tids = implode(",",$_POST["XHID"]);
		  for($i=0;$i<count($_POST["XHID"]);$i++){//删除对应目录下的所有文件
			  $id = $_POST["XHID"][$i];
			  $query = mysql_query("select id from class where id=".$id,$conn);
			  
			  mysql_free_result($query);
			  
		  }
		  $query= mysql_query("delete from class where id in(".$tids.")",$conn);
		  
		  mysql_close($conn);
		  die("<script>alert('班级已删除!');location.href='admin_class.php?k=".$key."&page=".$page."';</script>");
	  }else{		 
	     mysql_close($conn);
		 die("<script>alert('请选择要删除的条目!');location.href='admin_class.php?k=".$key."&page=".$page."';</script>");		 
	 }
 
	}else if(isset($_POST["operate"]) && $_POST["operate"]=="search"){
		mysql_close($conn);
	 	die("<script>location.href='admin_class.php?k=".$key."&page=".$page."';</script>");
	}
?>
<html>
<head>
<?php
  head();
  check();
?>
<title>【枝江英杰学校学生评教系统】后台管理中心</title>
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
function del(value){
	if(confirm('确定删除?')){
		location.href=value;
	}
}
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	  <table width="100%" id="table2" cellspacing="1">
	    <tr>
    <td id="TableTitle1">管理班级 -&gt;
     <?php
	   if(!empty($key))
	   {
		   echo "搜索班级(".$key.")";
	   }
	   else
	   {
		   echo "所有班级";
	   }
	 ?>
	 </td>
     </tr>
	 </table>
      </td>
  </tr>
  <tr>
    <td>
	   <table border="1" width="100%" id="table2" bordercolor="#A9C9E2" cellspacing="1">
        <form action="?act=save&page=<?php echo $page;?>&k=<?php echo $key;?>" method="post" name="XHH" id="XHH">
          <tr id="TableTitle2">
          
            <td width="5%" align="center"><a href="javascript:XH()">选择</a></td>
            <td align="center" width="18%"> 班级编号</td>
            <td align="center">班级名称</td>
            
            
            <td width="20%" align="center">单项操作</td>
          </tr>
		  <?php		    
			if(!empty($key) || $key=="0"){
				$selectcmd="select * from class where class_name like '%".$key."%' or class_num like '%".$key."%' order by class_num desc";				
			}
			else{
				$selectcmd="select * from class order by class_num desc";
			}				
			$query= mysql_query($selectcmd,$conn);
			$recordcount = mysql_num_rows($query);//记录数
			$pagesize=20;
			$curpage=$page;			
			$pages=20;
			pager($recordcount,$pagesize,$curpage,$pages,$key,"admin_class.php");
			$selectcmd.=" limit ".$firstcount.",".$pagesize;
			$query=mysql_query($selectcmd,$conn);
			while($row=mysql_fetch_array($query)){				
		  ?>
          <tr id="TableTitle3" onmouseover='this.className="over_TableTitle3"' onmouseout='this.className="out_TableTitle3"' class="out_TableTitle3">
            
            <td width="5%" align="center"><input type="checkbox" name="XHID[]" id="XHID" value="<?php echo $row["id"]; ?>"></td>
            <td align="center" width="18%"><?php echo $row["class_num"];?></td>
            <td align="center"><a href="admin_class_modify.php?id=<?php echo $row["id"];?>"><?php echo $row["class_name"];?></a></td>
            
            <td width="20%" align="center"><a href="admin_class_modify.php?id=<?php echo $row["id"];?>">修改</a> / <a href="javascript:void(0)" onClick="del('admin_class.php?act=del&page=<?php echo $curpage?>&k=<?php echo $key?>&id=<?php echo $row["id"]?>');">删除</a></td>
          </tr>
		  <?php			    
			}
	        mysql_free_result($query);			
		  ?>          
          <tr id="TableTitle2">
            
            <td width="5%" align="center"><a href="javascript:XH()">选择</a></td>
            <td align="center">班级名称</td>
            <td align="center" width="18%"> 班级代码</td>
            
            <td width="20%" align="center">单项操作</td>
          </tr>
          <tr>
            <td colspan="8"><input class="btn" type="submit" name="delvote" id="delvote" value="删除所选班级" onClick="if(confirm('确定删除?')){frmsubmit('delvote');}">
              |
              <input type="text" name="k">
			  <input type="hidden" name="operate" id="operate" value=""/>
              <input class="btn" type="button" name="search" value="搜索班级" onClick="frmsubmit('search')"></td>
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