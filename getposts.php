<?php
function getNewestPosts($offset) {
	include "config.php";
	$offset=($offset-1)*25;
	try {
		$conn = new PDO($db, $user, $pass);
		if (isset($_GET["sort"])) {
			switch ($_GET["sort"]) {
				case 1:
					$input = $conn->prepare("SELECT *, DATEDIFF(CURTIME(), date) AS daysAgo, EXTRACT(HOUR FROM CURTIME()) - EXTRACT(HOUR FROM date) AS hoursAgo, EXTRACT(MINUTE FROM CURTIME()) - EXTRACT(MINUTE FROM date) AS minutesAgo FROM post ORDER BY date DESC LIMIT 25 OFFSET $conn->quote($offset);");
					break;
				case 2:
					$input = $conn->prepare("SELECT *, DATEDIFF(CURTIME(), date) AS daysAgo, EXTRACT(HOUR FROM CURTIME()) - EXTRACT(HOUR FROM date) AS hoursAgo, EXTRACT(MINUTE FROM CURTIME()) - EXTRACT(MINUTE FROM date) AS minutesAgo FROM post ORDER BY date ASC LIMIT 25 OFFSET $conn->quote($offset);");
					break;
				case 3:
					$input = $conn->prepare("SELECT *, DATEDIFF(CURTIME(), date) AS daysAgo, EXTRACT(HOUR FROM CURTIME()) - EXTRACT(HOUR FROM date) AS hoursAgo, EXTRACT(MINUTE FROM CURTIME()) - EXTRACT(MINUTE FROM date) AS minutesAgo FROM post ORDER BY rand() DESC LIMIT 25 OFFSET $conn->quote($offset);");
					break;
				default:
					$input = $conn->prepare("SELECT *, DATEDIFF(CURTIME(), date) AS daysAgo, EXTRACT(HOUR FROM CURTIME()) - EXTRACT(HOUR FROM date) AS hoursAgo, EXTRACT(MINUTE FROM CURTIME()) - EXTRACT(MINUTE FROM date) AS minutesAgo FROM post ORDER BY date DESC LIMIT 25 OFFSET $conn->quote($offset);");
					break;
			}
		} else {
			$input = $conn->prepare("SELECT *, DATEDIFF(CURTIME(), date) AS daysAgo, EXTRACT(HOUR FROM CURTIME()) - EXTRACT(HOUR FROM date) AS hoursAgo, EXTRACT(MINUTE FROM CURTIME()) - EXTRACT(MINUTE FROM date) AS minutesAgo FROM post ORDER BY date DESC LIMIT 25 OFFSET $conn->quote($offset);");
		}

		if(!$input->execute()) {
			echo "Failed to read posts: " . $input->errorInfo()[0] . " " . $input->errorInfo()[2] . "<br>";
		}

		$conn = null;

		return $input->fetchAll();
	}
	catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
}

function getUserPosts($name, $offset) {
	include "config.php";
	$offset=($offset-1)*25;
	try {
		$conn = new PDO($db, $user, $pass);
		$input = $conn->prepare("SELECT *, DATEDIFF(CURTIME(), date) AS daysAgo, EXTRACT(HOUR FROM CURTIME()) - EXTRACT(HOUR FROM date) AS hoursAgo, EXTRACT(MINUTE FROM CURTIME()) - EXTRACT(MINUTE FROM date) AS minutesAgo FROM post WHERE author=" . $conn->quote($name) . " ORDER BY date DESC LIMIT 25 OFFSET $conn->quote($offset);");
		if (!$input->execute()) {
			echo "Failed to read posts: " . $input->errorInfo()[0] . " " . $input->errorInfo()[2] . "<br>";
		}

		$conn = null;

		return $input->fetchAll();
	}
	catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
}
?>
