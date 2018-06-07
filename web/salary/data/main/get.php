<?php

require '../../../../config.php';
session_start();
$user =$_SESSION['admin'];


$rs = mysql_query("select * from  basic_salary where user='$user'");






    $result = array();
    while($row = mysql_fetch_object($rs)){
    	array_push($result, $row);
    }

    if (empty($result)){
    	// echo ""

    }else{
    	  echo json_encode($result[0]);	
    }
  
    



?>