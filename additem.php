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
					<br/>
					<a href="logout.php">LogOut</a>

			  </div>
			</div>
			
			<div id="right_panel">

<?php
echo"
<form method='post' action='registeritem.php'>
<table>
	<tr>
		<td>
Id:
		</td>
		<td>
<input type='text' size='10' maximam='20' name='id'/></br>
		</td>
	</tr>
	<tr>
		<td>
Name:
		</td>
		<td>
<input type='text' size='10' maximam='20' name='name'/></br>
		</td>
	</tr>
	<tr>
		<td>
Description:
		</td>
		<td>
<input type='text' size='10' maximam='20' name='desc'/></br>
		</td>
	</tr>
	<tr>
		<td>
Amount:
		</td>
		<td>
<input type='text' size='10' maximam='20' name='amount'/></br>
		</td>
	</tr>
	<tr>
		<td>
Cost:
		</td>
		<td>
<input type='text' size='10' maximam='20' name='cost'/></br>
		</td>
	</tr>
</table>	

<input type='submit' value='Add'/></form>";
?>

		</div>
	</body>
</html>