<?php
header("Access-Control-Allow-Origin: *"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Word</title>
	<link rel="stylesheet" href="../../lib/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../lib/bootstrap-table/bootstrap-table.min.css">
	
	<style>

	  .w70 {width: 70px !important;}
	  td{ height: 30px !important;}
	

	#con{
		display:inline-block !important;
		float:left;
	
	
		}
	
	#trans{
		width:400px;
		position:fixed;
		right:30px;
		top:100px;
		//border:1px dashed blue ;
	}



	</style>
</head>
<body>

	<p></p>

		<div id="toolbar">
            <div class="form-inline" role="form">
                <div class="form-group">
                    <span>From: </span>
                    <input name="from" class="form-control w70" type="text" value="0">
                </div>
                <div class="form-group">
                    <span>to: </span>
                    <input name="to" class="form-control w70" type="text" value="100">
                </div>
				
				<div class="dropdown form-group">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<span id="sign_tag">所有标记</span>
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li class ="sel_sign active" value="(0,1)"><a>所有标记</a></li>
						<li class="sel_sign" value ="(1)"><a>已收藏</a></li>
						<li class="sel_sign" value="(0)"><a>未收藏</a></li>
					</ul>
				</div>
				
				<div class="dropdown form-group">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<span id="del_tag">未删除</span>
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li class ="sel_del" value="(0,1)"><a>所有数据</a></li>
						<li class="sel_del" value="(1)"><a>已删除</a></li>
						<li class="sel_del active" value="(0)"><a>未删除</a></li>
					</ul>
				</div>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <button id="ok" type="submit" class="btn btn-default">刷新</button>
            </div>
        </div>
		
		
		
	<div style="width:900px" id="con">
		<table id="table"></table>	
	</div>
	<div  id="trans">
	
	<p></p>
	</div>
	
	

	<!-- 引入jquery -->
	<script src="../../lib/jquery/jquery2.2.4.min.js"></script>
	<script src="../../lib/bootstrap/bootstrap.min.js"></script>
	<script src="../../lib/bootstrap-table/bootstrap-table.min.js"></script>
	<script src="../../lib/bootstrap-table/bootstrap-table-zh-CN.min.js"></script>
	<script src="../../lib/vanspeak/vanspeak.min.js"></script>
	<script>
	



		$('#table').bootstrapTable({
			url: 'load_word.php',
			columns: [/*{
					field: 'check',
					title: 'Check',
					checkbox:'true',
				},*/
				{
					field: 'id',
					title: 'ID',
					width:'48px',
				},{
					field: 'word',
					title: 'Word',
					width:'180px',
					formatter:wordFormatter
				}, {
					field: 'ph_en',
					title: 'ph_en',
					width:'180px',
					formatter:wordFormatter
				},{
					field: 'desc_cn',
					title: 'Desc',
					width:'380px'
			},{
					field: 'ph_en_mp3',
					title: 'voice',
					width:'30px',
					formatter:voiceFormatter
					
			},{
					field: 'sign',
					title: 'Sign',
					width:'30px',
					formatter:signFormatter
					
			},{
					field: 'del',
					title: 'Del',
					width:'30px',
					formatter:delFormatter
					
			}],
			showColumns:'true',
			//showRefresh:'true',
			//showToggle:'true',
			//search:'true',
			//striped:'true',
			sortName:'id',
			sortOrder:'asc',
			method:'POST',
			pagination: 'true',
			pageList: '[10, 25, 50, 100,200]',
			//showPaginationSwitch:'true',
			checkbox:'true',
			//clickToSelect:'true',
			toolbar:'#toolbar',
			pageSize:'100',
			contentType:"application/x-www-form-urlencoded",
			queryParams:function(params){
				return{
					from: parseInt($("[name='from']").val()),
					to: parseInt($("[name='to']").val()),  
					sign:$(".sel_sign.active").attr("value"),
					del:$(".sel_del.active").attr("value"),
					order : params.order, 
					ordername : params.sort,
				}
			},
			onClickRow:function(row){
				//console.log(row.word)
				parse_xml(row.word);
			},

			
		});
		
		function changebool(num){
			if (num == 1){
				return 0;
			}else if (num ==0){
				return 1;
			}
		}
		
		
		
		function wordFormatter(value,row,index){
			//alert(row);
			return '<div style="height:100%;background-color:;"  data-toggle="tooltip" title="'+row.desc_cn+'">'+value+'</div>';
			
		}
		
		
		function voiceFormatter(value, row, index){
			if (value == null){
				return null;
			}else{
				return '<button class="play glyphicon glyphicon-volume-up"><audio src="'+value+'"></audio></button>';
			}
		}
		
		function signFormatter(value,row,index){
			if (value ==1){
				return '<button class="sign glyphicon glyphicon-star" oid ="'+row.id+'" value="'+value+'"></button>';
			}else if (value ==0){
				return '<button class="sign glyphicon glyphicon-star-empty" oid="'+row.id+'" value="'+value+'"></button>';
			}	
		}
		
		function delFormatter(value,row,index){
			if (value ==1){
				return '<button class="del glyphicon glyphicon-share-alt" oid ="'+row.id+'" value="'+value+'"></button>';
			}else if (value ==0){
				return '<button class="del glyphicon glyphicon-trash" oid="'+row.id+'" value="'+value+'"></button>';
			}	
		}
		
		function parse_xml(word) {
			//alert(word);
			$.ajax({
				type: 'get',
				dataType:'json',
				url: 'get_trans.php',
				data:{
					word:word,
					},
				success:function(res){
					var json=res;
					var len =json[0].sent.length;
					//console.log(json[0].sent[0].orig);
					//console.log(json[0].sent[0].trans);
					//console.log(typeof(len))
					$("#trans").text('')
					if (len ==0){
						$("#trans").text("无例句");
					}else{
					
						for (var i =0; i<len;i++){
							$("#trans").append("<hr>")
							if (i>=3){
								break;
							}
							t="<p class='engtrans'>"+json[0].sent[i].orig+"</p>"
							var n=t.replace(word.toString(),"<span style='color:red'>"+word+"</span>");
							//console.log(n);
							$("#trans").append(n)
							$("#trans").append("<p>"+json[0].sent[i].trans+"</p>")
						}
						
						
					}
				},
			});
		}
		
		//glyphicon glyphicon-trash
		//glyphicon glyphicon-share-alt
		
		$(".sel_sign").on("click",function(){
			//alert($(this).text());
			$(".sel_sign").removeClass("active") 
			$(this).addClass("active")
			$("#sign_tag").text($(this).text());
			//console.log($(this).attr("value"))
		});
		
		$(".sel_del").on("click",function(){
			//alert($(this).text());
			$(".sel_del").removeClass("active") 
			$(this).addClass("active")
			$("#del_tag").text($(this).text());
		});
		
		
		
		//绑定未来元素的方法一定要绑定在父级上
		$("#table").on("click",'.play',function(value,row,index){
				var $this = $(this),
				$audio = $this.find("audio");
				$audio.get(0).play();

				
		});
		
		$("#table").on("click",'.sign',function(){
			var $this = $(this);
			$oid =  $this.attr("oid");
			$sign = changebool($this.val())
			//alert($sign)
			$.ajax({
				type: 'POST',
				url: 'update_sign.php',
				data: {
					id:$oid,
					sign:$sign,
				},
				success:function(){

					$("#table").bootstrapTable('refresh');
					
				}
			});
			
		});
		
		$("#table").on("click",'.del',function(event){

			var $this = $(this);
			$oid =  $this.attr("oid");
			$del = changebool($this.val());
			$deltype = $(".sel_del.active").attr("value");


			//alert($del)
			$.ajax({
				type: 'POST',
				url: 'update_del.php',
				data: {
					id:$oid,
					del:$del,
				},
				success:function(){
					//console.log($del);//1
					//console.log($deltype);//(0)
					//$oid一定要是string类型才可以
					
					//只有 图标是删除，并且过滤条件是为删除才从界面删除（假删除）
					if ($del ==1 && $deltype=="(0)" ){
						$("#table").bootstrapTable('remove', {field: 'id', values: [$oid]});
					}
					
					//$("#table").bootstrapTable('refresh');

					
				}
			});
			event.stopPropagation();
			$("#trans").text("");
		});
		
	

		$(function(){
			//点ok刷新数据
			$('#ok').click(function(){
				$('#table').bootstrapTable('refresh');
				$("#trans").text("无例句");

			});
			
			
			
			
		})
		
	
	</script>
	
</body>

</html>
