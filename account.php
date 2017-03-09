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
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="card mt-5">
            <div class="card-header">
              <img src="http://crouton.net/crouton.png" width="50" height="50">
              <p>President Clinton</p>
              <p>Location: Tßšçhêïñå</p>
            </div>
            <div class="card-header">
              <p>President Clinton's status:</p>
            </div>
            <div class="card-block"> <!-- all post content goes within this div -->
              <p>
                <a href="postpage.html">Post Page</a><br>
                The FitnessGram Pacer Test is a multistage aerobic capacity test
                that progressively gets more difficult as it continues. The 20 meter
                pacer test will begin in 30 seconds. Line up at the start. The
                running speed starts slowly but gets faster each minute after you
                hear this signal. <em>Bodeboop.</em> A single lap should be completed every time
                you hear this sound. <em>Ding.</em> Remember to run in a straight line and run
                as long as possible. The second time you fail to complete a lap
                before the sound, your test is over. The test will begin on the word
                start. On your mark. Get ready!… Start.
              </p>
              <img class="img-fluid" src="http://i.imgur.com/ZKGFJbC.jpg">
            </div>
            <div class="card-footer text-muted"> <!-- post footer goes here -->
              <div class="float-left">
                2 seconds ago by <a href="#!">lake----------street</a>
              </div>
              <div class="float-right">
                <a class="text-muted" href="#!"><span class="octicon octicon-thumbsup"></span> 166</a> | <!-- a class changes to text-primary when liked -->
                <a class="text-muted" href="#!"><span class="octicon octicon-thumbsdown"></span> 493</a> (25%) <!-- a class changes to text-danger when disliked -->
                <div class="dropdown d-inline-block">
                  <a class="dropdown-toggle dropdown-toggle-no-caret" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="octicon octicon-three-bars"></span></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Permalink</a>
                    <a class="dropdown-item" href="#">Report abuse</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="card mt-5">
          <div class="card-block"> <!-- all post content goes within this div -->
            <p>
              <a href="postpage.html">Post Page</a><br>
              The FitnessGram Pacer Test is a multistage aerobic capacity test
              that progressively gets more difficult as it continues. The 20 meter
              pacer test will begin in 30 seconds. Line up at the start. The
              running speed starts slowly but gets faster each minute after you
              hear this signal. <em>Bodeboop.</em> A single lap should be completed every time
              you hear this sound. <em>Ding.</em> Remember to run in a straight line and run
              as long as possible. The second time you fail to complete a lap
              before the sound, your test is over. The test will begin on the word
              start. On your mark. Get ready!… Start.
            </p>
            <img class="img-fluid" src="http://i.imgur.com/ZKGFJbC.jpg">
          </div>
          <div class="card-footer text-muted"> <!-- post footer goes here -->
            <div class="float-left">
              2 seconds ago by <a href="#!">lake----------street</a>
            </div>
            <div class="float-right">
              <a class="text-muted" href="#!"><span class="octicon octicon-thumbsup"></span> 166</a> | <!-- a class changes to text-primary when liked -->
              <a class="text-muted" href="#!"><span class="octicon octicon-thumbsdown"></span> 493</a> (25%) <!-- a class changes to text-danger when disliked -->
              <div class="dropdown d-inline-block">
                <a class="dropdown-toggle dropdown-toggle-no-caret" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="octicon octicon-three-bars"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Permalink</a>
                  <a class="dropdown-item" href="#">Report abuse</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
