<?php
echo "Logging out...";

if (isset($_COOKIE['sess_user']))
{
	setcookie('sess_user','',time()-3600);
}

header('Location: /bomtush');
?>
