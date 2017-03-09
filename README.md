# bomtush
THIS IS NOT SECURE! Don't use this in a production environment. Currently live at http://phscyberdefense.org/bomtush.

To make this work, you must:

1. have a LAMP stack with PDO and PHP7

2. create directory "u" for user uploads.

3. create file "create.php" which defines $db, $user, and $pass to be passed as arguments to "new PDO(...);"

4. create file ".htaccess" with appropriate ErrorDocument definitions for /error pages to work
