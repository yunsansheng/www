<?php
	require '../../config.php';

	
	$id= @$_POST['id'];
	$del = @$_POST['del'];

	
	$query = mysql_query("update word_list set del =$del where id = $id ") or die('SQL 失败');
	
	mysql_close();

	echo json_encode(array('success'=>true));
	
?>