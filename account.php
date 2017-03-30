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
    <?php
     include "getposts.php";
      include "showpost.php";
      $offset = isset($_GET["offset"]) ? $_GET["offset"] : 1;
      $user = ($_GET["user"]);
      $postList = getUserPosts($user, $offset);
    ?>
    <div class="container-fluid">
      <?php
        foreach($postList as $post)
        {
          echoPost($post);
        }
      ?>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
