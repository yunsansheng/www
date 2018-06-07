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
	<title>cal_salary</title>
	<link rel="stylesheet" href="../../lib/bootstrap/bootstrap.min.css">
	<style>

		html,body{
			 height:100%;
			 width:100%
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

		.d {
		    border: 1px solid transparent;
		    border-radius: 4px;
		    cursor: pointer;
		    display: inline-block;
		    font-size: 14px;
		    font-weight: normal;
		    line-height: 1.42857;
		    margin-bottom: 0;
		    padding: 6px 0px;
		    text-align: left;
		    vertical-align: middle;
		    white-space: nowrap;
		    /*background-color: #5bc0de;*/
		    background-color:#d9edf7;
		    border-color: #d9edf7;
		    color:black;
		    width: 100%;
		}
		.tdcs{
			padding: 0px !important;
		}
		.iptcs{
			width:100%;
			min-width:10px; 
		}
		.pcs{
			margin-top:5px; 
		}
	


	</style>
</head>
<body>

	<div class="container">
		<!-- 头信息 -->
		<div class="row head">
			<span style="font-size:32px">
			<?php include '../template/logo.php' ?>
			</span>
			<!-- 	<span class="p1 g1">Q</span>
				<span class="p1 o1">s</span>
				<span class="p1 o2">o</span>
				<span class="p1 g2">n</span>
				<span class="p1 l">e</span>
				<span class="p1 e">s</span> -->
				<!-- 图标和退出 -->
				<div class="dropdown pull-right ">
					<a class="dropdown-toggle" data-toggle="dropdown" title="">
						<img id="myAvatar" src="../../mylib/image/header.jpg" alt="">
						<span class="username"> 
							<?php echo ucfirst($_SESSION['admin']); ?>
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

		<table class="table">
		  <tr>
		    <th>底薪</th>
		    <th>绩效</th>
		    <th>加班</th>
		    <th>其他</th>
		  </tr>
		  <tr>
		    <td><span id="all"></span></td>
		    <td><span id="jixiao"></span></td>
		    <td><span id="add"></span></td>
		    <td><span id="other"></span></td>

		  </tr>
		</table>
		
		<!-- <div class="d" ><b>加班输入</b></div> -->

	<!-- 	<div class="row">
			<div class="col-xs-3">1.5</div>
  			<div class="col-xs-3">2</div>
  			<div class="col-xs-3">.col-xs-3</div>
  			<div class="col-xs-3">.col-xs-3</div>
		</div> -->
		<table class="table table-condensed table-bordered" text-align="center">
		  <tr class="info">
		    <th>1.5倍</th>
		    <th>2倍</th>
		    <th>3倍</th>
		    <th>Other</th>
		  </tr>
		  <tr>
		    <td class="tdcs"><input class="iptcs" id="one_lv" type="text"></td>
		    <td class="tdcs"><input class="iptcs" id="se_lv"  type="text"></td>
		    <td class="tdcs"><input class="iptcs" id="th_lv"  type="text"></td>
		    <td class="tdcs"><input class="iptcs" id="oth_lv" type="text"></td>
		  </tr>
		</table>
		<button type="button" class="btn btn-success btn-block" id="saveadd"><b>保存</b></button>
		<p class="pcs">社保:&nbsp;- <span id="shebao"></span></p>
		<p class="pcs">公积金:&nbsp;- <span id="gongjj"></span></p>
		<p class="pcs">扣税:&nbsp;- <span id="koushui"></span></p>
		<p class="d"><b>税后收入: <span id="shuihou"></span></b></p>

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

	// 个人所得税计算
	function Rate_7(XSum){
	    var Rate;
	    var Balan;
	    var TSum_7;
	    if (XSum<=1500) 
	      {Rate=3;
	      Balan=0;
	      }
	    if ((1500<XSum) && (XSum<=4500)) 
	      {Rate=10;
	      Balan=105;
	      }
	    if ((4500<XSum) && (XSum<=9000))
	      {Rate=20;
	      Balan=555;
	      }
	    if ((9000<XSum) && (XSum<=35000))
	      {Rate=25;
	      Balan=1005;
	      }
	    if ((35000<XSum) && (XSum<=55000))
	      {Rate=30;
	      Balan=2755;
	      }
	    if ((55000<XSum) && (XSum<=80000))
	      {Rate=35;
	      Balan=5505;
	      }
	    if (XSum>80000) 
	      {Rate=45;
	      Balan=13505;
	      }
	      TSum_7=(XSum*Rate)/100-Balan
	     if (TSum_7<0) 
	     {
	       TSum_7=0
	     }
	      return TSum_7
	    }

	function tonumber(data){
		if (data==null || data=='' ||data==0){
			return 0;
		}else{
			return parseInt(data);
		}

	}

	

	function main(){//主程序,获取数据，计算，并赋值到界面。
		
		$.getJSON("data/main/get.php",function(result){
			var mydata={};
			mydata.basic=tonumber(result.basic);
			mydata.gjj=tonumber(result.gjj);
			mydata.one_lv=tonumber(result.one_lv);
			mydata.se_lv=tonumber(result.se_lv);
			mydata.th_lv=tonumber(result.th_lv);
			mydata.oth_lv=tonumber(result.oth_lv);
			
			mydata.hour=mydata.basic/(21.75*8);//时薪

			mydata.add=Math.round(mydata.hour*(1.5*mydata.one_lv+2*mydata.se_lv+3*mydata.th_lv)*100)/100;//加班费
			mydata.shebao=Math.round((mydata.oth_lv+mydata.add+mydata.basic*1.3)*0.105*100)/100; //社保
			mydata.shuiqian=mydata.oth_lv+mydata.add+mydata.basic*1.3-mydata.shebao-mydata.gjj;//税前
			mydata.koushui=Math.round(Rate_7(mydata.shuiqian-3500)*100)/100;//税收
			mydata.shuihou=Math.round((mydata.shuiqian-mydata.koushui)*100)/100;//税后
			mydata.jixiao=mydata.basic*0.3;//绩效
			console.log(typeof(mydata.shuiqian));

			
			// 界面赋值
			$('#all').text(mydata.basic);
			$('#jixiao').text(mydata.jixiao);
			$('#add').text(mydata.add);
			$('#other').text(mydata.oth_lv);

			$('#one_lv').val(mydata.one_lv);
			$('#se_lv').val(mydata.se_lv);
			$('#th_lv').val(mydata.th_lv);
			$('#oth_lv').val(mydata.oth_lv);

			$('#shebao').text(mydata.shebao);
			$('#gongjj').text(mydata.gjj);
			$('#koushui').text(mydata.koushui);
			$('#shuihou').text(mydata.shuihou);




		});

	}
	main();

	


	$('#saveadd').click(function(){
		var one_lv=$('#one_lv').val();
		var se_lv =$('#se_lv').val();
		var th_lv=$('#th_lv').val();
		var oth_lv=$('#oth_lv').val();

		if(pdnum(one_lv)==1&&pdnum(se_lv)==1&&pdnum(th_lv)&&pdnum(oth_lv)){
			$.ajax({
				url : 'data/main/update.php',
				type : 'post',
				data : {
					one_lv: one_lv,
					se_lv: se_lv,
					th_lv: th_lv,
					oth_lv: oth_lv,	
				},
				beforeSend : function () {

				},
				success : function (data, response, status) {
					// 保存成功
					alert("保存成功");
					main();
					// cal_main();
				},
				
			});

		}else{
			alert("请输入数字")
		}


	});



	</script>

</body>

</html>