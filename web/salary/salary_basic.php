<?php
	session_start();
	if (!isset($_SESSION['admin'])) {
		header('location:../login_m.html');
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>cal_salary</title>
	<link rel="stylesheet" href="../../lib/bootstrap/bootstrap.min.css">
	<style>
	.nin{
		margin-top:15px;
		margin-left:20px;
		margin-right:20px;

	}


	.head{
		line-height: 40px;
		padding: 0px 10px;
		margin-top:10px; 
	}

	.p1{font-size:32px;letter-spacing:-2px;font-family:Arial,Helvetica, Sans-Serif;}
	  .g1{color:#1065e6;}
	  .o1{color:#df432e;}
	  .o2{color:#ffb709;}
	  .g2{color:#166df1;}
	  .l{color:#03a25d;}
	  .e{color:#d64632;}

	#myAvatar{   /*头像*/
		border-radius: 50%;
	    /*height: 40px;*/
	    max-width: 40px;
	    overflow: hidden;
	}

	</style>
</head>
<body>
	
	<div class="container">
		<!-- 头信息 -->
		<div class="row head">
				<span class="p1 g1">Q</span>
				<span class="p1 o1">s</span>
				<span class="p1 o2">o</span>
				<span class="p1 g2">n</span>
				<span class="p1 l">e</span>
				<span class="p1 e">s</span>
				<!-- 图标和退出 -->
				<div class="dropdown pull-right ">
					<a class="dropdown-toggle" data-toggle="dropdown" title="">
						<img id="myAvatar" src="../../mylib/image/header.jpg" alt="">
						<span class="username"> 
							<?php echo ucfirst($_SESSION['admin']);?>
							<span class="caret"></span>	
						 </span>
						
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="salary_basic.php">基本设置</a></li>
						<li class="divider" role="presentation"></li>
						<li><a href="../logout_m.php">退出</a></li>
					</ul>
				</div>

		</div>
		<hr>

		<!-- 基本工资 -->
		<div class="row nin">
			<div class="input-group">
				<div class="input-group-addon">基本工资</div>
				<input type="text" class="form-control" id="basic"  placeholder="请输入基本工资">
			</div>
		</div>
	

		<!-- 公积金 -->

		<div class="row nin">
			<div class="input-group">
				<div class="input-group-addon">公积金&nbsp;&nbsp;&nbsp;</div>
				<input type="text" class="form-control" id="gjj"  placeholder="请输入每月公积金">
			</div>
		</div>

		<!-- 保存和返回 -->
		<div class="row nin">
			<button type="button" class="btn btn-info btn-block" id="save"><b>保存</b></button>
		</div>
	
		<div class="row nin">
			<button type="button" class="btn btn-success btn-block" id="return"><b>返回</b></button>
		</div>


	</div>

	
	<!-- 引入jquery -->
	<script src="../../lib/jquery2.2.4.min.js"></script>
	<script src="../../lib/bootstrap/bootstrap.min.js"></script>

	<script>
	function pdnum(t){
		if(!isNaN(t)){
		      return 1;
		  }else{
		      return -1;
		  }
	}
	$.getJSON("data/basic/get.php",function(result){
		
		$('#basic').val(result.basic);
		$('#gjj').val(result.gjj);

	  });

	$('#save').click(function(){
		var basic=$('#basic').val();
		var gjj =$('#gjj').val();
		if(pdnum(basic)==1&&pdnum(gjj)==1){
			$.ajax({
				url : 'data/basic/update.php',
				type : 'post',
				data : {
					basic: basic,
					gjj: gjj,	
				},
				beforeSend : function () {

				},
				success : function (data, response, status) {
					// 保存成功
					alert("保存成功")
				},
				
			});

		}else{
			alert("请输入数字")
		}



	});


	$('#return').click(function(){
		location.href = 'index.php';
	});

	// 页面打开时自动赋值
	

	</script>

</body>

</html>
