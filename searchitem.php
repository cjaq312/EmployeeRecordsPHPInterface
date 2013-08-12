<?php
$id=$_POST["id"];
$name=$_POST["name"];
$amount=$_POST["amount"];
/*$id="1";
$name="";
$amount="";*/

$loser=0;
include("connection.php");
$check = mysql_query("select * from item");
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
echo"<html><body>";
if($id=="" && $name=="" && $amount=="")
{
echo"Enter atleast one field";
}
else
{
echo"<form action='delitem.php' method=post>";
while($r=mysql_fetch_array($check))
{

if($id == $r['id'] && $name == $r['name'] && $amount == $r['amount'])
{
$search = mysql_query("select * from item where id=\"".$id."\" and name = \"".$name."\" and amount = \"".$amount."\"");
$loser=0;
break;
}
elseif($id==$r['id'] && $name==$r['name'] && ($amount != $r['amount'] || $amount == ''))
{
$search=mysql_query("select * from item where id=\"".$id."\" and name = \"".$name."\"");
$loser=0;
break;
}
elseif($name==$r['name'] && $amount==$r['amount'] && ($id != $r['id'] || $id == ''))
{
$search=mysql_query("select * from item where amount=\"".$amount."\" and name = \"".$name."\"");
$loser=0;
break;
}
elseif($id==$r['id'] && $amount==$r['amount'] && ($name != $r['name'] || $name == ''))
{
$search=mysql_query("select * from item where id=\"".$id."\" and amount = \"".$amount."\"");
$loser=0;
break;
}
elseif($id==$r['id'] && ($name!=$r['name'] || $name=="") && ($amount!=$r['amount'] || $amount==""))
{
$search=mysql_query("select * from item where id=\"".$id."\"");
$loser=0;
break;
}
elseif(($id != $r['id'] || $id == "") && $name == $r['name'] && ($amount != $r['amount'] || $amount == ""))
{
$search=mysql_query("select * from item where name=\"".$name."\"");
$loser=0;
break;
}
elseif(($id != $r['id'] || $id == "") && ($name != $r['name'] || $name == "") && $amount == $r['amount'])
{
$search=mysql_query("select * from item where amount=\"".$amount."\"");
$loser=0;
break;
}
elseif($id!=$r['id'] || $name!=$r['name'] || $amount!=$r['amount'])
{
$loser=1;
}
}
if($loser == 1)
echo "sorry fields doesnt match";
elseif($loser == 0)
{
echo"<table border='2'><tr><th>options</th><th>id</th><th>Name</th><th>Description</th><th>Amount</th><th>Cost</th></tr>";
while($r1=mysql_fetch_array($search))
{
echo"<tr><td><input type='checkbox' name=\"a[]\" value=\"".$r1["id"]."\"></td><td>".$r1["id"]."</td><td>".$r1["name"]."</td><td>".$r1["description"]."</td><td>".$r1["amount"]."</td><td>".$r1["cost"]."</td></tr>";
}
echo"</table><input type='submit' value='submit'/></form> ";
}
}
echo"</body></html>";
?>