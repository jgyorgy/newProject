<!doctype html>
<html>
	<head>
		<?php 
			include_once('../config/config.php');
		?>
		<title>Project</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<link href="../css/style.css" type="text/css" rel="stylesheet" />
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
			$( "#datepicker" ).datepicker();
		});
		</script>
	</head>
	<body>
		<div class="header">
			<ul class="headerMenu">
				<li>Home</li>
				<li>Restaurante</li>
				<li>Despre</li>
				<li>Ajutor</li>
			</ul>
		</div>