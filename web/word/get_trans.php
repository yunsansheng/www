<?php
header("Access-Control-Allow-Origin: *"); 
header('Content-type:text/html;charset=utf8'); 

@$word=$_GET["word"];


$url="http://dict-co.iciba.com/api/dictionary.php?w=$word&type=xml&key=2A6381DA00C5F55DAE52B76AF3564377";
//echo $url;

$xml = simplexml_load_file($url)or die("Error: Cannot create object");
$json = json_encode($xml);


echo '['.$json.']';
//$origin =var_dump($xml);



?>
