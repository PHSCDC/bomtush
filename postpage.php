<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bootstrap will be the death of me</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/octicons.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-inverse bg-primary">
      <?php
        include "header.php";
        include "nav.php";
      ?>
    </nav>
    <div class="container-fluid">
      <h1>grace the world with your delectable insight</h1>
<?php
	if (isset($_GET["err"])){
		echo "<div class='alert alert-danger'>error: " . htmlspecialchars($_GET["err"]) . "</div>";
	}
?>
      <form action="post.php" method="post" enctype="multipart/form-data">
        <button type="submit" class="btn btn-primary mb-2">post!!</button>
	<label for="upload"><span class="btn btn-primary badge">upload an attachment<br><input type="file" name="upload" id="upload"></span></label>
        <div class="card">
          <textarea rows="20" class="card-block" id="postdata" name="postdata"></textarea>
        </div>
      </form>
      <h2>formatting help:</h2>
      <p><b>[b]bold[/b]</b></p>
      <p><i>[i]italic[/i]</i></p>
      <p><u>[u]underline[/u]</u></p>
      <p><s>[s]strikethrough[/s]</s></p>
      <pre>[table]<br>[tr] &nbsp; [td]data[/td] &nbsp; [td]more data[/td] &nbsp; [/tr]<br>[tr] &nbsp; [td]more[/td] &nbsp; [td]even more[/td] &nbsp; [/tr]<br>[/table]
      </pre>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
