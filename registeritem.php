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
$id=$_POST['id'];
$name=$_POST['name'];
$desc=$_POST['desc'];
$amount=$_POST['amount'];
$cost=$_POST['cost'];
$loser=0;
$check=mysql_query("select * from item");

$f=mysql_num_rows($check);


echo"<html><body>";
if($id==""||$name==""||$desc==""||$amount==""||$cost=="")
{
echo "enter all the fields";
echo"<a href='additem.php'> Go Back</a>";
}
else
{
if($f==0)
{
mysql_query("insert into item values(\"$id\",\"$name\",\"$desc\",\"$amount\",\"$cost\")");
echo "<h3>Successfully Added</h3></br>";
echo"<a href='additem.php'> Click to add more</a>";
}
else
{
while($r=mysql_fetch_array($check))
{
if($id == $r['id'])
{
echo"Product already exists Please enter another product";
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
mysql_query("insert into item values(\"$id\",\"$name\",\"$desc\",\"$amount\",\"$cost\")");
echo "<h3>Successfully Added</h3></br>";
echo"<a href='additem.php'> Click to add more</a>";
}
}
}
?>

		</div>
	</body>
</html>