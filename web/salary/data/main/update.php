<?php

require '../../../../config.php';
session_start();

$user =$_SESSION['admin'];

$one_lv = $_POST['one_lv'];
$se_lv = $_POST['se_lv'];
$th_lv = $_POST['th_lv'];
$oth_lv = $_POST['oth_lv'];





// 判断select的结果
$sql_select = "select * from  basic_salary where user='$user' ";
$res = mysql_query($sql_select);
$row = mysql_fetch_array($res);  


$sql_insert="insert into basic_salary (user,one_lv,se_lv,th_lv,oth_lv) values ('$user','$one_lv','$se_lv','$th_lv','$oth_lv')";
$sql_update="update basic_salary set one_lv='$one_lv',se_lv='$se_lv',th_lv='$th_lv',oth_lv='$oth_lv' where user='$user'";



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