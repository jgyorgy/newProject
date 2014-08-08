<!doctype html>
<html>
	<head>
		<?php 
			include_once('../config/config.php');
		?>
		<title>Project</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<!--datepicker-->
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
		<!--selectbox-->
		<link href="../css/jquery.selectBox.css" type="text/css" rel="stylesheet" />
		<script src="../js/jquery.selectBox.js"></script>
		<link href="../css/jquery.ui.timepicker.css" type="text/css" rel="stylesheet" />
		<script src="../js/jquery.ui.timepicker.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<script type="text/javascript">
		$(document).ready(function() {
			$( "#datepicker" ).datepicker();
			$( "#timepicker" ).timepicker();
			$('select').selectBox();
		});
		</script>
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<ul class="headerMenu">
					<li><a href="index.php">Home</a></li>
					<li><a href="restaurante.php">Restaurante</a></li>
					<li>Despre</li>
					<li>Ajutor</li>
				</ul>
			</div>