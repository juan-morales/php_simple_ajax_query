<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="author" content="Morales Juan Carlos">
		<meta name="keywords" content="php, ajax, query, javascript, demo">
		<meta name="description" content="La Banda - consulta de expedientes">

		<link rel="stylesheet" type="text/css" href="css/w3.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/loaders.min.css">

		<script type="text/javascript" src="js/jquery.min.js"></script>

		<title>AJAX Query - Simple Jquery AJAX Query / PHP BackEnd</title>

		<script>
		function showHide(id) {
		    var x = document.getElementById(id);
		    var y = document.getElementById('but_' + id);
		    if (x.className.indexOf("w3-show") == -1) {
		        x.className += " w3-show";
		        y.className = y.className.replace(" w3-white", " w3-indigo");

		    } else { 
		        x.className = x.className.replace(" w3-show", "");
		        y.className = y.className.replace(" w3-indigo", " w3-white");
		    }
		};

		function mySearch(){
		
			var modal = $('#modal_loading');
			modal.show();
			
			$('#div_result_info').empty();
			
			var ajaxCall = $.ajax({
				//your URL
				url: 'http://localhost/php_simple_ajax_query/search.php',
				//your parameters, to be send to the server to perform a query in DB
				data:{
					parameter_1: $('#edit_parameter1').val(),
					parameter_2: $('#edit_parameter2').val()
				},
				
				type: 'POST',
				async: true,
				
				beforeSend: function(jqXHR) {
					jqXHR.overrideMimeType('text/html;charset=iso-8859-1');
				},
				timeout: 5000
			});
			
			ajaxCall.done(function(response) {
				var modal = $('#modal_loading');
				modal.hide();
				$('#div_result_info').append(response);
				var y = document.getElementById('div_result');
				y.className = y.className.replace("w3-hide", "w3-show");
			});
			
			//FAIL
			ajaxCall.fail(function(response) {
				var modal = $('#modal_loading');
				modal.hide();
				$('#div_result_info').append('<p>Time limit.</p>');
				var y = document.getElementById('div_result');
				y.className = y.className.replace("w3-hide", "w3-show");
			});
		};
		</script>
	</head>

	<body class="w3-myfont">

		<!-- MODAL PROCESSING-->
		<div id="modal_loading" class="">
			<style type="text/css">
				#modal_loading {
					display: none; /* Hidden by default */
					position: fixed; /* Stay in place */
					z-index: 1900; /* Sit on top */
					left: 0;
					top: 0;
					width: 100%; /* Full width */
					height: 100%; /* Full height */
					overflow: hidden; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
					
				}

				/* Modal Content/Box */
				#modal_loading .modal_content {
					border-radius: 10px;
					background-color: rgba(0,0,0,0.5);
					margin: 25% auto;
					padding: 5px;
					border: 1px solid #888;
					width: 70%;
					font-family:"Ubuntu";
				}
			</style>
			
			<div class="modal_content w3-center">
				<p class="w3-text-white" >Searching ...</p>				
				<div class="loader-inner line-scale">
					<!--
					<div style="color:red;font-size:20px;background-color:rgb(255,255,255)"></div>
					<div style="color:green;font-size:20px;background-color:rgb(255,255,255)"></div>
					<div style="color:blue;font-size:20px;background-color:rgb(255,255,255)"></div>
					-->
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>			
			</div>			
		</div>
		<!-- -->

		<header class="w3-container w3-card-2 w3-center">
			<img src="img/logo.png" alt="" height="120">
			<h2 class="w3-wide w3-myfont"><b>Query</b> in server</h2>
			<span class="w3-medium">
				<b>Last update:</b> (Some date of last record in DB recovered by php code.)
			</span>
			<hr/>
		</header>
		
		<div class="w3-container w3-light-grey">
			<div class="w3-panel w3-card-2 w3-padding w3-round w3-white w3-left " style="width:100%;margin-bottom:5px !important;margin-top:5px !important">
				<div style="width:100%; box-sizing:border-box;padding:1px;display:inline-block;">
					<div style="width:60%; box-sizing:border-box;margin:0px;padding:1px;float:left;">
						<label class="w3-label w3-text-black" style="width:100px;">Parameter N° 1:</label><br/>
						<input type="number" id ="edit_parameter1" name="edit_parameter1" onchange="" class="w3-round w3-center w3-xlarge" style="width:100%;overflow:hidden;box-sizing:border-box;" maxlength="8">					
					</div>
					<div style="width:39%; box-sizing:border-box;margin:0px;padding:1px;float:right;">
						<label class="w3-label w3-text-black" style="width:100px;">Parameter N° 2:</label><br/>
						<input type="number" id ="edit_parameter2" name="edit_parameter2" onchange="" class="w3-round w3-center w3-xlarge" style="width:100%;overflow:hidden;box-sizing:border-box;" maxlength="4">
					</div>
				</div>
				<div style="width:100%;box-sizing:border-box;" class="w3-center">
					<button class="w3-btn w3-indigo w3-round w3-large" 
					style="margin-bottom:10px;width:70%;max-width:200px;" onclick="mySearch();">Search</button>
				</div>
			</div>

			<div id="div_resultado" class="w3-panel w3-card-2 w3-padding w3-round w3-white w3-left w3-hide " style="width:100%;margin-top:0px !important;">
				<span class="w3-medium w3-text-green w3-wide"><b>Results:</b></span>
				<hr/>
				<div id="div_resultado_info" class="w3-container" style="float:none; padding:0px;">
				</div>
			</div>
		</div>
	</body>
</html>
