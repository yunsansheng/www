<?php
	session_start();
	if (!isset($_SESSION['admin'])) {
		header('location:../../index.html');
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>主页</title>
	<link rel="stylesheet" href="../../lib/bootstrap/bootstrap.min.css">
	<style>

	




	</style>
</head>
<body>

	<?php include '../template/navbar.php' ?>

	
	<!-- 引入jquery -->
	<script src="../../lib/jquery/jquery2.2.4.min.js"></script>
	<script src="../../lib/bootstrap/bootstrap.min.js"></script>
	
</body>

</html>