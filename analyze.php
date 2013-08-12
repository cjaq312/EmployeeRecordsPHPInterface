<?php
include("connection.php");
$user = $_COOKIE["user"];
$key = $_COOKIE["key"];
$q1 = mysql_query("select * from login where user=\"$user\" and md5=\"$key\"");

$f1=mysql_num_rows($q1);

if($f1 == 0)
echo"Unauthorised User";
?><html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
			
	</head>

	<body id="backgroundbody">
		<div id="outerdiv">
			<div id = "headerdiv">
				SHOP n SHOP
			</div>
		  
			<div>
				
				<!--<table width="258" border="0" align="center">
				</table>
				<a href="index.html">Log Out</a>

				</p>-->
				
				<?php
					if($f1 != 0 && $user != 'AF')
					{
					$q2=mysql_query("select * from bonus where user = \"$user\" AND vnt = ( SELECT max( vnt ) FROM bonus WHERE user = \"$user\" )");
					echo"<table align = \"center\"><tr><th>USER</th><th>VALID ENTRY TIME</th><th>VALID END TIME</th><th>SALARY</th></tr>";
					while($r1=mysql_fetch_array($q2))
					{
					echo"<tr><td>".$r1["user"]."</td><td>".$r1["vnt"]."</td><td>".$r1["vet"]."</td><td>".$r1["salary"]."</td></tr>";
					break;
					}
					}
					elseif($f1 != 0 && $user == 'AF')
					{
					
						header( 'Location: Managerview.html' ) ;
					
					}
					//echo"</body></html>";
					echo "<a href=\"logout.php\">Log Out</a>";
					?>
			</div>
	</div>
	</body>
	</html>
