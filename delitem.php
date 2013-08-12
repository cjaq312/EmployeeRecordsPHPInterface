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
					<br/>
					<a href="logout.php">LogOut</a>

			  </div>
			</div>
			
			<div id="right_panel">
			 "Succesfully Deleted"
		</div>
	</body>
</html>

<?php
$selection=$_POST['a'];
$size=sizeof($selection);
include("connection.php");
$q=mysql_query("select * from item");
while($check=mysql_fetch_array($q))
{
for($i=0;$i<$size;$i++)
{
if($check['id']==$selection[$i])
{
$r=mysql_query("select * from item where id = \"".$selection[$i]."\"");
echo"<html><body><form action='costupdate.php' method=post>";
while($check1=mysql_fetch_array($r))
{
echo "Id:".$check1['id']."<br/>Name:".$check1['name']."<br/>Description".$check1['description']."<br/>Amount".$check1['amount']."<br/>Cost:<input type='text' name='cost[]' value=\"".$check1['cost']."\"/><br/><hr/>";
echo"<input type='hidden' name='id[]' value=\"".$check['id']."\">";
}
}
}
}
echo"<input type='submit' value='update'/></form></body></html>";
?>