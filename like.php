<?php
if (isset($_COOKIE['sess_user']))
{
	include "config.php";
	$author = $_COOKIE["sess_user"];
	$postid = $_GET["postid"];
	$state = $_GET["state"];

	try {
                $conn = new PDO($db,$user,$pass);
		$check = $conn->prepare("SELECT user FROM likes WHERE `post`=" . $conn->quote($postid) . " AND `user`=" . $conn->quote($author) . ";");
		if (!$check->execute()) {
			// echo "DANG it";
		} else {
			$makesure = $check->fetch();
			if($makesure['user'] == $author) {
				$post = $conn->prepare("DELETE FROM likes WHERE `post`=" . $conn->quote($postid) . " AND `user`=" . $conn->quote($author) . ";");
			} else {
			        $post = $conn->prepare("INSERT INTO likes (user, post, date, state) VALUES ('$author', '$postid', CURTIME(), $state);");
			}
		        if(!$post->execute()) {
		               // echo "it did not happen: " . $post->errorInfo()[0] . ", " . $post->errorInfo()[2] . "<br />";
		        }
		}
			$check = null;
		        $post = null;
		        $conn = null;
	}
	catch(PDOException $e) {
	        //echo "Connection failed: " . $e->getMessage();
	}
	header("Location: " . $_SERVER['HTTP_REFERER']);
}
else
{
	header("Location: /bomtush/loginpage.php");
}
?>
