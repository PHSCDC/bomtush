<?php
include "balancetags.php";
include "config.php";

$author = $_COOKIE["sess_user"];
$text = $_POST["postdata"];
$ok = 2;

if (is_uploaded_file($_FILES["upload"]["tmp_name"])) {
	$ok = 1;
	$filename = basename($_FILES["upload"]["name"]);
	if (file_exists("/var/www/html/bomtush/u/" . $filename)) {
		header('Location: postpage.php?err=file already exists. try uploading with a different filename than ' . $filename);
		$ok = 0;
	}

	if ($_FILES["upload"]["size"] > 1000000) {
		header('Location: postpage.php?err=file is too large. the maximum size is 1 megabyte.');
		$ok = 0;
	}

	if ($ok == 1) {
		if (!move_uploaded_file($_FILES["upload"]["tmp_name"], "/var/www/html/bomtush/u/" . $filename)) {
			header('Location: postpage.php?err=there was an unknown error while uploading your file. sorry about that.');
			$ok = 0;
		}
	}
}

function sanitizePost($post) {
	$post = htmlspecialchars($post, ENT_QUOTES);
	$post = nl2br($post,false);
	$post = str_replace(" ", "&nbsp", $post);

	$activetags = array();
	$tags = array("b","i","u","table","tr","td","s","br","pre");
	foreach ($tags as $curtag) {
		$post = str_ireplace('['.$curtag.']', '<'.$curtag.'>', $post);
		$post = str_ireplace('[/'.$curtag.']', '</'.$curtag.'>', $post);
	}
	unset($curtag);

	$post = str_ireplace('[l]', '<p class="text-left">', $post);
	$post = str_ireplace('[c]', '<p class="text-center">', $post);
	$post = str_ireplace('[r]', '<p class="text-right">', $post);
	$post = str_ireplace(array("[/l]","[/c]","[/r]"), '</p>', $post);

	$post = balance_tags($post);
	$post = str_replace("[[", "[", $post);
	$post = str_replace("]]", "]", $post);
	return $post;
}

try {
	if (empty($author)) {
		header('Location: /bomtush/loginpage.php');
	} else {
	        if ($ok != 0) {
	                $conn = new PDO($db,$user,$pass);
	                $username = $conn->query("SELECT name FROM user where email='$author';")->fetchAll()[0]['name'];
	                echo "Username: $username <br />";
			if (strlen($text) > 0) {
				if (sanitizePost($text) < 64000) {
		                	if (isset($filename) && $ok==1) {
						$post = $conn->prepare("INSERT INTO post (author, html, date, attachment) VALUES ('$username', '" . sanitizePost($text) . "' , CURTIME(), " . $conn->quote($filename) . ");");
		        	        }else{
						$post = $conn->prepare("INSERT INTO post (author, html, date) VALUES ('$username', '" . sanitizePost($text) . "' , CURTIME());");
					}
				} else {
					header('Location: postpage.php?err=your post is too long.');
				}
			} else {
				header('Location: postpage.php?err=your post must not be empty.');
			}

			if(!$post->execute()) {
				header('Location: postpage.php?err=something went wrong with this post. sorry about that.');
			}

			$post = null;
			$conn = null;
		}
	}
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

header('Location: /bomtush');

?>
