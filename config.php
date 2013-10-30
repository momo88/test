<?php
	  class Config
	  {
		  private $webname="",$weburl="",$systemurl="";
			  
		  public function Config(){		  
			  global $conn;
			  $query = mysql_query("select * from xh_config",$conn);
			  while($row=mysql_fetch_array($query))
			  {
				  $this->webname=trim($row["webname"]);
				  $this->weburl=trim($row["weburl"]);
				  $this->systemurl=trim($row["systemurl"]);
						  
			  }
			  mysql_free_result($query);		  
		  }
		  public function getwebname(){
			  return $this->webname;
		  }
		  public function getweburl(){
			  return $this->weburl;
		  }
		  public function getsystemurl(){
			  return $this->systemurl;
		  }
		 
	  }  
	  $cfg=new Config();  
?>