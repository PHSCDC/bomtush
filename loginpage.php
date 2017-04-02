<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link ref="stylesheet" href="css/octicons.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse bg-primary">
			<?php
				include "header.php";
				include "nav.php";
			?>
		</nav>
		<div class="container-fluid">
			<div class="card mt-2">
				<div class="card-block">
					<h1>login</h1>
					<form action="login.php" method="post">
						<div class="form-group">
							<label for="email">email:</label>
							<?php if(isset($_GET["emailerr"])) echo "<div class='alert alert-danger'>error: " . htmlspecialchars($_GET["emailerr"]) . "</div>"; ?>
							<input type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label for="passwd">password:</label>
							<?php if(isset($GET["passerr"])) echo "<div class='alert alert-danger'>error: " . htmlspecialchars($_GET["passerr"]) . "</div>"; ?>
							<input type="password" class="form-control" id="passwd" name="passwd">
						</div>
						<div>
							<button type="submit" class="btn btn-primary">submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</html>
