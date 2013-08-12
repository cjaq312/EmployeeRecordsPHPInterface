<?php
$user=$_POST["user"];
$pass=$_POST["pass"];
//$key=0;
$key=md5("$pass");
include("connection.php");
$check = mysql_query("select * from login where user=\"$user\" and password=\"$pass\"");
$f = mysql_num_rows($check);
if($f==0)
{
//echo"Unauthorised Access";
}
else
{
while($r=mysql_fetch_array($check))
{
if($user==$r["user"] && $pass==$r["password"])
{
setcookie("user", "$user", time()+3600);
setcookie("key", "$key", time()+3600);
mysql_query("update login set md5=\"$key\" where user=\"$user\"");
mysql_query("update login set status=\"active\" where user=\"$user\"");
header("Location:analyze.php");
break;
}
else
echo"Unauthorised Access";
}
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
			
	</head>

	<body id="backgroundbody">
		<div id="outerdiv">
			<div id = "headerdiv">
				SHOP n SHOP
			</div>
			<div id="right_panel">
			<form action="Login.php" method="get">
<table width="258" border="0" align="center">
<?php echo"Unauthorised Access";?>

</table>
</form>
</p>
</div>
			</div>
				<a href=index.html>Login Page</a>
		</div>
	</body>
</html>