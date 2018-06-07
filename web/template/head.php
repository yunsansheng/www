<!-- <script src="../../lib/jquery2.2.4.min.js"></script>
<script src="../../lib/bootstrap/bootstrap.min.js"></script> -->

<?php 

//打印前部
//需要放在container中第一行，eg //include 'head.php'
echo '<div class="row" style="line-height: 40px;padding: 0px 10px;margin-top:10px;" >
		<!-- logo -->
		<span style="font-size:32px">   ';
		//导入logo
		include "logo.php";
		//导入后中部
  		echo '</span>

		<!-- 图标和退出 -->
		<div class="dropdown pull-right ">
			<a class="dropdown-toggle" data-toggle="dropdown" title="" style="text-decoration:none;color:grey;font-size:16px;">
				<img  style="border-radius: 50%;max-width: 40px;overflow: hidden;" id="myAvatar" src="../../mylib/image/header.jpg" alt="">	
				<span class="username"> ';
				// 打印用户
					echo ucfirst($_SESSION["admin"]);
				//打印后部
					echo '<span class="caret"></span>	
				 </span>
				
			</a>
			<ul class="dropdown-menu" role="menu">
				<!--此处可以进行菜单的设置-->
				<li><a href="../home/home.php">返回主页</a></li>
				
				<li class="divider" role="presentation"></li>
				<li><a href="../../logout.php">退出</a></li>
			</ul>
		</div>
</div>';


 ?>