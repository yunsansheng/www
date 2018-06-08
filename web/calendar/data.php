<?php
 //session_start();
include_once("codebase/connector/scheduler_connector.php");
 
$res= mysql_connect("localhost","root","rWqAssNX9tY7bwUm")or die("Uable to connect");
mysql_select_db("web");
 

mysql_query("set character set 'utf8'");//读库
mysql_query("set names 'utf8'");//写库 

$conn = new SchedulerConnector($res);
$conn->render_table("events","id","start_date,end_date,text");


?>