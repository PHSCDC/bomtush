<?php
include "config.php";

$email = "";
$name = "";
$passwd = "";
$emailerr = "";
$nameerr = "";
$passerr = "";
$errurl = "";


if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["email"])) {
		$emailerr = "email required.";
	}
	else {
		if(filter_var(clean_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
			$email = clean_input($_POST["email"]);
		}
		else {
			$emailerr = "invaild email format.";
		}
	}
	if(empty($_POST["passwd"])) {
		$passerr = "password required.";
	}
	else {
		$passwd=hash("sha256", clean_input($_POST["passwd"]));
	}
	if(empty($_POST["user"])) {
		$nameerr = "username required.";
	}
	else {
		if(preg_match("/^[a-zA-Z ]*$/", clean_input($_POST["user"]))) {
			$name = clean_input($_POST["user"]);
		}
		else {
			$nameerr = "invalid username. only letters and spaces allowed.";
		}
	}

	if (!empty($emailerr)) {
		$errurl .= "emailerr=" . $emailerr;
	}

	if (!empty($passerr)) {
		$errurl .= (empty($returnurl) ? "&" : "") . "passerr=" . $passerr;
	}

	if (!empty($nameerr)) {
		$errurl .= (empty($returnurl) ? "&" : "") . "nameerr=" . $nameerr;
	}

	if (!empty($errurl)) {
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
		$testemail = $conn->prepare("SELECT email FROM user WHERE email='$email';");
		if(!$testemail->execute()) {
			echo "Shit it don't work";
		}
		else {
			$blah = $testemail->fetch(PDO::FETCH_ASSOC);
			if($blah['email'] == $email) {
				$errurl .= (empty($returnurl) ? "&" : "") . "emailerr=email already in use";
			}
			$blah = null;
		}

		$testuser = $conn->prepare("SELECT name FROM user WHERE name='$name';");
		if(!$testuser->execute()) {
			echo "SHOOT!";
		}
		else {
			$bleh= $testuser->fetch(PDO::FETCH_ASSOC);
			if($bleh['name'] == $name) {
				$errurl .= (empty($returnurl) ? "&" : "") . "nameerr=username already in use";
			}
			$bleh = null;
		}
		if(!empty($errurl)) {
			header("Location: registerpage.php?" . $errurl);
			$testemail = null;
			$testuser = null;
			$conn = null;
			exit;
		}

		$input = $conn->prepare("INSERT INTO user (`name`, `password`, `email`) VALUES ('$name', '$passwd', '$email');");
		if(!$input->execute())
		{
			echo "An error of some sort: " . $input->errorInfo()[0] . "<br>" . $input->errorInfo()[2] . "<br>";
		}
		else
		{
			ini_set( 'display_errors', 1 );  
			error_reporting( E_ALL );  
			$to = $email;
			mail($to, 'Conformation', 'Congratulations. You are registered' date('r'), ['From: info@'.php_uname('n')]);  
			echo "Email sent";
		}


		$testemail = null;
		$testuser = null;
		$conn = null;
		$input = null;
	}
	catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}

	header('Location: /bomtush/registersuccess.php');
}
?>
