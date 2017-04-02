<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/octicons.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse bg-primary">
			<?php
				include "header.php";
				include "nav.php";
			?>
		</nav>
		<div class="container-fluid">
			<?php
				include "showpost.php";
				include "config.php";
				if (isset($_GET['p']))
				{
					$id = $_GET['p'];
					$post=0;
				        try {
				                $conn = new PDO($db, $user, $pass);
						$input = $conn->prepare("SELECT *, DATEDIFF(CURTIME(), date) AS daysAgo, EXTRACT(HOUR FROM CURTIME()) - EXTRACT(HOUR FROM date) AS hoursAgo, EXTRACT(MINUTE FROM CURTIME()) - EXTRACT(MINUTE FROM date) AS minutesAgo FROM post WHERE id=$id;");
				                if(!$input->execute())
				                {
				                        echo "Failed to read posts: " . $input->errorInfo()[0] . " " . $input->errorInfo()[2] . "<br>";
				                }
				                $conn = null;
				                $post = $input->fetchAll()[0];
				        }
				        catch (PDOException $e) {
				                echo 'Connection failed: ' . $e->getMessage();
				        }

					echoPost($post);

				}else{
					echo "<h2>No post specified in URL.</h2>";
				}
			?>
		</div>
	</body>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/tether.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>
