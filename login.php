<?php
include "config.php";

$email = "";
$passwd = "";

$emailerr = "";
$passerr = "";

$errurl = "";


if($_SERVER["REQUEST_METHOD"] == "POST") {

	if(empty($_POST["email"])) {
		$emailerr = "email is missing";
	}
	else {
		if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$email = $_POST["email"];
		}
		else {
			$emailerr = "invalid email";
		}
	}

	if(empty($_POST["passwd"])) {
		$passerr = "password is missing";
	}
	else {
		$passwd = clean_input(hash("sha256", $_POST["passwd"]));
	}

	if(!empty($emailerr)) {
		$errurl .= "emailerr=" . $emailerr;
	}

	if(!empty($passerr)) {
		$errurl .= "passerr=" . $passerr;
	}

	if(!empty($errurl)) {
		header("Location: registerpage.php?" . $errurl);
	}
}

function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(empty($errurl)) {
	try {
                $conn = new PDO($db,$user,$pass);
		$input = $conn->prepare("SELECT * FROM user WHERE `email`='$email' AND `password`='$passwd';");
		if(!$input->execute())
		{
			echo "an error of some sort: \"" . $input->errorInfo()[0] . "\"<br>\"" . $input->errorInfo()[2] . "\"<br>";
		}
		else
		{
			echo "login successful! ";
		}

		if(count($input->fetchAll()) > 0)
		{
			setcookie("sess_user", "", time() - 3600);
			setcookie("sess_user", $email, time() + 3600);
			echo "yay!";
		}
		else
		{
			echo "meh.";
		}

		$conn = null;
		$input = null;
	}
	catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}

header('Location: /bomtush');
}

?>
