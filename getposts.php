<?php
function getNewestPosts($offset) {
	$preamble = "SELECT *, DATEDIFF(CURTIME(), date) AS daysAgo, EXTRACT(HOUR FROM CURTIME()) - EXTRACT(HOUR FROM date) AS hoursAgo, EXTRACT(MINUTE FROM CURTIME()) - EXTRACT(MINUTE FROM date) AS minutesAgo FROM post ";

	include "config.php";
	$offset = ($offset-1) * 25;
	try {
		if (isset($_GET["sort"])) {
			switch ($_GET["sort"]) {
				case 1:
					$input = $conn->prepare("$preamble ORDER BY date DESC LIMIT :offset, 25;");
					break;
				case 2:
					$input = $conn->prepare("$preamble ORDER BY date ASC LIMIT :offset, 25;");
					break;
				case 3:
					$input = $conn->prepare("$preamble ORDER BY rand() DESC LIMIT :offset, 25;");
					break;
				default:
					$input = $conn->prepare("$preamble ORDER BY date DESC LIMIT :offset, 25;");
					break;
			}
		} else {
			$input = $conn->prepare("$preamble ORDER BY date DESC LIMIT :offset, 25;");
		}

		$input->bindParam(':offset', intval($offset));

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
	$preamble = "SELECT *, DATEDIFF(CURTIME(), date) AS daysAgo, EXTRACT(HOUR FROM CURTIME()) - EXTRACT(HOUR FROM date) AS hoursAgo, EXTRACT(MINUTE FROM CURTIME()) - EXTRACT(MINUTE FROM date) AS minutesAgo FROM post ";

	include "config.php";
	$offset = ($offset-1) * 25;
	try {
		$input = $conn->prepare("$preamble WHERE author = BINARY :author ORDER BY date DESC LIMIT :offset, 25;");

		$input->bindParam(':offset', $offset);
		$input->bindParam(':author', $name);

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
