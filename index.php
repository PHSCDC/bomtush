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
    <style>
      div.card-block {
        max-height: 500px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse bg-primary">
      <?php include "header.php"; ?>
      <table class="table-full-width"> <!-- forgive me for i have sinned -->
        <tr>
          <td>
            <div class="float-left nav-half">
              <ul class="nav navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  sort by
                </a>
                <div class="dropdown-menu" aria-labelledby="Preview">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="?sort=1">new</a>
                  <a class="dropdown-item" href="?sort=2">old</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="?sort=3">random!</a>
                </div>
              </li>
            </ul>
          </div>
        </td>
        <td><?php include "nav.php"; ?></td>
        </tr>
      </table>
    </nav>
    <!-- END OF NAV; START OF "USER-GENERATED" """CONTENT""" -->
    <?php
      if(!isset($_COOKIE["sess_user"]))
      {
        echo "<div class=\"alert alert-warning\">you are not logged in!</div>";
      }
      else
      {
        echo "<div class=\"alert alert-info\">logged in with email: " . $_COOKIE["sess_user"] . " ... yay.</div>";
      }
    ?>
    <?php
      include "getposts.php";
      include "showpost.php";
      $offset = isset($_GET["offset"]) ? $_GET["offset"] : 1;
      $postList = getNewestPosts($offset);
    ?>
    <div class="container-fluid">
      <?php
        foreach($postList as $post)
        {
          echoPost($post);
        }
      ?>
    </div>

      <!-- END OF CONTENT; START OF PAGENAV & FOOTER -->

      <nav aria-label="Page navigation">
        <ul class="pagination mt-5 justify-content-center">
        <?php
          $next = $offset + 1;
          if($offset > 1)
          {
            $prev = $offset - 1;
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"index.php?offset=$prev\">prev</a></li>";
          }
          echo "
            <li class=\"page-item active\"><a class=\"page-link\" href=\"index.php?offset=$offset\">$offset</a></li>
            <li class=\"page-item\"><a class=\"page-link\" href=\"index.php?offset=$next\">next</a></li>
          ";
        ?>
        </ul>
      </nav>
      <p class="text-center mt-5">2017, phscyberdefense</p>
    </div>
    
    <!-- END OF FOOTER -->

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
