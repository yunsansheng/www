<?php

require '../../../../config.php';
session_start();
$basic = $_POST['basic'];
$gjj = $_POST['gjj'];
$user =$_SESSION['admin'];





// 判断select的结果
$sql_select = "select * from  basic_salary where user='$user' ";
$res = mysql_query($sql_select);
$row = mysql_fetch_array($res);  


$sql_insert="insert into basic_salary (user,basic,gjj) values ('$user','$basic','$gjj')";
$sql_update="update basic_salary set basic='$basic',gjj='$gjj' where user='$user'";



if(empty($row)){
    // echo '数据为空';//执行insert
    	mysql_query($sql_insert);
    	echo mysql_affected_rows();
}else{
    // echo "有值";//执行update
    	mysql_query($sql_update);
    	echo mysql_affected_rows();
    
}



mysql_close();

?>