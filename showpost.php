<?php
function echoPost($post) {
	include "config.php";
        $postAge = "";
        if($post["daysAgo"] > 0) {
        	$postAge = $post["daysAgo"] . " days ago";
        } else if($post["hoursAgo"] > 0) {
        	$postAge = $post["hoursAgo"] . " hours ago";
        } else if($post["minutesAgo"] > 0) {
        	$postAge = $post["minutesAgo"] . " minutes ago";
	} else {
        	$postAge = "less than a minute ago";
        }
	$conn = new PDO($db, $user, $pass);

	$query_likes = $conn->prepare("SELECT * FROM likes WHERE post=$post[id] AND state=1");
	$query_likes->execute();
	$numLikes = count($query_likes->fetchAll());

	$query_dislikes = $conn->prepare("SELECT * FROM likes WHERE post=$post[id] AND state=2");
	$query_dislikes->execute();
	$numDislikes = count($query_dislikes->fetchAll());

	$likesPercent = 0;
	if($numLikes + $numDislikes > 0) {
        $likesPercent = $numLikes / ($numLikes + $numDislikes) * 100;
	}
	echo "
	<div class=\"row\">
        <div class=\"col-sm-1 col-lg-3\"></div>
        <div class=\"col-sm-10 col-lg-6\">
          <div class=\"card mt-4\">
            <div class=\"card-block\"> <!-- all post content goes within this div -->
              $post[html]
            </div>";
      if (isset($post["attachment"])) {
        echo "<div class=\"card-footer alert-info\">
                attachment:
                <a href=\"u/" . $post["attachment"]. "\">" . $post["attachment"] . "</a>
              </div>";
      }
      if ($post['id'] % 100 == 0) {
	echo "<div class=\"card-footer alert-success\">
                this is the site's " . $post['id'] . "th post!
              </div>";
      }
      echo "
            <div class=\"card-footer text-muted\"> <!-- post footer goes here -->
              <div class=\"float-left\">
                $postAge by <a href=\"account.php?user=$post[author]\">$post[author]</a>
              </div>
              <div class=\"float-right\">
                <a class=\"text-muted\" href=\"like.php?postid=$post[id]&state=1\"><span class=\"octicon octicon-thumbsup\"></span> $numLikes</a> | <!-- a class changes to text-primary when liked -->
                <a class=\"text-muted\" href=\"like.php?postid=$post[id]&state=2\"><span class=\"octicon octicon-thumbsdown\"></span> $numDislikes</a> ($likesPercent%) <!-- a class changes to text-danger when disliked -->
                <div class=\"dropdown d-inline-block\">
                  <a class=\"dropdown-toggle dropdown-toggle-no-caret\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"><span class=\"octicon octicon-three-bars\"></span></a>
                  <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                    <a class=\"dropdown-item\" href=\"viewpost.php?p=$post[id]\">Permalink</a>
                    <a class=\"dropdown-item\" href=\"reportabuse.php\">Report abuse</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class=\"col-sm-1 col-lg-3\"></div>
          </div>
        </div>
        ";
}
?>
