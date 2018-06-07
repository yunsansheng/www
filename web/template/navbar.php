<?php 

echo '


<nav class="navbar navbar-default" role="navigation" style="background-color:white;">
  <div class="container-fluid">
  
    <div class="navbar-header navbar-right">
		  <!-- 响应式按钮 -->
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
			
		<!-- logo -->
	       <a class="navbar-brand">
			<span style="font-size:28px"> ';

			include "logo.php"; 
			echo '</span>
	       </a>
		 
		<!-- 头像和菜单等 -->
	      <div class="dropdown pull-right" style="margin-top:4px;margin-right:20px;">
	      		<a class="dropdown-toggle" data-toggle="dropdown" title="" style="text-decoration:none;color:grey;font-size:16px;">
	      			<img  style="border-radius: 50%;max-width: 40px;overflow: hidden;" id="myAvatar" src="../../mylib/image/header.jpg" alt="">	
	      			<span class="username">';
	      				echo ucfirst($_SESSION["admin"]);
	      	            echo '<span class="caret"></span>	
	      			</span>
	      			
	      		
	      		<ul class="dropdown-menu" role="menu">
	      			<!--此处可以进行菜单的设置-->
	      			<li><a href="../home/home.php">返回主页</a></li>
	      			<li class="divider" role="presentation"></li>
	      			<li><a href="../../logout.php">退出</a></li>
	      		</ul>
	      	</div>

    </div> <!-- end of head -->



    <!-- 内容 -->
    <div class="collapse navbar-collapse" id="bs-navbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="../home/home.php">首页</a></li>
        <li><a href="#">常用</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">未分类<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">功能1</a></li>
            <li class="divider"></li>
            <li><a href="#">功能2</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>
';







 ?>
 