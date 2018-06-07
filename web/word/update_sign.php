<?php
	require '../../config.php';

	
	$id= @$_POST['id'];
	$sign = @$_POST['sign'];

	
	$query = mysql_query("update word_list set sign =$sign where id = $id ") or die('SQL 失败');
	
	mysql_close();
	
?>