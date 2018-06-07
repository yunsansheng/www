<!-- 登出 -->

<?php
	session_start();
	session_destroy();
	header('location:index.html');
?>


