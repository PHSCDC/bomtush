<!doctype html>
<html>
	<head>
		<title>bomtush - user uploads</title>
		<link rel="stylesheet" href="/bomtush/css/style.css">
		<link rel="stylesheet" href="/bomtush/css/bootstrap.min.css">
		<link rel="stylesheet" href="/bomtush/css/octicons.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse bg-primary">
			<?php
				include "../header.php";
				include "../nav.php";
			?>
		</nav>
		<div class="container-fluid">
			<h1>some random user uploads</h1>
			<ul>
				<?php
					$custompages = glob("[^.]*.*");
					shuffle($custompages);
					$i = 0;
					foreach($custompages as $page){
						echo "<li><a href='$page'>$page</a></li>";
						$i++;
						if ($i >= 50){
							break;
						}
					}

					unset($page);
				?>
			</ul>
		</div>
	</body>
</html>
