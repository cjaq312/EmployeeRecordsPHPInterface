<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
			
	</head>

	<body id="backgroundbody">
		<div id="outerdiv">
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
			
<?php
include("connection.php");
$first=$_POST['first'];
$second=$_POST['second'];
$age=$_POST['age'];
$address=$_POST['address'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$ssn=$_POST['ssn'];
$loser=0;
$check=mysql_query("select * from employee");
$check1=mysql_query("select * from login");
$f=mysql_num_rows($check);
$f1=mysql_num_rows($check1);

echo"<html><body>";
if($first==""||$second==""||$age==""||$address==""||$user==""||$pass==""||$ssn=="")
{
echo "enter all the fields";
echo"<a href='addemployee.php'> Go Back</a>";
}
else
{
if($f==0 && $f1==0)
{
mysql_query("insert into login(user,password,status) values(\"$user\",\"$pass\",\"inactive\")");
mysql_query("insert into employee(user,ssn,fname,lname,age,address,vnt) values(\"$user\",\"$ssn\",\"$first\",\"$second\",\"$age\",\"$address\",NOW())");
echo "<h3>Successfully Registered</h3></br>";
//echo"<a href='signin.html'>Click here to sign in</a>";
}
else
{
while($r=mysql_fetch_array($check))
{
if($user == $r['user'])
{
echo"User already exists Please enter another username";
$loser=0;
break;
}
else
{
$loser=1;
}
}
if($loser == '1')
{
mysql_query("insert into login(user,password,status) values(\"$user\",\"$pass\",\"inactive\")");
mysql_query("insert into employee(user,ssn,fname,lname,age,address,vnt) values(\"$user\",\"$ssn\",\"$first\",\"$second\",\"$age\",\"$address\",NOW())");

echo "<h3>Successfully Registered</h3></br>";
//echo"<a href='signin.html'>Click here to sign in</a>";
}
}
}
?>

		</div>
	</body>
</html>