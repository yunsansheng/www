<?php

	header("ALLOW-CONTROL-ALLOW-ORIGIN:*");
	require '../../config.php';

	
	
	$from= @$_POST['from'];
	$to = @$_POST['to'];
	$sign =@$_POST['sign'];
	$del =@$_POST['del'];

	
	
	$query = mysql_query("SELECT id,word,ph_en,desc_cn,ph_en_mp3,sign,del FROM word_list where id >$from and id <=$to and sign in $sign and del in $del") or die('SQL ´íÎó£¡');
	$json = '';
	
	while (!!$row = mysql_fetch_array($query, MYSQL_ASSOC)) {
		$json .= json_encode($row).',';
	}
	

	$json = substr($json, 0, -1);
	echo '['.$json.']';
	//echo '{"total" : '.$total.', "rows" : ['.$json.']}';
	
	mysql_close();
	
?>