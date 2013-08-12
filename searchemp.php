<html>
	<head>
				<link rel="stylesheet" type="text/css" href="css/index.css" />
			
	</head>

	<body id="backgroundbody">

			<div id = "headerdiv">
				SHOP n SHOP
			</div>
			<div id="left_panel">
				<div id="left_panel_row">

					<a href="addemployee.php">Add Employee</a>
					<br/>
					<br/>
					<a href="additem.php">Add Item</a>
					<br/>
					<br/>
					<a href="SearchEmp.html">Search Employee</a>
					<br/>
					<br/>
					<a href="SearchItem.html">Search Item</a>
					<br/>
					<br/>
					<a href="Records.html">PreRecords</a>
					<br/>
					<br/>
					<br/>
					<br/>
					<a href="logout.php">Log Out</a>

			  </div>
			</div>
			
			<div id="right_panel">
			
		</div>
	</body>
</html>


<?php
$user=$_POST["user"];
$name=$_POST["name"];
$ssn=$_POST["ssn"];
$CLICK=1;
$loser=0;
include("connection.php");
$check = mysql_query("select * from employee");
echo"<html><body>";
if($user=="" && $name=="" && $ssn=="")
{
echo"Enter atleast one field";
}
else
{
echo"<form action='delemployee.php' method=post>";
while($r=mysql_fetch_array($check))
{

if($user == $r['user'] && $name == $r['fname'] && $ssn == $r['ssn'])
{
$search = mysql_query("select * from employee where user=\"".$user."\" and fname = \"".$name."\" and ssn = \"".$ssn."\"");
$loser=0;
break;
}
elseif($user==$r['user'] && $name==$r['fname'] && ($ssn != $r['ssn'] || $ssn == ''))
{
$search=mysql_query("select * from employee where user=\"".$user."\" and fname = \"".$name."\"");
$loser=0;
break;
}
elseif($name==$r['fname'] && $ssn==$r['ssn'] && ($user != $r['user'] || $user == ''))
{
$search=mysql_query("select * from employee where ssn=\"".$ssn."\" and fname = \"".$name."\"");
$loser=0;
break;
}
elseif($user==$r['user'] && $ssn==$r['ssn'] && ($name != $r['fname'] || $name == ''))
{
$search=mysql_query("select * from employee where user=\"".$user."\" and ssn = \"".$ssn."\"");
$loser=0;
break;
}
elseif($user==$r['user'] && ($name!=$r['fname'] || $name=="") && ($ssn!=$r['ssn'] || $ssn==""))
{
$search=mysql_query("select * from employee where user=\"".$user."\"");
$loser=0;
break;
}
elseif(($user!=$r['user'] || $user=="") && $name==$r['fname'] && ($ssn!=$r['ssn'] || $ssn==""))
{
$search=mysql_query("select * from employee where fname=\"".$name."\"");
$loser=0;
break;
}
elseif(($user!=$r['user'] || $user=="") && ($name!=$r['fname'] || $name=="") && $ssn==$r['ssn'])
{
$search=mysql_query("select * from employee where ssn=\"".$ssn."\"");
$loser=0;
break;
}
elseif($user!=$r['user'] || $name!=$r['fname'] || $ssn!=$r['ssn'])
{
$loser=1;
}
}
if($loser == 1)
echo "sorry fields doesnt match";
elseif($loser == 0)
{
echo"<table border='2'><tr><th>options</th><th>USER</th><th>SSN</th><th>FIRST NAME</th><th>LAST NAME</th><th>AGE</th><th>ADDRESS</th><th>VALID START-TIME</th><th>VALID END-TIME</th></tr>";
while($r1=mysql_fetch_array($search))
{
if($r1['vet'] == "0000-00-00")
{
$CLICK=$r1['vet'];
echo"<tr><td><input type='checkbox' name='a[]' value=".$r1["ssn"]."></td><td>".$r1["user"]."</td><td>".$r1["ssn"]."</td><td>".$r1["fname"]."</td><td>".$r1["lname"]."</td><td>".$r1["age"]."</td><td>".$r1["address"]."</td><td>".$r1["vnt"]."</td><td>".$r1["vet"]."</td></tr>";
}
}
if($CLICK == "0000-00-00")
echo"</table><input type='submit' value='delete'/></form> ";
}
}
echo"</body></html>";
?>