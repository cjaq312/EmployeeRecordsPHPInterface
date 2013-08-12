<?php
$user = $_COOKIE["user"];
include("connection.php");
mysql_query("update login set status ='inactive' where user = \"".$user."\"");
setcookie ("user", "", time() - 3600);
setcookie ("key", "", time() - 3600);
header('Location: index.html');
?>