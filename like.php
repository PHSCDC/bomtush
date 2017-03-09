<?php
if (isset($_COOKIE['sess_user']))
{
	include "config.php";
	$author = $_COOKIE["sess_user"];
	$postid = $_GET["postid"];
	$state = $_GET["state"];

	try {
                $conn = new PDO($db,$user,$pass);
	        $post = $conn->prepare("INSERT INTO likes (user, post, date, state) VALUES ('$author', '$postid', CURTIME(), $state);");
	        if(!$post->execute()) {
	                echo "it did not happen: " . $post->errorInfo()[0] . ", " . $post->errorInfo()[2] . "<br />";
	        }

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
