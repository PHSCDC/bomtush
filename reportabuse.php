<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link ref="stylesheet" href="css/octicons.css">
		<title>bomtush - report abuse</title>
	</head>
	<body>
		<nav class="navbar navbar-inverse bg-danger">
			<?php
				include "header.php";
				include "nav.php";
			?>
		</nav>
		<div class="container-fluid">
			<div class="card mt-2">
				<div class="card-block">
					<h1>report abuse? :(</h1>
					<h2>please describe what is abusive about this post.</h2>
					<div class="card">
						<textarea class="card-block"></textarea>
					</div>
					<a href="/bomtush/" class="btn btn-danger">submit abuse report</a><a href="/bomtush" class="btn">home</a>
				</div>
			</div>
		</div>
	</body>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</html>
