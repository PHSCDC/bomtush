<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link ref="stylesheet" href="css/octicons.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse bg-success">
			<?php
				include "header.php";
				include "nav.php";
			?>
		</nav>
		<div class="container-fluid">
			<div class="card mt-2">
				<div class="card-block">
					<h1>registered successfully!</h1>
					<h2>you may now login.</h2>
					<a href="/bomtush/loginpage.php" class="btn btn-success">login</a><a href="/bomtush" class="btn">home</a>
				</div>
			</div>
		</div>
	</body>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</html>
