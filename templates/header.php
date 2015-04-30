<!doctype html>
<html>
	<head>
		<?php 
			include_once('../config/config.php');
		?>
		<title>Project</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <?php if ($endURL == 'login.php') { ?>
                <link href="../css/loginregister.css" type="text/css" rel="stylesheet" />
            <?php } ?>
                <link href="../css/style.css" type="text/css" rel="stylesheet" />
		<!--datepicker-->
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script src="../js/jquery-1.10.2.js"></script>
		<script src="../js/jquery-ui.js"></script>
		<!--selectbox-->
		<link href="../css/jquery.selectBox.css" type="text/css" rel="stylesheet" />
		<script src="../js/jquery.selectBox.js"></script>
		<link href="../css/jquery.ui.timepicker.css" type="text/css" rel="stylesheet" />
		<script src="../js/jquery.ui.timepicker.js"></script>
                <script src="../js/loginregister.js"></script>
                <script src="../js/script.js"></script>
                
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<script type="text/javascript">
		$(document).ready(function() {
                        $( "#datepicker" ).datepicker({
                            altFormat: "yyyy-mm-dd"
                        });
			$( "#timepicker" ).timepicker();
			$('select').selectBox();
		});
		</script>
	</head>
	<body>
		<div class="wrapper">
                    <?php if($endURL != 'login.php'){ ?>
			<div class="header">
				<ul class="headerMenu">
					<li><a href="index.php">Home</a></li>
					<li><a href="restaurante.php">Restaurante</a></li>
					<li>Despre</li>
					<li>Ajutor</li>
					<li class="logout"><a href="logout.php">Log out</a></li>
				</ul>
				<div class="subHeader">
					<img src="../images/banner_restaurant.jpg"> 
				</div>
			</div>
                    <?php } ?>